@extends('templates.master')

@section('content')

<section class="content-header">
	<h3 class="text-center">
        <span  id="div-titulo-pagina">{{ $model->assunto->disciplina->nome }}.</span>
    </h3>      
	
</section>	
<section class="content">
	<div class="row">
        <div class="col-xs-12">
            <div class="box box-success box-solid" > 
            	<div class="box-header with-border">
	              	<h1 class="box-title" style="font-size: 20px;"><b>Pergunta:</b> {!! $model->texto !!}</h1>
	            </div>
				<form method="post" action="{{route('jogo.responder')}}"  >            
				    {{csrf_field()}}
					 <input name="pergunta_id" value="{{$model->id}}" type="hidden"> 

				    <div class="box-body">	
				        <div class="row">
								@foreach(  $resposta->shuffle() as $item    )
									<div class="col-md-12">
												@if(isset($resultado))
													<div class="radio disabled">
													@if($resultado)
														<label   @if( $item->id == $resposta_certa) style="color:#4f4; font-size: 18px;"  @endif style="font-size: 18px;">
															<input style="margin-top: 8px;" type="radio" required name="resposta" value="{{$item->id}}" @if($item->id == $tentativa) checked @endif disabled> {!! $item->texto !!} 
													@else
														<label  @if( $item->id == $resposta_certa) style="color:#4f4; font-size: 18px;"  @endif  @if($item->id == $tentativa) style="color:red;font-size: 18px;"  @endif style="font-size: 18px;">
															<input   type="radio" required name="resposta" value="{{$item->id}}" @if($item->id == $tentativa) checked @endif disabled style="margin-top: 8px;"> {!! $item->texto !!}
													@endif
												@else
													<div class="radio">
														<label style="font-size: 18px;" >
															<input  style="margin-top: 8px;" type="radio" required name="resposta" value="{{$item->id}}">  {!! $item->texto !!}
												@endif

											</label>
										</div>
									</div>
								@endforeach 
				       </div> 
				    </div>   
				    <div class="box-footer align-right">	
						@if(isset($resultado))
							<a class="btn btn-warning" href="{{route('jogo.proximo')}}"> Proxima Pergunta </a>
						@else
							<button class="btn btn-success"  type="submit">
							    <i class="fa fa-check"></i> Responder
							</button> 
						@endif
				    </div>
				</form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
				<h5>        
			        <span><b>ASSUNTO:</b> {{ $model->assunto->nome }}. </span>         
			    </h5> 
		</div>
		<div class="col-xs-12">  
				<h4>
					<span> <b> Acertos:</b> {{ session('certas' , 0 )  }}</span>					
			    </h4>
        </div>
        <div class="col-xs-12">  
				<h4>
					<span> <b>Erradas:</b> {{   session('erradas' , 0 ) }}</span>
					
			    </h4>
        </div>

        <div class="col-xs-12">  
				<h3>
					
					@if( ( session('certas' , 0 ) + session('erradas' , 0 ) ) > 0 )
			        	<span> <b>Aproveitamento:</b> {{ number_format(  session('certas' , 0 ) / (session('certas' , 0 ) + session('erradas' , 0 ) ) * 100 , 2 , ',' , '.' )   }}%</span>
			        @endif
			    </h3>
        </div>

    </div>


</section>

	
	
@endsection
