<template>
    <div>
        <div class="login-logo">
            <b>Sistema SICA</b>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg"><b>Ingresa tus creedenciales</b></p>
            <form method="post">
                <div class="form-group has-feedback">
                    <input type="email" v-model="fillLogin.cEmail" @keyup.enter="login" class="form-control" placeholder="Email">
                    <span class="fa fa-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                <input type="password" v-model="fillLogin.cContrasena" @keyup.enter="login" class="form-control" placeholder="Password">
                <span class="fa fa-lock form-control-feedback"></span>
                </div>
            </form>
            <div class="row">
                <div class="col-md-12">
                    <div v-for="(e, index) in mensajeError" :key="index" v-text="e" class="badge badge-danger"></div>
                </div>
            </div>
            <div class="social-auth-links text-center">
                <button type="submit" class="btn btn-block btn-danger  btn-flat" @click.prevent="login" v-loading.fullscreen.lock="fullScreenLoading">Iniciar Sesión</button>
            </div>
        </div>
    </div>
</template>
<script>
import Swal from 'sweetalert2';

export default {
    data() {
        return {
            fillLogin: {
                cEmail: '',
                cContrasena:''
            },
            fullScreenLoading: false,
            error: 0,
            mensajeError:[]
        }
    },
    methods: {
        login() {
            if (this.validarLogin()) {
                return;
            }
            this.fullScreenLoading = true;
            var url = '/authenticate/login';
            axios.post(url, {
                    'cEmail': this.fillLogin.cEmail,
                    'cContrasena': this.fillLogin.cContrasena
            }).then((response) => {
                if (response.data.code == 401) {
                    this.loginFailed();
                }
                if (response.data.code == 200) {
                    this.loginSuccess();
                }
                this.fullScreenLoading = false;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                console.log('finally');
            });
        },
        loginFailed() {
            Swal.fire(
                'Error!',
                'Estas Credenciales no coinciden con nuestros registros!',
                'warning'
            );
        },
        validarLogin() {
            this.error = 0;
            this.mensajeError = [];

            if (!this.fillLogin.cEmail) {
                this.mensajeError.push('El correo electronico es un campo obligatorio');
            }
            if (!this.fillLogin.cContrasena) {
                this.mensajeError.push('La contraseña es un campo obligatorio');
            }

            if (this.mensajeError.length) {
                this.error =1;
            }

            return this.error;
        },
        loginSuccess() {
            this.$router.push({ name: 'dashboard.index' });
            location.reload();
        }
    }
}
</script>
<style lang="">

</style>
