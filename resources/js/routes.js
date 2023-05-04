import Vue from "vue";
import Router from "vue-router";

Vue.use(Router)
const isuserLoggedIn = false;
const router =  new Router({
    routes: [
        {
            path: '/login',
            name: 'login',
            component: require('./components/modulos/autenticate/login.vue').default
        },
        {
            path: '/',
            meta: {
                requiresAuth: true
            },
            name: 'dashboard.index',
            component: require('./components/modulos/dashboard/index.vue').default
        },
        {
            path: '/servicio',
            name: 'servicio.index',
            component: require('./components/modulos/servicio/index.vue').default
        },
        {
            path: '/cliente',
            name: 'cliente.index',
            component: require('./components/modulos/cliente/index.vue').default
        },
        {
            path: '/categoria',
            name: 'categoria.index',
            component: require('./components/modulos/categoria/index.vue').default
        },
        {
            path: '/producto',
            name: 'producto.index',
            component: require('./components/modulos/producto/index.vue').default
        },

        //catalagos generales
        {
            path: '/tipounidades',
            name: 'tipounidades.index',
            component: require('./components/modulos/catunidad/index.vue').default
        },
        {
            path: '/tipounidades/crear',
            name: 'tipounidades.crear',
            component: require('./components/modulos/catunidad/create.vue').default
        },
        {
            path: '/tipounidades/:id/editar',
            name: 'tipounidades.editar',
            component: require('./components/modulos/catunidad/edit.vue').default,
            props: true
        },
        //
        {
            path: '/tipodocumento',
            name: 'tipodocumento.index',
            component: require('./components/modulos/catdocumento/index.vue').default
        },
        {
            path: '/tiposervicio',
            name: 'tiposervicio.index',
            component: require('./components/modulos/catservicio/index.vue').default
        },

        {
            path: '/usuario',
            meta: {
                needsAuth: true
            },
            name: 'usuario.index',
            component: require('./components/modulos/usuario/index.vue').default
        },
        {
            path: '/usuario/crear',
            name: 'usuario.crear',
            component: require('./components/modulos/usuario/create.vue').default
        },
        {
            path: '/usuario/:id/editar',
            name: 'usuario.editar',
            component: require('./components/modulos/usuario/edit.vue').default,
            props: true
        },
        {
            path: '/usuario/:id/ver',
            name: 'usuario.ver',
            component: require('./components/modulos/usuario/view.vue').default,
            props: true
        },
        {
            path: '/usuario/:id/permiso',
            name: 'usuario.permiso',
            component: require('./components/modulos/usuario/permission.vue').default,
            props: true
        },

        {
            path: '/rol',
            name: 'rol.index',
            component: require('./components/modulos/rol/index.vue').default
        },
        {
            path: '/rol/crear',
            name: 'rol.crear',
            component: require('./components/modulos/rol/create.vue').default
        },
        {
            path: '/rol/:id/editar',
            name: 'rol.editar',
            component: require('./components/modulos/rol/edit.vue').default,
            props: true
        },

        {
            path: '/permiso',
            name: 'permiso.index',
            component: require('./components/modulos/permiso/index.vue').default
        },
        {
            path: '/permiso/crear',
            name: 'permiso.crear',
            component: require('./components/modulos/permiso/create.vue').default
        },
        {
            path: '/permiso/:id/editar',
            name: 'permiso.editar',
            component: require('./components/modulos/permiso/edit.vue').default,
            props: true
        },

        {
            path: '/reporte',
            name: 'reporte.index',
            component: require('./components/modulos/reporte/index.vue').default
        }
    ],
    mode: 'history',
    linkActiveClass: 'linkeado'
});
export default router;

