@extends('templates.master')

@section('content-header')
    Bem Vindo
@endsection

@section('small-content-header')
    É um prazer Servir!!!!
@endsection

@section('content')

<section class="row text-center Listagens">   
    @if(!Auth::check())
    <div class="row">
    	<div class="col-xs-10 col-xs-offset-1" >
    		<br>
          	<h1 class="text-center"> É um prazer servir!!! </h1> <br>
			<div class="text-center" >
				<a class="btn btn-success btn-block"  style="padding:10px; font-size:20px" href="{{route('jogo.iniciar')}}"> Vamos Treinar  !!! </a>
			</div>
		</div>
	</div>
   @endif
   

</section>

@endsection
