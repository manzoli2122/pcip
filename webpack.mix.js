let mix = require('laravel-mix');
 

 
mix.js('resources/assets/js/vendor.js', 'public/js');
mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.css',
    'node_modules/font-awesome/css/font-awesome.css',
    'node_modules/ionicons/dist/css/ionicons.css',
    'node_modules/sweetalert2/dist/sweetalert2.css',
    'node_modules/datatables.net-bs/css/dataTables.bootstrap.css',
    'node_modules/izitoast/dist/css/iziToast.css',
    'node_modules/sweetalert2/dist/css/sweetalert2.css',
    'node_modules/select2/dist/css/select2.css',
    'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.css',
], 'public/css/vendor.css');


 

mix.js('resources/assets/js/vue/assunto.js', 'public/js');
mix.js('resources/assets/js/vue/disciplina.js', 'public/js');
mix.js('resources/assets/js/vue/jogo.js', 'public/js');
mix.js('resources/assets/js/vue/pergunta.js', 'public/js');
mix.js('resources/assets/js/vue/resposta.js', 'public/js');
mix.js('resources/assets/js/vue/treinamento.js', 'public/js');
mix.js('resources/assets/js/vue/usuario.js', 'public/js');
 
// Fontes Glyphicons
mix.copy('node_modules/bootstrap/dist/fonts', 'public/fonts');

// Fontes Font-awesome
mix.copy('node_modules/font-awesome/fonts', 'public/fonts');

// Fontes Ionicons
mix.copy('node_modules/ionicons/dist/fonts', 'public/fonts');

// Template Admin LTE
mix.styles([
    'node_modules/admin-lte/dist/css/AdminLTE.css', 
    'node_modules/admin-lte/dist/css/skins/skin-green.css',
    'node_modules/admin-lte/dist/css/skins/skin-green-light.css',
], 'public/css/template.css');

mix.scripts([
    'node_modules/admin-lte/dist/js/adminlte.js'
], 'public/js/template.js');
 
// Javascript
mix.js([ 
    'resources/assets/js/alertas.js',
    'resources/assets/js/app.js',
    'resources/assets/js/operacoes-comuns.js',
], 'public/js/app.js');

 
// Javascript auxiliares
mix.js('resources/assets/js/datatables-padrao.js', 'public/js');
 
// CSS
mix.styles([
    'resources/assets/css/geral.css',
    'resources/assets/css/app.css',
    'resources/assets/css/modal-processando.css',
], 'public/css/app.css');
 
mix.version();