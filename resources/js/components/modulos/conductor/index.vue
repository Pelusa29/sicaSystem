<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Conductores</h1>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="box-header">
                            <div class="col-md-2 row">
                                <router-link class="btn btn-block btn-info" :to="'/conductor/crear'">
                                    <i class="fa fa-plus"></i>&nbsp;&nbsp;Nuevo Conductor
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
                                                        <label class="col-md-3 col-form-label">Nombre Conductor:</label>
                                                        <div class="col-md-9">
                                                            <el-input placeholder="Nombre Agente" v-model="fillBsqConductor.cNombre"
                                                                    @keyup.enter="getListConductores"></el-input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label">Fecha Nacimiento</label>
                                                        <div class="col-md-9">
                                                            <el-date-picker style="width: 100%;"
                                                                v-model="fillBsqConductor.cFechaNacimiento" type="date"
                                                                placeholder="Seleccionar Fecha Nacimiento" format="dd-MM-yyyy"
                                                                value-format="yyyy-MM-dd">
                                                            </el-date-picker>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label">Estado</label>
                                                        <div class="col-md-9">
                                                            <el-select
                                                            v-model="fillBsqConductor.cEstado"
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
                                                <button class="btn btn-flat btn-info btnWidth"
                                                    @click.prevent="getListConductores()"
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
                                    <template v-if="listarConductoresPaginated.length">
                                        <div class="box-body table-responsive">
                                            <table
                                                class="table table-bordered table-striped dataTable table-head-fixed text-nowrap projects"
                                                role="grid">
                                                <thead>
                                                    <tr>
                                                        <th>Conductor</th>
                                                        <th>Fecha Nacimiento</th>
                                                        <th>conductor Emergencia</th>
                                                        <th>Estado</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(item, index) in listarConductoresPaginated" :key="index">
                                                        <td v-text="item.nombreCliente"></td>
                                                        <td v-text="item.fechaNacimiento"></td>
                                                        <td v-text="item.nombreEmergencia"></td>
                                                        <td>
                                                            <template v-if="item.state == 'A'">
                                                                <span class="badge bg-green" v-text="item.state_detail"></span>
                                                            </template>
                                                            <template v-else>
                                                                <span class="badge bg-red" v-text="item.state_detail"></span>
                                                            </template>
                                                        </td>
                                                        <td>
                                                            <template v-if="item.state == 'A'">
                                                                <button
                                                                    @click="$router.push({ name: 'conductor.editar', params: { id: item.id } })"
                                                                    class="btn btn-flat btn-info btn-sm"><i
                                                                        class="fa fa-pencil"></i> Editar</button>
                                                                <button class="btn btn-flat btn-danger btn-sm"
                                                                    @click.prevent="setCambiarEstadoConductor(1, item.id)"><i
                                                                        class="fa fa-trash"></i> Desactivar</button>
                                                            </template>
                                                            <template v-else>
                                                                <button class="btn btn-flat btn-success btn-sm"
                                                                    @click.prevent="setCambiarEstadoConductor(2, item.id)"><i
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
    data() {
        return {
            fillBsqConductor: {
                cNombre: '',
                cFechaNacimiento: '',
                cEstado:''
            },
            listConductores: [],
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
            let a = this.listConductores.length,
                b = this.perPage;

            return Math.ceil(a / b);
        },
        //Obtener registro paginados
        listarConductoresPaginated() {
            let inicio = this.pageNumber * this.perPage,
                fin = inicio + this.perPage;
            return this.listConductores.slice(inicio, fin);
        },
        pagesList() {
            let a = this.listConductores.length,
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
            this.fillBsqConductor.cNombre = '';
            this.fillBsqConductor.cFechaNacimiento = '';
            this.fillBsqConductor.cEstado = '';
        },
        getListConductores() {
            this.fullScreenLoading = true;
            var url = '/administracion/conductor/getListConductores';
            axios.get(url, {
                params: {
                    'cNombre': this.fillBsqConductor.cNombre,
                    'cFechaNacimiento': this.fillBsqConductor.cFechaNacimiento,
                    'cEstado': this.fillBsqConductor.cEstado
                }
            }).then((response) => {
                this.inicializarPaginacion();
                this.listConductores = response.data;
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
        setCambiarEstadoConductor(op, id) {
            Swal.fire({
                title: '¿Esta seguro de ' + ((op == 1) ? 'desactivar' : 'activar') + ' el conductor?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: ((op == 1) ? 'Si, desactivar' : 'Si, activar')
            }).then((result) => {
                if (result.isConfirmed) {
                    this.fullScreenLoading = true;
                    var url = '/administracion/conductor/setCambiaEstadoConductor';
                    axios.post(url, {
                        'nIdConductor': id,
                        'cEstado': (op == 1) ? 'I' : 'A'
                    }).then(response => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Se ' + ((op == 1) ? 'desactivo' : 'activo') + ' el conductor',
                            showConfirmButton: false,
                            timer: 1200
                        })
                        this.getListConductores();
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
