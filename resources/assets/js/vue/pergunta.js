import VueRouter from 'vue-router';
Vue.use(VueRouter);

let routes = [
    {
        path: '/',
        component: require('../components/pergunta/IndexPergunta')
    },
    {
        path: '/create',
        component: require('../components/pergunta/FormularioCadastroPergunta')
    },   
    {
        path: '/show/:id',
        component: require('../components/pergunta/ShowPergunta')
    },  
    {
        path: '/edit/:id',
        component: require('../components/pergunta/EditPergunta')
    },  
];


const pergunta = new Vue({
    el: '#pergunta',
    router : new VueRouter({
                                routes,
                                linkActiveClass: 'is-active'
        })
 
});
