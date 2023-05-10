<template lang="">
    <div>
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <template v-if="!usuario.file_id">
                         <img :src="ruta +'/img/avatar.png'" class="img-circle" :alt="usuario.firstname">
                    </template>
                    <template v-else>
                        <img :src="usuario.file.path" class="img-circle" style="height:5rem !important;width: 12rem !important;;object-fit: cover;" :alt="usuario.firstname">
                    </template>
                </div>
                <div class="pull-left info">
                    <p>{{usuario.fullname}}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="active treeview menu-open">
                    <router-link class="nav-link" :to="'/'">
                        <i class="fa fa-dashboard"></i><span>Dashboard</span>
                    </router-link>
                </li>
                <li class="header">OPERACIONES</li>
                <li>
                    <router-link class="nav-link" :to="'/unidad'">
                        <i class="fa fa-car"></i>
                        <span>Unidades</span>
                    </router-link>
                </li>
                <li>
                    <router-link class="nav-link" :to="'/seguro'">
                        <i class="fa fa-cab"></i>
                        <span>Seguros</span>
                    </router-link>
                </li>
                <li>
                    <router-link class="nav-link" :to="'/servicio'">
                        <i class="fa fa-car"></i><span> Servicios</span>
                    </router-link>
                </li>
                <li>
                    <router-link class="nav-link" :to="'/cliente'">
                        <i class="fa fa-users"></i>
                        <span>Clientes</span>
                    </router-link>
                </li>
                <li class="header">CATALAGOS GERNERALES</li>
                <li>
                    <router-link class="nav-link" :to="'/tipounidades'">
                        <i class="fa fa-car"></i>
                        <span>Tip. Unidades</span>
                    </router-link>
                </li>
                <li>
                    <router-link class="nav-link" :to="'/placa'">
                        <i class="fa fa-car"></i>
                        <span>Placas</span>
                    </router-link>
                </li>
                <li>
                    <router-link class="nav-link" :to="'/tiposervicio'">
                        <i class="fa fa-sitemap"></i>
                        <span>Herramientas</span>
                    </router-link>
                </li>
                <li>
                    <router-link class="nav-link" :to="'/producto'">
                        <i class="fa fa-money"></i>
                        <span>Proviciones</span>
                    </router-link>
                </li>
                <li class="header">INVENTARIOS</li>
                <li>
                    <router-link class="nav-link" :to="'/catrefaccion'">
                        <i class="fa fa-sitemap"></i>
                        <span>General</span>
                    </router-link>
                </li>
                <li class="header">ADMINISTRACIÓN (RH)</li>
                <li>
                    <router-link class="nav-link" :to="'/employ'">
                        <i class="fa fa-users"></i>
                        <span>Empleados</span>
                    </router-link>
                </li>
                <li class="header">CONFIGURACIÓN</li>
                 <li>
                    <router-link class="nav-link" :to="'/usuario'">
                        <i class="fa fa-users"></i>
                        <span>Usuarios</span>
                    </router-link>
                </li>
                <li>
                    <router-link class="nav-link" style="text-decoration: none;" :to="'/exportar'">
                        <i class="fa fa-file-excel-o"></i>
                        <span>Actualizar Catalagos</span>
                    </router-link>
                </li>
                <li>
                    <router-link class="nav-link" :to="'/rol'">
                        <i class="fa fa-unlock"></i>
                        <span>Roles</span>
                    </router-link>
                </li>
                <li>
                    <router-link class="nav-link" :to="'/permiso'">
                        <i class="fa fa-key"></i>
                        <span>Permisos</span>
                    </router-link>
                </li>
                <li class="header"><span>REPORTES</span></li>
                <li>
                    <router-link class="nav-link" :to="'/reporte'">
                        <i class="fa fa-file"></i>
                        <span>Pedidos</span>
                    </router-link>
                </li>
            </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
    </div>
</template>
<script>
export default {
    props: ['ruta','usuario']
}
</script>
<style lang="">

</style>
