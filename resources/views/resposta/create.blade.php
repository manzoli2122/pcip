@extends('templates.master')


@section('content')
	
	<section class="content-header">
        <h1>  <span id="div-titulo-pagina">Adicionar Resposta</span>   </h1>
    </section> 

     <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success" id="div-box">						
						<div id="app">						
							<formulario-cadastro-resposta :pergunta="{{ json_encode( $pergunta  ) }}" > </formulario-cadastro-resposta>
						</div>					 
                </div>
            </div>
        </div>
    </section>

@endsection