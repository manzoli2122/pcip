<template>             
	<div>

		<section class="content-header" v-if="model">
			<h1> Resposta: <span v-html="model.texto"></span></h1>
			<h4>	<span> pergunta: {{ model.pergunta_id }}</span></h4>
			<h5> 	<span> Tentativa:   {{ model.count }}</span>	</h5>
		</section>     

		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-success">  
						<div class="box-body"> </div>
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
                      toastErro('Não foi possivel achar as respsota');
                    });
    },
        
    methods: {

    	excluir() {
    		let vm = this;
	    	alertConfimacaoSweet('Confirma a Exclusão da Disciplina', '',
		        function() { 
		            vm.excluirItem();
		        }
		    );
	    	
 
        },


        excluirItem() {
 
		    axios.delete(this.url + '/' + this.$route.params.id )
		                    .then(response => {
		                    	toastSucesso('Excluido com Sucesso');
		                    })
		                    .catch(error => {
		                      toastErro('Não foi possivel Excluir');
		                    }); 

		             this.$router.push('/')
		},

	}

 
}


    
</script>
