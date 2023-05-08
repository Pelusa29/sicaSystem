<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Generar Placa Nueva</h1>
                    </section>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="box-header">
                                <div class="col-sm-2 row">
                                    <button @click="$router.push('/placa')" class="btn btn-block btn-info"><i
                                            class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Regresar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="box box-info box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Registro de Placa</h3>
                                        </div>
                                        <div class="box-body">
                                            <form role="form">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Número de Placa</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control"
                                                                    v-model="fillCrearPlaca.cNumeroPlaca"
                                                                    @keyup.enter="setRegistraPlaca">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Tipo Placa</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control"
                                                                    v-model="fillCrearPlaca.cTipoPlaca"
                                                                    @keyup.enter="setRegistraPlaca">
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
                                                        @click.prevent="setRegistraPlaca()"
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
                        <h4 class="modal-title"></h4>
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
            fillCrearPlaca: {
                cNumeroPlaca:'',
                cTipoPlaca: ''
            },
            /* listTipoUnidades: [], */
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
        //this.getListaUnidades();
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
        limpiarCriteriosBsq() {
            this.fillCrearPlaca.cNumeroPlaca = '';
            this.fillCrearPlaca.cTipoPlaca = '';
        },
        setRegistraPlaca() {
            if (this.validarRegistrarTipoUnidad()) {
                this.modalShow = true;
                return;
            }

            this.fullScreenLoading = true;
            var url = '/configuracion/placa/setRegistraPlaca';
            //post to save
            axios.post(url, {
                'cNumeroPlaca': this.fillCrearPlaca.cNumeroPlaca,
                'cTipoPlaca': this.fillCrearPlaca.cTipoPlaca
            }).then((response) => {
                this.fullScreenLoading = false;
                if (response.data != 1) {
                    Swal.fire({
                        icon: "success",
                        text: "Registro de Placa Correctamente!",
                        type: "Success",
                        showDenyButton: false,
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.$router.push('/placa');
                        }
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        text: "Placa existente, favor de regisrtar una nueva.",
                        type: "Error",
                        showDenyButton: false,
                        showConfirmButton: true,
                    });
                }

            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        /* getListaUnidades() {
            this.fullScreenLoading = true;
            var url = '/configuracion/placa/getListaUnidades';
            axios.get(url).then((response) => {
                this.listTipoUnidades = response.data;
                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        }, */
        validarRegistrarTipoUnidad() {
            this.error = 0;
            this.mensajeError = [];

            if (!this.fillCrearPlaca.cTipoPlaca) {
                this.mensajeError.push("El Tipo de Placa es un campo obligatorio");
            }
            if (!this.fillCrearPlaca.cNumeroPlaca) {
                this.mensajeError.push("El Número de Placa es un campo obligatorio");
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
