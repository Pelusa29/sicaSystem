<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Detalle Provisión</h1>
                    </section>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="box-header">
                                <div class="col-sm-2 row">
                                    <button @click="$router.push('/provicion')" class="btn btn-block btn-info"><i
                                            class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Regresar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="box box-info box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Alta de Provisión</h3>
                                        </div>
                                        <div class="box-body">
                                            <form role="form">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Nombre Provisión:</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Nombre Provisión"
                                                                    v-model="fillVisualizarProvision.cNombreProv"
                                                                    @keyup.enter="setRegistraOperacion"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Año Provisión:</label>
                                                            <div class="col-md-9">
                                                                <el-date-picker style="width: 100%;"
                                                                    v-model="fillVisualizarProvision.cAnioOperacion" type="year"
                                                                    placeholder="Seleccionar Año" format="yyyy"
                                                                    value-format="yyyy">
                                                                </el-date-picker>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Tipo Provisión:</label>
                                                            <div class="col-md-9">
                                                                <el-select v-model="fillVisualizarProvision.cTipoProvision"
                                                                    placeholder="Seleccione un Estado" clearable>
                                                                    <el-option v-for="item in listCatProvisiones"
                                                                        :key="item.value" :label="item.label"
                                                                        :value="item.value">
                                                                    </el-option>
                                                                </el-select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label"></label>
                                                            <div class="col-md-9">
                                                                <el-checkbox
                                                                    v-model="fillVisualizarProvision.cUnidadesTotales">Todas las
                                                                    Unidades</el-checkbox>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <div :class="fillVisualizarProvision.unidadesAceptadas.length ? `col-md-9 listauindades`: `col-md-9`">
                                                                <template v-if="fillVisualizarProvision.unidadesAceptadas.length">
                                                                    <div class="scrollTable">
                                                                        <table
                                                            class="table table-bordered table-striped dataTable table-head-fixed text-nowrap projects"
                                                            role="grid">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Lista de Unidades</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr v-for="(item, index) in fillVisualizarProvision.unidadesAceptadas" :key="index">
                                                                                    <td v-text="item.text" style="text-align:center;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </template>
                                                                <template v-else>
                                                                    <div class="callout callout-info" style="max-height: 44px;text-align: center;">
                                                                        <h4>Sin Unidades</h4>
                                                                    </div>
                                                                </template>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Estimación de
                                                                Operación</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Estimación"
                                                                    @keypress="onlyNumber($event)"
                                                                    v-model.number="fillVisualizarProvision.cEstimacionOperacion"
                                                                    type="number" clearable>
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Descripción de
                                                                Operación</label>
                                                            <div class="col-md-9">
                                                                <el-input type="textarea" :rows="2"
                                                                    placeholder="Descripción de la Operación"
                                                                    v-model="fillVisualizarProvision.cDescripcion">
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="box-footer">
                                            <div class="row">
                                                <div class="col text-center">
                                                     <button class="btn btn-flat btn-default btnWidth"
                                                            @click.prevent="$router.push('/provicion')">Cancelar
                                                        </button>
                                                </div>
                                            </div>
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
    props:['id'],
    data() {
        return {
            fillVisualizarProvision: {
                nIdOperacion:this.id,
                cNombreProv: '',
                cAnioOperacion: '',
                cTipoProvision: '',
                cUnidadesTotales: false,
                unidadSeleccionadas: [],
                unidadesAceptadas: [],
                cEstimacionOperacion: '',
                cDescripcion: '',
                showListuindades:0
            },
            isValidTime: true,
            listaUnidades: [],
            listaUnidadesSelected: [],
            listCatProvisiones: [],
            fullScreenLoading: false,
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
        this.getListCatProvisiones();
        this.getOperacionData();
    },
    methods: {
        getClass(id) {
            /* console.log(id); */
             return {
                'selected': id
                /* 'fa-checkbox-blank-outline': id */
            }
        },
        validateTime() {
            const timeRegex = /^([01]\d|2[0-3]):([0-5]\d)$/;
            this.isValidTime = timeRegex.test(this.fillVisualizarProvision.cHoraInicioContrato);
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
        getOperacionData() {
            this.fullScreenLoading = true;
            var url = '/operacion/provision_config/getObtenerOperacionById';
            axios.get(url, {
                params: {
                    'nIdOperacion': this.fillVisualizarProvision.nIdOperacion
                }
            }).then((response) => {
                this.fillVisualizarProvision.cNombreProv = response.data[0].nombreOperacion;
                this.fillVisualizarProvision.cAnioOperacion = response.data[0].anioOperacion;
                this.fillVisualizarProvision.cTipoProvision = response.data[0].provision_id;
                this.fillVisualizarProvision.cUnidadesTotales = response.data[0].boolUnidadTotales == 1? true: false;
                this.fillVisualizarProvision.showListuindades = response.data[0].unidades_totales;
                this.fillVisualizarProvision.cEstimacionOperacion = response.data[0].estimacionOperacion;
                 this.fillVisualizarProvision.cDescripcion = response.data[0].descripcionOperacion;
                this.fullScreenLoading = false;
            }).catch((error) => {
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
            });
        },
        getListCatProvisiones() {
            this.fullScreenLoading = true;
            var url = '/operacion/catalago_provisiones/getListCatProvisiones';
            axios.get(url).then((response) => {
                this.listCatProvisiones = response.data;
                this.fullScreenLoading = false;
                this.listaUnidadesData();
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        listaUnidadesData() {
            this.fullScreenLoading = true;
            var url = '/configuracion/unidad/getListaUnidadesCatalago';
            axios.get(url).then((response) => {
                this.listaUnidades = response.data;
                this.fullScreenLoading = false;
                this.listaUnidadesSelectedData();
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        listaUnidadesSelectedData() {
             this.fullScreenLoading = true;
            var url = '/configuracion/unidad/getListaUnidadesCatalagoById';
            axios.get(url, {
                params: {
                    'nIdOperacion': this.fillVisualizarProvision.nIdOperacion
                }
            }).then((response) => {
                console.log(response.data);
                this.fillVisualizarProvision.unidadesAceptadas = response.data;
                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        validarRegistrarOperacion() {
            this.error = 0;
            this.mensajeError = [];

            if (!this.fillVisualizarProvision.cNombreProv)
                this.mensajeError.push("Debe Asignar un Nombre de Operación.");

            if (!this.fillVisualizarProvision.cAnioOperacion)
                this.mensajeError.push("Debe Asignar un Año de Operación.");

            if (!this.fillVisualizarProvision.cTipoProvision)
                this.mensajeError.push("Debe Asignar un Tipo de Provisión.");


            if (this.mensajeError.length) {
                this.error = 1;
            }

            return this.error;
        }
    }
}
</script>

<style>
.listauindades{
    height: 200px !important;
}
</style>
