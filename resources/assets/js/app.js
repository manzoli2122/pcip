window.exibeMsgGlobais = function() {
    if ($('#_success').length > 0 && $('#_success').val() !== '') {
        toastSucesso($('#_success').val());
        $('#_success').val('');
    }
    var contadorErro = 0;
    var MAX_MSG_ERRO = 5;
    $('input[name^="_errors"]').each(function() {
        if ($(this).val() !== '') {
            if (contadorErro < MAX_MSG_ERRO) {
                toastErro($(this).val());
                $(this).val('');
                contadorErro++;
            }
        }
    });
}

$(document).ready(function() {
    exibeMsgGlobais();
});




window.Vue = require('vue');





// window.Event = new class {
//     constructor () {
//         this.vue = new Vue();
//     } 

//     fire(event, data = null) {
//         this.vue.$emit(event, data);
//     } 

//     listen(event, callback) {
//         this.vue.$on(event, callback);
//     }
//  }

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('index-resposta', require('./components/resposta/Index.vue'));
Vue.component('formulario-cadastro-resposta', require('./components/resposta/FormularioCadastro.vue'));

Vue.component('select2', require('./components/SelectComponente.vue'));

const app = new Vue({
    el: '#app', 
});








/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

//window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));

//const app = new Vue({
//    el: '#app'
//});
