<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Editar Placa</h1>
                    </section>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="box-header">
                                <div class="col-sm-2 row">
                                    <button @click="$router.push('/placa')" class="btn btn-block btn-info"><i
                                            class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Regresar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="box box-info box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Registro de Placa</h3>
                                        </div>
                                        <div class="box-body">
                                            <form role="form">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Número de Placa</label>
                                                            <div class="col-md-8">
                                                                <el-input
                                                                    placeholder="Número de Placa"
                                                                    v-model="fillEditarPlaca.cNumeroPlaca"
                                                                    @keyup.enter="setRegistraPlaca"
                                                                    clearable>
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Tipo Placa</label>
                                                            <div class="col-md-8">
                                                                <el-input
                                                                    placeholder="Tipo de Placa"
                                                                    v-model="fillEditarPlaca.cTipoPlaca"
                                                                    @keyup.enter="setRegistraPlaca"
                                                                    clearable>
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Nombre Pago Placa</label>
                                                            <div class="col-md-8">
                                                                <el-input
                                                                    placeholder="nombre Pago Placa"
                                                                    v-model="fillEditarPlaca.cNombrePagoPlaca"
                                                                    @keyup.enter="setRegistraPlaca"
                                                                    clearable>
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Nombre Concesión Placa</label>
                                                            <div class="col-md-8">
                                                                <el-input
                                                                    placeholder="Concesión Placa"
                                                                    v-model="fillEditarPlaca.cNombreConcesionPlaca"
                                                                    @keyup.enter="setRegistraPlaca"
                                                                    clearable>
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Fecha Pago Renta</label>
                                                            <div class="col-md-8">
                                                                <el-date-picker style="width: 100%;"
                                                                    placeholder="Fecha Pago Renta"
                                                                    v-model="fillEditarPlaca.cFechaPagoRenta"
                                                                    format="dd-MM-yyyy" value-format="yyyy-MM-dd">
                                                                </el-date-picker>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Importe Renta</label>
                                                            <div class="col-md-8">
                                                                <el-input placeholder="Importe Renta($)"
                                                                    @keypress="onlyNumber($event)"
                                                                    v-model.number="fillEditarPlaca.cImporteRenta"
                                                                    type="number">
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Observaciones</label>
                                                            <div class="col-md-8">
                                                                <div class="textarea">
                                                                    <el-input
                                                                        type="textarea"
                                                                        placeholder="Observaciones"
                                                                        v-model="fillEditarPlaca.cObservaciones"
                                                                        maxlength="150"
                                                                        show-word-limit
                                                                        >
                                                                    </el-input>
                                                                </div>
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
                                                        @click.prevent="setEditarPlaca()"
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
                        <h4 class="modal-title"></h4>
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
            fillEditarPlaca: {
                nIdPlaca: this.id,
                cNumeroPlaca: '',
                cTipoPlaca: '',
                cNombrePagoPlaca: '',
                cNombreConcesionPlaca: '',
                cFechaPagoRenta: '',
                cImporteRenta: '',
                cObservaciones: ''
            },
            /* listTipoUnidades: [], */
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
        //this.getListaUnidades();
        this.getPlacaById();
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
            this.fillEditarPlaca.cNumeroPlaca = '';
            this.fillEditarPlaca.cTipoPlaca = '';
            this.fillEditarPlaca.cNombrePagoPlaca = '';
            this.fillEditarPlaca.cNombreConcesionPlaca = '';
            this.fillEditarPlaca.cFechaPagoRenta = '';
            this.fillEditarPlaca.cImporteRenta = '';
            this.fillEditarPlaca.cObservaciones = '';
        },
        getPlacaById() {
            this.fullScreenLoading = true;
            var url = '/configuracion/placa/getPlacaById';
             axios.get(url, {
                params: {
                    'nIdPlaca': this.fillEditarPlaca.nIdPlaca
                }
            }).then((response) => {
                this.fillEditarPlaca.cNumeroPlaca = response.data[0].noPlaca;
                this.fillEditarPlaca.cTipoPlaca = response.data[0].tipoPlaca;
                this.fillEditarPlaca.cNombrePagoPlaca = response.data[0].nombrePagoPlaca;
                this.fillEditarPlaca.cNombreConcesionPlaca = response.data[0].nombreConcesionPlaca;
                this.fillEditarPlaca.cFechaPagoRenta = response.data[0].fechaPagoRentaPlaca;
                this.fillEditarPlaca.cImporteRenta = response.data[0].importeRentaPlaca;
                this.fillEditarPlaca.cObservaciones = response.data[0].observaciones;
                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        setEditarPlaca() {
            if (this.validarRegistrarTipoUnidad()) {
                this.modalShow = true;
                return;
            }

            this.fullScreenLoading = true;
            var url = '/configuracion/placa/setEditarPlaca';
            //post to save
            axios.post(url, {
                'nIdPlaca': this.fillEditarPlaca.nIdPlaca,
                'cNumeroPlaca': this.fillEditarPlaca.cNumeroPlaca,
                'cTipoPlaca': this.fillEditarPlaca.cTipoPlaca,
                'cNombrePagoPlaca': this.fillEditarPlaca.cNombrePagoPlaca,
                'cNombreConcesionPlaca': this.fillEditarPlaca.cNombreConcesionPlaca,
                'cFechaPagoRenta': this.fillEditarPlaca.cFechaPagoRenta,
                'cImporteRenta': this.fillEditarPlaca.cImporteRenta,
                'cObservaciones': this.fillEditarPlaca.cObservaciones
            }).then((response) => {
                this.fullScreenLoading = false;
                if (response.data != 1) {
                    Swal.fire({
                        icon: "success",
                        text: "La Placa se ha actualizado Correctamente!",
                        type: "Success",
                        showDenyButton: false,
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.$router.push('/placa');
                        }
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        text: "Placa existente, favor de regisrtar una nueva.",
                        type: "Error",
                        showDenyButton: false,
                        showConfirmButton: true,
                    });
                }

            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        validarRegistrarTipoUnidad() {
            this.error = 0;
            this.mensajeError = [];

            if (!this.fillEditarPlaca.cTipoPlaca) {
                this.mensajeError.push("El Tipo de Placa es un campo obligatorio");
            }
            if (!this.fillEditarPlaca.cNumeroPlaca) {
                this.mensajeError.push("El Número de Placa es un campo obligatorio");
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
