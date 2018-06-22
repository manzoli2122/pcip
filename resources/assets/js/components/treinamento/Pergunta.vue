<template>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">   
        <div class="row">
          <div class="col-xs-12"><h4 class="titulo" v-if="pergunta"><b>DISCIPLINA:</b> {{ pergunta.assunto.disciplina.nome  }}</h4></div>
        </div>
        <div class="box box-success box-solid">
          <div class="box-header with-border"><h1 class="box-title"><b>Pergunta:</b><span v-html="pergunta.texto"></span></h1></div>  
          <form method="post" action="#"  @submit.prevent="onSubmit">   
            <div class="box-body">  
              <div class="row">
                <div v-for="resposta in pergunta.resposta" class="col-md-12">
                  <div class="radio"  v-bind:class="[respondido & (resposta.id === pergunta.resposta_certa_id) ? 'text-green' : '']">
                    <label v-bind:class="[temp_errada === resposta.id ? 'text-red' : '' ]"  >
                      <input  style="margin-top: 8px;" type="radio" required name="resposta" :value="resposta.id" v-model="form.selected">
                      <span v-html="resposta.texto"></span>  
                    </label>
                  </div>
                </div>
              </div> 
            </div> 
            <div class="box-footer align-right">  
              <a class="btn btn-default btn-block btn-proximo" v-if="respondido" v-bind:class="respondido ? '' : 'disabled'" v-on:click="proximaPergunta()">
                Proxima Pergunta  
              </a> 
              <button class="btn btn-success btn-block btn-responder" v-if="!respondido" v-bind:class="respondido ? 'disabled' : '' "  type="submit">
                <i class="fa fa-check"></i> Responder  
              </button>
            </div>
          </form>      
        </div>
        <div class="box box-warning box-solid" v-show="respondido"> 
          <div class="box-header with-border text-center"><h1 class="box-title"><b>Definições Abordadas</b></h1></div>            
          <div class="box-body"><div class="row"><div class="col-md-12"><span v-html="pergunta.resumo"></span></div></div></div>   
        </div>
        <div class="row">
          <div class="col-xs-12"><h5 v-if="pergunta"><b>ASSUNTO:</b> {{ pergunta.assunto.nome  }} </h5></div> 
          <div class="col-xs-12"><h5 v-if="pergunta"><b>Dificuldade:</b> {{ pergunta.dificuldade  }} </h5></div> 
          <div class="col-xs-12"><h4><b> Acertos:</b> {{  placar.certas  }}</h4></div>
          <div class="col-xs-12"><h4><b>Erradas:</b> {{ placar.erradas }}</h4></div>  
          <div class="col-xs-12"><h4><b>Questões respondidas: </b><span v-for="item in placar.realizadas">{{  item }} , </span></h4></div>
        </div>
      </div>
    </div>
    <div class="row"> 
      <div class="col-xs-12"><h3><b>Aproveitamento:</b> {{ parseInt( placar.certas/(placar.certas + placar.erradas)*100)}}%</h3></div> 
    </div>




    <div class="row"> 
      <div class="col-xs-12"><h3><b>Dificuldade:</b></h3> <span v-for="dif in temp.dificuldade">{{dif}} , </span>  </div> 
    </div>
     <form method="post" action="#"  @submit.prevent="enviarDificuldade">  
            
            <div class="box-body">  
              <div class="row">
                <div   class="col-md-12">
                  <div class="checkbox">
                    <label >
                      <input  style="margin-top: 8px;" type="checkbox"  name="muitofacil" value="1" v-model="dificuldade.muitofacil">
                       Muito Fácil
                    </label>

                    <label style=" margin-left: 25px;">
                      <input  style="margin-top: 8px; " type="checkbox"  name="facil" value="1" v-model="dificuldade.facil">
                       Fácil
                    </label>

                    <label style=" margin-left: 25px;">
                      <input  style="margin-top: 8px; " type="checkbox"  name="medio" value="1" v-model="dificuldade.medio">
                       Médio
                    </label>

                    <label style=" margin-left: 25px;">
                      <input  style="margin-top: 8px; " type="checkbox"  name="dificil" value="1" v-model="dificuldade.dificil">
                       Difícil
                    </label>

                    <label style=" margin-left: 25px;">
                      <input  style="margin-top: 8px; " type="checkbox"  name="muitodificil" value="1" v-model="dificuldade.muitodificil">
                      Muito Difícil
                    </label>
 

                  </div>
                   
                </div>
              </div> 
            </div> 
            <div class="box-footer align-right">  
               
              <button class="btn btn-success btn-block "   type="submit">
                <i class="fa fa-check"></i> Alterar Dificuldade  
              </button>
            </div>
          </form>      


  </section>
 

</template>




<script>
  import Form from '../../core/Form';
  export default {
    props:[
          'url',              
    ],

    data() {
        return {                
            form: new Form({
                  selected:'',
                  pergunta_id:'',
            }), 

            dificuldade: new Form({
                  muitofacil:'',
                  facil:'',
                  medio:'',
                  dificil:'',
                  muitodificil:'',
            }), 

            temp:'',
             temp_errada:'',
             respondido:'',
             pergunta:'',          
             placar:'',
        }
    },



    watch: {
        
       pergunta: function (newpergunta_id, oldpergunta_id) {
          this.form.pergunta_id = this.pergunta.id ;
          alertProcessandoHide();
        }

    },    


      
    methods: {

        onSubmit() {
         
          if( this.form.selected === this.pergunta.resposta_certa_id ){
            let vm = this;
            swal({ 
                    type: 'success',
                    showCloseButton: true,
                    title:  '<span class="text-green">Você Acertou!!</span><br>' +  vm.pergunta.resumo ,
                    width: '98%', 
                    confirmButtonColor: '#646464',
                    confirmButtonText: '<h4>Proxima Pergunta</h4>',
                    confirmButtonClass: 'bg-green',
                  })
                  .then((result) => {
                        if (result.value) {
                          this.proximaPergunta();
                        }
                  });

            
          }  
          else{
            let vm = this;
            swal({ 
                    type: 'error',
                    title:  '<span class="text-red">Você Errou!!</span><br>' + vm.pergunta.resumo ,
                    showCloseButton: true,
                    width: '98%',
                    confirmButtonColor: '#646464',
                    confirmButtonText: '<h4>Proxima Pergunta</h4>',
                     confirmButtonClass: 'bg-red',
                  })
                  .then((result) => {
                        if (result.value) {
                          this.proximaPergunta();
                        }
                  });
            this.temp_errada =  this.form.selected;
          }

          this.respondido = true ;

          this.form.post( this.url )
            .then(response => {
              console.log(response);
              this.placar = response ;
            })            
            .catch(errors => console.log(errors));
        },



        enviarDificuldade() {
          
          this.dificuldade.post( this.url + '/dificuldade')
            .then(response => {
              console.log(response); 
              this.temp = response ;
              // alert('ok');
            })            
            .catch(errors => console.log(errors));
        },




        atualizarPergunta(){
          axios.post(  this.url + '/' + this.pergunta_id   )
          .then(response => {
            this.pergunta = response.data ;
          })
          .catch(error => {
            console.log('erro ao atualiza Pergunta');
          });
        },


 




        proximaPergunta(){
         this.temp_errada = ''; 
         this.respostas = '';
         this.respondido = false ;
         alertProcessando();
         window.scrollTo(0, 0);
         axios.get(this.url + '/proximo'  )
         .then(response => {
          this.pergunta = response.data ;
        })
         .catch(error => {
          toastErro('Não foi possivel achar a proxima pergunta, talvez vc ja tenha feito todas!!!!!!!!!!!!');
          console.log('erro na proxima pergunta');
          alertProcessandoHide();
          this.respondido = true ;
        });
       },


      },


      created() {
        this.proximaPergunta()
      },

        
     }



     </script>

    <style scoped>

      .content {
        padding: 10px;
      }

      .titulo{
        margin:0px; 
        margin-bottom:10px;
         text-align: center;
      }

      .box-title{
        font-size: 20px;       
      }

      .btn-proximo{
        padding:10px; 
        font-size:20px; 
        background-color: #646464; 
        color:white;
      }

      .btn-responder{
        padding:10px; 
        font-size:20px
      }

      .box-body{
        font-size: 18px;
      }

    </style>