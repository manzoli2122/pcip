@extends('templates.master')

@section('content-header')
    Pergunta
@endsection

@section('content')
	<div id="resposta">		
	 	<router-view :url="{{ json_encode( route('resposta.index')  ) }}"></router-view> 
	</div>	
@endsection


@push(Config::get('app.templateMasterScript' , 'script') )	
	<script src="{{ mix('js/resposta.js') }}" type="text/javascript"></script>
@endpush