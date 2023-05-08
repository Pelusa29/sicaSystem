<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Ingresar Inventario</h1>
                    </section>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="box-header">
                                <div class="col-sm-2 row">
                                    <button @click="$router.push('/catrefaccion')" class="btn btn-block btn-info"><i
                                            class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Regresar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="box box-info box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Formulario de Registro Inventario</h3>
                                        </div>
                                        <div class="box-body">
                                            <form role="form">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Descripcion</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control"
                                                                    v-model="fillCrearInventario.cDescripcion"
                                                                    @keyup.enter="setRegistraInventario">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Tipo de
                                                                Inventario</label>
                                                            <div class="col-md-9">
                                                                <el-select v-model="fillCrearInventario.cTipoinv"
                                                                    placeholder="Seleccione un Tipo Inventario" clearable>
                                                                    <el-option v-for="item in listTipoInv" :key="item.value"
                                                                        :label="item.label" :value="item.value">
                                                                    </el-option>
                                                                </el-select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Precio Costo</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="$" @keypress="isNumber($event)"
                                                                    v-model.number="fillCrearInventario.cPreciocosto"
                                                                    type="number" clearable>
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Inventario Máximo</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="$" @keypress="isNumber($event)"
                                                                    v-model.number="fillCrearInventario.cInvmaximo"
                                                                    type="number" clearable>
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Inventario Minímo</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="$" @keypress="isNumber($event)"
                                                                    v-model.number="fillCrearInventario.cInvminimo"
                                                                    type="number" clearable>
                                                                </el-input>
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
                                                        @click.prevent="setRegistraInventario()"
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
            fillCrearInventario: {
                cDescripcion: '',
                cTipoinv: '',
                cPreciocosto: '',
                cInvmaximo: '',
                cInvminimo: ''
            },
            listTipoInv: [],
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
    mounted() {
        this.getTipoInventario();
    },
    methods: {
        getTipoInventario() {
            this.fullScreenLoading = true;
            let urltipo = '/configuracion/catinventario/getTipoInventario';
            axios.get(urltipo).then((response) => {
                this.listTipoInv = response.data;
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
            this.fillCrearInventario.cDescripcion = '';
            this.fillCrearInventario.cTipoinv = '';
            this.fillCrearInventario.cInvmaximo = '';
            this.fillCrearInventario.cInvminimo = '';
            this.fillCrearInventario.cPreciocosto = '';
        },
        setRegistraInventario() {
            if (this.validarRegistrarInventario()) {
                this.modalShow = true;
                return;
            }

            this.fullScreenLoading = true;
            var url = '/configuracion/catinventario/setRegistraInventario';
            //post to save
            axios.post(url, {
                'cDescripcion':this.fillCrearInventario.cDescripcion,
                'cTipoinv': this.fillCrearInventario.cTipoinv,
                'cInvmaximo': this.fillCrearInventario.cInvmaximo,
                'cInvminimo': this.fillCrearInventario.cInvminimo,
                'cPreciocosto': this.fillCrearInventario.cPreciocosto
            }).then((response) => {
                this.fullScreenLoading = false;
                Swal.fire({
                    icon: "success",
                    title: "Inventario",
                    text: "Inventario registrado correctamente!",
                    type: "warning",
                    showDenyButton: false,
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.$router.push('/catrefaccion');
                    }
                });

            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        validarRegistrarInventario() {
            this.error = 0;
            this.mensajeError = [];

            if (!this.fillCrearInventario.cDescripcion) {
                this.mensajeError.push("La Descripción es un campo obligatorio");
            }
            if (!this.fillCrearInventario.cPreciocosto) {
                this.mensajeError.push("El Precio es un campo obligatorio");
            }
            if (!this.fillCrearInventario.cInvmaximo) {
                this.mensajeError.push("El campo Inventario Máximo es un campo obligatorio");
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
