<template>             
	<div>
		  <section class="content-header">
		      <h1>  <span id="div-titulo-pagina">Alterar Usuario</span>   </h1>
		  </section> 
		  <section class="content">
		    <div class="row">
		        <div class="col-xs-12">
		            <div class="box box-success" id="div-box">  

		              <form method="POST" action="#" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
		                  <div class="box-body">
		                      <div class="row">
		                         <div class="col-md-6">
		                             <div class="form-group" v-bind:class="{  'has-error': form.errors.has('name') }">
		                                  <label for="name"  >Nome:</label>
		                                  <input type="text" id="name" name="name" class="form-control input" v-model="form.name"> 
		                                  <span class="help is-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
		                             </div>
		                          </div>
		                      </div>
		                      <div class="row">
		                         <div class="col-md-6">
		                             <div class="form-group" v-bind:class="{  'has-error': form.errors.has('email') }">
		                                  <label for="email"  >Descricao:</label>
		                                  <input type="email" id="email" name="email" class="form-control input" v-model="form.email"> 
		                                  <span class="help is-danger" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
		                             </div>
		                          </div>
		                      </div>
                          <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group" v-bind:class="{  'has-error': form.errors.has('apelido') }">
                                      <label for="apelido"  >Apelido:</label>
                                      <input type="text" id="apelido" name="apelido" class="form-control input" v-model="form.apelido"> 
                                      <span class="help is-danger" v-if="form.errors.has('apelido')" v-text="form.errors.get('apelido')"></span>
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
                    name: '',    
                    email: '',
                    apelido:''            
               })
            }
    },
 	
 	watch: {
          
         model: function (newmodel, oldmodel) {
            this.form.name = this.model.name;
            this.form.email = this.model.email;
            this.form.apelido = this.model.apelido;
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
