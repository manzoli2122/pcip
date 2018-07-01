let mix = require('laravel-mix');
 
 
 
 
mix.js('resources/assets/js/vendor.js', 'public/js');
 

mix.js('resources/assets/js/vue/assunto.js', 'public/js');
mix.js('resources/assets/js/vue/disciplina.js', 'public/js');
mix.js('resources/assets/js/vue/jogo.js', 'public/js');
mix.js('resources/assets/js/vue/pergunta.js', 'public/js');
mix.js('resources/assets/js/vue/resposta.js', 'public/js');
mix.js('resources/assets/js/vue/treinamento.js', 'public/js');
mix.js('resources/assets/js/vue/usuario.js', 'public/js');
 




 
// Javascript auxiliares
mix.js('resources/assets/js/datatables-padrao.js', 'public/js');



mix.scripts([
    'node_modules/admin-lte/dist/js/adminlte.js'
], 'public/js/template.js');
 
// Javascript
mix.js([ 
    'resources/assets/js/alertas.js',
    'resources/assets/js/app.js',
    'resources/assets/js/operacoes-comuns.js',
], 'public/js/app.js');





// ===========================  CSS ================================================================

mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.css', 
    'node_modules/datatables.net-bs/css/dataTables.bootstrap.css',
    'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.css',
], 'public/css/bootstrap.css');



mix.styles([ 
    'node_modules/font-awesome/css/font-awesome.css',
    'node_modules/ionicons/dist/css/ionicons.css',   
], 'public/css/fonts.css');



mix.styles([   
    'node_modules/select2/dist/css/select2.css', 
], 'public/css/select2.css');



mix.styles([ 
    'node_modules/sweetalert2/dist/sweetalert2.css', 
    'node_modules/izitoast/dist/css/iziToast.css',   
], 'public/css/alertas.css');

 



// Template Admin LTE
mix.styles([
    'node_modules/admin-lte/dist/css/AdminLTE.css', 
    'node_modules/admin-lte/dist/css/skins/skin-green.css',
    'node_modules/admin-lte/dist/css/skins/skin-green-light.css',
], 'public/css/template.css');


 
// CSS
mix.styles([
    'resources/assets/css/geral.css',
    'resources/assets/css/app.css',
    'resources/assets/css/modal-processando.css',
], 'public/css/app.css');




// Fontes Glyphicons
mix.copy('node_modules/bootstrap/dist/fonts', 'public/fonts');

// Fontes Font-awesome
mix.copy('node_modules/font-awesome/fonts', 'public/fonts');

// Fontes Ionicons
mix.copy('node_modules/ionicons/dist/fonts', 'public/fonts');

 

 
mix.version();