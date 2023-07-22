<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Bancos</h1>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="box-header">
                            <div class="col-md-2 row">
                                <router-link class="btn btn-block btn-info" :to="'/banco/crear'">
                                    <i class="fa fa-plus"></i>&nbsp;&nbsp;Nuevo Banco
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
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label">Nombre Banco:</label>
                                                        <div class="col-md-9">
                                                            <el-input placeholder="Nombre Banco"
                                                                v-model="fillBsqBanco.cNombre"
                                                                @keyup.enter="getListBancos"></el-input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label">Número de Cuenta</label>
                                                        <div class="col-md-9">
                                                             <el-input placeholder="número Cuenta"
                                                                    v-model="fillBsqBanco.cNumcuenta"
                                                                    @keyup.enter="getListBancos"></el-input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label">Estado</label>
                                                        <div class="col-md-9">
                                                            <el-select v-model="fillBsqBanco.cEstado"
                                                                placeholder="Seleccione un Estado" clearable>
                                                                <el-option v-for="item in listEstados" :key="item.value"
                                                                    :label="item.label" :value="item.value">
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
                                                <button class="btn btn-flat btn-info btnWidth"
                                                    @click.prevent="getListBancos()"
                                                    v-loading.fullscreen.lock="fullScreenLoading">Buscar</button>
                                                <button class="btn btn-flat btn-default btnWidth"
                                                    @click.prevent="limpiarCriteriosBsq()">Limpiar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box box-info box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Resultados</h3>
                                    </div>
                                    <template v-if="listarBancosPaginated.length">
                                        <div class="box-body table-responsive">
                                            <table
                                                class="table table-bordered table-striped dataTable table-head-fixed text-nowrap projects"
                                                role="grid">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre Banco</th>
                                                        <th>Cuenta</th>
                                                        <th>Tipo de Cuenta</th>
                                                        <th>Estado</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(item, index) in listarBancosPaginated" :key="index">
                                                        <td v-text="item.nombreBanco"></td>
                                                        <td v-text="item.numCuenta"></td>
                                                        <td v-text="item.tipoCuenta"></td>
                                                        <td>
                                                            <template v-if="item.state == 'A'">
                                                                <span class="badge bg-green"
                                                                    v-text="item.state_detail"></span>
                                                            </template>
                                                            <template v-else>
                                                                <span class="badge bg-red"
                                                                    v-text="item.state_detail"></span>
                                                            </template>
                                                        </td>
                                                        <td>
                                                            <template v-if="item.state == 'A'">
                                                                <button
                                                                    @click="$router.push({ name: 'banco.editar', params: { id: item.id } })"
                                                                    class="btn btn-flat btn-info btn-sm"><i
                                                                        class="fa fa-pencil"></i> Editar</button>
                                                                <button class="btn btn-flat btn-danger btn-sm"
                                                                    @click.prevent="setCambiarEstadoBanco(1, item.id)"><i
                                                                        class="fa fa-trash"></i> Desactivar</button>
                                                            </template>
                                                            <template v-else>
                                                                <button class="btn btn-flat btn-success btn-sm"
                                                                    @click.prevent="setCambiarEstadoBanco(2, item.id)"><i
                                                                        class="fa fa-check-circle"></i> Activar</button>
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
                                            <h5>No se encontraron registros</h5>
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
    data() {
        return {
            fillBsqBanco: {
                cNombre: '',
                cNumcuenta: '',
                cEstado: ''
            },
            listBancos: [],
            listEstados: [
                { value: 'A', label: 'Activo' },
                { value: 'I', label: 'Inactivo' }
            ],
            fullScreenLoading: false,
            pageNumber: 0,
            perPage: 5
        }
    },
    computed: {
        // Obtener el número de páginas
        pageCount() {
            let a = this.listBancos.length,
                b = this.perPage;

            return Math.ceil(a / b);
        },
        //Obtener registro paginados
        listarBancosPaginated() {
            let inicio = this.pageNumber * this.perPage,
                fin = inicio + this.perPage;
            return this.listBancos.slice(inicio, fin);
        },
        pagesList() {
            let a = this.listBancos.length,
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
            this.fillBsqBanco.cNombre = '';
            this.fillBsqBanco.cNumcuenta = '';
            this.fillBsqBanco.cEstado = '';
        },
        getListBancos() {
            this.fullScreenLoading = true;
            var url = '/configuracion/banco/getListBancos';
            axios.get(url, {
                params: {
                    'cNombre': this.fillBsqBanco.cNombre,
                    'cFechaNacimiento': this.fillBsqBanco.cNumcuenta,
                    'cEstado': this.fillBsqBanco.cEstado
                }
            }).then((response) => {
                this.inicializarPaginacion();
                this.listBancos = response.data;
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
        setCambiarEstadoBanco(op, id) {
            Swal.fire({
                title: '¿Esta seguro de ' + ((op == 1) ? 'desactivar' : 'activar') + ' el Banco?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: ((op == 1) ? 'Si, desactivar' : 'Si, activar')
            }).then((result) => {
                if (result.isConfirmed) {
                    this.fullScreenLoading = true;
                    var url = '/configuracion/banco/setCambiarEstadoBanco';
                    axios.post(url, {
                        'nIdBanco': id,
                        'cEstado': (op == 1) ? 'I' : 'A'
                    }).then(response => {

                        console.log(response);
                        Swal.fire({
                            icon: 'success',
                            title: 'Se ' + ((op == 1) ? 'desactivo' : 'activo') + ' el cliente',
                            showConfirmButton: false,
                            timer: 1200
                        })
                        this.getListBancos();
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
