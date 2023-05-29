<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Anexo: {{ this.fillEditarDocumento.nombreCliente }}</h1>
                    </section>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="box-header">
                                <div class="col-sm-2 row">
                                    <button @click="$router.push('/contratotaxi')" class="btn btn-block btn-info"><i
                                            class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Regresar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="box box-info box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Asignacón de Documentos por Contrato</h3>
                                        </div>
                                        <div class="box-body">
                                            <form role="form">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Tipo Documento</label>
                                                            <div class="col-md-9">
                                                                <el-select v-model="fillEditarDocumento.ctipoDocumentoScan"
                                                                    filterable placeholder="Seleccione Tipo de Documento" clearable>
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
                                                                <input type="file" class="form-control" @change="getFile" ref="file">
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
                                                        @click.prevent="setRegistrarcontratoArchivo()"
                                                        v-loading.fullscreen.lock="fullScreenLoading">Agregar</button>
                                                    <button class="btn btn-flat btn-default btnWidth"
                                                        @click.prevent="limpiarCriteriosBsq()">Limpiar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box box-info box-solid">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Documentos</h3>
                                            </div>
                                            <template v-if="listTipoDocumentos.length">
                                                <div class="box-body table-responsive">
                                                    <div class="scrollTable">
                                                        <div class="box-body table-responsive no-padding">
                                                            <table class="table table-hover">
                                                                <tbody>
                                                                    <tr>
                                                                        <th>Tipo</th>
                                                                        <th>Nombre</th>
                                                                        <th>Imagen</th>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr v-for="(item, index) in listTipoDocumentos"
                                                                        :key="index">
                                                                        <td v-text="item.tipoDocumento"></td>
                                                                        <td v-text="item.filename"></td>
                                                                        <td>
                                                                            <template v-if="item.tipoDocumento != 'Contrato'">
                                                                                <div class="demo-image__preview">
                                                                                    <el-image
                                                                                        style="width: 70px; height: 70px"
                                                                                        :src="item.path"
                                                                                        :fits="fits"
                                                                                        :preview-src-list="sourceList">
                                                                                    </el-image>
                                                                                </div>
                                                                            </template>
                                                                        </td>
                                                                        <td>
                                                                            <template v-if="item.tipoDocumento == 'Contrato'">
                                                                                <el-button type="success" icon="el-icon-download" circle style="display: block; text-align: center; margin: 10% auto;" @click.prevent="downloadFileById(item.id)"></el-button>
                                                                            </template>
                                                                            <el-button type="danger" icon="el-icon-delete" circle style="display: block; text-align: center; margin: 10% auto;" @click.prevent="eliminarDocumentoById(item.id)"></el-button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-footer clearfix">
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
                nIdContrato: this.id,
                ctipoDocumentoScan: '',
                oDocumento: '',
                nombreCliente:''
            },
            listTipoDocumentos: [],
            sourceList: [],
            listadotipoDocumentos: [
                { value: 'contrato', label: 'Contrato' },
                { value: 'imagen_carroceria', label: '4 Fotos Carrocería (Delantera, Atrás, Lado Izquierdo y Derecho).' },
                { value: 'imagen_llantas', label: '4 Fotos de las Llantas (2 Delanteras, 2 Traseras)' },
                { value: 'imagen_bateria', label: 'Foto Batería' }
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
            mensajeError: [],
            fits: ['fill', 'contain', 'cover', 'none', 'scale-down']
        }
    },
    computed: {
    },
    mounted() {
        this.getListDocumentosTaxis();
        this.getContratoById();
    },
    methods: {
        getContratoById() {
            this.fullScreenLoading = true;
            var url = '/operacion/contrato/setBuscarDataContrato';
            axios.get(url, {
                params: {
                    'nIdContrato': this.fillEditarDocumento.nIdContrato
                }
            }).then((response) => {
                this.fillEditarDocumento.nombreCliente = response.data[0].nombreCliente;
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
            let allowedTypes = ['image/jpeg', 'image/png'];

            //Rules for documents
            if (this.fillEditarDocumento.ctipoDocumentoScan == null || this.fillEditarDocumento.ctipoDocumentoScan == "") {
                this.$message.warning(`Seleccionar Primero el Tipo de Documento`);
                this.fillEditarDocumento.oDocumento = '';
                e.target.value = '';
                return null;
            }

            if (this.fillEditarDocumento.ctipoDocumentoScan == "contrato") {
                if (e.target.files[0].size > 1024 * 1024) {
                    this.$message.warning(`El Tamaño de este archivo es muy grande`);
                    this.fillEditarDocumento.oDocumento = '';
                    e.target.value = '';
                    return;
                }

                if (e.target.files[0].type != "application/pdf") {
                    this.$message.warning(`El archivo, no es formato PDF`);
                    this.fillEditarDocumento.oDocumento = '';
                    e.target.value = '';
                    return;
                } else {
                     this.fillEditarDocumento.oDocumento = e.target.files[0];
                }
            }
            if (this.fillEditarDocumento.ctipoDocumentoScan == "imagen_carroceria") {

                if (!allowedTypes.includes(e.target.files[0].type)) {
                    //this.errors.push('Invalid file type. Only jpeg, png, and gif are allowed.');
                    this.$message.warning(`Formato Inválido de Imagen, solo se permiten: PNG, JPEG`);
                    this.fillEditarDocumento.oDocumento = '';
                    e.target.value = '';
                }

                if (e.target.files[0].size  > 500000) {
                    this.$message.warning(`El Tamaño de la imagen es muy grande, el tamaño maxímo es de:500KB`);
                    this.fillEditarDocumento.oDocumento = '';
                    e.target.value = '';
                    return;
                } else {
                    this.fillEditarDocumento.oDocumento = e.target.files[0];
                }
            }

            if (this.fillEditarDocumento.ctipoDocumentoScan == "imagen_llantas") {

                if (!allowedTypes.includes(e.target.files[0].type)) {
                    this.$message.warning(`Formato Inválido de Imagen, solo se permiten: PNG, JPEG`);
                    this.fillEditarDocumento.oDocumento = '';
                    e.target.value = '';
                }

                if (e.target.files[0].size > 500000) {
                    this.$message.warning(`El Tamaño de la imagen es muy grande, el tamaño maxímo es de:500KB`);
                    this.fillEditarDocumento.oDocumento = '';
                    e.target.value = '';
                    return;
                } else {
                    this.fillEditarDocumento.oDocumento = e.target.files[0];
                }
            }
            if (this.fillEditarDocumento.ctipoDocumentoScan == "imagen_bateria") {

                if (!allowedTypes.includes(e.target.files[0].type)) {
                    this.$message.warning(`Formato Inválido de Imagen, solo se permiten: PNG, JPEG`);
                    this.fillEditarDocumento.oDocumento = '';
                    e.target.value = '';
                }

                if (e.target.files[0].size > 500000) {
                    this.$message.warning(`El Tamaño de la imagen es muy grande, el tamaño maxímo es de:500KB`);
                    this.fillEditarDocumento.oDocumento = '';
                    e.target.value = '';
                    return;
                } else {
                    this.fillEditarDocumento.oDocumento = e.target.files[0];
                }
            }
        },
        limpiarCriteriosBsq() {
            this.fillEditarDocumento.ctipoDocumentoScan = '';
            this.fillEditarDocumento.oDocumento = '';
            this.$refs.file.value = null;
        },
        downloadFileById(id) {
            /*  console.log(`descargando ${id}`); */
            this.fullScreenLoading = true;
            var config = {
                responseType: 'arraybuffer'
            }

            var url = '/operacion/contrato/downloadFileById';
            axios.get(url, {
                params: {
                    'nIdDocumento': id
                }
            }, config)
               /*  .then((response) => response.blob()) */
                .then((blob) => {
                    // Create a temporary URL for the downloaded file
                    this.fullScreenLoading = false;
                    var oMyBlob = new Blob([blob.data], { type: 'application/pdf' });
                    var url = URL.createObjectURL(oMyBlob);
                    window.open(url);
                    /* console.log (blob);
                    var proxy = window.URL.createObjectURL(
                        new Blob([blob.data], { type: "application/pdf" })
                    );

                    // Download from proxy.
                    var link = document.createElement('a');
                    document.body.appendChild(link); // Maybe required by Fire-fox browsers.
                    link.href = proxy;
                    link.download = "my-file.pdf";
                    link.click();

                    // Cleanup.
                    window.URL.revokeObjectURL(proxy);
                    link.remove(); */
                })
                .catch((error) => {
                    console.error('Error downloading PDF:', error);
                });
        },
        downloadFile(data) {
            console.log(data);

        },
        eliminarDocumentoById(id) {
            console.log(`Eliminando ${id}`);
            this.fullScreenLoading = true;
            var url = '/operacion/contrato/eliminarDocumentoById';
            axios.post(url, {
                'nIdDocumento': id
            }).then((response) => {
                this.getListDocumentosTaxis();
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });

        },
        setRegistrarcontratoArchivo() {
            if (this.validarRegistroDocumento()) {
                this.modalShow = true;
                return;
            }

            this.fullScreenLoading = true;
            var url = '/contratofile/setRegistrarcontratoArchivo';
            this.form.append('file', this.fillEditarDocumento.oDocumento);
            this.form.append('nIdContrato', this.fillEditarDocumento.nIdContrato);
            this.form.append('tipoDocumento', this.fillEditarDocumento.ctipoDocumentoScan);
            const config = { headers: { 'Content-Type': 'multipart/form-data' } }

            axios.post(url, this.form, config).then((response) => {
                console.log(response);
                this.fullScreenLoading = false;
                var nIdFile = response.data[0].nIdFile;
                if (nIdFile > 0) {
                    Swal.fire({
                        icon: "success",
                        text: "Archivo Registrado Correctamente!",
                        type: "warning",
                        showDenyButton: false,
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            /* this.fullScreenLoading = true; */
                            this.limpiarCriteriosBsq();
                            this.getListDocumentosTaxis();

                        }
                    });
                } else if (nIdFile == -1) {
                    Swal.fire({
                        icon: "error",
                        text: "Archivo Ya existente, favor de eleiminar el actual",
                        type: "warning",
                        showDenyButton: false,
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                        }
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        text: "Error al registrar el Archivo, favor de intentar lo nuevamente.",
                        type: "warning",
                        showDenyButton: false,
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.limpiarCriteriosBsq();
                            this.getListDocumentosTaxis();
                        }
                    });
                 }
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        getListDocumentosTaxis() {
            this.fullScreenLoading = true;
            var url = '/operacion/contrato/getListDocumentosTaxis';
            axios.get(url, {
                params: {
                    'nIdContrato': this.fillEditarDocumento.nIdContrato
                }
            }).then((response) => {
                this.listTipoDocumentos = response.data;
                for (var i = 0; i < response.data.length; i++) {
                    /* console.log(response.data[i].path); */
                    this.sourceList.push(response.data[i].path);
                }
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
