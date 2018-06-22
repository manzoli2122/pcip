@extends('templates.master_treinamento')

@section('content')
	<div  id="treinamento">		 
		<formulario-treinamento  
			:url="{{ json_encode( route('treinamento.index') ) }}" >
		</formulario-treinamento>
	</div>
@endsection

@push(Config::get('app.templateMasterScript' , 'script') )	
	<script src="{{ mix('js/treinamento.js') }}" type="text/javascript"></script>
@endpush