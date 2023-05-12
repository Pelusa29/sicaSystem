<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Editar Conductor</h1>
                    </section>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="card-header">
                        <div class="box-header">
                            <div class="col-sm-2 row">
                                <button @click="$router.push('/conductor')" class="btn btn-block btn-info"><i
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
                                                                <el-input v-model="fillEditarConductor.cNombre"
                                                                    @keyup.enter="setEditarConductor"
                                                                    placeholder="Nombre Completo"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Fecha Nacimiento:</label>
                                                            <div class="col-md-8">
                                                                <el-date-picker style="width: 100%;"
                                                                    v-model="fillEditarConductor.cFechaNacimiento"
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
                                                                <el-input v-model="fillEditarConductor.cCelular"
                                                                    @keyup.enter="setEditarConductor"
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
                                                                    v-model="fillEditarConductor.cVencimientolicencia"
                                                                    type="date" placeholder="Fecha de Vencimiento"
                                                                    format="dd-MM-yyyy" value-format="yyyy-MM-dd">
                                                                </el-date-picker>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Conductor
                                                                Emergencia:</label>
                                                            <div class="col-md-8">
                                                                <el-input v-model="fillEditarConductor.cConductorEmergencia"
                                                                    @keyup.enter="setEditarConductor"
                                                                    placeholder="Celular Emergencia"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Teléfono
                                                                Emergencia:</label>
                                                            <div class="col-md-8">
                                                                <el-input v-model="fillEditarConductor.cCelularEmergencia"
                                                                    @keyup.enter="setEditarConductor"
                                                                    placeholder="Celular Emergencia"></el-input>
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
                                                                <el-input v-model="fillEditarConductor.cCalle"
                                                                    @keyup.enter="setEditarConductor"
                                                                    placeholder="Calle"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Colonia:</label>
                                                            <div class="col-md-8">
                                                                <el-input v-model="fillEditarConductor.cColonia"
                                                                    @keyup.enter="setEditarConductor"
                                                                    placeholder="Colonia"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Ciudad:</label>
                                                            <div class="col-md-8">
                                                                <el-input v-model="fillEditarConductor.cCiudad"
                                                                    @keyup.enter="setEditarConductor"
                                                                    placeholder="Ciudad"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">CP:</label>
                                                            <div class="col-md-8">
                                                                <el-input v-model="fillEditarConductor.cCp"
                                                                    @keypress="onlyNumber($event)"
                                                                    @keyup.enter="setEditarConductor"
                                                                    placeholder="CP"></el-input>
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
                                            @click.prevent="setEditarConductor()"
                                            v-loading.fullscreen.lock="fullScreenLoading">Editar
                                        </button>
                                        <button class="btn btn-flat btn-default btnWidth"
                                            @click.prevent="limpiarCriteriosConductor()">Linmpiar
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
    props:['id'],
    data() {
        return {
            fillEditarConductor: {
                nIdConductor: this.id,
                cNombre: '',
                cFechaNacimiento: '',
                cCelular: '',
                cVencimientolicencia: '',
                cConductorEmergencia: '',
                cCelularEmergencia: '',
                cCalle: '',
                cColonia: '',
                cCp: '',
                cCiudad: ''
            },
            form: new FormData,
            fullScreenLoading: false,
            modalShow: false,
            mostrarModal: {
                display: 'block'
                //background:'#00000006b'
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
        this.getConductorById();
    },
    methods: {
        onlyNumber($event) {
            //console.log($event.keyCode); //keyCodes value
            let keyCode = ($event.keyCode ? $event.keyCode : $event.which);
            if ((keyCode < 48 || keyCode > 57) && keyCode !== 46) { // 46 is dot
                $event.preventDefault();
            }
        },
        limpiarCriteriosConductor() {
            this.fillEditarConductor.cNombre = '';
            this.fillEditarConductor.cFechaNacimiento = '';
            this.fillEditarConductor.cCelular = '';
            this.fillEditarConductor.cCalle = '';
            this.fillEditarConductor.cCp = '';
            this.fillEditarConductor.cColonia = '';
            this.fillEditarConductor.cVencimientolicencia = '';
            this.fillEditarConductor.cConductorEmergencia = '';
            this.fillEditarConductor.cCelularEmergencia = '';
            this.fillEditarConductor.cCiudad = '';
        },
        abrirModal() {
            this.modalShow = !this.modalShow;
        },
        getConductorById() {
            this.fullScreenLoading = true;
            var url = '/administracion/conductor/getConductorById';
            axios.get(url, {
                params: {
                    'nIdConductor': this.fillEditarConductor.nIdConductor
                }
            }).then((response) => {

                this.fillEditarConductor.cNombre = response.data[0].nombreConductor;
                this.fillEditarConductor.cFechaNacimiento = response.data[0].fechaNacimiento;
                this.fillEditarConductor.cCelular = response.data[0].celular;
                this.fillEditarConductor.cCalle = response.data[0].calle;
                this.fillEditarConductor.cCp = response.data[0].cp;
                this.fillEditarConductor.cColonia = response.data[0].colonia;
                this.fillEditarConductor.cVencimientolicencia = response.data[0].fechaFinlicencia;
                this.fillEditarConductor.cConductorEmergencia = response.data[0].conductorEmergencia;
                this.fillEditarConductor.cCelularEmergencia = response.data[0].telefonoEmergencia;
                this.fillEditarConductor.cCiudad = response.data[0].ciudad;
                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        setEditarConductor() {
            if (this.validarRegistrarConductor()) {
                this.modalShow = true;
                return;
            }
            this.fullScreenLoading = true;
            var url = '/administracion/conductor/setEditarConductor';
            //post to save
            axios.post(url, {
                'nIdConductor': this.fillEditarConductor.nIdConductor,
                'cNombre': this.fillEditarConductor.cNombre,
                'cFechaNacimiento': this.fillEditarConductor.cFechaNacimiento,
                'cCelular': this.fillEditarConductor.cCelular,
                'cCalle': this.fillEditarConductor.cCalle,
                'cCp': this.fillEditarConductor.cCp,
                'cColonia': this.fillEditarConductor.cColonia,
                'cVencimientolicencia': this.fillEditarConductor.cVencimientolicencia,
                'cConductorEmergencia': this.fillEditarConductor.cConductorEmergencia,
                'cCelularEmergencia': this.fillEditarConductor.cCelularEmergencia,
                'cCiudad': this.fillEditarConductor.cCiudad,
            }).then((response) => {
                this.fullScreenLoading = false;
                Swal.fire({
                    icon: "success",
                    text: "El Conducor se ha Actualizado Correctamente!",
                    type: "warning",
                    showDenyButton: false,
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.$router.push('/conductor');
                    }
                });
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        validarRegistrarConductor() {
            this.error = 0;
            this.mensajeError = [];

            if (!this.fillEditarConductor.cNombre)
                this.mensajeError.push("El campo Nombre es obligatorio");
            if (!this.fillEditarConductor.cFechaNacimiento)
                this.mensajeError.push("El campo Fecha Nacimiento es obligatorio");
            if (!this.fillEditarConductor.cVencimientolicencia)
                this.mensajeError.push("El Fecha de Vencimiento de Licencia es obligatorio");
            if (!this.fillEditarConductor.cCelular)
                this.mensajeError.push("El campo Número de Celular es obligatorio");
            if (!this.fillEditarConductor.cCalle)
                this.mensajeError.push("El campo Calle es obligatorio");
            if (!this.fillEditarConductor.cCp)
                this.mensajeError.push("El campo Código Postal es obligatorio");
            if (!this.fillEditarConductor.cColonia)
                this.mensajeError.push("El campo Colonia es obligatorio");
            if (!this.fillEditarConductor.cCiudad)
                this.mensajeError.push("El campo Ciudad es obligatorio");
            if (!this.fillEditarConductor.cConductorEmergencia)
                this.mensajeError.push("El campo Conductor de Emergencia es obligatorio");
            if (!this.fillEditarConductor.cCelularEmergencia)
                this.mensajeError.push("El campo Celular de Emergencia es obligatorio");

            if (this.mensajeError.length) {
                this.error = 1;
            }

            return this.error;
        }
    }
}
</script>

<style></style>
