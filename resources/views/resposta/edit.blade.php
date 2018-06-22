@extends('templates.master')


@section('content')
	
	<section class="content-header">
        <h1>  <span id="div-titulo-pagina">Alterar Resposta</span>   </h1>
    </section> 

     <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success" id="div-box">						
						
					<form method="POST" action="{{route('resposta.update' , $model->id )}}" >

						 {{csrf_field()}}
                        <input name="_method" type="hidden" value="PATCH">
			            <div class="box-body">
			                <div class="row">
			                   <div class="col-md-12">

			                       <div class="form-group"  >
			                            <label for="texto"  >Texto da Resposta:</label>
			                             <input type="text" id="texto" name="texto" class="form-control input" value="{{$model->texto }}"> 

			                       </div>

			                    </div>

			               </div>
			               
			            </div>

			            <div class="box-footer align-right">
			                <button type="submit" class="btn btn-success">
			                    <i class="fa fa-check"></i> Salvar
			                </button>
			            </div>
			        </form>




									 
                </div>
            </div>
        </div>
    </section>

@endsection