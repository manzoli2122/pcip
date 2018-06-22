@extends('templates.master')

@section('content-header')
    Assunto
@endsection

@section('content')
	<div id="assunto">					  
        <router-view :url="{{ json_encode( route('assunto.index')  ) }}"></router-view>
	</div>	
@endsection

@push(Config::get('app.templateMasterScript' , 'script') )	
	<script src="{{ mix('js/assunto.js') }}" type="text/javascript"></script>
@endpush