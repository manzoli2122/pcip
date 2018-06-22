<?php

namespace App\Http\Controllers ;

use Illuminate\Http\Request;

use View;

// use DB ;

class VueController extends Controller
{

    
    protected $model;   
    
    protected $name  ;    
    
    protected $view   ;
    

    // public function __construct(Disciplina $disciplina){        
    //     $this->model = $disciplina;         
    //     $this->middleware('auth');                                 
    // }






    public function index(Request $request){          
        return view("{$this->view}.index");         
    }



   



     /**
     * Store a new project in the database.
     */
    public function store(Request $request)
    {
        $this->validate( $request , $this->model->rules() );         
        
        $this->model->create( $request->all() );

        return response()->json( 'Cadastro realizado com sucesso' , 200);
        // Disciplina::forceCreate([
        //     'nome' => request('nome'),
        //     'descricao' => request('descricao')
        // ]); 
        // return ['message' => 'Disciplina Created!'];
    }














    /**
     * Store a new project in the database.
     */
    public function update(Request $request ,  $id )
    {        
        $this->validate( $request  , $this->model->rules() ); 
        if( !$model = $this->model->find($id) ){                 
            return response()->json( '' , 404);
        }  
        if( !$update = $model->update($request->all()) ){
            return response()->json(['error' => 'not_update'], 500);
        }

        return response()->json( 'Atualização realizada com sucesso' , 200);
        // return ['message' => 'Disciplina Updated!'];        

    }
    





    








    
    /**
    * Processa a requisição AJAX do DataTable na página de listagem.
    * Mais informações em: http://datatables.yajrabox.com
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function getDatatable( Request $request ){
        try
        {            
            $models = $this->model->getDatatable();
            $result = \Yajra\DataTables\DataTables::of($models)
                ->addColumn('action', function($linha) {
                    return '<button data-id="'.$linha->id.'" type="button" class="btn btn-danger  btn-xs btn-datatable" btn-excluir title="Excluir">                               <i class="fa fa-times"> </i> </button> '
                                                   
                         . '<a href="#/edit/'.$linha->id.'" class="btn btn-success btn-datatable" title="Editar" style="margin-left: 10px;"><i class="fa fa-pencil"></i></a>'

                         . '<a href="#/show/'.$linha->id.'" class="btn btn-primary btn-datatable" title="Visualizar" style="margin-left: 10px;"><i class="fa fa-search"></i></a>'
                        ;
                })->make(true);
            return $result ;        
        }         
        catch (Exception $e) {           
            return response()->json( $e->getMessage() , 500);
        }
        
    }
    
    







    
    public function destroy( Request $request, $id)
    {
        try
        {                      
            if( !$model = $this->model->find($id) ){     
                return response()->json(['erro' => true , 'msg' => 'Aconteceu um Erro interno.'  , 'data' => null ], 200);  
            }
            if( !$delete = $model->delete() ){
                return response()->json(['erro' => true , 'msg' => 'Aconteceu um Erro interno.'  , 'data' => null ], 200);
            }
            return response()->json(['erro' => false , 'msg' => $this->name . ' alterado no sistema' , 'data' =>  $delete ], 200 );            
        }         
        catch (Exception $e) {
                return response()->json(['erro' => true , 'msg' => 'Aconteceu um Erro interno.'  , 'data' => null ], 200);
        }
    }
 






 

    public function show(Request $request , $id)
    {
        try {
            if( !$model = $this->model->find($id) ){       
                return response()->json(['erro' => true , 'msg' => ''  , 'data' => null ], 200);    
            }                   
            return response()->json( $model , 200);
        }         
        catch(Exception $e) {           
            return response()->json(['erro' => true , 'msg' => ''  , 'data' => null ], 200);    
        }
    }





 

 


}
