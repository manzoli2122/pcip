import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('./components/disciplina/IndexDisciplina')
    },

    {
        path: '/create',
        component: require('./components/disciplina/FormularioCadastroDisciplina')
    },

     
];

export default new VueRouter({
    routes,
    linkActiveClass: 'is-active'
});