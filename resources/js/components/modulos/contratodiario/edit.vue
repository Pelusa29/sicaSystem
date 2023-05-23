<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Actualizar Contrato Renta Diario</h1>
                    </section>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="box-header">
                                <div class="col-sm-2 row">
                                    <button @click="$router.push('/contratodiario')" class="btn btn-block btn-info"><i
                                            class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Regresar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="box box-info box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Edición Renta Diaria</h3>
                                        </div>
                                        <div class="box-body">
                                            <form role="form">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-md-4 col-form-label">Cliente/Arrendador:</label>
                                                            <div class="col-md-8">
                                                                <b>{{ this.fillVisualizarContrato.nNombreCliente }}</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Unidad:</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Unidad"
                                                                    v-model="fillVisualizarContrato.cUnidad"
                                                                    @keyup.enter="setActualizaContratodiario"
                                                                    :disabled="true"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Dirección:</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Dirección"
                                                                    v-model="fillVisualizarContrato.cDireccion"
                                                                    @keyup.enter="setActualizaContratodiario"
                                                                    :disabled="true"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Descripción
                                                                Equipos:</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Descripción Equipo / Accesorios"
                                                                    v-model="fillVisualizarContrato.cDescripcionequipo"
                                                                    @keyup.enter="setActualizaContratodiario"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Fecha Inicio
                                                                Contrato:</label>
                                                            <div class="col-md-9">
                                                                <el-date-picker style="width: 100%;"
                                                                    v-model="fillVisualizarContrato.cFechaInicioContrato"
                                                                    type="date" placeholder="Seleccionar Fecha de Contrato"
                                                                    format="dd-MM-yyyy" value-format="yyyy-MM-dd">
                                                                </el-date-picker>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Hora Inicio
                                                                Contrato:</label>
                                                            <div class="col-md-9">
                                                                <el-time-picker style="width: 100%;"
                                                                    v-model="fillVisualizarContrato.cHoraInicioContrato"
                                                                    placeholder="Hora Inicio Contrato" format="HH:mm:ss"
                                                                    value-format="HH:mm:ss"></el-time-picker>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Fecha Término
                                                                Contrato:</label>
                                                            <div class="col-md-9">
                                                                <el-date-picker style="width: 100%;"
                                                                    v-model="fillVisualizarContrato.cFechaTerminoContrato"
                                                                    type="date"
                                                                    placeholder="Seleccionar Fecha de Término de Contrato"
                                                                    format="dd-MM-yyyy" value-format="yyyy-MM-dd">
                                                                </el-date-picker>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Hora Fin
                                                                Contrato:</label>
                                                            <div class="col-md-9">
                                                                <el-time-picker style="width: 100%;"
                                                                    v-model="fillVisualizarContrato.cHoraFinContrato"
                                                                    placeholder="Hora Fin Contrato" format="HH:mm:ss"
                                                                    value-format="HH:mm:ss"></el-time-picker>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Importe Renta</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Renta($)"
                                                                    @keypress="onlyNumber($event)"
                                                                    v-model.number="fillVisualizarContrato.cImporteRenta"
                                                                    type="number">
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Importe Deposito</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Deposito($)"
                                                                    @keypress="onlyNumber($event)"
                                                                    v-model.number="fillVisualizarContrato.cImporteDeposito"
                                                                    type="number" clearable>
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Nombre Testigo:</label>
                                                            <div class="col-md-9">
                                                                <el-input v-model="fillVisualizarContrato.cNombreTestigo"
                                                                    @keyup.enter="setRegistraContrato"
                                                                    placeholder="Nombre Testigo"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Nombre Segundo
                                                                Testigo:</label>
                                                            <div class="col-md-9">
                                                                <el-input v-model="fillVisualizarContrato.cNombreTestigo2"
                                                                    @keyup.enter="setRegistraContrato"
                                                                    placeholder="Nombre Testigo"></el-input>
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
                                                        @click.prevent="setActualizaContratodiario()"
                                                        v-loading.fullscreen.lock="fullScreenLoading">Actualizar</button>
                                                    <button class="btn btn-flat btn-default btnWidth"
                                                                @click.prevent="$router.push('/contratodiario')">Cancelar
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
            fillVisualizarContrato: {
                nIdContrato: this.id,
                nNombreCliente: '',
                cUnidad: '',
                cDireccion: '',
                cDescripcionequipo: '',
                cFechaInicioContrato: '',
                cHoraInicioContrato: '',
                cFechaTerminoContrato: '',
                cHoraFinContrato: '',
                cImporteRenta: '',
                cImporteDeposito: '',
                cNombreTestigo: '',
                cNombreTestigo2: ''
            },
            isValidTime: true,
            listaClientes: [],
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
        this.setBuscarDataContratoDiario();
    },
    methods: {
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
            this.fillVisualizarContrato.cUnidad = '';
            this.fillVisualizarContrato.cDireccion = '';
            this.fillVisualizarContrato.cFechaInicioContrato = '';
            this.fillVisualizarContrato.cImporteRenta = '';
            this.fillVisualizarContrato.cImporteDeposito = '';
            this.fillVisualizarContrato.cDescripcionequipo = '';
            this.fillVisualizarContrato.cHoraInicioContrato = '';
            this.fillVisualizarContrato.cFechaTerminoContrato = '';
            this.fillVisualizarContrato.cHoraFinContrato = '';
            this.fillVisualizarContrato.cNombreTestigo = '';
            this.fillVisualizarContrato.cNombreTestigo2 = '';
        },
        setActualizaContratodiario() {
            if (this.validarRegistrarContrato()) {
                this.modalShow = true;
                return;
            }

            this.fullScreenLoading = true;
            var url = '/operacion/contratodiario/setActualizaContratodiario';
            axios.post(url, {
                'nIdContrato': this.fillVisualizarContrato.nIdContrato,
                'cUnidad': this.fillVisualizarContrato.cUnidad,
                'cDireccion': this.fillVisualizarContrato.cDireccion,
                'cFechaInicioContrato': this.fillVisualizarContrato.cFechaInicioContrato,
                'cImporteRenta': this.fillVisualizarContrato.cImporteRenta,
                'cImporteDeposito': this.fillVisualizarContrato.cImporteDeposito,
                'cDescripcionequipo': this.fillVisualizarContrato.cDescripcionequipo,
                'cHoraInicioContrato': this.fillVisualizarContrato.cHoraInicioContrato,
                'cFechaFinContrato': this.fillVisualizarContrato.cFechaTerminoContrato,
                'cHoraFinContrato': this.fillVisualizarContrato.cHoraFinContrato,
                'cNombreTestigo': this.fillVisualizarContrato.cNombreTestigo,
                'cNombreTestigoExt': this.fillVisualizarContrato.cNombreTestigo2
            }).then((response) => {
                this.fullScreenLoading = false;
                Swal.fire({
                    icon: "success",
                    text: "Contrato Registrado Correctamente!",
                    type: "warning",
                    showDenyButton: false,
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.$router.push('/contratodiario');
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
        setBuscarDataContratoDiario() {
            this.fullScreenLoading = true;
            var url = '/operacion/contratodiario/setBuscarDataContratoDiario';
            axios.get(url, {
                params: {
                    'nIdContrato': this.fillVisualizarContrato.nIdContrato
                }
            }).then((response) => {
                if (response.data.length > 0) {
                    this.fillVisualizarContrato.nNombreCliente = response.data[0].cliente;
                    this.fillVisualizarContrato.cUnidad = response.data[0].unidad;
                    this.fillVisualizarContrato.cDireccion = response.data[0].direccionArrendador;
                    this.fillVisualizarContrato.cDescripcionequipo = response.data[0].descripcionEquipo;
                    this.fillVisualizarContrato.cFechaInicioContrato = response.data[0].fechaInicioContrato;
                    this.fillVisualizarContrato.cHoraInicioContrato = response.data[0].horaInicio;
                    this.fillVisualizarContrato.cFechaTerminoContrato = response.data[0].fechaFinContrato;
                    this.fillVisualizarContrato.cHoraFinContrato = response.data[0].horaFin;
                    this.fillVisualizarContrato.cImporteRenta = response.data[0].importeRenta;
                    this.fillVisualizarContrato.cImporteDeposito = response.data[0].importeDeposito;
                    this.fillVisualizarContrato.cNombreTestigo = response.data[0].nombreTestigo;
                    this.fillVisualizarContrato.cNombreTestigo2 = response.data[0].nombreTestigo2;
                    this.fullScreenLoading = false;
                } else {
                    this.fullScreenLoading = false;
                    Swal.fire({
                        icon: "info",
                        text: 'El contrato a editar no contiene ninguna información relacionada, favor de asignar le una.',
                        type: "information",
                        showDenyButton: false,
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                        }
                    });
                }
            }).catch((error) => {
                console.log(error);
            });

        },
        validarRegistrarContrato() {
            this.error = 0;
            this.mensajeError = [];

            if (!this.fillVisualizarContrato.cFechaInicioContrato)
                this.mensajeError.push("Debe Seleccionar una Fecha de Inico para el contrato");

            if (!this.fillVisualizarContrato.cImporteRenta)
                this.mensajeError.push("Debe ingresar Importe de Renta para el contrato");

            if (!this.fillVisualizarContrato.cImporteDeposito)
                this.mensajeError.push("Debe ingresar un Importe Depósito para el contrato");

            if (!this.fillVisualizarContrato.cFechaTerminoContrato)
                this.mensajeError.push("Debe ingresar una Fecha Fin de Contrato");

            if (!this.fillVisualizarContrato.cHoraInicioContrato)
                this.mensajeError.push("Debe ingresar una Hora Inicio de Contrato");

            if (!this.fillVisualizarContrato.cHoraFinContrato)
                this.mensajeError.push("Debe ingresar una Hora Fin de Contrato");

            if (!this.fillVisualizarContrato.cNombreTestigo)
                this.mensajeError.push("Debe Ingresar un Testigo para el contrato");

            if (this.mensajeError.length) {
                this.error = 1;
            }

            return this.error;
        }
    }
}
</script>

<style></style>
