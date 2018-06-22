<template>             
    <div>
      <section class="content-header">
        <h1>  <span id="div-titulo-pagina">Adicionar Resposta</span>   </h1>
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
                                      <label for="texto"  >Texto da Resposta:</label>
                                      <textarea id="texto" name="texto" class="form-control input" v-model="form.texto" style="height:150px"> </textarea>                                      
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
                             <div class="col-md-12">
                              <div id="div-form-produto-produto" class="form-group" >
                                <h4><label  for="pergunta_id" style="display: block;" >Pergunta:</label></h4>
                               <select2   v-model="form.pergunta_id" class="form-control produto_id_select">
                                  <option    value="">Selecione a Pergunta </option> 
                                  <option v-for="item in perguntas" :key="item.id" :value="item.id"> {{ item.texto }}</option>                       
                               </select2>                               
                              </div>
                              </div>
                          </div>

                      </div>
                      <div class="box-footer align-right">
                          <router-link  to="/" exact>
                              <a class="btn btn-default">  <i class="fa fa-reply"></i> <span>  Voltar </span> </a>
                          </router-link>  
                          <button  style="margin-left: 5px;" class="btn btn-success"   :disabled="form.errors.any()">Cadastrar</button>
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
               perguntas: '',              
               form: new Form({
                    texto: '',   
                    pergunta_id: '',   
                    correta:'false' ,          
               })
            }
        },

    created() {
          axios.get(this.url + '/perguntas'  )
                    .then(response => {
                    this.perguntas = response.data ;
                    })
                    .catch(error => {
                      toastErro('Não foi possivel achar as assunto');
                     
                    });
    },

        methods: {
            
            onSubmit() {
                this.form.post(this.url)
                    .then(response => 
                       swal({
                               
                              type: 'success',
                              showCloseButton: true,
                              title: 'Pergunta Cadastrada com sucesso!!',
                              timer: 5000,
                              width: 400,
                               
                              confirmButtonColor: '#646464',
                              confirmButtonText: '<h4>OK</h4>',
                              confirmButtonClass: 'bg-green',

                            })
                       )
                    .catch(errors => console.log(errors));
            }

        },
    }


    
</script>
