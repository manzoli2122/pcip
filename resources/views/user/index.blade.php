@extends('templates.master')

@section('content-header')
    Disciplina
@endsection

@section('content') 
	<div id="usuario">				
        <router-view :url="{{ json_encode( route('usuarios.index')  ) }}"></router-view>                 				
	</div>	
@endsection

@push(Config::get('app.templateMasterScript' , 'script') )	
	<script src="{{ mix('js/usuario.js') }}" type="text/javascript"></script>
@endpush

