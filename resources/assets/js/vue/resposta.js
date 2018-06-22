import VueRouter from 'vue-router';
Vue.use(VueRouter);

let routes = [
    {
        path: '/',
        component: require('../components/resposta/Index')
    },
    {
        path: '/create',
        component: require('../components/resposta/FormularioCadastroResposta')
    },   
    {
        path: '/show/:id',
         component: require('../components/resposta/ShowResposta')
    },  
    {
        path: '/edit/:id',
        component: require('../components/resposta/EditResposta')
    },  
];


const resposta = new Vue({
    el: '#resposta',
    router : new VueRouter({
                                routes,
                                linkActiveClass: 'is-active'
        })
 
});
