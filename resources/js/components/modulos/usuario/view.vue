<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Usuario</h1>
                    </section>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <!--columna izquierda-->
                    <div class="col-md-4">
                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                               <!--  <img class="profile-user-img img-responsive img-circle" src="/img/avatar.png" alt="Profile"> -->
                                <template v-if="!fillVerUsuario.cRutaArchivo">
                                        <img class="profile-user-img img-responsive img-max-height img-circle" src="/img/avatar.png" alt="Profile">
                                </template>
                                <template v-else>
                                        <img :src="fillVerUsuario.cRutaArchivo" :alt="cNombreCompleto" class="profile-user-img img-responsive img-max-height img-circle">
                                </template>
                                <h3 class="profile-username text-center">{{ cNombreCompleto }}</h3>
                                    <p class="text-muted text-center">{{ fillVerUsuario.cNombreRol }}</p>
                                <hr>
                                <div class="box-header with-border"></div>
                                <div class="col-sm-12">
                                    <button @click="$router.push('/usuario')" class="btn btn-block btn-info"><i
                                            class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Regresar</button>
                                </div>
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Acerca de</h3>
                            </div>
                            <div class="box-body">
                                <strong><i class="fa fa-user margin-r-5"></i> Nombre Completo</strong>
                                <p class="text-muted">
                                    {{ cNombreCompleto }}
                                </p>
                                <hr>
                                <strong><i class="fa fa-envelope margin-r-5"></i> Correo Electronico</strong>
                                <p class="text-muted" v-text="fillVerUsuario.cCorreo"></p>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#config" data-toggle="tab"
                                        aria-expanded="true">Configuración</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="config">
                                    <div class="row">
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <form role="form">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label">Primer Nombre</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control"
                                                                        v-model="fillEditarUsuario.cPrimerNombre"
                                                                        disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label">Segundo
                                                                    Nombre</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control"
                                                                        v-model="fillEditarUsuario.cSegundoNombre"
                                                                        disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label">Apellido</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control"
                                                                        v-model="fillEditarUsuario.cApellido"
                                                                        disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label">Usuario</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control"
                                                                        v-model="fillEditarUsuario.cUsuario"
                                                                        disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label">Correo
                                                                    Electronico</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control"
                                                                        v-model="fillEditarUsuario.cCorreo"
                                                                       disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="card-footer text-center">
                                            <div class="row">
                                               <!--  <button class="btn btn-flat btn-info btnWidth"
                                                    @click.prevent="setEditarUsuario()"
                                                    v-loading.fullscreen.lock="fullScreenLoading">Editar
                                                </button> -->
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
    </section>
</template>

<script>
export default {
    props: ['id'],
    data() {
        return {
            fillEditarUsuario: {
                nIdUsuario: this.id,
                cPrimerNombre: '',
                cSegundoNombre: '',
                cApellido: '',
                cUsuario: '',
                cCorreo: '',
                cContrasena: '',
                oFotografia: ''
            },
            fillVerUsuario: {
                nIdUsuario: this.id,
                cPrimerNombre: '',
                cRutaArchivo:'',
                cSegundoNombre: '',
                cApellido: '',
                cUsuario: '',
                cCorreo: '',
                cContrasena: '',
                oFotografia: '',
                cNombreRol:''
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
    mounted() {
        this.getUsuariobyId();
        this.getRolByUsuario();
    },
    computed: {
        cNombreCompleto() {
            return this.fillVerUsuario.cPrimerNombre + ' ' + this.fillVerUsuario.cSegundoNombre + ' ' + this.fillVerUsuario.cApellido;
        }
    },
    methods: {
        getUsuariobyId() {
            this.fullScreenLoading = true;
            var url = '/administracion/usuario/getListUsuarios';
            axios.get(url, {
                params: {
                    'nIdUsuario': this.fillEditarUsuario.nIdUsuario
                }
            }).then((response) => {
                console.log(response);
                this.getUsuarioForm(response.data[0]);
                this.getUsuarioVer(response.data[0]);
                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        getUsuarioVer(data) {
            this.fillVerUsuario.cPrimerNombre = data.firstname;
            this.fillVerUsuario.cSegundoNombre = data.secondname;
            this.fillVerUsuario.cApellido = data.lastname;
            this.fillVerUsuario.cUsuario = data.username;
            this.fillVerUsuario.cCorreo = data.email;
            this.fillVerUsuario.cRutaArchivo = data.profile_image;
        },
         getRolByUsuario() {
            var url = '/administracion/usuario/getRolByUsuario';
            axios.get(url, {
                params: {
                    'nIdUsuario': this.fillEditarUsuario.nIdUsuario
                }
            }).then((response) => {
                /* console.info(response.data); */
                this.fillVerUsuario.cNombreRol = (response.data.length == 0) ? '' : response.data[0].name;
                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        getUsuarioForm(data) {
            this.fillEditarUsuario.cPrimerNombre = data.firstname;
            this.fillEditarUsuario.cSegundoNombre = data.secondname;
            this.fillEditarUsuario.cApellido = data.lastname;
            this.fillEditarUsuario.cUsuario = data.username;
            this.fillEditarUsuario.cCorreo = data.email;
        },
        getFile(e) {
            this.fillEditarUsuario.oFotografia = e.target.files[0];
        },
        setGuardarArchivo() {
            this.form.append('file', this.fillEditarUsuario.oFotografia)
            const config = { headers: { 'Content-Type': 'multipart/form-data' } }

            var url = '/archivo/setRegistrarArchivo';
            axios.post(url, this.form, config).then((response) => {
                var nIdFile = response.data[0].nIdFile;
                this.setGuardarUsuario(nIdFile);
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        setGuardarUsuario(nIdFile) {
            var url = '/administracion/usuario/setEditarUsuario';
            //post to save
            axios.post(url, {
                'nIdUsuario': this.fillEditarUsuario.nIdUsuario,
                'cPrimerNombre': this.fillEditarUsuario.cPrimerNombre,
                'cSegundoNombre': this.fillEditarUsuario.cSegundoNombre,
                'cApellido': this.fillEditarUsuario.cApellido,
                'cUsuario': this.fillEditarUsuario.cUsuario,
                'cCorreo': this.fillEditarUsuario.cCorreo,
                'cContrasena': this.fillEditarUsuario.cContrasena,
                'oFotografia': nIdFile

            }).then((response) => {
                this.getRefrescarUsuarioAutenticado();
                this.fullScreenLoading = false;
                /* this.$router.push('/usuario'); */
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Usuario actualizado',
                    showConfirmButton: false,
                    timer: 1500
                });
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        getRefrescarUsuarioAutenticado() {
            var url = '/authenticate/getRefrescarUsuarioAutenticado';
            axios.get(url).then(response => {
                console.log(response);
            });
        },
        validarEditarUsuario() {
            this.error = 0;
            this.mensajeError = [];

            if (!this.fillEditarUsuario.cPrimerNombre) {
                this.mensajeError.push("El Primer Nombre es un campo obligatorio");
            }
            if (!this.fillEditarUsuario.cApellido) {
                this.mensajeError.push("El Primer Apellido es un campo obligatorio");
            }
            if (!this.fillEditarUsuario.cUsuario) {
                this.mensajeError.push("El Primer Usuario es un campo obligatorio");
            }
            if (!this.fillEditarUsuario.cCorreo) {
                this.mensajeError.push("El Primer Correo es un campo obligatorio");
            }

            if (this.mensajeError.length) {
                this.error = 1;
            }

            return this.error;
        }
    }
}
</script>

<style>
 .img-max-height{
    max-height: 100px !important;
 }
</style>
