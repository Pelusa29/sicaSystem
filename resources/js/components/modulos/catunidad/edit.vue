<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Editar Tipo de Unidad</h1>
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
                                            <h3 class="box-title">Formulario Edición Tipo de Unidad</h3>
                                        </div>
                                        <div class="box-body">
                                            <form role="form">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Descripcion</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control"
                                                                    v-model="fillEditarTipoUnidad.cDescripcion"
                                                                    @keyup.enter="setEditarTipoUnidad">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Tipo de Transmisión</label>
                                                            <div class="col-md-9">
                                                                <el-select v-model="fillEditarTipoUnidad.cTipoUnidad"
                                                                    placeholder="Seleccione un Tipo de Unidad" clearable>
                                                                    <el-option v-for="item in listTiposU" :key="item.value"
                                                                        :label="item.label" :value="item.value">
                                                                    </el-option>
                                                                </el-select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Monto Renta
                                                                Diaría</label>
                                                            <div class="col-md-9">
                                                                <el-input placeholder="$" @keypress="isNumber($event)"
                                                                    v-model.number="fillEditarTipoUnidad.cRentaDiaria"
                                                                    type="number" clearable>
                                                                </el-input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Tipo de Giro/unidad</label>
                                                            <div class="col-md-9">
                                                                <el-select
                                                                    v-model="fillEditarTipoUnidad.cTipoGiro"
                                                                    placeholder="Seleccione un Tipo de Giro"
                                                                    clearable>
                                                                    <el-option
                                                                        v-for="item in listTipogiros"
                                                                        :key="item.id"
                                                                        :label="item.descripcion"
                                                                        :value="item.id">
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
                                                        @click.prevent="setEditarTipoUnidad()"
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
            fillEditarTipoUnidad: {
                nIdTipoUnidad: this.id,
                cDescripcion: '',
                cTipoUnidad: '',
                cRentaDiaria: '',
                cTipoGiro: ''
            },
            listTiposU: [
                { value: 'Manual', label: 'Manual' },
                { value: 'Automatica', label: 'Automatica' }
            ],
            listTipogiros: [],
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
    mounted() {
        this.getTipoUnidad();
        this.getTipGiros();
    },
    methods: {
        getTipGiros() {
            this.fullScreenLoading = true;
            let urltipo = '/configuracion/catunidades/getTipoGirosList';
            axios.get(urltipo).then((response) => {
                this.listTipogiros = response.data;
                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });

        },
        getTipoUnidad() {
            this.fullScreenLoading = true;
            var url = '/configuracion/catunidades/getTipoUnidad';
            axios.get(url, {
                params: {
                    'nIdTipoUnidad': this.fillEditarTipoUnidad.nIdTipoUnidad
                }
            }).then((response) => {
                /* console.log(response); */
                this.fillEditarTipoUnidad.cDescripcion  = response.data[0].descripcionTipoUnidad;
                this.fillEditarTipoUnidad.cTipoUnidad   = response.data[0].transmisionTipoUnidad;
                this.fillEditarTipoUnidad.cRentaDiaria = response.data[0].totalRentaTipoUnidad;
                this.fillEditarTipoUnidad.cTipoGiro = response.data[0].tipogiro_id;
                /* this.fillEditarRol.cNombre = response.data[0].name;
                this.fillEditarRol.cUrl = response.data[0].slug; */
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
            this.fillEditarTipoUnidad.cDescripcion = '';
            this.fillEditarTipoUnidad.cTipoUnidad = '';
            this.fillEditarTipoUnidad.cRentaDiaria = '';
        },

        setEditarTipoUnidad() {
            if (this.validarRegistrarTipoUnidad()) {
                this.modalShow = true;
                return;
            }

            this.fullScreenLoading = true;
            var url = '/configuracion/catunidades/setEditarTipoUnidad';
            //post to save
            axios.post(url, {
                'nIdTipoUnidad' :this.fillEditarTipoUnidad.nIdTipoUnidad,
                'cDescripcion'  : this.fillEditarTipoUnidad.cDescripcion,
                'cTipounidad'   : this.fillEditarTipoUnidad.cTipoUnidad,
                'cRentadiaria'  : this.fillEditarTipoUnidad.cRentaDiaria,
                'cTipogiro'     :this.fillEditarTipoUnidad.cTipoGiro
            }).then((response) => {
                this.fullScreenLoading = false;
                Swal.fire({
                    icon: "success",
                    title: "Tipo Unidad",
                    text: "Tipo de Unidad se ha actualizado correctamente!",
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

            if (!this.fillEditarTipoUnidad.cDescripcion) {
                this.mensajeError.push("La Descripción es un campo obligatorio");
            }
            if (!this.fillEditarTipoUnidad.cTipoUnidad) {
                this.mensajeError.push("El Tipo de Unidad es un campo obligatorio");
            }
            if (!this.fillEditarTipoUnidad.cRentaDiaria) {
                this.mensajeError.push("El campo Renta es un campo obligatorio");
            }
            if (!this.fillEditarTipoUnidad.cTipoGiro) {
                this.mensajeError.push("El Tipo de Giro es un campo obligatorio");
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
