<template>
  <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Tipo de Unidades</h1>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="box-header">
                                <div class="col-md-2 row">
                                    <router-link class="btn btn-block btn-info" :to="'/tipounidades/crear'">
                                        <i class="fa fa-plus"></i>&nbsp;&nbsp;Nueva Unidad
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
                                                            <label class="col-md-3 col-form-label">Descripción</label>
                                                            <div class="col-md-9">
                                                                <el-input  v-model="fillBsqTipoUnidad.cDescripcion"
                                                                    @keyup.enter="getListTipoUnidades"
                                                                    placeholder="Descripción"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Tipo de Transmisión</label>
                                                            <div class="col-md-9">
                                                                <el-select
                                                                    v-model="fillBsqTipoUnidad.cTransmision"
                                                                    placeholder="Seleccione un Tipo de Unidad"
                                                                    @keyup.enter="getListTipoUnidades"
                                                                    clearable>
                                                                    <el-option
                                                                        v-for="item in listTiposU"
                                                                        :key="item.value"
                                                                        :label="item.label"
                                                                        :value="item.value">
                                                                    </el-option>
                                                                </el-select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Fecha</label>
                                                            <div class="col-md-9">
                                                                <el-date-picker
                                                                    style="width: 100%;"
                                                                    v-model="fillBsqTipoUnidad.cFecha"
                                                                    type="date"
                                                                    placeholder="Seleccionar Fecha"
                                                                    format="dd-MM-yyyy"
                                                                    value-format="yyyy-MM-dd">
                                                                </el-date-picker>
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
                                                        @click.prevent="getListTipoUnidades()"
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
                                        <template v-if="listarTipoUnidadesPaginated.length">
                                            <div class="box-body table-responsive">
                                                <table
                                                    class="table table-bordered table-striped dataTable table-head-fixed text-nowrap projects"
                                                    role="grid">
                                                    <thead>
                                                        <tr>
                                                            <th>Descripción</th>
                                                            <th>Tipo unidad</th>
                                                            <th>Transmisión</th>
                                                            <th>Renta</th>
                                                            <th>Fecha</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="(item, index) in listarTipoUnidadesPaginated" :key="index">
                                                            <td v-text="item.descripcionTipoUnidad"></td>
                                                            <td v-text="item.descripcion_giro"></td>
                                                            <td v-text="item.transmisionTipoUnidad"></td>
                                                            <td v-text="item.totalRentaTipoUnidad"></td>
                                                            <td v-text="item.fechaRenta"></td>
                                                            <td>
                                                                <button @click="$router.push({ name: 'tipounidades.editar', params: { id: item.id } })" class="btn btn-flat btn-info btn-sm"><i class="fa fa-pencil"></i> Editar</button>
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
            fillBsqTipoUnidad: {
                cDescripcion: '',
                cTransmision: '',
                cFecha: ''
            },
            listTiposU: [
                { value: 'Manual', label: 'Manual' },
                { value: 'Automatica', label: 'Automatica' }
            ],
            listTipoUnidades: [],
            fullScreenLoading: false,
            pageNumber: 0,
            perPage: 5
        }
    },
    computed: {
         // Obtener el número de páginas
        pageCount() {
            let a = this.listTipoUnidades.length,
                b = this.perPage;

            return Math.ceil(a / b);
        },
        //Obtener registro paginados
        listarTipoUnidadesPaginated() {
            let inicio = this.pageNumber * this.perPage,
                fin = inicio + this.perPage;
            return this.listTipoUnidades.slice(inicio, fin);
        },
        pagesList() {
            let a = this.listTipoUnidades.length,
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
            this.fillBsqTipoUnidad.cDescripcion = '';
            this.fillBsqTipoUnidad.cTransmision = '';
            this.fillBsqTipoUnidad.cFecha = '';
        },
        getListTipoUnidades() {
            this.fullScreenLoading = true;
            var url = '/configuracion/catunidades/getListTipoUnidades';
            axios.get(url, {
                params: {
                    'cDescripcion': this.fillBsqTipoUnidad.cDescripcion,
                    'cTransmision': this.fillBsqTipoUnidad.cTransmision,
                    'cFecha': this.fillBsqTipoUnidad.cFecha
                }
            }).then((response) => {
                this.inicializarPaginacion();
                this.listTipoUnidades = response.data;
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
        }
    }
}
</script>

<style>

</style>
