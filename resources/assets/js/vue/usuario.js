import VueRouter from 'vue-router';
Vue.use(VueRouter);

let routes = [
    {
        path: '/',
        component: require('../components/usuario/IndexUsuario')
    },
    {
        path: '/create',
        component: require('../components/usuario/FormularioCadastroUsuario')
    },   
    {
        path: '/show/:id',
        component: require('../components/usuario/ShowUsuario')
    },  
    {
        path: '/edit/:id',
        component: require('../components/usuario/EditUsuario')
    },  
];


const usuario = new Vue({
    el: '#usuario',
    router : new VueRouter({
                                routes,
                                linkActiveClass: 'is-active'
        })
 
});
