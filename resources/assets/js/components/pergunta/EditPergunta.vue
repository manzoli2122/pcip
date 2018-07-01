<template>             
	<div v-if="model"> 
		<section class="content-header">
			<h1>  <span id="div-titulo-pagina">Alterar Pergunta</span>   </h1>
		</section> 
		<section class="content">
			<div class="row">
		        <div class="col-xs-12">
		            <div class="box box-success" id="div-box">  

		              <form method="POST" action="#" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
		                  <div class="box-body">
		                      <div class="row">
		                         <div class="col-md-12">
		                             <div class="form-group" v-bind:class="{  'has-error': form.errors.has('texto') }">
		                                <label for="texto"  >Pergunta:</label>
		                                <textarea id="texto" name="texto" class="form-control input" v-model="form.texto" style="height:200px"> </textarea> 
		                                <span class="help is-danger" v-if="form.errors.has('texto')" v-text="form.errors.get('texto')"></span>
		                             </div>
		                          </div>
		                      </div>
		                      <div class="row">
		                      	<div class="col-md-12">
		                      		<div class="form-group" >
		                      			<h4><label  for="assunto_id" style="display: block;" >Dificuldade:</label></h4>
		                      			<select2   v-model="form.dificuldade" class="form-control  "> 
		                      				<option   value="Muito Facil"> Muito Fácil </option>
		                      				<option   value="Facil"> Fácil </option>
		                      				<option   value="Medio"> Medio </option>
		                      				<option   value="Dificil">   Difícil </option>
		                      				<option   value="Muito Dificil"> Muito Difícil </option>
		                      			</select2>                               
		                      		</div>
		                      	</div>
		                      </div>
		                      <div class="row">
		                      	<div class="col-md-12">
		                      		<div class="form-group" >
		                      			<h4><label  for="status" style="display: block;" >Status:</label></h4>
		                      			<select2   v-model="form.status" class="form-control  "> 
		                      				<option   value="Criada"> Criada </option>
		                      				<option   value="Validada"> Validada </option>
		                      				<option   value="Suspensa"> Suspensa </option>
		                      				<option   value="Finalizada">   Finalizada </option>
		                      			</select2>                               
		                      		</div>
		                      	</div>
		                      </div>
		                      <div class="row">
		                         <div class="col-md-12">
		                             <div class="form-group" v-bind:class="{  'has-error': form.errors.has('resumo') }">
		                                <label for="resumo"  >Resumo da Pergunta:</label>
		                                <textarea id="resumo" name="resumo" v-model="form.resumo" class="form-control input" style="height:300px"></textarea> 
		                                  <span class="help is-danger" v-if="form.errors.has('resumo')" v-text="form.errors.get('resumo')"></span>
		                             </div>
		                          </div> 
		                      </div>
		                      <div class="row">
		                      	<div class="col-md-12">
		                      		<div id="div-form-produto-produto" class="form-group" >
		                      			<h4><label  for="assunto_id" style="display: block;" >Assunto:</label></h4>
		                      			<select2   v-model="form.assunto_id" class="form-control produto_id_select">
		                      				<option    value="">Selecione a Assunto </option> 
		                      				<option v-for="item in assunto" :key="item.id" :value="item.id"> {{ item.nome }}</option>
		                      			</select2>                               
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
        		assunto: '',             
               	model:'',
               	form: new Form({
                    texto: '',    
                    resumo: '',
                    assunto_id:'' ,
                    dificuldade:'',    
                    status:'',    

               	})
            }
    },
 	
 	watch: {
          
         model: function (newmodel, oldmodel) {
            this.form.texto = this.model.texto;
            this.form.resumo = this.model.resumo;
            this.form.assunto_id = this.model.assunto_id ;
            this.form.dificuldade = this.model.dificuldade ;
            this.form.status = this.model.status ;
            alertProcessandoHide();
          },

    },    

 	created() {
 		

 		axios.get(this.url + '/assunto'  )
 		.then(response => {
 			this.assunto = response.data ;
 		})
 		.catch(error => {
 			toastErro('Não foi possivel achar as assunto');

 		});

 		alertProcessando();
    	axios.get(this.url + '/' + this.$route.params.id )
 		.then(response => {
 			this.model = response.data ;
 		})
 		.catch(error => {
 			toastErro('Não foi possivel achar as pergunta');
 		});
 		


    },
 
        
 

 	methods: {
            
            onSubmit() {
                this.form.patch(this.url +'/' + this.$route.params.id )
                    .then(response => 
                        swal({
                               
                              type: 'success',
                              showCloseButton: true,
                              title: 'Pergunta Atualizada com sucesso!!',
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
