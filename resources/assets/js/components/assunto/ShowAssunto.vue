<template>             
	<div v-if="model">
		<section class="content-header">
			<h1>
				<span id="div-titulo-pagina">{{ model.nome }}</span>
			</h1>
		</section>      
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-success">  
						<div class="box-body">            
							<section  class="row text-center dados">    
								<div class="col-12 col-sm-12 dado">
									<h1 style="text-align:center;"> Descrição: </h1>
								</div>  
							</section>
							<section class="row text-center dados">    
								<div class="col-12 col-sm-12 dado">
									<h4 style="text-align:left;">
										<span v-html="model.descricao"></span><br> 
									</h4>
								</div>     
								<div class="col-12 col-sm-12 dado">
									<h4 style="text-align:left;"> Data de Criação: {{model.created_at}} </h4>
								</div>
								<div class="col-12 col-sm-12 dado">
									<h4 style="text-align:left;"> Disciplina: {{model.disciplina.nome}} </h4>
								</div>
							</section>
							
							<section  class="row text-center dados">    
								<div class="col-12 col-sm-12 dado">
									<h1 style="text-align:center;"> Perguntas </h1>
								</div>  
							</section>

							<section  v-for="pergunta in perguntas" class="row text-center dados">    
								<div class="col-12 col-sm-12 dado">
									<h1 style="text-align:center;"> Pergunta {{pergunta.id}}: </h1>
									<p style="text-align:left;"> 
										  
											<span v-html="pergunta.texto"></span><br>

											<span v-for="resposta in pergunta.resposta">
												( )<span v-html="resposta.texto"></span><br>
											</span>

											<br>

										<span v-html="pergunta.resumo"></span>
									</p>
								</div>  
							</section>
 

						</div>
						<div class="box-footer align-right">
							<button class="btn btn-danger" v-on:click="excluir"><i class="fa fa-trash"></i> Excluir</button>
						        <router-link  to="/" exact>
						            <a class="btn btn-default">  <i class="fa fa-reply"></i> <span>  Voltar </span> </a>
	 	                        </router-link>        
						</div>
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
               perguntas:'',

            }
    },

    watch: {
          
         model: function (newmodel, oldmodel) {
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

 		axios.get(this.url + '/' + this.$route.params.id + '/perguntas' )
	 		.then(response => {
	 			this.perguntas = response.data ;
	 		})
	 		.catch(error => {
	 			toastErro('Não foi possivel achar as disciplinas');
	 		});
    },
        

    methods: {

    	excluir() {
    		let vm = this;
	    	alertConfimacaoSweet('Confirma a Exclusão do Assunto', '',
		        function() { 
		            vm.excluirItem();
		        }
		    );
	    	
 
        },


        excluirItem() {
 
		    axios.delete(this.url + '/' + this.$route.params.id )
		                    .then(response => {
		                    	toastSucesso('Excluido com Sucesso');
		                    	this.$router.push('/')
		                    })
		                    .catch(error => {
		                      toastErro('Não foi possivel Excluir');
		                    }); 

		             
		},

	}




    }


    
</script>
