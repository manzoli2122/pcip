<template>             
	<div>
		<section class="content-header">
			<h1>  <span id="div-titulo-pagina">Alterar Resposta</span>   </h1>
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
											<label for="texto">Texto da Resposta:</label>
											<textarea id="texto" name="texto" class="form-control input" v-model="form.texto" style="height:200px"></textarea>
											<span class="help is-danger" v-if="form.errors.has('texto')" v-text="form.errors.get('texto')"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div   class="form-group" >
											<h4><label  for="correta" style="display: block;" >CERTA?:</label></h4>
											<select v-model="form.correta" id="correta" class="form-control " name="correta" required style="width: 100%"> 
												<option  value="true">Sim</option>   
												<option  value="false" selected >Não</option>
											</select>                                 
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
                    texto: '',                        
                    correta: 'false'               
               	})
            }
    },
 	
 	watch: {
          
         model: function (newmodel, oldmodel) {
            this.form.texto = this.model.texto;
            this.form.pergunta_id = this.model.pergunta_id;
            //this.form.correta = this.model.correta ;
            alertProcessandoHide();
          },

    },    

 	 
    mounted() {
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
                    	console.log(response)
                        // swal({
                               
                        //       type: 'success',
                        //       showCloseButton: true,
                        //       title: 'Pergunta Atualizada com sucesso!!' ,
                        //       timer: 5000,
                        //       width: 400,
                               
                        //       confirmButtonColor: '#646464',
                        //       confirmButtonText: '<h4>OK</h4>',
                        //       confirmButtonClass: 'bg-green',

                        //     })       
                      ) 
                    .catch(errors => console.log(errors));

                    this.$router.push('/')
            }

    }


    }


    
</script>
