<template>             
	<div>
    <section class="content-header">
      <h1>  <span id="div-titulo-pagina">Alterar Disciplina</span>   </h1>
    </section> 
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success" id="div-box">  

            <form method="POST" action="#" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group" v-bind:class="{  'has-error': form.errors.has('nome') }">
                      <label for="nome"  >Nome:</label>
                      <input type="text" id="nome" name="nome" class="form-control input" v-model="form.nome"> 
                      <span class="help is-danger" v-if="form.errors.has('nome')" v-text="form.errors.get('nome')"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group" v-bind:class="{  'has-error': form.errors.has('descricao') }">
                      <label for="descricao"  >Descricao:</label>
                      <input type="text" id="descricao" name="descricao" class="form-control input" v-model="form.descricao"> 
                      <span class="help is-danger" v-if="form.errors.has('descricao')" v-text="form.errors.get('descricao')"></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer align-right">
                <router-link  to="/" exact>
                  <a class="btn btn-default">  <i class="fa fa-reply"></i> <span>  Voltar </span> </a>
                </router-link>		                      
                <button  style="margin-left: 5px;" class="btn btn-success"   :disabled="form.errors.any()">Salvar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>


<script>

import Form from '../../core/Form';

export default {
   
    props:[
      'url' 
    ], 

    data() {
        return {                
               model:'',
               form: new Form({
                    nome: '',    
                    descricao: ''               
               })
            }
    },
 	
 	watch: {
          
         model: function (newmodel, oldmodel) {
            this.form.nome = this.model.nome;
            this.form.descricao = this.model.descricao;
            alertProcessandoHide();
          }

    },    

 	created() {
          alertProcessando();
          axios.get(this.url + '/' + this.$route.params.id )
                    .then(response => {
                    this.model = response.data ;
                    })
                    .catch(error => {
                      toastErro('Não foi possivel achar as disciplinas');
                    });
    },
        
 

 	methods: {
            
            onSubmit() {
                this.form.patch(this.url +'/' + this.$route.params.id )
                    .then(response => 
                        swal({
                               
                              type: 'success',
                              showCloseButton: true,
                              title: 'Disciplina Atualizada com sucesso!!',
                              timer: 5000,
                              width: 400,
                               
                              confirmButtonColor: '#646464',
                              confirmButtonText: '<h4>OK</h4>',
                              confirmButtonClass: 'bg-green',

                            })       
                      )
                    .catch(errors => console.log(errors));

                    this.$router.push('/')
            }

    }


    }


    
</script>
