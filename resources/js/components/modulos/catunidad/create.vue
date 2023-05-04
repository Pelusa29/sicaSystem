<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Crear Tipo de Unidad</h1>
                    </section>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="box-header">
                                <div class="col-sm-2 row">
                                    <button @click="$router.push('/tipounidades')" class="btn btn-block btn-info"><i
                                            class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Regresar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="box box-info box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Formulario Registrar Tipo de Unidad</h3>
                                        </div>
                                        <div class="box-body">
                                            <form role="form">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Descripcion</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control"
                                                                    v-model="fillCrearTipoUnidad.cDescripcion"
                                                                    @keyup.enter="setRegistraTipoUnidad">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Tipo de Unidad</label>
                                                            <div class="col-md-9">
                                                                    <el-select
                                                                    v-model="fillCrearTipoUnidad.cTipoUnidad"
                                                                    placeholder="Seleccione un Tipo de Unidad"
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
                                                            <label class="col-md-3 col-form-label">Monto Renta Diaría</label>
                                                            <div class="col-md-9">
                                                                   <el-input
                                                                        placeholder="$"
                                                                        @keypress="isNumber($event)"
                                                                        v-model.number="fillCrearTipoUnidad.cRentaDiaria"
                                                                        type="number"
                                                                        clearable>
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
                                                        @click.prevent="setRegistraTipoUnidad()"
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
            fillCrearTipoUnidad: {
                cDescripcion: '',
                cTipoUnidad: '',
                cRentaDiaria:''
            },
            listTiposU: [
                { value: 'Manual', label: 'Manual' },
                { value: 'Automatica', label: 'Automatica' }
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
    computed:{
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
            this.fillCrearTipoUnidad.cDescripcion = '';
            this.fillCrearTipoUnidad.cTipoUnidad = '';
            this.fillCrearTipoUnidad.cRentaDiaria = '';
        },
        setRegistraTipoUnidad() {
            if (this.validarRegistrarTipoUnidad()) {
                this.modalShow = true;
                return;
            }

            this.fullScreenLoading = true;
            var url = '/configuracion/catunidades/setRegistraTipoUnidad';
            //post to save
            axios.post(url, {
                'cDescripcion': this.fillCrearTipoUnidad.cDescripcion,
                'cTipounidad': this.fillCrearTipoUnidad.cTipoUnidad,
                'cRentadiaria' : this.fillCrearTipoUnidad.cRentaDiaria
            }).then((response) => {
                this.fullScreenLoading = false;
                Swal.fire({
                    title: "Tipo Unidad",
                    text: "Tipo de Unidad registrado correctamente!",
                    type: "warning",
                    showDenyButton: false,
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.$router.push('/tipounidades');
                    }
                });

            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        validarRegistrarTipoUnidad() {
            this.error = 0;
            this.mensajeError = [];

            if (!this.fillCrearTipoUnidad.cDescripcion) {
                this.mensajeError.push("La Descripción es un campo obligatorio");
            }
            if (!this.fillCrearTipoUnidad.cTipoUnidad) {
                this.mensajeError.push("El Tipo de Unidad es un campo obligatorio");
            }
            if (!this.fillCrearTipoUnidad.cRentaDiaria) {
                this.mensajeError.push("El campo Renta es un campo obligatorio");
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
