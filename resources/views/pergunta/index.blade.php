@extends('templates.master')

@section('content-header')
    Pergunta
@endsection

@section('content')
	<div id="pergunta">		
	 	<router-view :url="{{ json_encode( route('pergunta.index')  ) }}"></router-view> 
	</div>	
@endsection


@push(Config::get('app.templateMasterScript' , 'script') )	
	<script src="{{ mix('js/pergunta.js') }}" type="text/javascript"></script>
@endpush