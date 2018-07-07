<template>  
  <div>
    <section class="content-header">
      <h1>
        <span>Listagem das Disciplinas </span>
        <small>   
          <router-link   to="/create" exact>
            <a class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Cadastrar Disciplina </a>
          </router-link>              
        </small>
      </h1>
    </section>  

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success" id="div-box"> 
            <div class="box-body">
              <table class="table table-bordered table-striped table-hover" id="datatable">
                <thead> 
                  <tr>
                    <th style="max-width:20px">ID</th>
                    <th pesquisavel>Nome</th>
                    <th>Descricao</th>  
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
        { data: 'descricao', name: 'descricao' }, 
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