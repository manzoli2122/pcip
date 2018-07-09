<?php

namespace App\Http\Controllers;



use App\User;
use Illuminate\Http\Request;
use DB ;



class UsuarioController extends VueController
{

    
    protected $model;   
    
    protected $name = "User";    
    
    protected $view = 'user' ;
    
    

    public function __construct(User $user){
        $this->model = $user; 
        $this->middleware('auth');

        $this->middleware('permissao:usuarios') ;
        
    }



    


    
    // public function index(Request $request){  
        
    //     return view('user.index');
         
    // }

    
    // public function create()
    // {
    //     return view('user.create');
    // }
    
    


    public function store(Request $request)
    {
        $this->validate( $request , $this->model->rules() );         
        
        $data = $request->all();        
            
        $data['password'] = bcrypt("senha123");

        $this->model->create( $data);

        return response()->json( 'Cadastro realizado com sucesso' , 200);
        
    }


    
    
    
    
    
    
     
    // /**
    // * Processa a requisição AJAX do DataTable na página de listagem.
    // * Mais informações em: http://datatables.yajrabox.com
    // *
    // * @return \Illuminate\Http\JsonResponse
    // */
    // public function getDatatable( Request $request )
    // {
    //     $models = $this->model->get();
    //     return \Yajra\DataTables\DataTables::of($models)                
    //          ->make(true);
    // }
    

    
     

}
