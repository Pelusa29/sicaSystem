<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Crear Rol</h1>
                    </section>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="box-header">
                                <div class="col-sm-2 row">
                                   <button @click="$router.push('/rol')" class="btn btn-block btn-info"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Regresar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="box box-info box-solid">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Formulario Registrar Rol</h3>
                                            </div>
                                            <div class="box-body">
                                                <form role="form">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label">Nombre</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control"
                                                                        v-model="fillCrearRol.cNombre"
                                                                        @keyup.enter="setRegistraRolPermisos">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label">Url Amigable</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control"
                                                                        v-model="fillCrearRol.cUrl"
                                                                        @keyup.enter="setRegistraRolPermisos">
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
                                                            @click.prevent="setRegistraRolPermisos()" v-loading.fullscreen.lock="fullScreenLoading">Registrar</button>
                                                        <button class="btn btn-flat btn-default btnWidth"
                                                            @click.prevent="limpiarCriteriosBsq()">Linmpiar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="box box-info box-solid">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Listar Permisios</h3>
                                            </div>
                                            <template v-if="listPermisosFilter.length">
                                                <div class="box-body table-responsive">
                                                    <div class="scrollTable">
                                                        <table
                                                            class="table table-bordered table-striped dataTable table-head-fixed text-nowrap projects"
                                                            role="grid">
                                                            <thead>
                                                                <tr>
                                                                    <th>Acciones</th>
                                                                    <th>Nombre</th>
                                                                    <th>Url Amigable</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr v-for="(item, index) in listPermisosFilter" :key="index" @click.prevent="marcarFila(index)">
                                                                    <td>
                                                                        <!-- checkbox para seleccionar los permisos -->
                                                                        <el-checkbox v-model="item.checked"></el-checkbox>
                                                                    </td>
                                                                    <td v-text="item.name"></td>
                                                                    <td><span class="badge bg-red" v-text="item.slug"></span></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="box-footer clearfix">
                                                    <div class="row">
                                                        <!-- <div class="col-sm-5">
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <div class="dataTables_paginate paging_simple_numbers pull-right">
                                                                <ul class="pagination">
                                                                    <li class="paginate_button previous" v-if="pageNumber > 0">
                                                                        <a href="#" aria-controls="example1"
                                                                            @click.prevent="prevPage">Previous</a>
                                                                    </li>
                                                                    <li :class="[page == pageNumber ? 'paginate_button active' : '']"
                                                                        v-for="(page, index) in pagesList" :key="index">
                                                                        <a href="#" aria-controls="example1"
                                                                            @click.prevent="selectedPage(page)">{{ page + 1 }}</a>
                                                                    </li>
                                                                    <li class="paginate_button next"
                                                                        v-if="pageNumber < pageCount - 1">
                                                                        <a href="#" aria-controls="example1"
                                                                            @click.prevent="nextPage">Next</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </template>
                                            <template v-else>
                                                <div class="callout callout-info">
                                                    <h5>No se encontraron regisrtos</h5>
                                                </div>
                                            </template>
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
            fillCrearRol: {
                cNombre: '',
                cUrl: ''
            },
            listPermisosFilter:[],
            listPermisos:[],
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
        this.getListPermisosByRol();
    },
    methods: {
        limpiarCriteriosRol() {
            this.fillCrearRol.cNombre = '';
            this.fillCrearRol.cUrl = '';
        },
        marcarFila(idFila) {
            this.listPermisosFilter[idFila].checked = !this.listPermisosFilter[idFila].checked;
        },
        filterPermisosByRol() {
            let me = this;
            me.listPermisos.map(function (x, y) {
                me.listPermisosFilter.push({
                    'id'        : x.id,
                    'name'      : x.name,
                    'slug'      : x.slug,
                    'checked'   : false
                })
            })
        },
        getListPermisosByRol() {
            var ruta = '/administracion/rol/getListPermisosByRol';
            axios.get(ruta).then(response => {
                this.listPermisos = response.data;
                this.filterPermisosByRol();
            })
        },
        abrirModal() {
            this.modalShow = !this.modalShow;
        },
        limpiarCriteriosBsq() {
            this.fillCrearRol.cNombre = '';
            this.fillCrearRol.cUrl = '';
        },
        setRegistraRolPermisos() {
            if (this.validarRegistrarRolPermisos()) {
                this.modalShow = true;
                return;
            }

            this.fullScreenLoading = true;
            var url = '/administracion/rol/setRegistraRolPermisos';
            //post to save
            axios.post(url, {
                'cNombre'           : this.fillCrearRol.cNombre,
                'cSlug'             : this.fillCrearRol.cUrl,
                'listPermisosFilter': this.listPermisosFilter

            }).then((response) => {
                this.fullScreenLoading = false;
                Swal.fire({
                    title: 'Rol',
                    text: "Rol creado correctamente!",
                    type: "warning",
                    showDenyButton: false,
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log(result);
                        this.$router.push('/rol');
                    }
                });

            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        validarRegistrarRolPermisos() {
            this.error = 0;
            this.mensajeError = [];

            if (!this.fillCrearRol.cNombre) {
                this.mensajeError.push("El Nombre es un campo obligatorio");
            }
            if (!this.fillCrearRol.cUrl) {
                this.mensajeError.push("La Url Amigable es un campo obligatorio");
            }

            let contador = 0;
            this.listPermisosFilter.map(function (x, y) {
                if (x.checked == true) {
                    contador++;
                }
            })

            if (contador == 0) {
                this.mensajeError.push("Debe seleccionar al menos un permiso");
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
