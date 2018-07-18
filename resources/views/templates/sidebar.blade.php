<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">     
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU PRINCIPAL</li>        
        
       
      @if(Route::getRoutes()->hasNamedRoute('jogo.index'))
          @if(!Auth::check())
          <li>
            <a href="{{ route('jogo.index')}}">
              <i class="fa fa-tasks fa-lg fa-2x text-green"></i> <span> Jogar </span>
            </a>
          </li>
          @endif    
      @endif 


       @if(Route::getRoutes()->hasNamedRoute('treinamento.index'))
          
          <li>
            <a href="{{ route('treinamento.index')}}">
              <i class="fa fa-tasks fa-lg fa-2x text-red"></i> <span> Treinar </span>
            </a>
          </li>
              
      @endif 



        @if(Route::getRoutes()->hasNamedRoute('resposta.create'))
          @perfil('Admin')
            <li>
              <a href="{{ route('resposta.create')}}">
                <i class="fa  fa-bullhorn fa-lg fa-2x text-green"></i> <span> Criar resposta </span>
              </a>
            </li>
          @endperfil       
        @endif 
        

      

        @if(Route::getRoutes()->hasNamedRoute('pergunta.index'))
           @permissao('perguntas')
            <li>
              <a href="{{ route('pergunta.index')}}">
                <i class="fa fa-question fa-lg fa-2x text-blue"></i> <span>  pergunta </span>
              </a>
            </li>
           @endpermissao      
        @endif 

        
        @if(Route::getRoutes()->hasNamedRoute('assunto.index'))
          @permissao('assuntos')
            <li>
              <a href="{{ route('assunto.index')}}">
                <i class="fa fa-comments fa-lg fa-2x text-orange"></i> <span>  Assunto </span>
              </a>
            </li>
          @endpermissao      
        @endif 


  
         @if(Route::getRoutes()->hasNamedRoute('disciplina.index'))
          @perfil('Admin')
            <li>
              <a href="{{ route('disciplina.index')}}">
                <i class="fa fa-book fa-lg fa-2x text-green"></i> <span>  Disciplina </span>
              </a>
            </li>
          @endperfil       
        @endif 

 

        @if(Route::getRoutes()->hasNamedRoute('autorizacao')) 
        @permissao('admin-master-power')

            <li class="treeview">
              <a href="#">
                  <i class="glyphicon glyphicon-wrench fa-lg fa-2x text-red"></i> <span>ADMIN</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">

                @if(Route::getRoutes()->hasNamedRoute('autorizacao_users.index'))
                  @permissao('usuarios')
                    <li class="active">
                      <a  href="{{ route('autorizacao_users.index') }}"> <span class="sr-only">(current)</span>
                        <i class="fa fa-id-card" aria-hidden="true"></i>
                        Usuários
                      </a>
                    </li>
                  @endpermissao
                @endif


                @if(Route::getRoutes()->hasNamedRoute('perfis.index'))
                  @permissao('usuarios')
                    <li class="active">
                      <a  href="{{ route('perfis.index') }}"> <span class="sr-only">(current)</span>
                        <i class="fa fa-id-card" aria-hidden="true"></i>
                        Perfil
                      </a>
                    </li>
                  @endpermissao 
                @endif



                @if(Route::getRoutes()->hasNamedRoute('permissoes.index'))
                  @permissao('usuarios')
                    <li class="active">
                      <a  href="{{ route('permissoes.index') }}"> <span class="sr-only">(current)</span>
                        <i class="fa fa-id-card" aria-hidden="true"></i>
                        Permissões
                      </a>
                    </li>
                  @endpermissao
                @endif

              </ul>
            </li>

          @endpermissao
        @endif
         
        

        @if(Route::getRoutes()->hasNamedRoute('usuarios.index'))
          @perfil('Admin')
          <li>
            <a href="{{ route('usuarios.index')}}">
              <i class="fa fa-users fa-lg fa-2x text-blue"></i> <span> Usuarios </span>
            </a>
          </li>
          @endperfil     
      @endif 


      @if(Route::getRoutes()->hasNamedRoute('resposta.index'))
          @perfil('Admin')
          <li>
            <a href="{{ route('resposta.index')}}">
              <i class="fa fa-bullhorn fa-lg fa-2x text-orange"></i> <span> resposta </span>
            </a>
          </li>
          @endperfil     
      @endif 

   
      </ul>
    </section>
   
  </aside>
