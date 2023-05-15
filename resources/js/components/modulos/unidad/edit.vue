<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Editar Asignación de Unidad</h1>
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
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Unidad:</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Unidad"
                                                                    v-model="fillEditarUnidad.cUnidad"
                                                                    @keyup.enter="setEditarUnidad"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-md-3 col-form-label">Cliente:</label>
                                                        <div class="col-md-9">
                                                            <el-select v-model="fillEditarUnidad.nIdCliente"
                                                                placeholder="Seleccione Cliente" filterable clearable>
                                                                <el-option v-for="item in listaClientes" :key="item.value"
                                                                    :label="item.label" :value="item.value">
                                                                </el-option>
                                                            </el-select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Tipo Unidad:</label>
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
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Modelo:</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Modelo"
                                                                    v-model="fillEditarUnidad.cModelo"
                                                                    @keyup.enter="setEditarUnidad"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Marca:</label>
                                                            <div class="col-md-9">
                                                                <el-input v-model="fillEditarUnidad.cMarca"
                                                                    @keyup.enter="setEditarUnidad"
                                                                    placeholder="Marca"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Número de Serie:</label>
                                                            <div class="col-md-9">
                                                                <el-input v-model="fillEditarUnidad.cNuSerie"
                                                                    @keyup.enter="setEditarUnidad"
                                                                    placeholder="Número Serie"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Valor Actual
                                                                Unidad</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Valor Actual Unidad ($)"
                                                                    @keypress="onlyNumber($event)"
                                                                    v-model.number="fillEditarUnidad.cValorUnidad"
                                                                    type="number" clearable>
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
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
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Listado de
                                                                Placas:</label>
                                                            <div class="col-md-9">
                                                                <el-select v-model="fillEditarUnidad.cnIdPlaca"
                                                                    placeholder="Seleccione Una Placa" filterable>
                                                                    <el-option v-for="item in listPlacas" :key="item.value"
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
                                            <div class="box-header with-border text-center">
                                                <h4 class="box-title">Elegir Seguro</h4>
                                            </div>
                                            <div class="row hidden-md-up">
                                                <div v-for="(item, index) in listSeguros" :key="index" class="col-md-3">
                                                    <div class="box box-info box-solid">
                                                        <div class="box-header with-border text-center">
                                                            <h4 class="box-title">{{ item.aseguradora }}</h4>
                                                        </div>
                                                        <div class="box-body text-center">
                                                            <h6 class="box-subtitle text-box-subtitle">{{ item.cobertura }}
                                                            </h6>
                                                            <p class="box-text text-box-description">${{ item.pagoSeguro }}
                                                            </p>
                                                            <div class="chekboc">
                                                                <label for="chkSeguro">
                                                                    <input type="checkbox"
                                                                        v-model="fillEditarUnidad.chkSeguro"
                                                                        :id="'seguro_' + item.id" :value="item.id" />
                                                                    Selección
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    props: ['id'],
    data() {
        return {
            fillEditarUnidad: {
                nIdUnidad: this.id,
                cUnidad: '',
                cOpUnidad: '',
                cMarca: '',
                cModelo: '',
                cCostoSeguro: '',
                cValorUnidad: '',
                cTipoCombustible: '',
                cnIdPlaca: '',
                nIdCliente: '',
                cNuSerie: '',
                chkSeguro: [],
                seguro_id:''
            },
            listTipoUnidades: [],
            listSeguros: [],
            listCombustible: [
                { value: 'Diesel', label: 'Diesel' },
                { value: 'Gasolina', label: 'Gasolina' }
            ],
            listaClientes: [],
            listPlacas: [],
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
                this.fillEditarUnidad.cUnidad           = response.data[0].unidad;
                this.fillEditarUnidad.cOpUnidad         = response.data[0].truck_id;
                this.fillEditarUnidad.nIdCliente        = response.data[0].cliente_id;
                this.fillEditarUnidad.cMarca            = response.data[0].marcaUnidad;
                this.fillEditarUnidad.cModelo           = response.data[0].modeloUnidad;
                this.fillEditarUnidad.cNuSerie          = response.data[0].noserie;
                this.fillEditarUnidad.cValorUnidad      = response.data[0].valorActualunidad;
                this.fillEditarUnidad.cTipoCombustible  = response.data[0].tipoCombustible;
                this.fillEditarUnidad.cnIdPlaca         = response.data[0].placa_id;
                this.fillEditarUnidad.chkSeguro[0]      = response.data[0].seguro_id;

                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        onlyNumber($event) {
            //console.log($event.keyCode); //keyCodes value
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
            this.fillEditarUnidad.cValorUnidad = '';
            this.fillEditarUnidad.cTipoCombustible = '';
            this.fillEditarUnidad.nIdCliente = '';
            this.fillEditarUnidad.cnIdPlaca = '';
            this.fillEditarUnidad.chkSeguro = [];
            this.fillEditarUnidad.cNuSerie = '';
        },
        setEditarUnidad() {
            if (this.validarRegistrarUnidad()) {
                this.modalShow = true;
                return;
            }

            this.fullScreenLoading = true;
            var url = '/configuracion/unidad/setEditarUnidad';

            axios.post(url, {
                'nIdUnidad': this.fillEditarUnidad.nIdUnidad,
                'cUnidad': this.fillEditarUnidad.cUnidad,
                'cOpUnidad': this.fillEditarUnidad.cOpUnidad,
                'cMarca': this.fillEditarUnidad.cMarca,
                'cModelo': this.fillEditarUnidad.cModelo,
                'cValorUnidad': this.fillEditarUnidad.cValorUnidad,
                'cTipoCombustible': this.fillEditarUnidad.cTipoCombustible,
                'cnIdPlaca': this.fillEditarUnidad.cnIdPlaca,
                'nIdSeguro': this.fillEditarUnidad.chkSeguro[0],
                'nIdCliente': this.fillEditarUnidad.nIdCliente,
                'cNuSerie': this.fillEditarUnidad.cNuSerie

            }).then((response) => {
                this.fullScreenLoading = false;
                Swal.fire({
                    icon: "success",
                    text: "Unidad Registrada Correctamente!",
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
                this.getListadoPlacas(this.fillEditarUnidad.cnIdPlaca);
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        getListadoPlacas(placa_id) {
            this.fullScreenLoading = true;
            var url = '/configuracion/placa/getListadoPlacas';
            axios.get(url, {
                    params: {
                        'cnIdPlaca': placa_id
                    }
                }).then((response) => {
                this.listPlacas = response.data;
                this.fullScreenLoading = false;
                this.getListadoClientes();
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        getListadoClientes() {
            this.fullScreenLoading = true;
            var url = '/administracion/cliente/getListadoClientestotal';
            axios.get(url).then((response) => {
                this.listaClientes = response.data;
                this.fullScreenLoading = false;
                this.getSeguros();
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        getSeguros() {
            this.fullScreenLoading = true;
            var url = '/configuracion/seguro/getListadoSeguros';
            axios.get(url).then((response) => {
                this.listSeguros = response.data;
                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        validarRegistrarUnidad() {
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

            if (!this.fillEditarUnidad.cValorUnidad) {
                this.mensajeError.push("El Valor de Unidad es un campo obligatorio.");
            }

            if (!this.fillEditarUnidad.cTipoCombustible) {
                this.mensajeError.push("El Tipo de Combustible es un campo obligatorio.");
            }

            if (!this.fillEditarUnidad.nIdCliente) {
                this.mensajeError.push("Debe seleccionar al menos un tipo de cliente");
            }

            if (this.fillEditarUnidad.chkSeguro.length > 1 || this.fillEditarUnidad.chkSeguro.length == 0) {
                this.mensajeError.push("Debe Seleccionar solo un seguro para la unidad");
            }

            if (this.mensajeError.length) {
                this.error = 1;
            }

            return this.error;
        }
    }
}
</script>

<style>
.chekboc {
    position: relative;
    margin: auto;
    top: 0;
    bottom: 0;
}

.chekboc input[type="checkbox"] {
    appearance: none;
    -webkit-appearance: none;
    height: 20px;
    width: 20px;
    background-color: #d5d5d5;
    border-radius: 5px;
    cursor: pointer;
    align-items: center;
    justify-content: center;
    outline: none;
}

.chekboc label {
    color: #4c4c4c;
    font-size: 18px;
    font-family: Poppins;
    cursor: pointer;
}

.chekboc input[type="checkbox"]::after {
    font-family: Font Awesome 5 free;
    font-weight: 900;
    content: "";
    font-size: 20px;
    color: white;
    display: none;
}

.chekboc input[type="checkbox"]:hover {
    background-color: #a5a5a5;
}

.chekboc input[type="checkbox"]:checked {
    background-color: #5bcd3e;
    width: 20px;
    height: 20px;
    border-width: 4px 4px 4px 4px;
}

.chekboc input[type="checkbox"]:checked::after {
    display: block;
}</style>
