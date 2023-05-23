<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="col-12">
                <div class="row">
                    <div class="card">
                        <div class="box-header">
                            <div class="col-md-6 row">
                                <section class="content-header">
                                    <h1 class="text-dark text-perfil">Contrato Diario</h1>
                                </section>
                            </div>
                            <div class="col-sm-6 row">
                                <div class="col-sm-6 pull-right">
                                    <button @click="$router.push('/contratodiario')" class="btn btn-block btn-info"><i
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
                                                            <label
                                                                class="col-md-4 col-form-label">Cliente/Arrendador:</label>
                                                            <div class="col-md-8">
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
                                                                <b>{{ this.fillVisualizarContrato.nNombreCliente }}</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Dirección:</label>
                                                            <div class="col-md-9">
                                                                <b>{{ this.fillVisualizarContrato.cDireccion }}</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Descripción
                                                                Equipos:</label>
                                                            <div class="col-md-9">
                                                                <b>{{ this.fillVisualizarContrato.cDescripcionequipo }}</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Fecha Inicio
                                                                Contrato:</label>
                                                            <div class="col-md-9">
                                                                <b>{{ this.fillVisualizarContrato.cFechaInicioContrato }}</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Hora Inicio
                                                                Contrato:</label>
                                                            <div class="col-md-9">
                                                                <b>{{ this.fillVisualizarContrato.cHoraInicioContrato }}</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Fecha Término
                                                                Contrato:</label>
                                                           <div class="col-md-9">
                                                                <b>{{ this.fillVisualizarContrato.cFechaTerminoContrato }}</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Hora Fin
                                                                Contrato:</label>
                                                            <div class="col-md-9">
                                                                <b>{{ this.fillVisualizarContrato.cHoraFinContrato }}</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Importe Renta</label>
                                                            <div class="col-md-9">
                                                                <b>{{ this.fillVisualizarContrato.cImporteRenta }}</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Importe Deposito</label>
                                                            <div class="col-md-9">
                                                                <b>{{ this.fillVisualizarContrato.cImporteDeposito }}</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Nombre Testigo:</label>
                                                            <div class="col-md-9">
                                                                <b>{{ this.fillVisualizarContrato.cNombreTestigo }}</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label">Nombre Segundo
                                                                Testigo:</label>
                                                            <div class="col-md-9">
                                                                <b>{{ this.fillVisualizarContrato.cNombreTestigo2 }}</b>
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
                                                        @click.prevent="$router.push('/contratodiario')">Cancelar
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
                cDescripcionequipo: '',
                cFechaInicioContrato: '',
                cHoraInicioContrato: '',
                cFechaTerminoContrato: '',
                cHoraFinContrato: '',
                cImporteRenta: '',
                cImporteDeposito: '',
                cNombreTestigo: '',
                cNombreTestigo2: ''
            },
            isValidTime: true,
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
        this.setBuscarDataContratoDiario();
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
        setBuscarDataContratoDiario() {
            this.fullScreenLoading = true;
            var url = '/operacion/contratodiario/setBuscarDataContratoDiario';
            axios.get(url, {
                params: {
                    'nIdContrato': this.fillVisualizarContrato.nIdContrato
                }
            }).then((response) => {
                if (response.data.length > 0) {
                    this.fillVisualizarContrato.nNombreCliente = response.data[0].cliente;
                    this.fillVisualizarContrato.cUnidad = response.data[0].unidad;
                    this.fillVisualizarContrato.cDireccion = response.data[0].direccionArrendador;
                    this.fillVisualizarContrato.cDescripcionequipo = response.data[0].descripcionEquipo;
                    this.fillVisualizarContrato.cFechaInicioContrato = response.data[0].fechaInicioContrato;
                    this.fillVisualizarContrato.cHoraInicioContrato = response.data[0].horaInicio;
                    this.fillVisualizarContrato.cFechaTerminoContrato = response.data[0].fechaFinContrato;
                    this.fillVisualizarContrato.cHoraFinContrato = response.data[0].horaFin;
                    this.fillVisualizarContrato.cImporteRenta = response.data[0].importeRenta;
                    this.fillVisualizarContrato.cImporteDeposito = response.data[0].importeDeposito;
                    this.fillVisualizarContrato.cNombreTestigo = response.data[0].nombreTestigo;
                    this.fillVisualizarContrato.cNombreTestigo2 = response.data[0].nombreTestigo2;
                    this.fullScreenLoading = false;
                } else {
                    this.fullScreenLoading = false;
                    Swal.fire({
                        icon: "info",
                        text: 'El contrato a editar no contiene ninguna información relacionada, favor de asignar le una.',
                        type: "information",
                        showDenyButton: false,
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                        }
                    });
                }
            }).catch((error) => {
                console.log(error);
            });

        }
    }
}
</script>

<style></style>
