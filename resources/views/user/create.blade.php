@extends('templates.master')

@section('content')
    <section class="content-header">
        <h1>
            <span id="div-titulo-pagina">Adicionar Usuario</span>
        </h1>
    </section>            
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success" id="div-box">
                    <form method="post" action="{{route('usuarios.store')}}" id="form-model">            
                        {{csrf_field()}}
                        <div class="box-body">	
                            <div class="row">
                               <div class="col-md-6">            
                                   <div class="form-group  ">
                                       <label for="name">Nome</label>
                                       <input type="text" class="form-control" name="name" placeholder="Nome do Usuario" value="{{old('name')}}">
                                        
                                   </div>
                                   <div class="form-group  ">
                                       <label for="email">Email</label>
                                       <input type="email" class="form-control" name="email" placeholder="Email do Usuario" value="{{old('email')}}">
                                       
                                   </div>            
                                    
                                    
                               </div>
                               <div class="col-md-6">
                                              
                                   <div class="form-group {{ $errors->has('apelido') ? 'has-error' : ''}}">
                                       <label for="apelido">Apelido</label>
                                       <input type="text" class="form-control" name="apelido" placeholder="Apelido do Cliente"
                                           value="{{old('apelido')}}">
                                       {!! $errors->first('apelido', '<p class="help-block">:message</p>') !!}
                                   </div>  
                                                      
                               </div>                             
                           </div> 
                       </div>  

                       	<div class="box-footer align-right">
                         
                       	 	<button  style="margin-left: 5px;" class="btn btn-success"   ><i class="fa fa-check"></i> Salvar</button> 
                    	</div>

                    </form>
    
                    
    
                </div>
            </div>
        </div>
    </section>
    @endsection