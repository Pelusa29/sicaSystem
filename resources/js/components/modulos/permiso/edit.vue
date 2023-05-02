<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Editar Permiso</h1>
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
                                            <h3 class="box-title">Formulario Editar Permiso</h3>
                                        </div>
                                        <div class="box-body">
                                            <form role="form">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Nombre</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control"
                                                                    v-model="fillEditarPermiso.cNombre"
                                                                    @keyup.enter="setEditarPermiso">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Url Amigable</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control"
                                                                    v-model="fillEditarPermiso.cUrl"
                                                                    @keyup.enter="setEditarPermiso">
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
                                                        @click.prevent="setEditarPermiso()"
                                                        v-loading.fullscreen.lock="fullScreenLoading">Editar</button>
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
    props: ['id'],
    data() {
        return {
            fillEditarPermiso: {
                nIdPermiso:this.id,
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
    mounted() {
        this.getListPermisos();
    },
    methods: {
        abrirModal() {
            this.modalShow = !this.modalShow;
        },
        getListPermisos() {
            this.fullScreenLoading = true;
            var url = '/administracion/permiso/getListPermisos';
            axios.get(url, {
                params: {
                    'nIdPermiso': this.fillEditarPermiso.nIdPermiso
                }
            }).then((response) => {
                /* this.inicializarPaginacion(); */
                /* this.listPermisos = response.data; */
                this.fillEditarPermiso.cNombre  = response.data[0].name;
                this.fillEditarPermiso.cUrl     = response.data[0].slug;
                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        limpiarCriteriosBsq() {
            this.fillEditarPermiso.cNombre = '';
            this.fillEditarPermiso.cUrl = '';
        },
        setEditarPermiso() {
            if (this.validarEditarPermiso()) {
                this.modalShow = true;
                return;
            }

            this.fullScreenLoading = true;
            var url = '/administracion/permiso/setEditarPermiso';
            //post to save
            axios.post(url, {
                'nIdPermiso': this.fillEditarPermiso.nIdPermiso,
                'cNombre': this.fillEditarPermiso.cNombre,
                'cSlug': this.fillEditarPermiso.cUrl
            }).then((response) => {
                this.fullScreenLoading = false;
                Swal.fire({
                    title: "Permiso",
                    text: "Permiso actualizado correctamente!",
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
        validarEditarPermiso() {
            this.error = 0;
            this.mensajeError = [];

            if (!this.fillEditarPermiso.cNombre) {
                this.mensajeError.push("El Nombre es un campo obligatorio");
            }
            if (!this.fillEditarPermiso.cUrl) {
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
