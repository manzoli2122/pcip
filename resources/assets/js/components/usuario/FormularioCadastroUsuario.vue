<template>             
  <div>
      <section class="content-header">
          <h1>  <span id="div-titulo-pagina">Adicionar Usuario</span>   </h1>
      </section> 
      <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success" id="div-box">  

                  <form method="POST" action="#" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                      <div class="box-body">
                          <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group" v-bind:class="{  'has-error': form.errors.has('name') }">
                                      <label for="name"  >Nome:</label>
                                      <input type="text" id="name" name="name" class="form-control input" v-model="form.name"> 
                                      <span class="help is-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                                 </div>
                              </div>
                          </div>
                          <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group" v-bind:class="{  'has-error': form.errors.has('email') }">
                                      <label for="email"  >Email:</label>
                                      <input type="email" class="form-control" name="email" placeholder="Email do Usuario" v-model="form.email">
                                      <span class="help is-danger" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
                                 </div>
                              </div>
                          </div>

                          <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group" v-bind:class="{  'has-error': form.errors.has('apelido') }">
                                      <label for="apelido"  >Apelido:</label>
                                      <input type="text" id="apelido" name="apelido" class="form-control input" v-model="form.apelido"> 
                                      <span class="help is-danger" v-if="form.errors.has('apelido')" v-text="form.errors.get('apelido')"></span>
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
               form: new Form({
                    name: '',    
                    email: '',
                    apelido:''           
               })
            }
    },
 
        

    methods: {
            
            onSubmit() {
                this.form.post(this.url)
                    .then(response => 
                        swal({
                               
                              type: 'success',
                              showCloseButton: true,
                              title: 'Disciplina Cadastrada com sucesso!!',
                              timer: 5000,
                              width: 400,
                               
                              confirmButtonColor: '#646464',
                              confirmButtonText: '<h4>OK</h4>',
                              confirmButtonClass: 'bg-green',

                            })
                  
                     // alert('Wahoo!')
                      )
                    .catch(errors => console.log(errors));
            }

    }
        
    }


    
</script>
