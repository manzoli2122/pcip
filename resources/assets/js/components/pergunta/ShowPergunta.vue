<template>             
	<div> 
		<section class="content-header" v-if="model">
			<h1> Pergunta: <span v-html="model.texto"></span></h1>
			<h4>	<span> Disciplina: {{ model.assunto.disciplina.nome }}</span></h4>
			<h5>   <span> Assunto:   {{ model.assunto.nome }}</span>  </h5>
			<h5> 	<span> Dificuldade:   {{ model.dificuldade }}</span>	</h5>
		</section>     

		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-success">  
						<div class="box-body">            
							<section class="row"> 		                         
								<div class="col-12 col-sm-12" v-for="item in model.resposta" v-bind:class="[ item.id === model.resposta_certa_id ? 'text-red' : ''  ]"  >
									<h4>{{ item.id }} :  <span v-html="item.texto"></span>  {{ item.count }}  </h4>
								</div>
							</section>

						</div>
						<div class="box-footer align-right">
							<router-link  to="/" exact>
								<a class="btn btn-default">  <i class="fa fa-reply"></i> <span>  Voltar </span> </a>
							</router-link>        
							<button v-if="model.ativo" class="btn btn-danger" v-on:click="ativar_desativar()">Desativar</button>
							<button v-if="!model.ativo" class="btn btn-success" v-on:click="ativar_desativar()">Ativar</button>
							<button  class="btn btn-info" v-on:click="proxima()">Próxima</button>
						</div>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-xs-12">
					<div class="box box-success"> 
						<div class="box-body">    
							<section class="row">  
								<div class="col-12 col-sm-12 dado"  >
									<h4> <span v-html="model.resumo"></span>  </h4>
								</div>
							</section>
						</div>
					</div>
				</div>
			</div>

		</section>
	</div>
</template>


<script>
 
	export default {

		props:[
		'url' 
		], 

		data() {
			return {                
				model:'',
			}
		},

		watch: {
 
			$route: function(){
				 
				axios.get(this.url + '/' + this.$route.params.id )
				.then(response => {
					this.model = response.data ;
				})
				.catch(error => {
					toastErro('Não foi possivel achar a Pergunta');
				});
			}


		},   

		created() {
			alertProcessando();
			axios.get(this.url + '/' + this.$route.params.id )
			.then(response => {
				this.model = response.data ;
				alertProcessandoHide();
			})
			.catch(error => {
				toastErro('Não foi possivel achar a Pergunta');
				alertProcessandoHide();
			});
		},





		methods: {   
			ativar_desativar(){
				alertProcessando();
				axios.post(this.url + '/' + this.$route.params.id + '/ativar' )
				.then(response => {
					this.model = response.data ;
					alertProcessandoHide();
				})
				.catch(error => {
					if(error.response.status == '403'){
						//console.log(error.response);
						toastErro('Usuario sem Permissão!');
					}else{
						toastErro('Não foi possivel realizar a Operação!');
					}
					
					alertProcessandoHide();
				});
			},

			proxima(){
				let indice = 1 ;
				indice = indice + parseInt( this.$route.params.id ); 
				this.$router.push('/show/' + indice);
			},

		},


	}



</script>


<style scoped>
	button{
		margin-left: 5px;
	}
</style>
