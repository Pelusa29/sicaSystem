<template>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Usuarios</h1>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="box-header">
                                <div class="col-md-2 row">
                                     <router-link class="btn btn-block btn-info" :to="'/usuario/crear'">
                                        <i class="fa fa-plus"></i>&nbsp;&nbsp;Nuevo Usuario
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
                                                                <input type="text" class="form-control" v-model="fillBsqUsuario.cNombre" @keyup.enter="getListUsuarios">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Usuario</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" v-model="fillBsqUsuario.cUsuaro" @keyup.enter="getListUsuarios">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Correo Electronico</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" v-model="fillBsqUsuario.cCorreo" @keyup.enter="getListUsuarios">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Estado</label>
                                                            <div class="col-md-9">
                                                                <el-select
                                                                v-model="fillBsqUsuario.cEstado"
                                                                placeholder="Seleccione un Estado"
                                                                clearable>
                                                                    <el-option
                                                                    v-for="item in listEstados"
                                                                    :key="item.value"
                                                                    :label="item.label"
                                                                    :value="item.value">
                                                                    </el-option>
                                                                </el-select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="box-footer">
                                            <div class="row">
                                                <div class="col text-center">
                                                    <button class="btn btn-flat btn-info btnWidth" @click.prevent="getListUsuarios()" v-loading.fullscreen.lock="fullScreenLoading">Buscar</button>
                                                    <button class="btn btn-flat btn-default btnWidth" @click.prevent="limpiarCriteriosBsq()">Linmpiar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box box-info box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Resultados</h3>
                                        </div>
                                        <template v-if="listarUsuariosPaginated.length">
                                            <div class="box-body table-responsive">
                                                <table class="table table-bordered table-striped dataTable table-head-fixed text-nowrap projects" role="grid">
                                                    <thead>
                                                        <tr>
                                                            <th>Fotografía</th>
                                                            <th>Nombre</th>
                                                            <th>Correo</th>
                                                            <th>Usuario</th>
                                                            <th>Estado</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="(item, index) in listarUsuariosPaginated" :key="index">
                                                            <td>
                                                                <template v-if="!item.profile_image">
                                                                    <li class="user-block">
                                                                        <img src="/img/avatar.png" :alt="item.username" class="profile-avatar-img img-fluid img-circle">
                                                                    </li>
                                                                </template>
                                                                <template v-else>
                                                                    <li class="user-block">
                                                                        <img :src="item.profile_image" :alt="item.username" class="profile-avatar-img img-fluid img-circle">
                                                                    </li>
                                                                </template>
                                                            </td>
                                                            <td v-text="item.firstname"></td>
                                                            <td v-text="item.email"></td>
                                                            <td v-text="item.username"></td>
                                                            <td>
                                                                <template v-if="item.state == 'A'">
                                                                    <span class="badge bg-green" v-text="item.state_alias"></span>
                                                                </template>
                                                                <template v-else>
                                                                    <span class="badge bg-red" v-text="item.state_alias"></span>
                                                                </template>
                                                            </td>
                                                            <td>
                                                                <button @click="$router.push({ name: 'usuario.ver', params: { id: item.id } })" class="btn btn-flat btn-primary btn-sm"><i class="fa fa-eye"></i> Ver</button>
                                                                <template v-if="item.state == 'A'">
                                                                    <button @click="$router.push({name:'usuario.editar',params:{id:item.id}})" class="btn btn-flat btn-info btn-sm"><i class="fa fa-pencil"></i> Editar</button>
                                                                    <button @click="$router.push({ name: 'usuario.permiso', params: { id: item.id } })" class="btn btn-flat btn-success btn-sm"><i class="fa fa-key"></i> Permiso</button>
                                                                    <button class="btn btn-flat btn-danger btn-sm" @click.prevent="setCambiarEstadoUsuario(1,item.id)"><i class="fa fa-trash"></i> Desactivar</button>
                                                                </template>
                                                                <template v-else>
                                                                    <button class="btn btn-flat btn-success btn-sm" @click.prevent="setCambiarEstadoUsuario(2, item.id)"><i class="fa fa-check-circle"></i> Activar</button>
                                                                </template>
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
                                                                    <a href="#" aria-controls="example1" @click.prevent="prevPage">Previous</a>
                                                                </li>
                                                                <li :class="[page == pageNumber ? 'paginate_button active' : '']" v-for="(page, index) in pagesList" :key="index">
                                                                    <a href="#" aria-controls="example1" @click.prevent="selectedPage(page)">{{ page + 1 }}</a>
                                                                </li>
                                                                <li class="paginate_button next" v-if="pageNumber < pageCount - 1">
                                                                    <a href="#" aria-controls="example1" @click.prevent="nextPage">Next</a>
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
        </section>
</template>

<script>
export default {
    beforeEnter() {
        if (!usuario.firstname) {
               this.$router.push({ name: 'login' })
        }
    },
    data() {
        return {
            fillBsqUsuario: {
                cNombre: '',
                cUsuaro: '',
                cCorreo: '',
                cEstado:''
            },
            listUsuarios: [],
            listEstados: [
                { value: 'A', label: 'Activo' },
                { value: 'I', label: 'Inactivo' }
            ],
            fullScreenLoading: false,
            pageNumber: 0,
            perPage:5
        }
    },
    computed: {
        // Obtener el número de páginas
        pageCount() {
            let a = this.listUsuarios.length,
                b = this.perPage;

            return Math.ceil(a / b);
        },
        //Obtener registro paginados
        listarUsuariosPaginated() {
            let inicio  = this.pageNumber * this.perPage,
                fin = inicio + this.perPage;
            return this.listUsuarios.slice(inicio, fin);
        },
        pagesList() {
            let a = this.listUsuarios.length,
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
            this.fillBsqUsuario.cNombre = '';
            this.fillBsqUsuario.cUsuaro = '';
            this.fillBsqUsuario.cCorreo = '';
            this.fillBsqUsuario.cEstado = '';
        },
        limpiarBandejaUsuarios() {
            this.listUsuarios = [];
        },
        getListUsuarios() {
            this.fullScreenLoading = true;
            var url = '/administracion/usuario/getListUsuarios';
            axios.get(url, {
                params: {
                    'cNombre': this.fillBsqUsuario.cNombre,
                    'cUsuario': this.fillBsqUsuario.cUsuaro,
                    'cCorreo': this.fillBsqUsuario.cCorreo,
                    'cEstado': this.fillBsqUsuario.cEstado
                }
            }).then((response) => {
                this.inicializarPaginacion();
                this.listUsuarios = response.data;
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
        setCambiarEstadoUsuario(op, id) {
            Swal.fire({
                title: '¿Esta seguro de ' + ((op == 1) ? 'desactivar' : 'activar') + ' el usuario?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: ((op == 1) ? 'Si, desactivar' : 'Si, activar')
            }).then((result) => {
                if (result.isConfirmed) {
                    /* Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    ) */
                    this.fullScreenLoading = true;
                    var url = '/administracion/usuario/setCambiaEstadoUsuario';
                    axios.post(url, {
                        'nIdUsuario': id,
                        'cEstado': (op == 1) ? 'I':'A'
                    }).then(response => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Se '+ ((op == 1) ? 'desactivo':'activo') + 'el usuario',
                            showConfirmButton: false,
                            timer:1200
                        })
                        this.getListUsuarios();
                    }).catch(error => {
                        console.log(error);
                    });
                }
            })
        }
    }
}
</script>

<style></style>
