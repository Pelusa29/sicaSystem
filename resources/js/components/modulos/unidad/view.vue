<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Detalle de Asignación de Unidad</h1>
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
                                            <h3 class="box-title">Detalle Unidad</h3>
                                        </div>
                                        <div class="box-body">
                                            <form role="form">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Unidad:</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Unidad"
                                                                    v-model="fillVerUnidad.cUnidad"
                                                                    @keyup.enter="setEditarUnidad" :disabled="true"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-md-3 col-form-label">Cliente:</label>
                                                        <div class="col-md-9">
                                                            <el-select v-model="fillVerUnidad.nIdCliente"
                                                                placeholder="Seleccione Cliente" :disabled="true">
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
                                                                <el-select v-model="fillVerUnidad.cOpUnidad"
                                                                    placeholder="Seleccione un Unidad" :disabled="true">
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
                                                                    v-model="fillVerUnidad.cModelo"
                                                                    @keyup.enter="setEditarUnidad" :disabled="true"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Marca:</label>
                                                            <div class="col-md-9">
                                                                <el-input v-model="fillVerUnidad.cMarca"
                                                                    @keyup.enter="setEditarUnidad"
                                                                    placeholder="Marca" :disabled="true"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Número de Serie:</label>
                                                            <div class="col-md-9">
                                                                <el-input v-model="fillVerUnidad.cNuSerie"
                                                                    @keyup.enter="setEditarUnidad"
                                                                    placeholder="Número Serie" :disabled="true"></el-input>
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
                                                                    v-model.number="fillVerUnidad.cValorUnidad"
                                                                    type="number" :disabled="true">
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Tipo Combustible</label>
                                                            <div class="col-md-9">
                                                                <el-select v-model="fillVerUnidad.cTipoCombustible"
                                                                    placeholder="Seleccione Combustible" :disabled="true">
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
                                                                <el-select v-model="fillVerUnidad.cnIdPlaca"
                                                                    placeholder="Seleccione Una Placa" :disabled="true">
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
                                            <div class="col-md-10">
                                                <el-descriptions class="margin-top" title="Detalle del Seguro" :column="4" border>
                                                    <el-descriptions-item>
                                                        <template slot="label">
                                                            <i class="el-icon-user"></i>
                                                            Aseguradora:
                                                        </template>
                                                        {{ this.fillVerUnidad.aseguradora }}
                                                    </el-descriptions-item>
                                                    <el-descriptions-item>
                                                        <template slot="label">
                                                            <i class="el-icon-document"></i>
                                                            Número Poliza:
                                                        </template>
                                                            <el-tag size="small">{{ this.fillVerUnidad.numPoliza }}</el-tag>
                                                    </el-descriptions-item>
                                                    <el-descriptions-item>
                                                        <template slot="label">
                                                            <i class="el-icon-date"></i>
                                                            Fecha Renovación
                                                        </template>
                                                            <el-tag size="small">{{ this.fillVerUnidad.fechaRenovacion }}</el-tag>
                                                    </el-descriptions-item>
                                                    <el-descriptions-item>
                                                        <template slot="label">
                                                            <i class="el-icon-date"></i>
                                                            Fecha Vencimieno
                                                        </template>
                                                            <el-tag size="small">{{ this.fillVerUnidad.fechaVencimiento }}</el-tag>
                                                    </el-descriptions-item>
                                                    <el-descriptions-item>
                                                        <template slot="label">
                                                            <i class="el-icon-tickets"></i>
                                                            Tipo vigencia
                                                        </template>
                                                        <el-tag size="small">{{ this.fillVerUnidad.tipoVigencia }}</el-tag>
                                                    </el-descriptions-item>
                                                    <el-descriptions-item>
                                                        <template slot="label">
                                                            <i class="el-icon-setting"></i>
                                                            Cobertura
                                                        </template>
                                                            {{ this.fillVerUnidad.cobertura }}
                                                    </el-descriptions-item>
                                                    <el-descriptions-item>
                                                        <template slot="label">
                                                            <i class="el-icon-money"></i>
                                                            Pago Seguro:
                                                        </template>
                                                            <el-tag size="small">{{ this.fillVerUnidad.pagoSeguro }}</el-tag>
                                                    </el-descriptions-item>
                                                    <el-descriptions-item>
                                                        <template slot="label">
                                                            <i class="el-icon-money"></i>
                                                            Deducble:
                                                        </template>
                                                            <el-tag size="small">{{ this.fillVerUnidad.deducible }}</el-tag>
                                                    </el-descriptions-item>
                                                </el-descriptions>
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
    </section>
</template>

<script>
export default {
    props: ['id'],
    data() {
        return {
            fillVerUnidad: {
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
                seguro_id: '',
                aseguradora: '',
                agente: '',
                numPoliza: '',
                fechaVencimiento:'',
                fechaRenovacion: '',
                pagoSeguro: '',
                deducible: '',
                tipoVigencia: '',
                cobertura:''
            },
            listTipoUnidades: [],
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
                    'nIdUnidad': this.fillVerUnidad.nIdUnidad
                }
            }).then((response) => {
                //this.listUsuarios = response.data;
                this.fillVerUnidad.cUnidad = response.data[0].unidad;
                this.fillVerUnidad.cOpUnidad = response.data[0].truck_id;
                this.fillVerUnidad.nIdCliente = response.data[0].cliente_id;
                this.fillVerUnidad.cMarca = response.data[0].marcaUnidad;
                this.fillVerUnidad.cModelo = response.data[0].modeloUnidad;
                this.fillVerUnidad.cNuSerie = response.data[0].noserie;
                this.fillVerUnidad.cValorUnidad = response.data[0].valorActualunidad;
                this.fillVerUnidad.cTipoCombustible = response.data[0].tipoCombustible;
                this.fillVerUnidad.cnIdPlaca = response.data[0].placa_id;
                this.fillVerUnidad.seguro_id = response.data[0].seguro_id;

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
        getListadoTipoUnidades() {

            this.fullScreenLoading = true;
            var url = '/configuracion/unidad/getListadoTipoUnidades';
            axios.get(url).then((response) => {
                this.listTipoUnidades = response.data;
                this.fullScreenLoading = false;
                this.getListadoPlacas(this.fillVerUnidad.cnIdPlaca);
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
                this.getSeguros(this.fillVerUnidad.seguro_id);
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        getSeguros(seguro_id) {
            this.fullScreenLoading = true;
            var url = '/configuracion/seguro/getSeguroById';
            axios.get(url, {
                params: {
                    'nIdSeguro': seguro_id
                }
            }).then((response) => {
                console.log(response);
                /* this.listSeguros = response.data; */
                this.fillVerUnidad.aseguradora = response.data[0].aseguradora;
                this.fillVerUnidad.fechaRenovacion = response.data[0].fechaRenovacion;
                this.fillVerUnidad.fechaVencimiento = response.data[0].fechaVencimiento;
                this.fillVerUnidad.tipoVigencia = response.data[0].tipoVigencia;
                this.fillVerUnidad.cobertura = response.data[0].cobertura;
                this.fillVerUnidad.deducible = response.data[0].deducible;
                this.fillVerUnidad.pagoSeguro = response.data[0].pagoSeguro;
                this.fillVerUnidad.numPoliza = response.data[0].numPoliza;
                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
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
}
</style>
