<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 row">
                    <section class="content-header">
                        <h1 class="m-0 text-dark text-perfil">Crear Empleado</h1>
                    </section>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="card-header">
                        <div class="box-header">
                            <div class="col-sm-2 row">
                                <button @click="$router.push('/employ')" class="btn btn-block btn-info"><i
                                        class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Regresar</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#config" data-toggle="tab"
                                        aria-expanded="true">Datos Empleado</a></li>
                                <li class=""><a href="#direccion" data-toggle="tab" aria-expanded="false">Dirección</a></li>
                                <li class=""><a href="#nomina" data-toggle="tab" aria-expanded="false">Pago</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="config">
                                    <div class="row">
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label">Nombre:</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"
                                                                v-model="fillCrearEmpleado.cNombre"
                                                                @keyup.enter="setRegistrarEmpleado" placeholder="Nombre Completo">
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label">Fecha Nacimiento:</label>
                                                        <div class="col-md-6">
                                                            <el-date-picker style="width: 100%;"
                                                                v-model="fillCrearEmpleado.cFechaNacimiento" type="date"
                                                                placeholder="Seleccionar Fecha Nacimiento"
                                                                format="dd-MM-yyyy" value-format="yyyy-MM-dd">
                                                            </el-date-picker>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label">Fecha Inicio Contrato:</label>
                                                        <div class="col-md-6">
                                                            <el-date-picker style="width: 100%;"
                                                                v-model="fillCrearEmpleado.cFechaIniContrato" type="date"
                                                                placeholder="Seleccionar Fecha Inicio Contrato"
                                                                format="dd-MM-yyyy" value-format="yyyy-MM-dd">
                                                            </el-date-picker>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label">Fecha Fin Contrato:</label>
                                                        <div class="col-md-6">
                                                            <el-date-picker style="width: 100%;"
                                                                v-model="fillCrearEmpleado.cFechaFinContrato" type="date"
                                                                placeholder="Seleccionar Fecha Fin Contrato"
                                                                format="dd-MM-yyyy" value-format="yyyy-MM-dd">
                                                            </el-date-picker>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label">Número Seguridad Social:</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                v-model="fillCrearEmpleado.cNss" @keypress="onlyNumber($event)"
                                                                @keyup.enter="setRegistrarEmpleado" placeholder="NSS">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label">RFC:</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                v-model="fillCrearEmpleado.cRfc"
                                                                @keyup.enter="setRegistrarEmpleado" placeholder="RFC">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label">Número Celular:</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                v-model="fillCrearEmpleado.cCelular"
                                                                @keyup.enter="setRegistrarEmpleado" @keypress="onlyNumber($event)" placeholder="#Celular">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="direccion">
                                    <div class="row">
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label">Calle:</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"
                                                                v-model="fillCrearEmpleado.cCalle"
                                                                @keyup.enter="setRegistrarEmpleado" placeholder="Calle">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label">CP:</label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control"
                                                                v-model="fillCrearEmpleado.cCp"
                                                                @keyup.enter="setRegistrarEmpleado" @keypress="onlyNumber($event)" placeholder="Código Postal">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label">Colonia:</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"
                                                                v-model="fillCrearEmpleado.cColonia"
                                                                @keyup.enter="setRegistrarEmpleado" placeholder="Colonia">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label">Ciudad:</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"
                                                                v-model="fillCrearEmpleado.cCiudad"
                                                                @keyup.enter="setRegistrarEmpleado" placeholder="Ciudad">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="nomina">
                                    <div class="row">
                                        <div class="card-body">
                                            <div class="container-fluid">
                                               <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label">Pago Transferencia</label>
                                                        <div class="col-md-9">
                                                            <el-input placeholder="Pago Transferencia" @keypress="onlyNumber($event)"
                                                                v-model.number="fillCrearEmpleado.cPagotransferencia"
                                                                type="number" clearable>
                                                            </el-input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label">Pago Efectivo</label>
                                                        <div class="col-md-9">
                                                            <el-input placeholder="Pago Transferencia" @keypress="onlyNumber($event)"
                                                                v-model.number="fillCrearEmpleado.cPagoefectivo"
                                                                type="number" clearable>
                                                            </el-input>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="box-footer text-center">
                                    <div class="row">
                                        <button class="btn btn-flat btn-info btnWidth"
                                            @click.prevent="setRegistrarEmpleado()" v-loading.fullscreen.lock="fullScreenLoading">Registrar
                                        </button>
                                            <button class="btn btn-flat btn-default btnWidth"
                                                @click.prevent="limpiarCriteriosEmpleado()">Linmpiar
                                            </button>
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
                        <h4 class="modal-title">Error</h4>
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
            fillCrearEmpleado: {
                cNombre: '',
                cFechaNacimiento: '',
                cFechaIniContrato: '',
                cFechaFinContrato: '',
                cNss: '',
                cRfc: '',
                cCelular: '',
                cCalle: '',
                cCp: '',
                cColonia: '',
                cCiudad: '',
                cPagotransferencia: '',
                cPagoefectivo:''
            },
            listRoles: [],
            form: new FormData,
            fullScreenLoading: false,
            modalShow: false,
            mostrarModal: {
                display: 'block'
                //background:'#00000006b'
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

    },
    methods: {
        onlyNumber($event) {
            //console.log($event.keyCode); //keyCodes value
            let keyCode = ($event.keyCode ? $event.keyCode : $event.which);
            if ((keyCode < 48 || keyCode > 57) && keyCode !== 46) { // 46 is dot
                $event.preventDefault();
            }
        },
        getListRoles() {
            this.fullScreenLoading = true;
            var url = '/administracion/rol/getListRoles';
            axios.get(url).then((response) => {
                this.listRoles = response.data;
                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        limpiarCriteriosEmpleado() {
            this.fillCrearEmpleado.cNombre = '';
            this.fillCrearEmpleado.cFechaNacimiento = '';
            this.fillCrearEmpleado.cFechaIniContrato = '';
            this.fillCrearEmpleado.cFechaFinContrato = '';
            this.fillCrearEmpleado.cNss = '';
            this.fillCrearEmpleado.cRfc = '';
            this.fillCrearEmpleado.cCelular = '';
            this.fillCrearEmpleado.cCalle = '';
            this.fillCrearEmpleado.cCp = '';
            this.fillCrearEmpleado.cColonia = '';
            this.fillCrearEmpleado.cCiudad = '';
            this.fillCrearEmpleado.cPagotransferencia = '';
            this.fillCrearEmpleado.cPagoefectivo = '';
        },
        abrirModal() {
            this.modalShow = !this.modalShow;
        },
        setRegistrarEmpleado() {
            if (this.validarRegistrarEmpleado()) {
                this.modalShow = true;
                return;
            }
            this.fullScreenLoading = true;
              var url = '/administracion/employ/setRegistrarEmpleado';
            //post to save
            axios.post(url, {
                'cNombre':this.fillCrearEmpleado.cNombre,
                'cFechaNacimiento':this.fillCrearEmpleado.cFechaNacimiento,
                'cFechaIniContrato':this.fillCrearEmpleado.cFechaIniContrato,
                'cFechaFinContrato':this.fillCrearEmpleado.cFechaFinContrato,
                'cNss':this.fillCrearEmpleado.cNss,
                'cRfc':this.fillCrearEmpleado.cRfc,
                'cCelular':this.fillCrearEmpleado.cCelular,
                'cCalle':this.fillCrearEmpleado.cCalle,
                'cCp':this.fillCrearEmpleado.cCp,
                'cColonia':this.fillCrearEmpleado.cColonia,
                'cCiudad':this.fillCrearEmpleado.cCiudad,
                'cPagotransferencia':this.fillCrearEmpleado.cPagotransferencia,
                'cPagoefectivo':this.fillCrearEmpleado.cPagoefectivo,
            }).then((response) => {

                this.fullScreenLoading = false;

                if (response.data == "Correcto") {
                    Swal.fire({
                        icon: "success",
                        text: "Empleado Registrado Correctamente!",
                        type: "warning",
                        showDenyButton: false,
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.$router.push('/employ');
                        }
                    });
                } else {
                     Swal.fire({
                        icon: "error",
                        text: 'Error de: ' + ((response.data == "Rfc Existente") ? 'Rfc ya Existe' : 'Nss ya Existe') + ' asignado a un empleado, favor de cambiarlo.',
                        type: "warning",
                        showDenyButton: false,
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                        }
                    });
                }
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        validarRegistrarEmpleado() {
            this.error = 0;
            this.mensajeError = [];

            if (!this.fillCrearEmpleado.cNombre)
                this.mensajeError.push("El campo Nombre es obligatorio");
            if (!this.fillCrearEmpleado.cFechaNacimiento)
                this.mensajeError.push("El campo Fecha Nacimiento es obligatorio");
            if (!this.fillCrearEmpleado.cFechaIniContrato)
                this.mensajeError.push("El campo Fecha Inicio Contrato es obligatorio");
            if (!this.fillCrearEmpleado.cFechaFinContrato)
                this.mensajeError.push("El campo Fecha Fin Contrato es obligatorio");
            if (!this.fillCrearEmpleado.cNss)
                this.mensajeError.push("El campo Número Seguridad Social es obligatorio");
            if (!this.fillCrearEmpleado.cRfc)
                this.mensajeError.push("El campo RFC es obligatorio");
            if (!this.fillCrearEmpleado.cCelular)
                this.mensajeError.push("El campo Número de Celular es obligatorio");
            if (!this.fillCrearEmpleado.cCalle)
                this.mensajeError.push("El campo Calle es obligatorio");
            if (!this.fillCrearEmpleado.cCp)
                this.mensajeError.push("El campo Código Postal es obligatorio");
            if (!this.fillCrearEmpleado.cColonia)
                this.mensajeError.push("El campo Colonia es obligatorio");
            if (!this.fillCrearEmpleado.cCiudad)
                this.mensajeError.push("El campo Ciudad es obligatorio");
            if (!this.fillCrearEmpleado.cPagotransferencia)
                this.mensajeError.push("El campo Pago Transferencia es obligatorio");
            if (!this.fillCrearEmpleado.cPagoefectivo)
                this.mensajeError.push("El campo Pago Efectivo es obligatorio");

            if (this.mensajeError.length) {
                this.error = 1;
            }

            return this.error;
        }
    }
}
</script>

<style></style>
