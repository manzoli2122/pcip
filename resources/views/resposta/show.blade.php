<section class="content-header">
    <h1>
        <span id="div-titulo-pagina">{{ $model->nome }}</span>
    </h1>
</section>
        
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success" id="div-box"> 
                <div class="box-body">            
                    <div class="alert alert-default alert-dismissible align-center invisivel" id="divAlerta">
                        <label>Excluído</label>
                    </div>			
                    <section class="row text-center dados">    
                                
                      
                        <div class="col-12 col-sm-12 dado">
                            <h4 style="text-align:left;">Descrição: {{$model->descricao}} </h4>
                        </div>
                        
                        @perfil('Admin')
                            <div class="col-12 col-sm-6 dado">
                                <h4 style="text-align:left;"> Data de Criação: {{$model->created_at}} </h4>
                            </div>
                            <div class="col-12 col-sm-6 dado">
                                <h4 style="text-align:left;"> Data da ultima alteração: {{$model->updated_at}} </h4>
                            </div>
                        @endperfil
                    </section>
                </div>
                <div class="box-footer align-right">
                    @permissao('produtos-soft-delete')
                        <button type="button" class="btn btn-danger"  onclick="modelDelete( {{$model->id}} , '{{ route('disciplina.index') }}')" remover-apos-excluir>
                            <i class="fa fa-times"></i> Excluir
                        </button>
                    @endpermissao
                    @permissao('produtos-editar')
                        <button  style="margin-left: 5px;" type="button" class="btn btn-success"  onclick="modelEditar( {{$model->id}} , '{{ route('disciplina.index') }}' )" remover-apos-excluir  title="Editar">
                            <i class="fa fa-pencil"></i> Editar
                        </button>                        
                    @endpermissao
                    <button  style="margin-left: 5px;" type="button" class="btn btn-default"  onclick="modelVoltarIndex()" > <i class="fa fa-reply"></i> Voltar </button>            
                </div>
            </div>
        </div>
    </div>
</section>
        
        
        
        