<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Editar Seguro</h1>
                    </section>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="box-header">
                                <div class="col-sm-2 row">
                                    <button @click="$router.push('/seguro')" class="btn btn-block btn-info"><i
                                            class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Regresar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="box box-info box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Editar Seguro - Formulario</h3>
                                        </div>
                                        <div class="box-body">
                                            <form role="form">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Nombre Agente:</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Nombre Agente" v-model="fillEditarSeguro.cNombreAgente" @keyup.enter="setEditarSeguro"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Vigencia:</label>
                                                            <div class="col-md-9">
                                                                <el-select v-model="fillEditarSeguro.cTipoVigencia" filterable
                                                                    placeholder="Seleccione un Unidad">
                                                                    <el-option v-for="item in listTipoVigencia"
                                                                        :key="item.value" :label="item.label"
                                                                        :value="item.value">
                                                                    </el-option>
                                                                </el-select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Cobertura:</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Cobertura" v-model="fillEditarSeguro.cCobertura" @keyup.enter="setEditarSeguro"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Deducible:</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Deducible" v-model="fillEditarSeguro.cDeducible" @keyup.enter="setEditarSeguro"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Fecha Renovación:</label>
                                                            <div class="col-md-9">
                                                                <el-date-picker style="width: 100%;"
                                                                    v-model="fillEditarSeguro.cFechaRenovacion"
                                                                    type="date"
                                                                    placeholder="Seleccionar Fecha de Renovación"
                                                                    format="dd-MM-yyyy" value-format="yyyy-MM-dd">
                                                                </el-date-picker>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Fecha Vencimiento:</label>
                                                            <div class="col-md-9">
                                                                <el-date-picker style="width: 100%;"
                                                                    v-model="fillEditarSeguro.cFechaVencimiento"
                                                                    type="date"
                                                                    placeholder="Seleccionar Fecha de Vencimiento"
                                                                    format="dd-MM-yyyy" value-format="yyyy-MM-dd">
                                                                </el-date-picker>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Número Póliza:</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Póliza"  v-model="fillEditarSeguro.cNumPoliza" @keyup.enter="setEditarSeguro"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Pago Seguro</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Seguro($)"
                                                                    @keypress="onlyNumber($event)"
                                                                    v-model.number="fillEditarSeguro.cPagoSeguro"
                                                                    type="number" clearable>
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Aseguradora:</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Aseguradora"  v-model="fillEditarSeguro.cAseguradora" @keyup.enter="setEditarSeguro"></el-input>
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
                                                        @click.prevent="setEditarSeguro()"
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
    props:['id'],
    data() {
        return {
            fillEditarSeguro: {
                nIdSeguro:this.id,
                cNombreAgente: '',
                cTipoVigencia: '',
                cCobertura: '',
                cDeducible: '',
                cFechaRenovacion: '',
                cFechaVencimiento: '',
                cNumPoliza: '',
                cPagoSeguro: '',
                cAseguradora:''
            },
            listTipoVigencia: [
                { value: 'Anual', label: 'Anual' }
            ],
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
        this.getSeguroById();
    },
    methods: {
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
            this.fillEditarSeguro.cNombreAgente = '';
            this.fillEditarSeguro.cTipoVigencia = '';
            this.fillEditarSeguro.cCobertura = '';
            this.fillEditarSeguro.cDeducible =  '';
            this.fillEditarSeguro.cFechaRenovacion =  '';
            this.fillEditarSeguro.cFechaVencimiento = '';
            this.fillEditarSeguro.cNumPoliza ='';
            this.fillEditarSeguro.cPagoSeguro = '';
            this.fillEditarSeguro.cAseguradora ='';
        },
        getSeguroById() {
             this.fullScreenLoading = true;
            var url = '/configuracion/seguro/getSeguroById';
            axios.get(url, {
                params: {
                    'nIdSeguro': this.fillEditarSeguro.nIdSeguro
                }
            }).then((response) => {
                this.fillEditarSeguro.cNombreAgente = response.data[0].agente;
                this.fillEditarSeguro.cTipoVigencia = response.data[0].tipoVigencia;
                this.fillEditarSeguro.cCobertura = response.data[0].cobertura;
                this.fillEditarSeguro.cDeducible = response.data[0].deducible;
                this.fillEditarSeguro.cFechaRenovacion = response.data[0].fechaRenovacion;
                this.fillEditarSeguro.cFechaVencimiento = response.data[0].fechaVencimiento;
                this.fillEditarSeguro.cNumPoliza = response.data[0].numPoliza;
                this.fillEditarSeguro.cPagoSeguro = response.data[0].pagoSeguro;
                this.fillEditarSeguro.cAseguradora = response.data[0].aseguradora;
                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        setEditarSeguro() {
            if (this.validarRegistrarSeguro()) {
                this.modalShow = true;
                return;
            }

            this.fullScreenLoading = true;
            var url = '/configuracion/seguro/setEditarSeguro';

            axios.post(url, {
                'nIdSeguro'         :this.fillEditarSeguro.nIdSeguro,
                'cNombreAgente'     :this.fillEditarSeguro.cNombreAgente,
                'cTipoVigencia'     :this.fillEditarSeguro.cTipoVigencia,
                'cCobertura'        :this.fillEditarSeguro.cCobertura,
                'cDeducible'        :this.fillEditarSeguro.cDeducible,
                'cFechaRenovacion'  :this.fillEditarSeguro.cFechaRenovacion,
                'cFechaVencimiento' :this.fillEditarSeguro.cFechaVencimiento,
                'cNumPoliza'        :this.fillEditarSeguro.cNumPoliza,
                'cPagoSeguro'       :this.fillEditarSeguro.cPagoSeguro,
                'cAseguradora'      :this.fillEditarSeguro.cAseguradora
            }).then((response) => {
                this.fullScreenLoading = false;
                Swal.fire({
                    icon: "success",
                    text: "Seguro Registrado Correctamente!",
                    type: "warning",
                    showDenyButton: false,
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.$router.push('/seguro');
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
        validarRegistrarSeguro() {
            this.error = 0;
            this.mensajeError = [];

            if(!this.fillEditarSeguro.cNombreAgente)
                 this.mensajeError.push("El Nombre del Agente es un campo obligatorio");
            if(!this.fillEditarSeguro.cTipoVigencia)
                 this.mensajeError.push("El Tipo de Vigencia es un campo obligatorio");
            if(!this.fillEditarSeguro.cCobertura)
                 this.mensajeError.push("La Cobertura es un campo obligatorio");
            if(!this.fillEditarSeguro.cDeducible)
                 this.mensajeError.push("El Deducible es un campo obligatorio");
            if(!this.fillEditarSeguro.cFechaRenovacion)
                 this.mensajeError.push("La Fecha Renovación es un campo obligatorio");
            if(!this.fillEditarSeguro.cFechaVencimiento)
                 this.mensajeError.push("La Fecha de Vencimiento es un campo obligatorio");
            if(!this.fillEditarSeguro.cNumPoliza)
                 this.mensajeError.push("El Número de Póliza es un campo obligatorio");
            if(!this.fillEditarSeguro.cPagoSeguro)
                 this.mensajeError.push("El Pago del Seguro es un campo obligatorio");
            if(!this.fillEditarSeguro.cAseguradora)
                 this.mensajeError.push("La Nombre de la Aseguradora es un campo obligatorio");


            if (this.mensajeError.length) {
                this.error = 1;
            }

            return this.error;
        }
    }
}
</script>

<style>
</style>
