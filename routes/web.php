<?php


Auth::routes();
Route::get('/alterar/senha', 'HomeController@alterarSenha')->name('alterar.senha');
Route::post('/alterar/senha', 'HomeController@updateSenha')->name('senha.update');




Route::get('/', 'HomeController@index')->name('home');




Route::post('disciplina/getDatatable', 'DisciplinaController@getDatatable')->name('disciplina.getDatatable');
Route::get('disciplina/{id}/assuntos', 'DisciplinaController@getAssuntos')->name('disciplina.assuntos');
Route::resource('disciplina', 'DisciplinaController')->except(['create', 'edit']); 
Route::get('assunto/disciplina', 'DisciplinaController@disciplinas')->name('assunto.disciplinas');





Route::get('assunto/{id}/perguntas', 'AssuntoController@perguntas')->name('assunto.perguntas');
Route::post('assunto/getDatatable', 'AssuntoController@getDatatable')->name('assunto.getDatatable');
Route::resource('assunto', 'AssuntoController')->except(['create', 'edit']);





Route::post('pergunta/{id}/ativar', 'PerguntaController@ativar')->name('pergunta.ativar');
Route::get('pergunta/assunto', 'PerguntaController@assuntos')->name('pergunta.assuntos');
Route::post('pergunta/getDatatable', 'PerguntaController@getDatatable')->name('pergunta.getDatatable');
Route::post('pergunta/{id}/respostas', 'PerguntaController@respostas')->name('pergunta.respostas');
Route::resource('pergunta', 'PerguntaController')->except(['create', 'edit']);







Route::get('resposta/perguntas', 'RespostaController@perguntas')->name('resposta.perguntas');
Route::post('resposta/getDatatable', 'RespostaController@getDatatable')->name('resposta.getDatatable');
Route::resource('resposta', 'RespostaController');





Route::post('usuarios/getDatatable', 'UsuarioController@getDatatable')->name('usuarios.getDatatable');
Route::resource('usuarios', 'UsuarioController')->except(['create', 'edit']);





Route::get( 'jogo/iniciar', 'JogoController@iniciar')->name('jogo.iniciar');
Route::get( 'jogo', 'JogoController@index')->name('jogo.index');
Route::post('jogo', 'JogoController@responder')->name('jogo.responder');
Route::post('jogo/{id}/respostas', 'JogoController@respostas')->name('pergunta.respostas');
Route::get('jogo/proximo', 'JogoController@proximo')->name('jogo.proximo');

 





Route::post('treinamento/dificuldade', 'TreinamentoController@alterarDificuldade')->name('treinamento.dificuldade');
Route::get('treinamento', 'TreinamentoController@index')->name('treinamento.index');
Route::post('treinamento', 'TreinamentoController@responder')->name('treinamento.responder');
Route::get('treinamento/proximo', 'TreinamentoController@proximo')->name('treinamento.proximo');
// Route::get('treinamento/proximo.json', 'TreinamentoController@proxima_pergunta_json')->name('treinamento.proximo.json');