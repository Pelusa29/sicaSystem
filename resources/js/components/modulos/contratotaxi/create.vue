<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Nuevo Contrato</h1>
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
                                            <h3 class="box-title">Contrato</h3>
                                        </div>
                                        <div class="box-body">
                                            <form role="form">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Elegir conductor:</label>
                                                            <div class="col-md-9">
                                                                <el-select v-model="fillCrearContrato.nIdCliente"
                                                                    placeholder="Seleccione Conductor" filterable clearable>
                                                                    <el-option v-for="item in listaClientes" :key="item.value"
                                                                        :label="item.label" :value="item.value">
                                                                    </el-option>
                                                                </el-select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <button class="btn btn-flat btn-info btnWidth"
                                                            @click.prevent="setBuscarDataconductor()"
                                                            v-loading.fullscreen.lock="fullScreenLoading"><i class="fa fa-search"></i> Buscar</button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Unidad:</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Unidad"
                                                                    v-model="fillCrearContrato.cUnidad"
                                                                    @keyup.enter="setRegistraContratotaxi" :disabled="true"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Dirección:</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Dirección"
                                                                    v-model="fillCrearContrato.cDireccion"
                                                                    @keyup.enter="setRegistraContratotaxi" :disabled="true"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label">Fecha Inicio Contrato:</label>
                                                        <div class="col-md-9">
                                                            <el-date-picker style="width: 100%;"
                                                                v-model="fillCrearContrato.cFechaInicioContrato" type="date"
                                                                placeholder="Seleccionar Fecha de Contrato"
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
                                                                <el-input placeholder="Renta($)" @keypress="onlyNumber($event)"
                                                                    v-model.number="fillCrearContrato.cImporteRenta"
                                                                    type="number" >
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Importe Deposito</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Deposito($)" @keypress="onlyNumber($event)"
                                                                    v-model.number="fillCrearContrato.cImporteDeposito"
                                                                    type="number" clearable>
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Nombre(s) Fiador:</label>
                                                            <div class="col-md-9">
                                                                <el-input v-model="fillCrearContrato.cNombreFiador"
                                                                    @keyup.enter="setRegistraContratotaxi"
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
                                                                <el-input v-model="fillCrearContrato.cCalleFiador" @keyup.enter="setRegistraUnidad" placeholder="Calle"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Colonia:</label>
                                                            <div class="col-md-9">
                                                                <el-input v-model="fillCrearContrato.cColonia" @keyup.enter="setRegistraUnidad" placeholder="Colonia"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Ciudad:</label>
                                                            <div class="col-md-9">
                                                                <el-input v-model="fillCrearContrato.cCiudadFiador" @keyup.enter="setRegistraUnidad" placeholder="Ciudad"></el-input>
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
                                                                <el-input v-model="fillCrearContrato.cCp" @keyup.enter="setRegistraUnidad" placeholder="Código Postal"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Nombre Testigo:</label>
                                                            <div class="col-md-9">
                                                                <el-input v-model="fillCrearContrato.cNombreTestigo" @keyup.enter="setRegistraUnidad" placeholder="Nombre Testigo"></el-input>
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
                                                        @click.prevent="setRegistraContratotaxi()"
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
            fillCrearContrato: {
                nIdCliente: '',
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
        this.getListadoClientesByTipo();
    },
    methods: {
        /* seleccionando(event,opt) {
            if (opt == "cliente") {
                this.fillCrearContrato.nIdPersona = event;
                this.fillCrearContrato.nIdConductor = '';
            } else {
                this.fillCrearContrato.nIdPersona = event;
                this.fillCrearContrato.nIdCliente = '';
            }
         }, */
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
        limpiarCriteriosBsq() {
            this.fillCrearContrato.cUnidad = '';
            this.fillCrearContrato.nIdCliente = '';
            this.fillCrearContrato.cDireccion = '';
            this.fillCrearContrato.cFechaInicioContrato = '';
            this.fillCrearContrato.cImporteRenta = '';
            this.fillCrearContrato.cImporteDeposito = '';
            this.fillCrearContrato.cNombreFiador = '';
            this.fillCrearContrato.cCalleFiador = '';
            this.fillCrearContrato.cColonia = '';
            this.fillCrearContrato.cCiudadFiador = '';
            this.fillCrearContrato.cCp = '';
            this.fillCrearContrato.cNombreTestigo = '';
        },
        setRegistraContratotaxi() {
            if (this.validarRegistrarContrato()) {
                this.modalShow = true;
                return;
            }

            this.fullScreenLoading = true;
            var url = '/operacion/contrato/setRegistraContratotaxi';
            axios.post(url, {
                'nIdCliente': this.fillCrearContrato.nIdCliente,
                'cUnidad':this.fillCrearContrato.cUnidad,
                'cDireccion':this.fillCrearContrato.cDireccion,
                'cFechaInicioContrato':this.fillCrearContrato.cFechaInicioContrato,
                'cImporteRenta':this.fillCrearContrato.cImporteRenta,
                'cImporteDeposito':this.fillCrearContrato.cImporteDeposito,
                'cNombreFiador':this.fillCrearContrato.cNombreFiador,
                'cCalleFiador':this.fillCrearContrato.cCalleFiador,
                'cColonia':this.fillCrearContrato.cColonia,
                'cCiudadFiador':this.fillCrearContrato.cCiudadFiador,
                'cCp':this.fillCrearContrato.cCp,
                'cNombreTestigo':this.fillCrearContrato.cNombreTestigo

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
        getListadoClientesByTipo() {
            this.fullScreenLoading = true;
            var url = '/administracion/cliente/getListadoClientesByTipo';
            axios.get(url, {
                params: {
                    'tipoCliente':'conductor'
                }
            }).then((response) => {
                this.listaClientes = response.data;
                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        setBuscarDataconductor() {
            this.fullScreenLoading = true;
            if (this.fillCrearContrato.nIdCliente) {
                var url = '/administracion/cliente/getSearchInfoByConductor';
                axios.get(url, {
                    params: {
                        'nIdCliente': this.fillCrearContrato.nIdCliente
                    }
                }).then((response) => {
                    this.fillCrearContrato.cUnidad = response.data[0].unidad;
                    this.fillCrearContrato.cDireccion = response.data[0].direccion;
                    this.fullScreenLoading = false;
                }).catch((error) => {
                    console.log(error);
                });
            } else {
                this.fullScreenLoading = false;
                 Swal.fire({
                    icon: "error",
                    text: 'Debe seleccionar un cliente',
                    type: "warning",
                    showDenyButton: false,
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                    }
                });
            }
        },
        validarRegistrarContrato() {
            this.error = 0;
            this.mensajeError = [];

            if (!this.fillCrearContrato.nIdCliente)
                 this.mensajeError.push("Debe Seleccionar un Conductor para el contrato");

            if (!this.fillCrearContrato.cUnidad)
                 this.mensajeError.push("Debe Seleccionar una Uindad para el contrato");
            if (!this.fillCrearContrato.cDireccion)
                this.mensajeError.push("Debe Seleccionar uan Dirección para el contrato");

            if (!this.fillCrearContrato.cFechaInicioContrato)
                this.mensajeError.push("Debe Seleccionar uuna Fecha de Inico para el contrato");

            if (!this.fillCrearContrato.cImporteRenta)
                this.mensajeError.push("Debe ingresar Importe de Renta para el contrato");

            if (!this.fillCrearContrato.cImporteDeposito)
                this.mensajeError.push("Debe ingresar un Importe Depósito para el contrato");

            if (!this.fillCrearContrato.cNombreFiador)
                this.mensajeError.push("Debe ingresar un Nombre de Fiador para el contrato");

            if (!this.fillCrearContrato.cNombreTestigo)
                this.mensajeError.push("Debe Ingresar un Testigo para el contrato");


            if (this.mensajeError.length) {
                this.error = 1;
            }

            return this.error;
        }
    }
}
</script>

<style>
</style>
