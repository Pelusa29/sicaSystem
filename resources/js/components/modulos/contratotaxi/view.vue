<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="col-12">
                <div class="row">
                    <div class="card">
                        <div class="box-header">
                            <div class="col-md-6 row">
                                <section class="content-header">
                                    <h1 class="text-dark text-perfil">Editar Contrato</h1>
                                </section>
                            </div>
                            <div class="col-sm-6 row">
                                <div class="col-sm-6 pull-right">
                                    <button @click="$router.push('/contratotaxi')" class="btn btn-block btn-info"><i
                                            class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Regresar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="box box-info box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Contrato</h3>
                                        </div>
                                        <div class="box-body">
                                            <form role="form">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Conductor:</label>
                                                            <div class="col-md-9">
                                                                <b>{{ this.fillVisualizarContrato.nNombreCliente }}</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Unidad:</label>
                                                            <div class="col-md-9">
                                                                <span class="decriptionlabel">
                                                                    <p>{{ fillVisualizarContrato.cUnidad }}</p>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Dirección:</label>
                                                            <div class="col-md-9">
                                                                    <span class="decriptionlabel">
                                                                        <p>{{ fillVisualizarContrato.cDireccion }}</p>
                                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Fecha Inicio
                                                                Contrato:</label>
                                                            <div class="col-md-9">
                                                                <span class="decriptionlabel">
                                                                    <p>{{ fillVisualizarContrato.cFechaInicioContrato }}</p>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Importe Renta</label>
                                                            <div class="col-md-9">
                                                                <span class="decriptionlabel">
                                                                        <p>${{ fillVisualizarContrato.cImporteRenta }}</p>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Importe Deposito</label>
                                                            <div class="col-md-9">
                                                                <span class="decriptionlabel">
                                                                    <p>${{ fillVisualizarContrato.cImporteDeposito }}</p>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Nombre(s) Fiador:</label>
                                                            <div class="col-md-9">
                                                                <span class="decriptionlabel">
                                                                    <p>{{ fillVisualizarContrato.cNombreFiador }}</p>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Calle Fiador:</label>
                                                            <div class="col-md-9">
                                                                <span class="decriptionlabel">
                                                                    <p>{{ fillVisualizarContrato.cCalleFiador }}</p>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Colonia:</label>
                                                            <div class="col-md-9">
                                                                <span class="decriptionlabel">
                                                                    <p>{{ fillVisualizarContrato.cColonia }}</p>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Ciudad:</label>
                                                            <div class="col-md-9">
                                                                <span class="decriptionlabel">
                                                                    <p>{{ fillVisualizarContrato.cCiudadFiador }}</p>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Cp:</label>
                                                            <div class="col-md-9">
                                                                <span class="decriptionlabel">
                                                                    <p>{{ fillVisualizarContrato.cCp }}</p>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Nombre Testigo:</label>
                                                            <div class="col-md-9">
                                                                <span class="decriptionlabel">
                                                                    <p>{{ fillVisualizarContrato.cNombreTestigo }}</p>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="box-footer">
                                            <div class="row">
                                                <div class="col text-center">
                                                    <button class="btn btn-flat btn-default btnWidth"
                                                        @click.prevent="$router.push('/contratotaxi')">Cancelar
                                                    </button>
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
    </section>
</template>

<script>
export default {
    props: ['id'],
    data() {
        return {
            fillVisualizarContrato: {
                nIdContrato: this.id,
                nNombreCliente: '',
                cUnidad: '',
                cDireccion: '',
                cFechaInicioContrato: '',
                cImporteRenta: '',
                cImporteDeposito: '',
                cNombreFiador: '',
                cCalleFiador: '',
                cColonia: '',
                cCiudadFiador: '',
                cCp: '',
                cNombreTestigo: ''
            },
            listaClientes: [],
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
        this.setBuscarDataContrato();
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
        setBuscarDataContrato() {
            this.fullScreenLoading = true;
            var url = '/operacion/contrato/setBuscarDataContrato';
            axios.get(url, {
                params: {
                    'nIdContrato': this.fillVisualizarContrato.nIdContrato
                }
            }).then((response) => {
                this.fillVisualizarContrato.nNombreCliente = response.data[0].nombreCliente;
                this.fillVisualizarContrato.cUnidad = response.data[0].unidad;
                this.fillVisualizarContrato.cDireccion = response.data[0].direccionArrendador;
                this.fillVisualizarContrato.cFechaInicioContrato = response.data[0].fechaInicioContrato;
                this.fillVisualizarContrato.cImporteRenta = response.data[0].importeRenta;
                this.fillVisualizarContrato.cImporteDeposito = response.data[0].importeDeposito;
                this.fillVisualizarContrato.cNombreFiador = response.data[0].nombreFiador;
                this.fillVisualizarContrato.cCalleFiador = response.data[0].calleFiador;
                this.fillVisualizarContrato.cColonia = response.data[0].coloniaFiador;
                this.fillVisualizarContrato.cCiudadFiador = response.data[0].ciudadFiador;
                this.fillVisualizarContrato.cCp = response.data[0].cpFiador;
                this.fillVisualizarContrato.cNombreTestigo = response.data[0].nombreTestigo;

                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            });

        }
    }
}
</script>

<style></style>
