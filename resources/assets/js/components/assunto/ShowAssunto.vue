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

							<section class="row text-center dados">    
								<div class="col-12 col-sm-12 dado">
									<h4 style="text-align:left;">Descrição: {{model.descricao}} </h4>
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
										 {{pergunta.texto}} <br>
											

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
        
 
    }


    
</script>
