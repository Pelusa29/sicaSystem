<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Nueva Provisión</h1>
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
                                                                    v-model="fillCrearProvision.cNombreProv"
                                                                    @keyup.enter="setRegistraOperacion"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Año Provisión:</label>
                                                            <div class="col-md-9">
                                                                <el-date-picker style="width: 100%;"
                                                                    v-model="fillCrearProvision.cAnioOperacion"
                                                                    type="year"
                                                                    placeholder="Seleccionar Año"
                                                                    format="yyyy" value-format="yyyy">
                                                                </el-date-picker>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Tipo Provisión:</label>
                                                            <div class="col-md-9">
                                                                <el-select v-model="fillCrearProvision.cTipoProvision"
                                                                    placeholder="Seleccione un Estado" clearable>
                                                                    <el-option v-for="item in listCatProvisiones" :key="item.value"
                                                                        :label="item.label" :value="item.value">
                                                                    </el-option>
                                                                </el-select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Estimación de Operación</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Estimación"
                                                                    @keypress="onlyNumber($event)"
                                                                    v-model.number="fillCrearProvision.cEstimacionOperacion"
                                                                    type="number" clearable>
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Descripción de Operación</label>
                                                            <div class="col-md-9">
                                                                <el-input
                                                                    type="textarea"
                                                                    :rows="2"
                                                                    placeholder="Descripción de la Operación"
                                                                    v-model="fillCrearProvision.cDescripcion">
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
                                                                <el-checkbox v-model="fillCrearProvision.cUnidadesTotales">Todas las Unidades</el-checkbox>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" :class="fillCrearProvision.cUnidadesTotales?`hideCars`:`showCars`">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Lista Unidades</label>
                                                            <div class="col-md-6">
                                                                <el-select
                                                                    v-model="fillCrearProvision.unidadSeleccionadas"
                                                                    placeholder="Seleccionar Unidad(S)" v-on:change="setAddUnidad($event)">
                                                                    <el-option
                                                                        v-for="item in listaUnidades"
                                                                        :key="item.value"
                                                                        :label="item.label"
                                                                        :value="{ id: item.value, text: item.label }">
                                                                    </el-option>
                                                                </el-select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <!-- <el-button type="primary" icon="el-icon-arrow-right" @click.prevent="setAddUnidad()"
                                                                v-loading.fullscreen.lock="fullScreenLoading"></el-button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 listauindades">
                                                        <template v-if="fillCrearProvision.unidadesAceptadas.length">
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
                                                                        <tr v-for="(item, index) in fillCrearProvision.unidadesAceptadas" :key="index">
                                                                            <td v-text="item.text" style="text-align:center;"></td>
                                                                            <td>
                                                                                 <el-button
                                                                                    size="mini"
                                                                                    type="danger"
                                                                                    @click="handleDelete(index)">Eliminar</el-button>
                                                                            </td>
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
                                            </form>
                                        </div>
                                        <div class="box-footer">
                                            <div class="row">
                                                <div class="col text-center">
                                                    <button class="btn btn-flat btn-info btnWidth"
                                                        @click.prevent="setRegistraOperacion()"
                                                        v-loading.fullscreen.lock="fullScreenLoading">Registrar</button>
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
    data() {
        return {
            fillCrearProvision: {
                cNombreProv: '',
                cAnioOperacion: '',
                cTipoProvision: '',
                cUnidadesTotales: false,
                unidadSeleccionadas: [],
                unidadesAceptadas: [],
                cEstimacionOperacion: '',
                cDescripcion:''
            },
            count: 10,
            loading: false,
            isValidTime: true,
            listaUnidades:[],
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
    },
    methods: {
        validateTime() {
            const timeRegex = /^([01]\d|2[0-3]):([0-5]\d)$/;
            this.isValidTime = timeRegex.test(this.fillCrearProvision.cHoraInicioContrato);
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

            this.fillCrearProvision.cNombreProv= '';
            this.fillCrearProvision.cAnioOperacion= '';
            this.fillCrearProvision.cTipoProvision= '';
            this.fillCrearProvision.cUnidadesTotales= false;
            this.fillCrearProvision.unidadSeleccionadas= [];
            this.fillCrearProvision.cEstimacionOperacion = '';
            this.fillCrearProvision.unidadesAceptadas = [];
            this.fillCrearProvision.cDescripcion = '';

        },
        setAddUnidad(e) {

            let existvalue = this.chkArrayunidades(e.id);
            if (existvalue == 0) {
                this.fillCrearProvision.unidadesAceptadas.push(e);
                this.$message.success(`Unidad Agregada`);
            } else {
                this.$message.warning(`Error actualmente agregada`);
            }
        },
        chkArrayunidades(id) {
            let max = 0;
            this.fillCrearProvision.unidadesAceptadas.forEach(item => {
                if (item.id == id) {
                    max = 1;
                }
            })
            return max;
        },
        setRegistraOperacion() {
            if (this.validarRegistrarOperacion()) {
                this.modalShow = true;
                return;
            }

            this.fullScreenLoading = true;
            var url = '/operacion/provision_config/setRegistraOperacion';
            axios.post(url, {
                'cNombreProv':this.fillCrearProvision.cNombreProv,
                'cAnioOperacion':this.fillCrearProvision.cAnioOperacion,
                'cTipoProvision':this.fillCrearProvision.cTipoProvision,
                'cUnidadesTotales':this.fillCrearProvision.cUnidadesTotales,
                'unidadSeleccionadas':this.fillCrearProvision.unidadesAceptadas,
                'cEstimacionOperacion':this.fillCrearProvision.cEstimacionOperacion,
                'cDescripcion':this.fillCrearProvision.cDescripcion
            }).then((response) => {
                this.fullScreenLoading = false;
                console.info(response);
                Swal.fire({
                    icon: "success",
                    text: "Operación Registrada Correctamente!",
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

            if (!this.fillCrearProvision.cNombreProv)
                this.mensajeError.push("Debe Asignar un Nombre de Operación.");

            if (!this.fillCrearProvision.cAnioOperacion)
                this.mensajeError.push("Debe Asignar un Año de Operación.");

            if (!this.fillCrearProvision.cTipoProvision)
                this.mensajeError.push("Debe Asignar un Tipo de Provisión.");

            /* if (!this.fillCrearProvision.cEstimacionOperacion)
                this.mensajeError.push("Debe Asignar un Estimado de Operación."); */


            if (this.mensajeError.length) {
                this.error = 1;
            }

            return this.error;
        },
        handleDelete(index) {
            this.$delete(this.fillCrearProvision.unidadesAceptadas, index);
        }
    }
}
</script>

<style>
.showCars{
    display: flex;
}
.hideCars{
    display: none;
}

.listauindades{
    height: 200px !important;
}
</style>
