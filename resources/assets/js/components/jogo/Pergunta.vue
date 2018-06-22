<template>             
  <div>
      <div class="row" v-if="ispergunta">
          <div class="col-xs-12">
              <h4 class="text-center" style="margin:0px; margin-bottom:10px;">
                <span><b>DISCIPLINA:</b> {{ pergunta.assunto.disciplina.nome  }} </span>
              </h4> 
          </div>
      </div>

      <div class="box box-success box-solid" v-if="ispergunta" > 
        <div class="box-header with-border">
            <h1 class="box-title" style="font-size: 20px;"><b>Pergunta:</b> <span v-html="pergunta.texto"></span> </h1>
        </div>  
        <form method="post" action="#"  @submit.prevent="onSubmit">        
            <input name="pergunta_id"   type="hidden" :value="pergunta.id"> 
            <div class="box-body">  
                <div class="row">
                    <div v-for="resposta in respostas" class="col-md-12">
                        <div class="radio">
                            <label style="font-size: 18px;" v-bind:class="[temp_errada === resposta.id ? 'text-red' : '' , respondido & (resposta.id === pergunta.resposta_certa_id)  ? 'text-green' : '']"  >
                                <input style="margin-top:8px;" type="radio" required name="resposta" :value="resposta.id" v-model="form.selected">
                                <span v-html="resposta.texto"></span>  
                            </label>
                        </div>
                    </div>
                </div> 
            </div>   
            <div class="box-footer align-right">                  
                <a class="btn btn-default btn-block" style="padding:10px; font-size:20px; background-color: #646464; color:white;" v-if="respondido" v-bind:class="respondido ? '' : 'disabled' " v-on:click="proximaPergunta()">  Proxima Pergunta  </a>        
                <button class="btn btn-success btn-block" style="padding:10px; font-size:20px" v-if="!respondido" v-bind:class="respondido ? 'disabled' : ''  "  type="submit"><i class="fa fa-check"></i> Responder  </button>
            </div>
        </form>      
    </div>






    <div class="row"  v-if="ispergunta">          
          <div class="col-xs-12">  
            <h4><span> <b> Acertos:</b> {{  placar.certas  }}</span></h4>
          </div>
          <div class="col-xs-12">  
            <h4><span> <b>Erradas:</b> {{ placar.erradas }}</span></h4>
          </div>               
    </div>

  </div>
</template>










<script>


  import Form from '../../core/Form';
  const ipAPI = 'https://api.ipify.org?format=json';
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

               temp_errada:'',
               respondido:'',
               pergunta:'',
               ispergunta: true ,
               respostas:'' ,

               placar:'',
         }
    },



    watch: {
          
         pergunta: function (newpergunta_id, oldpergunta_id) {
            this.atualizaRespostas();
            this.ispergunta = true;
          }

    },    






    methods: {


        onSubmit() {

            if( this.form.selected === this.pergunta.resposta_certa_id ){
              // toastSucessoCentro('você Acertou!!');
              

                 swal({
                    //position: 'top-end',
                    type: 'success',
                    showCloseButton: true,
                    title: 'Você Acertou!!',
                    timer: 5000,
                    width: 400,
                     // onOpen: () => {
                     //    swal.showLoading()
                     //  },
                    //confirmButtonColor: '#3085d6',
                    confirmButtonColor: '#646464',
                    confirmButtonText: '<h4>Proxima Pergunta</h4>',
                    confirmButtonClass: 'bg-green',
                  })
                  .then((result) => {
                        if (result.value) {
                          this.proximaPergunta();
                        }
                  });


              

                  // swal.queue([{
                  //   title: 'Your public IP',
                  //   confirmButtonText: 'Show my public IP',
                  //   text:
                  //     'Your public IP will be received ' +
                  //     'via AJAX request',
                  //   showLoaderOnConfirm: true,
                  //   preConfirm: () => {
                  //     return fetch(ipAPI)
                  //       .then(response => response.json())
                  //       .then(data => swal.insertQueueStep(data.ip))
                  //       .catch(() => {
                  //         swal.insertQueueStep({
                  //           type: 'error',
                  //           title: 'Unable to get your public IP'
                  //         })
                  //       })
                  //   }
                  // }])



              // swal({
              //   title: 'Submit your Github username',
              //   input: 'text',
              //   showCancelButton: true,
              //   confirmButtonText: 'Look up',
              //   showLoaderOnConfirm: true,
              //   preConfirm: (login) => {
              //     return fetch(`//api.github.com/users/${login}`)
              //       .then(response => response.json())
              //       .catch(error => {
              //         swal.showValidationError(
              //           `Request failed: ${error}`
              //         )
              //       })
              //   },
              //   allowOutsideClick: () => !swal.isLoading()
              // }).then((result) => {
              //   if (result.value) {
              //     swal({
              //       title: `${result.value.login}'s avatar`,
              //       imageUrl: result.value.avatar_url
              //     })
              //   }
              // })


              // this.$swal('Você Acertou!!',
              //             '',
              //             'success'
              //             )



              // swal({
              //       type: 'success',
              //       title: 'Você Acertou!!',                    
              //     })
            }  
            else{
              // this.$swal('Você Errou!!',
              //             '',
              //             'error'
              //             )


              // this.$swal({
              //   title: "Você Errou!!",
              //   text: this.ispergunta ,
              //   icon: "error",
              //   button: {
              //           ok: "Ok",
              //           proxima: "Proxima", 
              //     },
              // });
              
              swal({
                    //position: 'top-end',
                    type: 'error',
                    title: 'Você Errou!!',
                    timer: 5000,
                     width: 400,
                     // onOpen: () => {
                     //    swal.showLoading()
                     //  },
                    confirmButtonColor: '#646464',
                    confirmButtonText: '<h4>Proxima Pergunta</h4>',
                     confirmButtonClass: 'bg-red',
                  })
                  .then((result) => {
                        if (result.value) {
                          this.proximaPergunta();
                        }
                  });



              // swal("Você Errou!!", {
              //     icon: "error",
              //     buttons: {
              //       ok: "Ok",
              //       proxima: {
              //         text: "Próxima Pergunta",
              //         value: "proxima",
              //         className: 'bg-red',
              //       },
              //     },
              //   })
              // .then((value) => {
              //           switch (value) {
                       
              //             case "proxima":
              //               this.proximaPergunta();
              //               // swal("Pikachu fainted! You gained 500 XP!");
              //               break;
                       
              //             default:
              //               //swal("Got away safely!");
              //           }
              //         });

              // swal({
              //       type: 'error',
              //       title: 'Você Errou!!',
              //       // text: 'Something went wrong!',
              //       footer: '<a class="btn btn-default btn-block" style="padding:10px; font-size:20px; background-color: #646464; color:white;" v-if="respondido" v-bind:class="respondido ? \'\' : \'disabled\' " v-on:click="proximaPergunta()">  Proxima Pergunta  </a>',
              //     })
              // toastErroCentro('você Errou!!');
              this.temp_errada =  this.form.selected;
            }

            this.respondido = true ;

            this.form.post( this.url )
                .then(response => {
                  this.placar = response ;
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


        atualizaRespostas(){
            this.form.pergunta_id = this.pergunta.id ;
            axios.post(this.url + '/' + this.pergunta.id + '/respostas' )
                .then(response => {
                  this.respostas = response.data ;
                })
                .catch(error => {
                  console.log('erro ao atualiza Respostas');
                });
        },




        proximaPergunta(){
               this.temp_errada = '';    
               this.respostas = '';            
               this.respondido = false ;
               this.ispergunta = false;
               window.scrollTo(0, 0);

               axios.get(this.url + '/proximo'  )
                    .then(response => {
                    this.pergunta = response.data ;
                    })
                    .catch(error => {
                      toastErro('Não foi possivel achar a proxima pergunta, talvez vc ja tenha feito todas!!!!!!!!!!!!');
                     
                    });
        },


    },


    created() {
         this.proximaPergunta()
    },

  

  }

</script>
