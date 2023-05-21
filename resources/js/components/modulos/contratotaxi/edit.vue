<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="col-12">
                <div class="row">
                    <div class="card">
                        <div class="box-header">
                            <div class="col-md-6 row">
                                <section class="content-header">
                                    <h1 class="text-dark text-perfil">Editar Contrato</h1>
                                </section>
                            </div>
                            <div class="col-sm-6 row">
                                <div class="col-sm-6 pull-right">
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
                                            <h3 class="box-title">Contrato</h3>
                                        </div>
                                        <div class="box-body">
                                            <form role="form">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Conductor:</label>
                                                            <div class="col-md-9">
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
                                                                    @keyup.enter="setEditarContratotaxi"
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
                                                                    @keyup.enter="setEditarContratotaxi"
                                                                     :disabled="true"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                </div>
                                                <div class="row">
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
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Nombre(s) Fiador:</label>
                                                            <div class="col-md-9">
                                                                <el-input v-model="fillVisualizarContrato.cNombreFiador"
                                                                    @keyup.enter="setEditarContratotaxi"
                                                                    placeholder="Nombre Fiador"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Calle Fiador:</label>
                                                            <div class="col-md-9">
                                                                <el-input v-model="fillVisualizarContrato.cCalleFiador"
                                                                    @keyup.enter="setRegistraUnidad"
                                                                    placeholder="Calle"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Colonia:</label>
                                                            <div class="col-md-9">
                                                                <el-input v-model="fillVisualizarContrato.cColonia"
                                                                    @keyup.enter="setRegistraUnidad"
                                                                    placeholder="Colonia"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Ciudad:</label>
                                                            <div class="col-md-9">
                                                                <el-input v-model="fillVisualizarContrato.cCiudadFiador"
                                                                    @keyup.enter="setRegistraUnidad"
                                                                    placeholder="Ciudad"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Cp:</label>
                                                            <div class="col-md-9">
                                                                <el-input v-model="fillVisualizarContrato.cCp"
                                                                    @keyup.enter="setRegistraUnidad"
                                                                    placeholder="Código Postal"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Nombre Testigo:</label>
                                                            <div class="col-md-9">
                                                                <el-input v-model="fillVisualizarContrato.cNombreTestigo"
                                                                    @keyup.enter="setRegistraUnidad"
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
                                                        @click.prevent="setEditarContratotaxi()"
                                                        v-loading.fullscreen.lock="fullScreenLoading">Actualizar</button>
                                                        <button class="btn btn-flat btn-default btnWidth"
                                                            @click.prevent="$router.push('/contratotaxi')">Cancelar
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
                cFechaInicioContrato: '',
                cImporteRenta: '',
                cImporteDeposito: '',
                cNombreFiador: '',
                cCalleFiador: '',
                cColonia: '',
                cCiudadFiador: '',
                cCp: '',
                cNombreTestigo: ''
            },
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
        this.setBuscarDataContrato();
    },
    methods: {
        onlyNumber($event) {
            //console.log($event.keyCode); //keyCodes value
            let keyCode = ($event.keyCode ? $event.keyCode : $event.which);
            if ((keyCode < 48 || keyCode > 57) && keyCode !== 46) { // 46 is dot
                $event.preventDefault();
            }
        },
        abrirModal() {
            this.modalShow = !this.modalShow;
        },
        setEditarContratotaxi() {
            if (this.validarRegistrarContrato()) {
                this.modalShow = true;
                return;
            }

            this.fullScreenLoading = true;
            var url = '/operacion/contrato/setEditarContratotaxi';
            axios.post(url, {
                'nIdContrato': this.fillVisualizarContrato.nIdContrato,
                'cUnidad': this.fillVisualizarContrato.cUnidad,
                'cDireccion': this.fillVisualizarContrato.cDireccion,
                'cFechaInicioContrato': this.fillVisualizarContrato.cFechaInicioContrato,
                'cImporteRenta': this.fillVisualizarContrato.cImporteRenta,
                'cImporteDeposito': this.fillVisualizarContrato.cImporteDeposito,
                'cNombreFiador': this.fillVisualizarContrato.cNombreFiador,
                'cCalleFiador': this.fillVisualizarContrato.cCalleFiador,
                'cColonia': this.fillVisualizarContrato.cColonia,
                'cCiudadFiador': this.fillVisualizarContrato.cCiudadFiador,
                'cCp': this.fillVisualizarContrato.cCp,
                'cNombreTestigo': this.fillVisualizarContrato.cNombreTestigo

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
                        this.$router.push('/contratotaxi');
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
        setBuscarDataContrato() {
            this.fullScreenLoading = true;
            var url = '/operacion/contrato/setBuscarDataContrato';
            axios.get(url, {
                params: {
                    'nIdContrato': this.fillVisualizarContrato.nIdContrato
                }
            }).then((response) => {
                this.fillVisualizarContrato.nNombreCliente = response.data[0].nombreCliente;
                this.fillVisualizarContrato.cUnidad = response.data[0].unidad;
                this.fillVisualizarContrato.cDireccion = response.data[0].direccionArrendador;
                this.fillVisualizarContrato.cFechaInicioContrato = response.data[0].fechaInicioContrato;
                this.fillVisualizarContrato.cImporteRenta = response.data[0].importeRenta;
                this.fillVisualizarContrato.cImporteDeposito = response.data[0].importeDeposito;
                this.fillVisualizarContrato.cNombreFiador = response.data[0].nombreFiador;
                this.fillVisualizarContrato.cCalleFiador = response.data[0].calleFiador;
                this.fillVisualizarContrato.cColonia = response.data[0].coloniaFiador;
                this.fillVisualizarContrato.cCiudadFiador = response.data[0].ciudadFiador;
                this.fillVisualizarContrato.cCp = response.data[0].cpFiador;
                this.fillVisualizarContrato.cNombreTestigo = response.data[0].nombreTestigo;

                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            });

        },
        validarRegistrarContrato() {
            this.error = 0;
            this.mensajeError = [];

            if (!this.fillVisualizarContrato.cUnidad)
                this.mensajeError.push("Debe Seleccionar una Uindad para el contrato");
            if (!this.fillVisualizarContrato.cDireccion)
                this.mensajeError.push("Debe Seleccionar uan Dirección para el contrato");

            if (!this.fillVisualizarContrato.cFechaInicioContrato)
                this.mensajeError.push("Debe Seleccionar uuna Fecha de Inico para el contrato");

            if (!this.fillVisualizarContrato.cImporteRenta)
                this.mensajeError.push("Debe ingresar Importe de Renta para el contrato");

            if (!this.fillVisualizarContrato.cImporteDeposito)
                this.mensajeError.push("Debe ingresar un Importe Depósito para el contrato");

            if (!this.fillVisualizarContrato.cNombreFiador)
                this.mensajeError.push("Debe ingresar un Nombre de Fiador para el contrato");

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
