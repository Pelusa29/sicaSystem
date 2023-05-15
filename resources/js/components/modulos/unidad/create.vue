<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Nueva Asignación de Unidad</h1>
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
                                            <h3 class="box-title">Asignar de Unidad</h3>
                                        </div>
                                        <div class="box-body">
                                            <form role="form">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Unidad:</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Unidad" v-model="fillCrearUnidad.cUnidad" @keyup.enter="setRegistraUnidad"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-md-3 col-form-label">Cliente:</label>
                                                        <div class="col-md-9">
                                                                <el-select
                                                                v-model="fillCrearUnidad.nIdCliente"
                                                                placeholder="Seleccione Cliente"
                                                                filterable clearable>
                                                                    <el-option
                                                                        v-for="item in listaClientes"
                                                                        :key="item.value"
                                                                        :label="item.label"
                                                                        :value="item.value">
                                                                    </el-option>
                                                            </el-select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Tipo Unidad:</label>
                                                            <div class="col-md-9">
                                                                <el-select v-model="fillCrearUnidad.cOpUnidad" filterable
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
                                                                <el-input placeholder="Modelo" v-model="fillCrearUnidad.cModelo" @keyup.enter="setRegistraUnidad"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Marca:</label>
                                                            <div class="col-md-9">
                                                                <el-input v-model="fillCrearUnidad.cMarca" @keyup.enter="setRegistraUnidad" placeholder="Marca"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   <!--  <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Vencimiento:</label>
                                                            <div class="col-md-9">
                                                                <el-date-picker style="width: 100%;"
                                                                    v-model="fillCrearUnidad.cFechaVencimientoSeguro" type="date"
                                                                    placeholder="Seleccionar Fecha de Vencimiento"
                                                                    format="dd-MM-yyyy" value-format="yyyy-MM-dd">
                                                                </el-date-picker>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <!-- <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Costo Seguro</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Costo($)" @keypress="onlyNumber($event)"
                                                                    v-model.number="fillCrearUnidad.cCostoSeguro"
                                                                    type="number" clearable>
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Número de Serie:</label>
                                                            <div class="col-md-9">
                                                                <el-input v-model="fillCrearUnidad.cNuSerie" @keyup.enter="setRegistraUnidad" placeholder="Número Serie"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Valor Actual Unidad</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Valor Actual Unidad ($)" @keypress="onlyNumber($event)"
                                                                    v-model.number="fillCrearUnidad.cValorUnidad"
                                                                    type="number" clearable>
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Tipo Combustible</label>
                                                            <div class="col-md-9">
                                                                    <el-select
                                                                    v-model="fillCrearUnidad.cTipoCombustible"
                                                                    placeholder="Seleccione Combustible"
                                                                    clearable>
                                                                        <el-option
                                                                            v-for="item in listCombustible"
                                                                            :key="item.value"
                                                                            :label="item.label"
                                                                            :value="item.value">
                                                                        </el-option>
                                                                </el-select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Listado de Placas:</label>
                                                            <div class="col-md-9">
                                                                    <el-select
                                                                    v-model="fillCrearUnidad.cnIdPlaca"
                                                                    placeholder="Seleccione Una Placa"
                                                                    filterable>
                                                                        <el-option
                                                                            v-for="item in listPlacas"
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
                                                        <h6 class="box-subtitle text-box-subtitle">{{item.cobertura}}</h6>
                                                        <p class="box-text text-box-description">${{item.pagoSeguro}}</p>
                                                            <div class="chekboc">
                                                                <label for="chkSeguro">
                                                                    <input type="checkbox" v-model="fillCrearUnidad.chkSeguro" :id="'seguro_' + item.id" :value="item.id"/>
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
                                                        @click.prevent="setRegistraUnidad()"
                                                        v-loading.fullscreen.lock="fullScreenLoading">Registrar</button>
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
    data() {
        return {
            fillCrearUnidad: {
                cUnidad: '',
                cOpUnidad: '',
                cMarca: '',
                cModelo: '',
                cCostoSeguro: '',
                cValorUnidad:'',
                cTipoCombustible: '',
                cnIdPlaca: '',
                nIdCliente: '',
                cNuSerie: '',
                chkSeguro:[]
            },
            listTipoUnidades: [],
            listSeguros:[],
            listCombustible: [
                { value: 'Diesel', label: 'Diesel' },
                { value: 'Gasolina', label: 'Gasolina' }
            ],
            listaClientes: [],
            listPlacas:[],
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
        this.getListadoTipoUnidades();
    },
    methods: {
        /* seleccionando(event,opt) {
            if (opt == "cliente") {
                this.fillCrearUnidad.nIdPersona = event;
                this.fillCrearUnidad.nIdConductor = '';
            } else {
                this.fillCrearUnidad.nIdPersona = event;
                this.fillCrearUnidad.nIdCliente = '';
            }
         }, */
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
            this.fillCrearUnidad.cUnidad = '';
            this.fillCrearUnidad.cOpUnidad = '';
            this.fillCrearUnidad.cMarca='';
            this.fillCrearUnidad.cModelo = '';
            this.fillCrearUnidad.cValorUnidad = '';
            this.fillCrearUnidad.cTipoCombustible = '';
            this.fillCrearUnidad.nIdCliente = '';
            this.fillCrearUnidad.cnIdPlaca = '';
            this.fillCrearUnidad.chkSeguro = [];
            this.fillCrearUnidad.cNuSerie = '';
        },
        setRegistraUnidad() {
            if (this.validarRegistrarUnidad()) {
                this.modalShow = true;
                return;
            }

            this.fullScreenLoading = true;
            var url = '/configuracion/unidad/setRegistraUnidad';

            axios.post(url, {
               'cUnidad': this.fillCrearUnidad.cUnidad,
               'cOpUnidad': this.fillCrearUnidad.cOpUnidad,
               'cMarca': this.fillCrearUnidad.cMarca,
               'cModelo': this.fillCrearUnidad.cModelo,
               'cValorUnidad': this.fillCrearUnidad.cValorUnidad,
               'cTipoCombustible': this.fillCrearUnidad.cTipoCombustible,
               'cnIdPlaca': this.fillCrearUnidad.cnIdPlaca,
               'nIdSeguro': this.fillCrearUnidad.chkSeguro[0],
               'nIdCliente': this.fillCrearUnidad.nIdCliente,
               'cNuSerie' : this.fillCrearUnidad.cNuSerie

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
                this.getListadoPlacas();
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        getListadoPlacas() {
            this.fullScreenLoading = true;
            var url = '/configuracion/placa/getListadoPlacas';
            axios.get(url).then((response) => {
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


            if (!this.fillCrearUnidad.cUnidad) {
                this.mensajeError.push("El campo Unidad es obligatorio");
            }
            if (!this.fillCrearUnidad.cOpUnidad) {
                this.mensajeError.push("El Tipo de Unidad es un campo obligatorio");
            }
            if (!this.fillCrearUnidad.cMarca) {
                this.mensajeError.push("La Marca es un campo obligatorio");
            }

            if (!this.fillCrearUnidad.cModelo) {
               this.mensajeError.push("El Modelo es un campo obligatorio");
            }

            if (!this.fillCrearUnidad.cValorUnidad) {
                this.mensajeError.push("El Valor de Unidad es un campo obligatorio.");
            }

            if (!this.fillCrearUnidad.cTipoCombustible) {
                this.mensajeError.push("El Tipo de Combustible es un campo obligatorio.");
            }

            if (!this.fillCrearUnidad.nIdCliente) {
                this.mensajeError.push("Debe seleccionar al menos un tipo de cliente");
            }

            if (this.fillCrearUnidad.chkSeguro.length > 1 || this.fillCrearUnidad.chkSeguro.length == 0) {
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
    .chekboc{
        position: relative;
        margin: auto;
        top:0;
        bottom:0;
    }
    .chekboc input[type="checkbox"]{
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
    .chekboc label{
        color: #4c4c4c;
        font-size:18px;
        font-family: Poppins;
        cursor: pointer;
    }

    .chekboc input[type="checkbox"]::after{
        font-family: Font Awesome 5 free;
        font-weight: 900;
        content:  "";
        font-size: 20px;
        color: white;
        display: none;
    }

    .chekboc input[type="checkbox"]:hover{
        background-color: #a5a5a5;
    }

    .chekboc input[type="checkbox"]:checked{
        background-color: #5bcd3e;
        width: 20px;
        height: 20px;
        border-width: 4px 4px 4px 4px;
    }
    .chekboc input[type="checkbox"]:checked::after{
        display: block;
    }

</style>
