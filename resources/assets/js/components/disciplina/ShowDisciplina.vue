<template>             
	<div>
		<section class="content-header">
			<h1>
				<span>{{ model.nome }}</span>
			</h1>
		</section>      
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-success">  
						<div class="box-body">            

							<section class="row text-center dados">    
								<div class="col-12 col-sm-12 dado">
									<h4>Descrição: {{model.descricao}} </h4>
								</div>     
								<div class="col-12 col-sm-6 dado">
									<h4> Data de Criação: {{model.created_at}} </h4>
								</div>
							</section>

							<section  class="row text-center dados">  
								<div class="col-12 col-sm-12 dado">
									<h1 style="text-align:center;"> Assuntos: </h1>
								</div> 
							</section>

							<section  v-for="assunto in assuntos"  class="row text-center dados"> 
								<div class="col-12 col-sm-12 dado">
									<p style="text-align:left;">{{assunto.perguntas_count}} - {{assunto.nome}} - id:{{assunto.id}}</p>
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
               assuntos:'',
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


        axios.get(this.url + '/' + this.$route.params.id + '/assuntos')
                    .then(response => {
                    this.assuntos = response.data ;
                    })
                    .catch(error => {
                      toastErro('Não foi possivel achar as disciplinas');
                    });
    },

  

    methods: {

    	excluir() {
    		let vm = this;
	    	alertConfimacaoSweet('Confirma a Exclusão do dISCIPLINA', '',
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




<style scoped>
	h4 {
		text-align:left;
	}
</style>