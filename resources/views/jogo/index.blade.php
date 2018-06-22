@extends('templates.master_treinamento')

@section('content')

<section class="content" style="padding: 10px;">
	<div class="row">
        <div class="col-xs-12">
				<div id="jogo">
					<formulario-jogo  											
									:url="{{ json_encode( route('jogo.index' ) )}}">											
					</formulario-jogo>
				</div>
        </div>
    </div>
</section>	
	
@endsection

@push(Config::get('app.templateMasterScript' , 'script') )	
	<script src="{{ mix('js/jogo.js') }}" type="text/javascript"></script>
@endpush