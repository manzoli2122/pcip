<template>  
  <div>
    <section class="content-header">
      <h1>
        <span>Listagem dos Assunto </span>
        <small>
          <router-link   to="/create" exact>
            <a class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Cadastrar Assunto </a>
          </router-link>  
        </small>
      </h1>
    </section>  

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success"> 
            <div class="box-body">
              <table class="table table-bordered table-striped table-hover" id="datatable">
                <thead> 
                  <tr>
                    <th pesquisavel style="max-width:35px">ID</th>
                    <th pesquisavel>Nome</th>
                     
                    <th pesquisavel>disciplina</th>
                    <th>disciplina</th>
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
        { data: 'id', name: 'id'  },
        { data: 'nome', name: 'nome' },
        
        { data: 'disciplina_id', name: 'disciplina_id' }, 
        { data: 'disciplina.nome', name: 'disciplina.nome' }, 
        { data: 'action', name: 'action', orderable: false, searchable: false, class: 'align-center'}
        ],
      });

    }

  },

  mounted() {
    this.modelIndexDataTableFunction(this.url);
  }



}


    
</script>



<style scoped>

      small {
       float: right;
      }

      .box-body{
        padding-top: 5px; padding-bottom: 3px;
      }

</style>
