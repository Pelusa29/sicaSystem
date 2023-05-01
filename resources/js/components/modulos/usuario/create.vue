<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Crear Usuario</h1>
                    </section>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <!--columna izquierda-->
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" src="/img/avatar.png" alt="Profile">
                                <h3 class="profile-username text-center">Nina Mcintire</h3>
                                <p class="text-muted text-center">Proveedor</p>
                                <div class="box-header with-border"></div>
                                <div class="box-header with-border">
                                    <h3 class="box-title"><i class="fa fa-pencil margin-r-5"></i>Información</h3>
                                </div>
                                <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                                    <p class="text-muted">Malibu, California</p>
                                <hr>
                                <div class="box-header with-border"></div>
                                <div class="col-sm-12">
                                     <button @click="$router.push('/usuario')" class="btn btn-block btn-info"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Regresar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/columna izquierda-->
                    <!-- columna derecha-->
                    <div class="col-md-9">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#config" data-toggle="tab" aria-expanded="true">Configuración</a></li>
                               <!--  <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Documentos</a></li>
                                <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Configruacón</a></li> -->
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
                                                                        v-model="fillCrearUsuario.cPrimerNombre"
                                                                        @keyup.enter="setRegistrarUsuario">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label">Seugndo Nombre</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control"
                                                                        v-model="fillCrearUsuario.cSegundoNombre"
                                                                        @keyup.enter="setRegistrarUsuario">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label">Apellido</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control"
                                                                        v-model="fillCrearUsuario.cApellido"
                                                                        @keyup.enter="setRegistrarUsuario">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label">Usuario</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control"
                                                                        v-model="fillCrearUsuario.cUsuario"
                                                                        @keyup.enter="setRegistrarUsuario">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label">Correo Electronico</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control"
                                                                        v-model="fillCrearUsuario.cCorreo"
                                                                        @keyup.enter="setRegistrarUsuario">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label">Contraseña</label>
                                                                <div class="col-md-9">
                                                                    <el-input placeholder="Ingrese una contraseña" v v-model="fillCrearUsuario.cContrasena"
                                                                            @keyup.enter="setRegistrarUsuario" show-password></el-input>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label">Fotorgafía</label>
                                                                <div class="col-md-9">
                                                                    <input type="file" class="form-control" @change="getFile">
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
                                               <button class="btn btn-flat btn-info btnWidth"
                                                    @click.prevent="setRegistrarUsuario()" v-loading.fullscreen.lock="fullScreenLoading">Registrar
                                                </button>
                                                    <button class="btn btn-flat btn-default btnWidth"
                                                        @click.prevent="limpiarCriteriosUsuario()">Linmpiar
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
                        <div class="callout callout-danger" style="padding: 5px;" v-for="(item,index) in mensajeError" :key="index" v-text="item">
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
            fillCrearUsuario: {
                cPrimerNombre: '',
                cSegundoNombre: '',
                cApellido: '',
                cUsuario: '',
                cCorreo: '',
                cContrasena: '',
                oFotografia:''
            },
            form: new FormData,
            fullScreenLoading:false,
            modalShow: false,
            mostrarModal: {
                display: 'block'
                //background:'#00000006b'
            },
            ocultarModal: {
                display: 'none',
            },
            error: 0,
            mensajeError:[]
        }
    },
    computed: {
    },
    methods: {
        limpiarCriteriosUsuario() {
            this.fillCrearUsuario.cPrimerNombre = '';
            this.fillCrearUsuario.cSegundoNombre = '';
            this.fillCrearUsuario.cApellido = '';
            this.fillCrearUsuario.cUsuario = '';
            this.fillCrearUsuario.cCorreo = '';
            this.fillCrearUsuario.cContrasena = '';
            this.fillCrearUsuario.oFotografia = '';
        },
        abrirModal() {
            this.modalShow = !this.modalShow;
        },
        getFile(e) {
           this.fillCrearUsuario.oFotografia = e.target.files[0];
        },
        setRegistrarUsuario() {
            if (this.validarRegistrarUsuario()) {
                this.modalShow = true;
                return;
            }
            this.fullScreenLoading = true;

            if (!this.fillCrearUsuario.oFotografia || this.fillCrearUsuario.oFotografia == undefined) {
                this.setGuardarUsuario(0);
            } else {
                this.setGuardarArchivo();
            }
        },
        setGuardarArchivo() {
            this.form.append('file', this.fillCrearUsuario.oFotografia)
            const config = { headers: { 'Content-Type': 'multipart/form-data' } }

            var url = '/archivo/setRegistrarArchivo';
            axios.post(url,this.form,config).then((response) => {
                var nIdFile = response.data[0].nIdFile;
                this.setGuardarUsuario(nIdFile);
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        setGuardarUsuario(nIdFile) {
            var url = '/administracion/usuario/setRegistrarUsuario';
            //post to save
             axios.post(url, {
                'cPrimerNombre' : this.fillCrearUsuario.cPrimerNombre,
                'cSegundoNombre': this.fillCrearUsuario.cSegundoNombre,
                'cApellido'     : this.fillCrearUsuario.cApellido,
                'cUsuario'      : this.fillCrearUsuario.cUsuario,
                'cCorreo'       : this.fillCrearUsuario.cCorreo,
                'cContrasena'   : this.fillCrearUsuario.cContrasena,
                'oFotografia'   : nIdFile

             }).then((response) => {
                 this.fullScreenLoading = false;
                 Swal.fire({
                     title: 'Usuario',
                     text: "Usuario creado correctamente!",
                     type:"warning",
                     showDenyButton: false,
                     confirmButtonText: 'Ok'
                 }).then((result) => {
                     if (result.isConfirmed) {
                         this.$router.push('/usuario');
                     }
                 });

            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        validarRegistrarUsuario() {
            this.error = 0;
            this.mensajeError = [];

            if (!this.fillCrearUsuario.cPrimerNombre) {
                this.mensajeError.push("El Primer Nombre es un campo obligatorio");
            }
            if (!this.fillCrearUsuario.cApellido) {
                this.mensajeError.push("El Primer Apellido es un campo obligatorio");
            }
            if (!this.fillCrearUsuario.cUsuario) {
                this.mensajeError.push("El Primer Usuario es un campo obligatorio");
            }
            if (!this.fillCrearUsuario.cCorreo) {
                this.mensajeError.push("El Primer Correo es un campo obligatorio");
            }
            if (!this.fillCrearUsuario.cContrasena) {
                this.mensajeError.push("El Primer Contraseña es un campo obligatorio");
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
