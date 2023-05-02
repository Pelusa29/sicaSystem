<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Crear Permiso</h1>
                    </section>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="box-header">
                                <div class="col-sm-2 row">
                                    <button @click="$router.push('/permiso')" class="btn btn-block btn-info"><i
                                            class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Regresar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="box box-info box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Formulario Registrar Permiso</h3>
                                        </div>
                                        <div class="box-body">
                                            <form role="form">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Nombre</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control"
                                                                    v-model="fillCrearPermiso.cNombre"
                                                                    @keyup.enter="setRegistraPermiso">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Url Amigable</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control"
                                                                    v-model="fillCrearPermiso.cUrl"
                                                                    @keyup.enter="setRegistraPermiso">
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
                                                        @click.prevent="setRegistraPermiso()"
                                                        v-loading.fullscreen.lock="fullScreenLoading">Registrar</button>
                                                    <button class="btn btn-flat btn-default btnWidth"
                                                        @click.prevent="limpiarCriteriosBsq()">Linmpiar</button>
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
            fillCrearPermiso: {
                cNombre: '',
                cUrl: ''
            },
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
    methods: {
        abrirModal() {
            this.modalShow = !this.modalShow;
        },
        limpiarCriteriosBsq() {
            this.fillCrearPermiso.cNombre = '';
            this.fillCrearPermiso.cUrl = '';
        },
        setRegistraPermiso() {
            if (this.validarRegistrarPermiso()) {
                this.modalShow = true;
                return;
            }

            this.fullScreenLoading = true;
            var url = '/administracion/permiso/setRegistraPermiso';
            //post to save
            axios.post(url, {
                'cNombre': this.fillCrearPermiso.cNombre,
                'cSlug': this.fillCrearPermiso.cUrl
            }).then((response) => {
                this.fullScreenLoading = false;
                Swal.fire({
                    title:"Permiso",
                    text: "Permiso creado correctamente!",
                    type: "warning",
                    showDenyButton: false,
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.$router.push('/permiso');
                    }
                });

            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        validarRegistrarPermiso() {
            this.error = 0;
            this.mensajeError = [];

            if (!this.fillCrearPermiso.cNombre) {
                this.mensajeError.push("El Nombre es un campo obligatorio");
            }
            if (!this.fillCrearPermiso.cUrl) {
                this.mensajeError.push("La Url Amigable es un campo obligatorio");
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
