import Vue from "vue";
import Router from "vue-router";

Vue.use(Router)

const router =  new Router({
    routes: [
        {
            path: '/login',
            name: 'login',
            component: require('./components/modulos/autenticate/login.vue').default
        },
        {
            path: '/',
            name: 'dashboard.index',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/dashboard/index.vue').default
        },
        {
            path: '/servicio',
            name: 'servicio.index',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/servicio/index.vue').default
        },
        {
            path: '/cliente',
            name: 'cliente.index',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/cliente/index.vue').default
        },
        {
            path: '/categoria',
            name: 'categoria.index',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/categoria/index.vue').default
        },
        {
            path: '/producto',
            name: 'producto.index',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/producto/index.vue').default
        },

        //catalagos generales
        {
            path: '/unidad',
            name: 'unidad.index',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/unidad/index.vue').default
        },
        {
            path: '/unidad/crear',
            name: 'unidad.crear',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/unidad/create.vue').default
        },
        {
            path: '/unidad/:id/editar',
            name: 'unidad.editar',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/unidad/edit.vue').default,
            props: true
        },
        {
            path: '/unidad/:id/listadoc',
            name: 'unidad.listadoc',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/unidad/listdoc.vue').default,
            props: true
        },



        {
            path: '/tipounidades',
            name: 'tipounidades.index',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/catunidad/index.vue').default
        },
        {
            path: '/tipounidades/crear',
            name: 'tipounidades.crear',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/catunidad/create.vue').default
        },
        {
            path: '/tipounidades/:id/editar',
            name: 'tipounidades.editar',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/catunidad/edit.vue').default,
            props: true
        },
        //
        {
            path: '/tipodocumento',
            name: 'tipodocumento.index',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/catdocumento/index.vue').default
        },
        {
            path: '/tiposervicio',
            name: 'tiposervicio.index',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/catservicio/index.vue').default
        },
        {
            path: '/placa',
            name: 'placa.index',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/placa/index.vue').default
        },
        {
            path: '/placa/crear',
            name: 'placa.crear',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/placa/create.vue').default
        },
        //

        {
            path: '/usuario',
            name: 'usuario.index',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/usuario/index.vue').default
        },
        {
            path: '/usuario/crear',
            name: 'usuario.crear',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/usuario/create.vue').default
        },
        {
            path: '/usuario/:id/editar',
            name: 'usuario.editar',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/usuario/edit.vue').default,
            props: true
        },
        {
            path: '/usuario/:id/ver',
            name: 'usuario.ver',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/usuario/view.vue').default,
            props: true
        },
        {
            path: '/usuario/:id/permiso',
            name: 'usuario.permiso',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/usuario/permission.vue').default,
            props: true
        },

        {
            path: '/rol',
            name: 'rol.index',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/rol/index.vue').default
        },
        {
            path: '/rol/crear',
            name: 'rol.crear',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/rol/create.vue').default
        },
        {
            path: '/rol/:id/editar',
            name: 'rol.editar',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/rol/edit.vue').default,
            props: true
        },

        {
            path: '/permiso',
            name: 'permiso.index',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/permiso/index.vue').default
        },
        {
            path: '/permiso/crear',
            name: 'permiso.crear',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/permiso/create.vue').default
        },
        {
            path: '/permiso/:id/editar',
            name: 'permiso.editar',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/permiso/edit.vue').default,
            props: true
        },

        {
            path: '/reporte',
            name: 'reporte.index',
            beforeEnter: (to, form, next) => {
                axios.get('/getUsuarioAutenticado').then((response) => {
                    next();
                })
                    .catch(() => {
                        return next({name:'login'});
                })
            },
            component: require('./components/modulos/reporte/index.vue').default
        }
    ],
    mode: 'history',
    linkActiveClass: 'linkeado'
});
/*
router.beforeEach((to, from, next) => {
   const requiresAuth = to.matched.some((record) => record.meta.requiresAuth);
    if (requiresAuth) {
        const isAuthenticated = JSON.parse(window.localStorage.getItem('isAuthenticated'));
        console.log(to);
        //next('/login'); // Redirect to the login page or any other route
    } else {
        next();
    }
}); */
export default router;

