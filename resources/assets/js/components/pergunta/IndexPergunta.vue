<template>  
  <div>

    <section class="content-header">
      <h1>
        <span id="div-titulo-pagina">Listagem das Perguntas </span>
        <small style="float: right;">
          <router-link   to="/create" exact>
            <a class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Cadastrar pergunta </a>
          </router-link> 
        </small>
      </h1>
    </section>  
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success" id="div-box"> 
            <div class="box-body" style="padding-top: 5px; padding-bottom: 3px;">
              <table class="table table-bordered table-striped table-hover" id="datatable">
                <thead> 
                  <tr>
                    <th pesquisavel style="max-width:35px">ID</th>
                    <th pesquisavel>Texto</th> 
                     <th pesquisavel>Assunto</th>       
                     <th pesquisavel>Dificuldade</th>       
                     <th pesquisavel>Status</th>       
                     <th>Disciplina</th>            
                     <th pesquisavel  style="max-width:35px">DD</th>            
                    <th class="align-center" style="width:140px">Ações</th>
                  </tr>
                </thead>  
              </table>
            </div>            
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
require('../../datatables-padrao');

export default {
   
  props:[
    'url'
  ],
 
  methods: {

    modelIndexDataTableFunction(url) {
      var dataTable = datatablePadrao('#datatable', {
        order: [[ 1, "asc" ]],
        ajax: { 
          url: url + '/getDatatable'
        },
        columns: [
        { data: 'id', name: 'pergunta.id'  },
        { data: 'texto', name: 'pergunta.texto' }, 
        { data: 'assunto.nome', name: 'assunto.nome' }, 
        { data: 'dificuldade', name: 'dificuldade' }, 
        { data: 'status', name: 'status' }, 
        { data: 'assunto.disciplina.nome', name: 'assunto.disciplina.nome' , orderable: false, searchable: false }, 
        { data: 'assunto.disciplina_id', name: 'assunto.disciplina_id' , orderable: true, searchable: true }, 
        { data: 'action', name: 'action', orderable: false, searchable: false, class: 'align-center'}
        ],
      });

      dataTable.on('draw', function () {

        $('[btn-excluir]').click(function (){
          excluirRecursoPeloId( $(this).data('id') , "Confirma a Exclusão da Disciplina", url , 
            function(){
              dataTable.row( $(this).parents('tr') ).remove().draw('page');
            }
            );
        }); 
      });
    }

  },

  mounted() {
    this.modelIndexDataTableFunction(this.url);
  }



}


    
</script>
