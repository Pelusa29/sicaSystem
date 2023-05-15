<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Crear Cliente</h1>
                    </section>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="card-header">
                        <div class="box-header">
                            <div class="col-sm-2 row">
                                <button @click="$router.push('/cliente')" class="btn btn-block btn-info"><i
                                        class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Regresar</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#config" data-toggle="tab" aria-expanded="true">Datos
                                        Principales</a></li>
                                <li class=""><a href="#direccion" data-toggle="tab" aria-expanded="false">Dirección</a></li>
                                <li class=""><a href="#referencia" data-toggle="tab" aria-expanded="false">Referencias</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="config">
                                    <div class="row">
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Nombre:</label>
                                                            <div class="col-md-8">
                                                                <el-input v-model="fillCrearCliente.cNombre"
                                                                    @keyup.enter="setRegistrarCliente"
                                                                    placeholder="Nombre Completo"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Fecha Nacimiento:</label>
                                                            <div class="col-md-8">
                                                                <el-date-picker style="width: 100%;"
                                                                    v-model="fillCrearCliente.cFechaNacimiento"
                                                                    type="date" placeholder="Seleccionar Fecha Nacimiento"
                                                                    format="dd-MM-yyyy" value-format="yyyy-MM-dd">
                                                                </el-date-picker>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Celular:</label>
                                                            <div class="col-md-8">
                                                                <el-input v-model="fillCrearCliente.cCelular"
                                                                    @keyup.enter="setRegistrarCliente"
                                                                    placeholder="Tel Celular"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Vencimiento
                                                                Licencia:</label>
                                                            <div class="col-md-8">
                                                                <el-date-picker style="width: 100%;"
                                                                    v-model="fillCrearCliente.cVencimientolicencia"
                                                                    type="date" placeholder="Fecha de Vencimiento"
                                                                    format="dd-MM-yyyy" value-format="yyyy-MM-dd">
                                                                </el-date-picker>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Cliente
                                                                Emergencia:</label>
                                                            <div class="col-md-8">
                                                                <el-input v-model="fillCrearCliente.cClienteEmergencia"
                                                                    @keyup.enter="setRegistrarCliente"
                                                                    placeholder="Nombre Cliente Emergencia"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Teléfono
                                                                Emergencia:</label>
                                                            <div class="col-md-8">
                                                                <el-input v-model="fillCrearCliente.cCelularEmergencia"
                                                                    @keyup.enter="setRegistrarCliente"
                                                                    placeholder="Celular Emergencia"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">RFC:</label>
                                                            <div class="col-md-8">
                                                                <el-input v-model="fillCrearCliente.cRfc"
                                                                    @keyup.enter="setRegistrarCliente"
                                                                    placeholder="Rfc"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Email:</label>
                                                            <div class="col-md-8">
                                                                <el-input v-model="fillCrearCliente.cEmail"
                                                                    @keyup.enter="setRegistrarCliente"
                                                                    placeholder="Email"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="direccion">
                                    <div class="row">
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Calle:</label>
                                                            <div class="col-md-8">
                                                                <el-input v-model="fillCrearCliente.cCalle"
                                                                    @keyup.enter="setRegistrarCliente"
                                                                    placeholder="Calle"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Colonia:</label>
                                                            <div class="col-md-8">
                                                                <el-input v-model="fillCrearCliente.cColonia"
                                                                    @keyup.enter="setRegistrarCliente"
                                                                    placeholder="Colonia"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Ciudad:</label>
                                                            <div class="col-md-8">
                                                                <el-input v-model="fillCrearCliente.cCiudad"
                                                                    @keyup.enter="setRegistrarCliente"
                                                                    placeholder="Ciudad"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">CP:</label>
                                                            <div class="col-md-8">
                                                                <el-input v-model="fillCrearCliente.cCp"
                                                                    @keypress="onlyNumber($event)"
                                                                    @keyup.enter="setRegistrarCliente"
                                                                    placeholder="CP"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="referencia">
                                    <div class="row">
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                   <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Nombre Referencia 1:</label>
                                                            <div class="col-md-8">
                                                                <el-input v-model="fillCrearCliente.cRef1"
                                                                    @keyup.enter="setRegistrarCliente"
                                                                    placeholder="Nombre"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Nombre Referencia 2:</label>
                                                            <div class="col-md-8">
                                                                <el-input v-model="fillCrearCliente.cRef2"
                                                                    @keyup.enter="setRegistrarCliente"
                                                                    placeholder="Nombre"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Nombre Referencia 3:</label>
                                                            <div class="col-md-8">
                                                                <el-input v-model="fillCrearCliente.cRef3"
                                                                    @keyup.enter="setRegistrarCliente"
                                                                    placeholder="Nombre"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Telefono Referencia 1:</label>
                                                            <div class="col-md-8">
                                                                <el-input v-model="fillCrearCliente.cTelRef1"
                                                                    @keyup.enter="setRegistrarCliente"
                                                                    placeholder="Nombre"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Telefono Referencia 2:</label>
                                                            <div class="col-md-8">
                                                                <el-input v-model="fillCrearCliente.cTelRef2"
                                                                    @keyup.enter="setRegistrarCliente"
                                                                    placeholder="Nombre"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Telefono Referencia 3:</label>
                                                            <div class="col-md-8">
                                                                <el-input v-model="fillCrearCliente.cTelRef3"
                                                                    @keyup.enter="setRegistrarCliente"
                                                                    placeholder="Nombre"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="box-footer text-center">
                                    <div class="row">
                                        <button class="btn btn-flat btn-info btnWidth"
                                            @click.prevent="setRegistrarCliente()"
                                            v-loading.fullscreen.lock="fullScreenLoading">Registrar
                                        </button>
                                        <button class="btn btn-flat btn-default btnWidth"
                                            @click.prevent="limpiarCriteriosCliente()">Limpiar
                                        </button>
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
                        <h4 class="modal-title">Error</h4>
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
            fillCrearCliente: {
                cNombre: '',
                cFechaNacimiento: '',
                cCelular: '',
                cVencimientolicencia: '',
                cClienteEmergencia: '',
                cCelularEmergencia: '',
                cCalle: '',
                cColonia: '',
                cCp: '',
                cCiudad: '',
                cEmail: '',
                cRfc: '',
                cRef1: '',
                cRef2: '',
                cRef3: '',
                cTelRef1: '',
                cTelRef2: '',
                cTelRef3:''
            },
            form: new FormData,
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

    },
    methods: {
        onlyNumber($event) {
            //console.log($event.keyCode); //keyCodes value
            let keyCode = ($event.keyCode ? $event.keyCode : $event.which);
            if ((keyCode < 48 || keyCode > 57) && keyCode !== 46) { // 46 is dot
                $event.preventDefault();
            }
        },
        limpiarCriteriosCliente() {
            this.fillCrearCliente.cNombre = '';
            this.fillCrearCliente.cFechaNacimiento = '';
            this.fillCrearCliente.cCelular = '';
            this.fillCrearCliente.cCalle = '';
            this.fillCrearCliente.cCp = '';
            this.fillCrearCliente.cColonia = '';
            this.fillCrearCliente.cVencimientolicencia = '';
            this.fillCrearCliente.cClienteEmergencia = '';
            this.fillCrearCliente.cCelularEmergencia = '';
            this.fillCrearCliente.cCiudad = '';
            this.fillCrearCliente.cEmail= '';
            this.fillCrearCliente.cRfc= '';
            this.fillCrearCliente.cRef1= '';
            this.fillCrearCliente.cRef2= '';
            this.fillCrearCliente.cRef3= '';
            this.fillCrearCliente.cTelRef1= '';
            this.fillCrearCliente.cTelRef2= '';
            this.fillCrearCliente.cTelRef3= '';
        },
        abrirModal() {
            this.modalShow = !this.modalShow;
        },
        setRegistrarCliente() {
            if (this.validarRegistrarCliente()) {
                this.modalShow = true;
                return;
            }
            this.fullScreenLoading = true;
            var url = '/administracion/cliente/setRegistrarCliente';
            //post to save
            axios.post(url, {
                'cNombre': this.fillCrearCliente.cNombre,
                'cFechaNacimiento': this.fillCrearCliente.cFechaNacimiento,
                'cCelular': this.fillCrearCliente.cCelular,
                'cCalle': this.fillCrearCliente.cCalle,
                'cCp': this.fillCrearCliente.cCp,
                'cColonia': this.fillCrearCliente.cColonia,
                'cVencimientolicencia': this.fillCrearCliente.cVencimientolicencia,
                'cClienteEmergencia': this.fillCrearCliente.cClienteEmergencia,
                'cCelularEmergencia': this.fillCrearCliente.cCelularEmergencia,
                'cCiudad': this.fillCrearCliente.cCiudad,
                'cEmail': this.fillCrearCliente.cEmail,
                'cRfc': this.fillCrearCliente.cRfc,
                'cRef1': this.fillCrearCliente.cRef1,
                'cRef2': this.fillCrearCliente.cRef2,
                'cRef3': this.fillCrearCliente.cRef3,
                'cTelRef1': this.fillCrearCliente.cTelRef1,
                'cTelRef2': this.fillCrearCliente.cTelRef2,
                'cTelRef3': this.fillCrearCliente.cTelRef3
            }).then((response) => {
                this.fullScreenLoading = false;
                Swal.fire({
                    icon: "success",
                    text: "El Cliente se ha Registrado Correctamente!",
                    type: "warning",
                    showDenyButton: false,
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.$router.push('/cliente');
                    }
                });
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        validarRegistrarCliente() {
            this.error = 0;
            this.mensajeError = [];

            if (!this.fillCrearCliente.cNombre)
                this.mensajeError.push("El campo Nombre es obligatorio");
            if (!this.fillCrearCliente.cFechaNacimiento)
                this.mensajeError.push("El campo Fecha Nacimiento es obligatorio");
            if (!this.fillCrearCliente.cVencimientolicencia)
                this.mensajeError.push("El Fecha de Vencimiento de Licencia es obligatorio");
            if (!this.fillCrearCliente.cCelular)
                this.mensajeError.push("El campo Número de Celular es obligatorio");
            if (!this.fillCrearCliente.cCalle)
                this.mensajeError.push("El campo Calle es obligatorio");
            if (!this.fillCrearCliente.cCp)
                this.mensajeError.push("El campo Código Postal es obligatorio");
            if (!this.fillCrearCliente.cColonia)
                this.mensajeError.push("El campo Colonia es obligatorio");
            if (!this.fillCrearCliente.cCiudad)
                this.mensajeError.push("El campo Ciudad es obligatorio");


            if (this.mensajeError.length) {
                this.error = 1;
            }

            return this.error;
        }
    }
}
</script>

<style></style>
