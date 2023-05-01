import Vue from "vue";
import Router from "vue-router";

Vue.use(Router)

export default new Router({
    routes: [
        //{ path: '/', component: require('./components/plantilla/Content.vue').default }
        { path: '/', component: require('./components/modulos/dashboard/index.vue').default },
        { path: '/servicio', component: require('./components/modulos/servicio/index.vue').default },
        { path: '/cliente', component: require('./components/modulos/cliente/index.vue').default },
        { path: '/categoria', component: require('./components/modulos/categoria/index.vue').default },
        { path: '/producto', component: require('./components/modulos/producto/index.vue').default },

        //catalagos generales
        { path: '/tipounidades', component: require('./components/modulos/catunidad/index.vue').default },
        { path: '/tipodocumento', component: require('./components/modulos/catdocumento/index.vue').default },
        { path: '/tiposervicio', component: require('./components/modulos/catservicio/index.vue').default },

        { path: '/usuario', component: require('./components/modulos/usuario/index.vue').default },
        { path: '/usuario/crear', component: require('./components/modulos/usuario/create.vue').default },
        {
            path: '/usuario/:id/editar',
            name:'usuario.editar',
            component: require('./components/modulos/usuario/edit.vue').default,
            props:true
        },
        {
            path: '/usuario/:id/ver',
            name:'usuario.ver',
            component: require('./components/modulos/usuario/view.vue').default,
            props:true
        },

        { path: '/rol', component: require('./components/modulos/rol/index.vue').default },
        { path: '/permiso', component: require('./components/modulos/permiso/index.vue').default },
        { path: '/reporte', component: require('./components/modulos/reporte/index.vue').default }
    ],
    mode: 'history',
    linkActiveClass:'linkeado'
})
