@extends('templates.master')

@section('content-header')
    Disciplina
@endsection

@section('content') 
	<div id="disciplina">				
        <router-view :url="{{ json_encode( route('disciplina.index')  ) }}"></router-view>                 				
	</div>	
@endsection

@push(Config::get('app.templateMasterScript' , 'script') )	
	<script src="{{ mix('js/disciplina.js') }}" type="text/javascript"></script>
@endpush