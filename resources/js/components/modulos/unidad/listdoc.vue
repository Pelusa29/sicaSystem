<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Listado documentos - Unidad</h1>
                    </section>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="box-header">
                                <div class="col-sm-2 row">
                                    <button @click="$router.push('/unidad')" class="btn btn-block btn-info"><i
                                            class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Regresar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="box box-info box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Asignacón de Documentos por Unidad</h3>
                                        </div>
                                        <div class="box-body">
                                            <form role="form">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Tipo Documento</label>
                                                            <div class="col-md-9">
                                                                <el-select v-model="fillEditarDocumento.ctipoDocumentoScan" filterable
                                                                    placeholder="Seleccione un Unidad">
                                                                    <el-option v-for="item in listadotipoDocumentos"
                                                                        :key="item.value" :label="item.label"
                                                                        :value="item.value">
                                                                    </el-option>
                                                                </el-select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Documento</label>
                                                            <div class="col-md-9">
                                                                <input type="file" class="form-control" @change="getFile">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="box-footer">
                                            <div class="row">
                                                <div class="col text-center">
                                                    <button class="btn btn-flat btn-info btnWidth"
                                                        @click.prevent="setAdjuntarDocumento()"
                                                        v-loading.fullscreen.lock="fullScreenLoading">Agregar</button>
                                                    <button class="btn btn-flat btn-default btnWidth"
                                                        @click.prevent="limpiarCriteriosBsq()">Limpiar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                            <div class="box box-info box-solid">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Listar Documentos</h3>
                                                </div>
                                                <template v-if="listTipoDocumentos.length">
                                                    <div class="box-body table-responsive">
                                                         <div class="scrollTable">
                                                            <table
                                                                class="table table-bordered table-striped dataTable table-head-fixed text-nowrap projects"
                                                                role="grid">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Tipo Documento</th>
                                                                        <th>Archivo</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr v-for="(item, index) in listTipoDocumentos" :key="index">
                                                                        <td v-text="item.tpoDocumento">
                                                                        </td>
                                                                        <td v-text="item.filename"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                         </div>
                                                    </div>
                                                    <div class="box-footer clearfix">
                                                    </div>
                                                </template>
                                                <template v-else>
                                                    <div class="callout callout-info">
                                                        <h5>No hay documentos adjuntos regisrtos</h5>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade in" id="modal-default" :style="modalShow ? mostrarModal : ocultarModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" @click="abrirModal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title">Modal</h4>
                    </div>
                    <div class="modal-body">
                        <div class="callout callout-danger" style="padding: 5px;" v-for="(item, index) in mensajeError"
                            :key="index" v-text="item">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" @click="abrirModal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: ['id'],
    data() {
        return {
            fillEditarDocumento: {
                nIdUnidad: this.id,
                ctipoDocumentoScan: '',
                oDocumento:''
            },
            listTipoDocumentos: [],
            listadotipoDocumentos: [
                { value: 'TarjetaCirculacion', label: 'Tarjeta de Circulación' },
                { value: 'PolizaSeguro', label: 'Póliza de Seguro' }
            ],
            fullScreenLoading: false,
            form: new FormData,
            modalShow: false,
            mostrarModal: {
                display: 'block'
            },
            ocultarModal: {
                display: 'none',
            },
            error: 0,
            mensajeError: []
        }
    },
    computed: {
    },
    mounted() {
        //this.getUnidadById();
        this.getListDocumentos();
    },
    methods: {
        getUnidadById() {
            this.fullScreenLoading = true;
            var url = '/configuracion/unidad/getUnidadById';
            axios.get(url, {
                params: {
                    'nIdUnidad': this.fillEditarDocumento.nIdUnidad
                }
            }).then((response) => {
                //this.listUsuarios = response.data;
                //this.fillEditarDocumento.ctipoDocumentoScan = response.data[0].unidad;
                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        onlyNumber($event) {
            let keyCode = ($event.keyCode ? $event.keyCode : $event.which);
            if ((keyCode < 48 || keyCode > 57) && keyCode !== 46) { // 46 is dot
                $event.preventDefault();
            }
        },
        abrirModal() {
            this.modalShow = !this.modalShow;
        },
        getFile(e) {
            console.log(e.target.files[0]);
            this.fillEditarDocumento.oDocumento = e.target.files[0];
        },
        limpiarCriteriosBsq() {
            this.fillEditarDocumento.ctipoDocumentoScan = '';
            this.fillEditarDocumento.oDocumento = '';
        },
        setAdjuntarDocumento() {
            if (this.validarRegistroDocumento()) {
                this.modalShow = true;
                return;
            }

            this.fullScreenLoading = true;
            var url = '/archivo/setAdjuntarDocumento';
            this.form.append('file', this.fillEditarDocumento.oDocumento);
            this.form.append('nIdUnidad', this.fillEditarDocumento.nIdUnidad);
            this.form.append('tipoDocumento', this.fillEditarDocumento.ctipoDocumentoScan);
            const config = { headers: { 'Content-Type': 'multipart/form-data' } }

            axios.post(url, this.form, config).then((response) => {
                this.fullScreenLoading = false;
                console.log(response);

                var nIdFile = response.data[0].nIdFile;
                if (nIdFile > 0) {
                    this.getListDocumentos(nIdFile);
                }
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });

            /* axios.post(url, {
                'nIdUnidad': this.fillEditarDocumento.nIdUnidad,
                'cUnidad': this.fillEditarDocumento.cUnidad,
                'cOpUnidad': this.fillEditarDocumento.cOpUnidad,
                'cMarca': this.fillEditarDocumento.cMarca,
                'cModelo': this.fillEditarDocumento.cModelo,
                'cFechaVencimientoSeguro': this.fillEditarDocumento.cFechaVencimientoSeguro,
                'cCostoSeguro': this.fillEditarDocumento.cCostoSeguro,
                'cValorUnidad': this.fillEditarDocumento.cValorUnidad,
                'cTipoCombustible': this.fillEditarDocumento.cTipoCombustible
            }).then((response) => {
                this.fullScreenLoading = false;
                Swal.fire({
                    icon: "success",
                    text: "Unidad Actualizada Correctamente!",
                    type: "warning",
                    showDenyButton: false,
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.$router.push('/unidad');
                    }
                });

            }).catch((error) => {
                this.fullScreenLoading = false;
                Swal.fire({
                    icon: "error",
                    text: error,
                    type: "warning",
                    showDenyButton: false,
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                    }
                });
            }).finally(() => {
                console.log('finally');
            }); */
        },
        getListDocumentos(idFIle) {
             this.fullScreenLoading = true;
            var url = '/configuracion/unidad/getListDocumentos';
            axios.get(url, {
                params: {
                    'nIdUnidad': this.fillEditarDocumento.nIdUnidad
                }
            }).then((response) => {
                console.log(response);
                this.listTipoDocumentos = response.data;
                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
         },
        validarRegistroDocumento() {
            this.error = 0;
            this.mensajeError = [];


            if (!this.fillEditarDocumento.ctipoDocumentoScan) {
                this.mensajeError.push("El Tipo de documento es obligatorio");
            }
            if (!this.fillEditarDocumento.oDocumento || !this.fillEditarDocumento.oDocumento === undefined) {
                this.mensajeError.push("El Archivo es obligatorio");
            }

            if (this.mensajeError.length) {
                this.error = 1;
            }

            return this.error;
        }
    }
}
</script>

<style></style>
