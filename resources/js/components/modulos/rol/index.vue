<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Roles</h1>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="box-header">
                            <div class="col-md-2 row">
                                <router-link class="btn btn-block btn-info" :to="'/rol/crear'">
                                    <i class="fa fa-plus"></i>&nbsp;&nbsp;Nuevo Rol
                                </router-link>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="box box-info box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Criterios de Búsqueda</h3>
                                    </div>
                                    <div class="box-body">
                                        <form role="form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label">Nombre</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control"
                                                                v-model="fillBsqRol.cNombre"
                                                                @keyup.enter="getListRoles">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label">Url Amigable</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control"
                                                                v-model="fillBsqRol.cUrl"
                                                                @keyup.enter="getListRoles">
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
                                                    @click.prevent="getListRoles()"
                                                    v-loading.fullscreen.lock="fullScreenLoading">Buscar</button>
                                                <button class="btn btn-flat btn-default btnWidth"
                                                    @click.prevent="limpiarCriteriosBsq()">Linmpiar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box box-info box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Resultados</h3>
                                    </div>
                                    <template v-if="listarRolesPaginated.length">
                                        <div class="box-body table-responsive">
                                            <table
                                                class="table table-bordered table-striped dataTable table-head-fixed text-nowrap projects"
                                                role="grid">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Url Amigable</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(item, index) in listarRolesPaginated" :key="index">
                                                        <td v-text="item.name"></td>
                                                        <td><span class="badge bg-red" v-text="item.slug"></span></td>
                                                        <td>
                                                            <button
                                                                @click.prevent="abrirModalByOption('rol','ver',item)"
                                                                class="btn btn-flat btn-primary btn-sm"><i
                                                                    class="fa fa-eye"></i> Ver</button>
                                                            <button
                                                                @click="$router.push({ name: 'rol.editar', params: { id: item.id } })"
                                                                class="btn btn-flat btn-info btn-sm"><i
                                                                    class="fa fa-pencil"></i> Editar</button>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="box-footer clearfix">
                                            <div class="row">
                                                <div class="col-sm-5">
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
                                                </div>
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
                        <template v-if="modalOption == 1">
                            <div class="callout callout-danger" style="padding: 5px;" v-for="(item, index) in mensajeError"
                                :key="index" v-text="item">
                            </div>
                        </template>
                        <template v-if="modalOption == 2">
                            <!-- Inicia Template -->
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="box box-info box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Información del Rol</h3>
                                        </div>
                                        <div class="box-body">
                                            <form role="form">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="col-md-12 col-form-label">Nombre</label>
                                                            <div class="col-md-12">
                                                                <span class="form-control" v-text="fillVerRol.cNombre"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="col-md-12 col-form-label">Url Amigable</label>
                                                            <div class="col-md-12">
                                                                <span class="form-control" v-text="fillVerRol.cUrl"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="box box-info box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Listado de Permisos</h3>
                                        </div>
                                        <template v-if="listPermisos.length">
                                            <div class="box-body table-responsive">
                                                <div class="scrollTable">
                                                    <table
                                                        class="table table-bordered table-striped dataTable table-head-fixed text-nowrap projects"
                                                        role="grid">
                                                        <thead>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Url Amigable</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr v-for="(item, index) in listPermisos" :key="index">
                                                                <td v-text="item.name"></td>
                                                                <td><span class="badge bg-red" v-text="item.slug"></span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
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
                            <!-- /Termina Template -->
                        </template>
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
            fillBsqRol: {
                cNombre: '',
                cUrl: ''
            },
            fillVerRol: {
                cNombre: '',
                cUrl: ''
            },
            listPermisos:[],
            listRoles: [],
            fullScreenLoading: false,
            pageNumber: 0,
            perPage: 5,
            modalShow: false,
            modalOption: 0,
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
        // Obtener el número de páginas
        pageCount() {
            let a = this.listRoles.length,
                b = this.perPage;

            return Math.ceil(a / b);
        },
        //Obtener registro paginados
        listarRolesPaginated() {
            let inicio = this.pageNumber * this.perPage,
                fin = inicio + this.perPage;
            return this.listRoles.slice(inicio, fin);
        },
        pagesList() {
            let a = this.listRoles.length,
                b = this.perPage;

            let pageCount = Math.ceil(a / b);
            let count = 0,
                pagesArray = [];

            while (count < pageCount) {
                pagesArray.push(count);
                count++;
            }

            return pagesArray;
        }
    },
    methods: {
        limpiarCriteriosBsq() {
            this.fillBsqRol.cNombre = '';
            this.fillBsqRol.cUrl = '';
        },
        limpiarModal() {
            this.fillVerRol.cNombre = '';
            this.fillVerRol.cUrl    = '';
            this.listPermisos       = [];
            this.modalOption        = 0;
        },
        limpiarBandejaUsuarios() {
            this.listUsuarios = [];
        },
        abrirModal() {
            this.modalShow = !this.modalShow;
            this.limpiarModal();
        },
        getListRoles() {
            this.fullScreenLoading = true;
            var url = '/administracion/rol/getListRoles';
            axios.get(url, {
                params: {
                    'cNombre': this.fillBsqRol.cNombre,
                    'cUrl': this.fillBsqRol.cUrl
                }
            }).then((response) => {
                this.inicializarPaginacion();
                this.listRoles = response.data;
                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        nextPage() {
            this.pageNumber++;
        },
        prevPage() {
            this.pageNumber--;
        },
        selectedPage(page) {
            this.pageNumber = page;
        },
        inicializarPaginacion() {
            this.pageNumber = 0;
        },
        getListPermisosByRol(id) {
            var ruta = '/administracion/rol/getListPermisosByRol';
            axios.get(ruta, {
                params: {
                    'nIdRol': id
                }
            }).then(response => {
                this.listPermisos = response.data;
                this.modalShow = true;
                this.modalOption = 2;
            })
        },
        abrirModalByOption(modulo, accion, data) {
            switch (modulo) {
                case "rol":
                {
                    switch (accion) {
                        case "ver":
                        {
                            //Informacion del arreglo
                                this.fillVerRol.cNombre = data.name;
                                this.fillVerRol.cUrl = data.slug;
                                //Obtener los permisos de los roles selccionados
                                this.getListPermisosByRol(data.id);
                        }
                        break;
                        default:
                            break;
                    }
                }
                break;
                default:
                    break;
            }
        }
    }
}
</script>
<style>
</style>
