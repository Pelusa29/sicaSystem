<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Nuev Banco</h1>
                    </section>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="box-header">
                                <div class="col-sm-2 row">
                                    <button @click="$router.push('/banco')" class="btn btn-block btn-info"><i
                                            class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Regresar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="box box-info box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Editar Banco</h3>
                                        </div>
                                        <div class="box-body">
                                            <form role="form">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Nombre Banco:</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Nombre Banco"
                                                                    v-model="fillEditBanco.cNombreBanco"
                                                                    @keyup.enter="setEditarBanco"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Número de Cuenta:</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Número de cuenta"
                                                                    v-model="fillEditBanco.cNumCuenta"
                                                                    @keyup.enter="setEditarBanco"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Plástico Banco:</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Número Tarjeta"
                                                                    v-model="fillEditBanco.cNumeroTarjeta"
                                                                    @keyup.enter="setEditarBanco"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Titular de la
                                                                Cuenta:</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="Titular de la cuenta"
                                                                    v-model="fillEditBanco.cTitularCuenta"
                                                                    @keyup.enter="setEditarBanco"></el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Fecha Corte:</label>
                                                            <div class="col-md-9">
                                                                <el-date-picker style="width: 100%;"
                                                                    v-model="fillEditBanco.cFechaCorte" type="date"
                                                                    placeholder="Seleccionar Fecha de Corte"
                                                                    format="dd-MM-yyyy" value-format="yyyy-MM-dd">
                                                                </el-date-picker>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Tipo de Cuenta:</label>
                                                            <el-select v-model="fillEditBanco.cTipoCuenta"
                                                                style="width: 69% !important; margin: 0px 1px 0px 13px;"
                                                                placeholder="Seleccione un Tipo de Cuenta" clearable>
                                                                <el-option v-for="item in listTipoCuentas" :key="item.value"
                                                                    :label="item.label" :value="item.value">
                                                                </el-option>
                                                            </el-select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="box-footer">
                                            <div class="row">
                                                <div class="col text-center">
                                                    <button class="btn btn-flat btn-info btnWidth"
                                                        @click.prevent="setEditarBanco()"
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
    props:['id'],
    data() {
        return {
            fillEditBanco: {
                nIdBanco: this.id,
                cNombreBanco: '',
                cNumCuenta: '',
                cNumeroTarjeta: '',
                cTitularCuenta: '',
                cFechaCorte: '',
                cTipoCuenta: ''
            },
            listTipoCuentas: [
                { value: 'Debito', label: 'Debito' },
                { value: 'Credito', label: 'Crédito' }
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
        //this.getListaUnidades();
        this.getBancoEdit();
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
            this.fillEditBanco.cNombreBanco = '';
            this.fillEditBanco.cNumCuenta = '';
            this.fillEditBanco.cNumeroTarjeta = '';
            this.fillEditBanco.cTitularCuenta = '';
            this.fillEditBanco.cFechaCorte = '';
            this.fillEditBanco.cTipoCuenta = '';
        },
        getBancoEdit() {
            console.log(this.fillEditBanco.nIdBanco);
            this.fullScreenLoading = true;
            var url = '/configuracion/banco/getBancoEdit';
            axios.get(url, {
                params: {
                    'nIdBanco': this.fillEditBanco.nIdBanco
                }
            }).then((response) => {
                this.fullScreenLoading = false;
                this.fillEditBanco.cNombreBanco = response.data[0].nombreBanco;
                this.fillEditBanco.cNumCuenta = response.data[0].numCuenta;
                this.fillEditBanco.cNumeroTarjeta = response.data[0].plasticoBanco;
                this.fillEditBanco.cTitularCuenta = response.data[0].titularCuenta;
                this.fillEditBanco.cFechaCorte = response.data[0].fechaCorte;
                this.fillEditBanco.cTipoCuenta = response.data[0].tipoCuenta;

            }).catch((error) => {
               this.$message.warning(`Error al Traer la información del banco`);
            }).finally(() => {
                console.log('finally');
            });

        },
        setEditarBanco() {
            if (this.validarRegistrarBanco()) {
                this.modalShow = true;
                return;
            }

            this.fullScreenLoading = true;
            var url = '/configuracion/banco/setEditarBanco';
            //post to save
            axios.post(url, {
                'nIdBanco': this.fillEditBanco.nIdBanco,
                'cNombreBanco': this.fillEditBanco.cNombreBanco,
                'cNumCuenta': this.fillEditBanco.cNumCuenta,
                'cNumeroTarjeta': this.fillEditBanco.cNumeroTarjeta,
                'cTitularCuenta': this.fillEditBanco.cTitularCuenta,
                'cFechaCorte': this.fillEditBanco.cFechaCorte,
                'cTipoCuenta': this.fillEditBanco.cTipoCuenta
            }).then((response) => {
                this.fullScreenLoading = false;
                if (response.data != 1) {
                    Swal.fire({
                        icon: "success",
                        text: "Actualización de Banco Correctamente!",
                        type: "Success",
                        showDenyButton: false,
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.$router.push('/banco');
                        }
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        text: "Error al registrar el banco.",
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
        validarRegistrarBanco() {
            this.error = 0;
            this.mensajeError = [];


            if (!this.fillEditBanco.cNombreBanco)
                this.mensajeError.push("El Nombre del banco es obligatorio");
            if (!this.fillEditBanco.cNumCuenta)
                this.mensajeError.push("El Número de Cuenta es obligatorio");
            if (!this.fillEditBanco.cNumeroTarjeta)
                this.mensajeError.push("El Número de Tarjeta es obligatorio");
            if (!this.fillEditBanco.cTitularCuenta)
                this.mensajeError.push("El Titual de la Cuenta es obligatorio");
            if (!this.fillEditBanco.cFechaCorte)
                this.mensajeError.push("La Fecha de Corte es obligatoria");
            if (!this.fillEditBanco.cTipoCuenta)
                this.mensajeError.push("El Tipo de Cuenta es obligatorio");



            if (this.mensajeError.length) {
                this.error = 1;
            }

            return this.error;
        }
    }
}
</script>

<style></style>
