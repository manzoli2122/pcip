import VueRouter from 'vue-router';
Vue.use(VueRouter);

let routes = [
    {
        path: '/',
        component: require('../components/disciplina/IndexDisciplina')
    },
    {
        path: '/create',
        component: require('../components/disciplina/FormularioCadastroDisciplina')
    },   
    {
        path: '/show/:id',
        component: require('../components/disciplina/ShowDisciplina')
    },  
    {
        path: '/edit/:id',
        component: require('../components/disciplina/EditDisciplina')
    },  
];


const disciplina = new Vue({
    el: '#disciplina',
    router : new VueRouter({
                                routes,
                                linkActiveClass: 'is-active'
        })
 
});
