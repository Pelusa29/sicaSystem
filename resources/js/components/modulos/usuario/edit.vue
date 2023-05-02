<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Editar Usuario</h1>
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
                    <div class="col-md-9">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#config" data-toggle="tab" aria-expanded="true">Configuración</a></li>
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
                                                                        @keyup.enter="setEditarUsuario">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label">Segundo Nombre</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control"
                                                                        v-model="fillEditarUsuario.cSegundoNombre"
                                                                        @keyup.enter="setEditarUsuario">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label">Apellido</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control"
                                                                        v-model="fillEditarUsuario.cApellido"
                                                                        @keyup.enter="setEditarUsuario">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label">Usuario</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control"
                                                                        v-model="fillEditarUsuario.cUsuario"
                                                                        @keyup.enter="setEditarUsuario">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label">Correo Electronico</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control"
                                                                        v-model="fillEditarUsuario.cCorreo"
                                                                        @keyup.enter="setEditarUsuario">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label">Contraseña</label>
                                                                <div class="col-md-9">
                                                                    <el-input placeholder="Ingrese una contraseña" v v-model="fillEditarUsuario.cContrasena"
                                                                            @keyup.enter="setEditarUsuario" show-password></el-input>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label">Rol</label>
                                                                <div class="col-md-9">
                                                                    <el-select
                                                                    v-model="fillEditarUsuario.nIdRol"
                                                                    placeholder="Seleccione un Rol"
                                                                    clearable>
                                                                        <el-option
                                                                        v-for="item in listRoles"
                                                                        :key="item.id"
                                                                        :label="item.name"
                                                                        :value="item.id">
                                                                        </el-option>
                                                                    </el-select>
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
                                                    @click.prevent="setEditarUsuario()" v-loading.fullscreen.lock="fullScreenLoading">Editar
                                                </button>
                                                    <button class="btn btn-flat btn-default btnWidth"
                                                        @click.prevent="limpiarCriteriosUsuario()">Limpiar
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
    props:['id'],
    data() {
        return {
            fillEditarUsuario: {
                nIdUsuario:this.id,
                cPrimerNombre: '',
                cSegundoNombre: '',
                cApellido: '',
                cUsuario: '',
                cCorreo: '',
                cContrasena: '',
                oFotografia: '',
                nIdRol:''
            },
            form: new FormData,
            fullScreenLoading: false,
            listRoles:[],
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
    mounted() {
        this.getUsuariobyId();
        this.getListRoles();
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
                //this.listUsuarios = response.data;
                this.fillEditarUsuario.cPrimerNombre = response.data[0].firstname;
                this.fillEditarUsuario.cSegundoNombre = response.data[0].secondname;
                this.fillEditarUsuario.cApellido = response.data[0].lastname;
                this.fillEditarUsuario.cUsuario = response.data[0].username;
                this.fillEditarUsuario.cCorreo = response.data[0].email;

                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        getListRoles() {
            /* this.fullScreenLoading = true; */
            var url = '/administracion/rol/getListRoles';
            axios.get(url).then((response) => {
                this.listRoles = response.data;
                this.getRolByUsuario();
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        getRolByUsuario() {
            var url = '/administracion/usuario/getRolByUsuario';
            axios.get(url, {
                params: {
                   'nIdUsuario': this.fillEditarUsuario.nIdUsuario
                }
            }).then((response) => {
                /* console.info(response.data); */
                this.fillEditarUsuario.nIdRol = (response.data.length == 0) ? '' : response.data[0].nIdRol;
                /* this.listRoles = response.data; */
                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        limpiarCriteriosUsuario() {
            this.fillEditarUsuario.cPrimerNombre = '';
            this.fillEditarUsuario.cSegundoNombre = '';
            this.fillEditarUsuario.cApellido = '';
            this.fillEditarUsuario.cUsuario = '';
            this.fillEditarUsuario.cCorreo = '';
            this.fillEditarUsuario.cContrasena = '';
            this.fillEditarUsuario.oFotografia = '';
        },
        abrirModal() {
            this.modalShow = !this.modalShow;
        },
        getFile(e) {
           this.fillEditarUsuario.oFotografia = e.target.files[0];
        },
        setEditarUsuario() {
            if (this.validarEditarUsuario()) {
                this.modalShow = true;
                return;
            }
            this.fullScreenLoading = true;

            if (!this.fillEditarUsuario.oFotografia || this.fillEditarUsuario.oFotografia == undefined) {
                this.setGuardarUsuario(0);
            } else {
                this.setGuardarArchivo();
            }
        },
        setGuardarArchivo() {
            this.form.append('file', this.fillEditarUsuario.oFotografia)
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
            var url = '/administracion/usuario/setEditarUsuario';
            //post to save
            axios.post(url, {
                'nIdUsuario'    : this.fillEditarUsuario.nIdUsuario,
                'cPrimerNombre' : this.fillEditarUsuario.cPrimerNombre,
                'cSegundoNombre': this.fillEditarUsuario.cSegundoNombre,
                'cApellido'     : this.fillEditarUsuario.cApellido,
                'cUsuario'      : this.fillEditarUsuario.cUsuario,
                'cCorreo'       : this.fillEditarUsuario.cCorreo,
                'cContrasena'   : this.fillEditarUsuario.cContrasena,
                'oFotografia'   : nIdFile

            }).then((response) => {
                this.setEditarRolByUsuario();
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        setEditarRolByUsuario() {
            var url = '/administracion/usuario/setEditarRolByUsuario';
            axios.post(url, {
                'nIdUsuario': this.fillEditarUsuario.nIdUsuario,
                'nIdRol': this.fillEditarUsuario.nIdRol
            }).then((response) => {
                //
                this.fullScreenLoading = false;
                Swal.fire({
                    title: 'Usuario',
                    text: "Usuario Actualizado correctamente!",
                    type: "warning",
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
            if (!this.fillEditarUsuario.nIdRol) {
                this.mensajeError.push("El Rol es un campo obligatorio");
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

