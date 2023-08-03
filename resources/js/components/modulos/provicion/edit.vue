<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Editar Provisión</h1>
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
                                            <h3 class="box-title">Edición de Provisión</h3>
                                        </div>
                                        <div class="box-body">
                                            <form role="form">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Nombre Provisión:</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Nombre Provisión"
                                                                    v-model="fillEditarProvision.cNombreProv"
                                                                    @keyup.enter="setEditarOperacion"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Año Provisión:</label>
                                                            <div class="col-md-9">
                                                                <el-date-picker style="width: 100%;"
                                                                    v-model="fillEditarProvision.cAnioOperacion" type="year"
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
                                                                <el-select v-model="fillEditarProvision.cTipoProvision"
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
                                                            <label class="col-md-3 col-form-label">Estimación de
                                                                Operación</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Estimación"
                                                                    @keypress="onlyNumber($event)"
                                                                    v-model.number="fillEditarProvision.cEstimacionOperacion"
                                                                    type="number" clearable>
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Descripción de
                                                                Operación</label>
                                                            <div class="col-md-9">
                                                                <el-input type="textarea" :rows="2"
                                                                    placeholder="Descripción de la Operación"
                                                                    v-model="fillEditarProvision.cDescripcion">
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <el-checkbox
                                                                    v-model="fillEditarProvision.cUnidadesTotales">Todas las
                                                                    Unidades</el-checkbox>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row"
                                                    :class="fillEditarProvision.cUnidadesTotales ? `hideCars` : `showCars`">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Lista Unidades</label>
                                                            <div class="col-md-6">
                                                                <el-select v-model="fillEditarProvision.unidadSeleccionadas"
                                                                    placeholder="Seleccionar Unidad(S)"
                                                                    v-on:change="setAddUnidad($event)">
                                                                    <el-option v-for="item in listaUnidades"
                                                                        :key="item.value" :label="item.label"
                                                                        :value="{ id: item.value, text: item.label }">
                                                                    </el-option>
                                                                </el-select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 listauindades">
                                                        <template v-if="fillEditarProvision.unidadesAceptadas.length">
                                                            <div class="scrollTable">
                                                                <table
                                                                    class="table table-bordered table-striped dataTable table-head-fixed text-nowrap projects"
                                                                    role="grid">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Unidad</th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr v-for="(item, index) in fillEditarProvision.unidadesAceptadas"
                                                                            :key="index">
                                                                            <td v-text="item.text"
                                                                                style="text-align:center;"></td>
                                                                            <td>
                                                                                <el-button size="mini" type="danger"
                                                                                    @click="handleDelete(index)">Eliminar</el-button>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </template>
                                                        <template v-else>
                                                            <div class="callout callout-info"
                                                                style="max-height: 44px;text-align: center;">
                                                                <h4>Sin Unidades</h4>
                                                            </div>
                                                        </template>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="box-footer">
                                            <div class="row">
                                                <div class="col text-center">
                                                    <button class="btn btn-flat btn-info btnWidth"
                                                        @click.prevent="setEditarOperacion()"
                                                        v-loading.fullscreen.lock="fullScreenLoading">Actualizar</button>
                                                    <button class="btn btn-flat btn-default btnWidth"
                                                        @click.prevent="limpiarCriteriosBsq()">Limpiar</button>
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
            fillEditarProvision: {
                nIdProvision: this.id,
                cNombreProv: '',
                cAnioOperacion: '',
                cTipoProvision: '',
                cUnidadesTotales: false,
                unidadSeleccionadas: [],
                unidadesAceptadas: [],
                cEstimacionOperacion: '',
                cDescripcion: ''
            },
            count: 10,
            loading: false,
            isValidTime: true,
            listaUnidades: [],
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
        this.getInfoProvisionDataById();
    },
    methods: {
        validateTime() {
            const timeRegex = /^([01]\d|2[0-3]):([0-5]\d)$/;
            this.isValidTime = timeRegex.test(this.fillEditarProvision.cHoraInicioContrato);
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
        limpiarCriteriosBsq() {

            this.fillEditarProvision.cNombreProv = '';
            this.fillEditarProvision.cAnioOperacion = '';
            this.fillEditarProvision.cTipoProvision = '';
            this.fillEditarProvision.cUnidadesTotales = false;
            this.fillEditarProvision.unidadSeleccionadas = [];
            this.fillEditarProvision.cEstimacionOperacion = '';
            this.fillEditarProvision.unidadesAceptadas = [];
            this.fillEditarProvision.cDescripcion = '';

        },
        setAddUnidad(e) {
            let existvalue = this.chkArrayunidades(e.id);
            if (existvalue == 0) {
                this.fillEditarProvision.unidadesAceptadas.push(e);
                this.$message.success(`Unidad Agregada`);
            } else {
                this.$message.warning(`Unidad actualmente agregada`);
            }
        },
        chkArrayunidades(id) {
            let max = 0;
            this.fillEditarProvision.unidadesAceptadas.forEach(item => {
                if (item.id == id) {
                    max = 1;
                }
            })
            return max;
        },
        getInfoProvisionDataById() {
             this.fullScreenLoading = true;
            var url = '/operacion/provision_config/getInfoProvisionDataById';
            axios.get(url, {
                params: {
                    'nIdProvision': this.fillEditarProvision.nIdProvision
                }
            }).then((response) => {

                this.fillEditarProvision.cNombreProv = response.data[0].nombreOperacion;
                this.fillEditarProvision.cAnioOperacion = response.data[0].anioOperacion;
                this.fillEditarProvision.cTipoProvision = response.data[0].provision_id;
                this.fillEditarProvision.cUnidadesTotales = response.data[0].boolUnidadTotales == 1 ? true : false;
                this.fillEditarProvision.cEstimacionOperacion = response.data[0].estimacionOperacion;
                this.fillEditarProvision.cDescripcion = response.data[0].descripcionOperacion;

                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        setEditarOperacion() {
            if (this.validarEditarOperacion()) {
                this.modalShow = true;
                return;
            }

            this.fullScreenLoading = true;
            var url = '/operacion/provision_config/setEditarOperacion';
            axios.post(url, {
                'nIdProvision': this.fillEditarProvision.nIdProvision,
                'cNombreProv': this.fillEditarProvision.cNombreProv,
                'cAnioOperacion': this.fillEditarProvision.cAnioOperacion,
                'cTipoProvision': this.fillEditarProvision.cTipoProvision,
                'cUnidadesTotales': this.fillEditarProvision.cUnidadesTotales,
                'unidadesAceptadas': this.fillEditarProvision.unidadesAceptadas,
                'cEstimacionOperacion': this.fillEditarProvision.cEstimacionOperacion,
                'cDescripcion': this.fillEditarProvision.cDescripcion
            }).then((response) => {
                this.fullScreenLoading = false;
                Swal.fire({
                    icon: "success",
                    text: "Operación Actualizada Correctamente!",
                    type: "warning",
                    showDenyButton: false,
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.$router.push('/provicion');
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
                this.listaUnidadesSelectedData();
                this.fullScreenLoading = false;
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
                    'nIdOperacion': this.fillEditarProvision.nIdProvision
                }
            }).then((response) => {
                console.log(response.data);
                this.fillEditarProvision.unidadesAceptadas = response.data;
                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        validarEditarOperacion() {
            this.error = 0;
            this.mensajeError = [];

            if (!this.fillEditarProvision.cNombreProv)
                this.mensajeError.push("Debe Asignar un Nombre de Operación.");

            if (!this.fillEditarProvision.cAnioOperacion)
                this.mensajeError.push("Debe Asignar un Año de Operación.");

            if (!this.fillEditarProvision.cTipoProvision)
                this.mensajeError.push("Debe Asignar un Tipo de Provisión.");

            /* if (!this.fillEditarProvision.cEstimacionOperacion)
                this.mensajeError.push("Debe Asignar un Estimado de Operación."); */


            if (this.mensajeError.length) {
                this.error = 1;
            }

            return this.error;
        },
        handleDelete(index) {
            this.$delete(this.fillEditarProvision.unidadesAceptadas, index);
        }
    }
}
</script>

<style>
.showCars {
    display: flex;
}

.hideCars {
    display: none;
}

.listauindades {
    height: 200px !important;
}
</style>
