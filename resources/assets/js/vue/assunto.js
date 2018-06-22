import VueRouter from 'vue-router';
Vue.use(VueRouter);

let routes = [
    {
        path: '/',
        component: require('../components/assunto/IndexAssunto')
    },
    {
        path: '/create',
        component: require('../components/assunto/FormularioCadastroAssunto')
    },   
    {
        path: '/show/:id',
        component: require('../components/assunto/ShowAssunto')
    },  
    {
        path: '/edit/:id',
        component: require('../components/assunto/EditAssunto')
    },  
];


const assunto = new Vue({
    el: '#assunto',
    router : new VueRouter({
                                routes,
                                linkActiveClass: 'is-active'
        })
 
});
