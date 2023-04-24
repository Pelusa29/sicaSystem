<template lang="">
    <div>
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                <img :src="ruta +'/img/avatar.png'" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                <p>Ernesto Roman</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="active treeview menu-open">
                    <router-link class="nav-link active" :to="'/'">
                        <i class="fa fa-dashboard"></i><span>Dashboard</span>
                    </router-link>
                </li>
                <li class="header">OPERACIONES</li>
                <li>
                    <router-link class="nav-link" :to="'/pedido'">
                        <i class="fa fa-cart-plus"></i><span>Pedidos</span>
                    </router-link>
                </li>
                <li>
                    <router-link class="nav-link" :to="'/cliente'">
                        <i class="fa fa-users"></i>
                        <span>Clientes</span>
                    </router-link>
                </li>
                <li class="header">CONFIGURACIÓN</li>
                <li>
                    <router-link class="nav-link" :to="'/categoria'">
                        <i class="fa fa-sitemap"></i>
                        <span>Categorias</span>
                    </router-link>
                </li>
                <li>
                    <router-link class="nav-link" :to="'/producto'">
                        <i class="fa fa-apple"></i>
                        <span>Productos</span>
                    </router-link>
                </li>
                <li class="header">ADMINISTRACIÓN</li>
                <li>
                    <router-link class="nav-link" :to="'/usuario'">
                        <i class="fa fa-users"></i>
                        <span>Usuarios</span>
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
                    <router-link class="nav-link" :to="'/pedido'">
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
    props:['ruta']
}
</script>
<style lang="">

</style>
