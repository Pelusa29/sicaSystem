<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Contratos Generados</h1>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="box-header">
                            <div class="col-md-2 row">
                                <router-link class="btn btn-block btn-info" :to="'/contratotaxi/crear'">
                                    <i class="fa fa-plus"></i>&nbsp; Nuevo Contrato
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
                                                        <label class="col-md-3 col-form-label">Conductor</label>
                                                        <div class="col-md-9">
                                                            <el-input placeholder="Nombre Conductor" v-model="fillBsqContrato.cConductor"
                                                                @keyup.enter="getListContratostaxi"></el-input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label">Fecha Inicio
                                                            Contrato</label>
                                                        <div class="col-md-9">
                                                            <el-date-picker style="width: 100%;"
                                                                v-model="fillBsqContrato.cFechaInicioContrato" type="date"
                                                                placeholder="Seleccionar Fecha de Venciminto" format="dd-MM-yyyy"
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
                                                    @click.prevent="getListContratostaxi()"
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
                                    <template v-if="listarContratosPaginated.length">
                                        <div class="box-body table-responsive">
                                            <table
                                                class="table table-bordered table-striped dataTable table-head-fixed text-nowrap projects"
                                                role="grid">
                                                <thead>
                                                    <tr>
                                                        <th>Cliente</th>
                                                        <th>Importe Renta</th>
                                                        <th>Fecha Inicio Contrato</th>
                                                        <th>Estado</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(item, index) in listarContratosPaginated" :key="index">
                                                        <td v-text="item.cliente"></td>
                                                        <td v-text="item.importeRenta"></td>
                                                        <td v-text="item.fechaInicioContrato"></td>
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
                                                            <button
                                                                @click="$router.push({ name: 'contratotaxi.editar', params: { id: item.id } })"
                                                                class="btn btn-flat btn-info btn-sm"><i
                                                                class="fa fa-pencil"></i> Editar</button>
                                                            <button
                                                                @click="$router.push({ name: 'contratotaxi.ver', params: { id: item.id } })"
                                                                class="btn btn-flat btn-success btn-sm"><i
                                                                class="fa fa-eye"></i> Detalle</button>
                                                            <button
                                                                @click.prevent="setGenerardocumento(item.id)"
                                                                class="btn btn-flat btn-info btn-sm"><i
                                                                class="fa fa-file-pdf-o"></i> Imprimir</button>
                                                            <button
                                                                    @click="$router.push({ name: 'contratotaxi.doclist', params: { id: item.id } })"
                                                                    class="btn btn-flat btn-warning btn-sm"><i
                                                                        class="fa fa-list-ol"></i> Documentos</button>
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
            fillBsqContrato: {
                cConductor: '',
                cFechaInicioContrato: ''
            },
            listContratos: [],
            fullScreenLoading: false,
            pageNumber: 0,
            perPage: 5
        }
    },
    computed: {
        // Obtener el número de páginas
        pageCount() {
            let a = this.listContratos.length,
                b = this.perPage;

            return Math.ceil(a / b);
        },
        //Obtener registro paginados
        listarContratosPaginated() {
            let inicio = this.pageNumber * this.perPage,
                fin = inicio + this.perPage;
            return this.listContratos.slice(inicio, fin);
        },
        pagesList() {
            let a = this.listContratos.length,
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
        setGenerardocumento(nIdContrato) {
            this.fullScreenLoading = true;
            var config = {
                responseType:'blob'
            }
            var url = '/operacion/contrato/setGenerardocumento';
            axios.post(url, {
                'nIdContrato': nIdContrato
            },config).then((response) => {
                console.log(response);
                var oMyBlob = new Blob([response.data], { type: 'application/pdf' });
                var url = URL.createObjectURL(oMyBlob);
                window.open(url);
                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        limpiarCriteriosBsq() {
            this.fillBsqContrato.cConductor = '';
            this.fillBsqContrato.cFechaInicioContrato = '';
        },
        getListContratostaxi() {
            this.fullScreenLoading = true;
            var url = '/operacion/contrato/getListContratostaxi';
            axios.get(url, {
                params: {
                    'cConductor': this.fillBsqContrato.cConductor,
                    'cFechaInicioContrato': this.fillBsqContrato.cFechaInicioContrato
                }
            }).then((response) => {
                this.inicializarPaginacion();
                this.listContratos = response.data;
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

<style></style>
