<template>             
  <div>
    <section class="content-header">
      <h1>  <span id="div-titulo-pagina">Adicionar Pergunta</span>   </h1>
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
                    <label for="texto"  >Texto da Pergunta:</label>
                    <textarea id="texto" name="texto" class="form-control input" v-model="form.texto" style="height:150px"> </textarea>                                      
                    <span class="help is-danger" v-if="form.errors.has('texto')" v-text="form.errors.get('texto')"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
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
                <div class="col-md-7">
                  <div id="div-form-produto-produto" class="form-group" >
                    <h4><label  for="assunto_id" style="display: block;" >Assunto:</label></h4>
                    <select2   v-model="form.assunto_id" class="form-control produto_id_select">
                      <option    value="">Selecione a Assunto </option> 
                      <option v-for="item in assunto" :key="item.id" :value="item.id"> {{ item.nome }}</option>                       
                    </select2>                               
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                 <div class="form-group" v-bind:class="{  'has-error': form.errors.has('resumo') }">
                  <label for="resumo"  >Resumo da Pergunta:</label>
                  <textarea id="resumo" name="resumo" class="form-control input" v-model="form.resumo" style="height:250px"> </textarea>
                  <span class="help is-danger" v-if="form.errors.has('resumo')" v-text="form.errors.get('resumo')"></span>
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
       assunto: '',              
       form: new Form({
        texto: '',   
        assunto_id: '',   
        resumo:'' ,  
        dificuldade:'',        
      })
     }
   },

   created() {
    axios.get(this.url + '/assunto'  )
    .then(response => {
      this.assunto = response.data ;
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
