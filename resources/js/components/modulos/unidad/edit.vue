<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Editar Unidad</h1>
                    </section>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="box-header">
                                <div class="col-sm-2 row">
                                    <button @click="$router.push('/unidad')" class="btn btn-block btn-info"><i
                                            class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Regresar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="box box-info box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Editar de Unidad</h3>
                                        </div>
                                        <div class="box-body">
                                            <form role="form">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Unidad</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control"
                                                                    v-model="fillEditarUnidad.cUnidad"
                                                                    @keyup.enter="setEditarUnidad">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Tipo Unidad</label>
                                                            <div class="col-md-9">
                                                                <el-select v-model="fillEditarUnidad.cOpUnidad" filterable
                                                                    placeholder="Seleccione un Unidad">
                                                                    <el-option v-for="item in listTipoUnidades"
                                                                        :key="item.value" :label="item.label"
                                                                        :value="item.value">
                                                                    </el-option>
                                                                </el-select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Marca</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control"
                                                                    v-model="fillEditarUnidad.cMarca"
                                                                    @keyup.enter="setEditarUnidad">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Modelo</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control"
                                                                    v-model="fillEditarUnidad.cModelo"
                                                                    @keyup.enter="setEditarUnidad">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Fecha Vencimiento
                                                                Seguro</label>
                                                            <div class="col-md-9">
                                                                <el-date-picker style="width: 100%;"
                                                                    v-model="fillEditarUnidad.cFechaVencimientoSeguro"
                                                                    type="date"
                                                                    placeholder="Seleccionar Fecha de Vencimiento"
                                                                    format="dd-MM-yyyy" value-format="yyyy-MM-dd">
                                                                </el-date-picker>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Costo Seguro</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="$" @keypress="isNumber($event)"
                                                                    v-model.number="fillEditarUnidad.cCostoSeguro"
                                                                    type="number" clearable>
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Valor Actual
                                                                Unidad</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="$" @keypress="isNumber($event)"
                                                                    v-model.number="fillEditarUnidad.cValorUnidad"
                                                                    type="number" clearable>
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Tipo Combustible</label>
                                                            <div class="col-md-9">
                                                                <el-select v-model="fillEditarUnidad.cTipoCombustible"
                                                                    placeholder="Seleccione Combustible" clearable>
                                                                    <el-option v-for="item in listCombustible"
                                                                        :key="item.value" :label="item.label"
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
                                                        @click.prevent="setEditarUnidad()"
                                                        v-loading.fullscreen.lock="fullScreenLoading">Editar</button>
                                                    <button class="btn btn-flat btn-default btnWidth"
                                                        @click.prevent="limpiarCriteriosBsq()">Limpiar</button>
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
    props:['id'],
    data() {
        return {
            fillEditarUnidad: {
                nIdUnidad:this.id,
                cUnidad: '',
                cOpUnidad: '',
                cMarca: '',
                cModelo: '',
                cFechaVencimientoSeguro: '',
                cCostoSeguro: '',
                cValorUnidad: '',
                cTipoCombustible: ''
            },
            listTipoUnidades: [],
            listCombustible: [
                { value: 'Diesel', label: 'Diesel' },
                { value: 'Gasolina', label: 'Gasolina' }
            ],
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
        this.getUnidadById();
        this.getListadoTipoUnidades();
    },
    methods: {
        getUnidadById() {
            this.fullScreenLoading = true;
            var url = '/configuracion/unidad/getUnidadById';
            axios.get(url, {
                params: {
                    'nIdUnidad': this.fillEditarUnidad.nIdUnidad
                }
            }).then((response) => {
                //this.listUsuarios = response.data;
                this.fillEditarUnidad.cUnidad = response.data[0].unidad;
                this.fillEditarUnidad.cOpUnidad = response.data[0].truck_id;
                this.fillEditarUnidad.cMarca = response.data[0].marcaUnidad;
                this.fillEditarUnidad.cModelo = response.data[0].modeloUnidad;
                this.fillEditarUnidad.cFechaVencimientoSeguro = response.data[0].fechaVencimientoSeguro;
                this.fillEditarUnidad.cCostoSeguro = response.data[0].costoSeguro;
                this.fillEditarUnidad.cValorUnidad = response.data[0].valorActualunidad;
                this.fillEditarUnidad.cTipoCombustible = response.data[0].tipoCombustible;
                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        onlyNumber($event) {
            let keyCode = ($event.keyCode ? $event.keyCode : $event.which);
            if ((keyCode < 48 || keyCode > 57) && keyCode !== 46) { // 46 is dot
                $event.preventDefault();
            }
        },
        abrirModal() {
            this.modalShow = !this.modalShow;
        },
        limpiarCriteriosBsq() {
            this.fillEditarUnidad.cUnidad = '';
            this.fillEditarUnidad.cOpUnidad = '';
            this.fillEditarUnidad.cMarca = '';
            this.fillEditarUnidad.cModelo = '';
            this.fillEditarUnidad.cFechaVencimientoSeguro = '';
            this.fillEditarUnidad.cCostoSeguro = '';
            this.fillEditarUnidad.cValorUnidad = '';
            this.fillEditarUnidad.cTipoCombustible = '';
        },
        setEditarUnidad() {
            if (this.validarEditarUnidad()) {
                this.modalShow = true;
                return;
            }

            this.fullScreenLoading = true;
            var url = '/configuracion/unidad/setEditarUnidad';

            axios.post(url, {
                'nIdUnidad' : this.fillEditarUnidad.nIdUnidad,
                'cUnidad': this.fillEditarUnidad.cUnidad,
                'cOpUnidad': this.fillEditarUnidad.cOpUnidad,
                'cMarca': this.fillEditarUnidad.cMarca,
                'cModelo': this.fillEditarUnidad.cModelo,
                'cFechaVencimientoSeguro': this.fillEditarUnidad.cFechaVencimientoSeguro,
                'cCostoSeguro': this.fillEditarUnidad.cCostoSeguro,
                'cValorUnidad': this.fillEditarUnidad.cValorUnidad,
                'cTipoCombustible': this.fillEditarUnidad.cTipoCombustible
            }).then((response) => {
                this.fullScreenLoading = false;
                Swal.fire({
                    icon: "success",
                    text: "Unidad Actualizada Correctamente!",
                    type: "warning",
                    showDenyButton: false,
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.$router.push('/unidad');
                    }
                });

            }).catch((error) => {
                this.fullScreenLoading = false;
                Swal.fire({
                    icon: "error",
                    text: error,
                    type: "warning",
                    showDenyButton: false,
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                    }
                });
            }).finally(() => {
                console.log('finally');
            });
        },
        getListadoTipoUnidades() {
            this.fullScreenLoading = true;
            var url = '/configuracion/unidad/getListadoTipoUnidades';
            axios.get(url).then((response) => {
                this.listTipoUnidades = response.data;
                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        validarEditarUnidad() {
            this.error = 0;
            this.mensajeError = [];


            if (!this.fillEditarUnidad.cUnidad) {
                this.mensajeError.push("El campo Unidad es obligatorio");
            }
            if (!this.fillEditarUnidad.cOpUnidad) {
                this.mensajeError.push("El Tipo de Unidad es un campo obligatorio");
            }
            if (!this.fillEditarUnidad.cMarca) {
                this.mensajeError.push("La Marca es un campo obligatorio");
            }

            if (!this.fillEditarUnidad.cModelo) {
                this.mensajeError.push("El Modelo es un campo obligatorio");
            }

            if (!this.fillEditarUnidad.cFechaVencimientoSeguro) {
                this.mensajeError.push("La Fecha de Vencimiento Seguro es un campo obligatorio.");
            }

            if (!this.fillEditarUnidad.cCostoSeguro) {
                this.mensajeError.push("El Costo del Seguro es un campo obligatorio.");
            }

            if (!this.fillEditarUnidad.cValorUnidad) {
                this.mensajeError.push("El Valor de Unidad es un campo obligatorio.");
            }

            if (!this.fillEditarUnidad.cTipoCombustible) {
                this.mensajeError.push("El Tipo de Combustible es un campo obligatorio.");
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
