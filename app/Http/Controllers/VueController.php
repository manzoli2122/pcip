<?php

namespace App\Http\Controllers ;

use Illuminate\Http\Request;

use View;


class VueController extends Controller
{

    
    protected $model;   
    
    protected $name  ;    
    
    protected $view   ;
    


    public function index(Request $request){          
        return view("{$this->view}.index");         
    }



   



     /**
     * Store a new project in the database.
     */
    public function store(Request $request)
    {
        $this->validate( $request , $this->model->rules() );         
        
        if(!$insert  = $this->model->create( $request->all() ) ){
            return response()->json( 'Cadastro não realizado.' , 500);
        }

        return response()->json( 'Cadastro realizado com sucesso' , 200);
        
    }














    /**
     * Store a new project in the database.
     */
    public function update(Request $request ,  $id )
    {        
        $this->validate( $request  , $this->model->rules() ); 
        
        if( !$model = $this->model->find($id) ){                 
            return response()->json( 'Item Não encontrado.' , 404);
        }  

        if( !$update = $model->update($request->all()) ){
            return response()->json('Item não atualizado.', 500);
        }

        return response()->json( 'Atualização realizada com sucesso' , 200);
       
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
                    return  '<a href="#/edit/'.$linha->id.'" class="btn btn-success btn-datatable" title="Editar" style="margin-left: 10px;"><i class="fa fa-pencil"></i></a>'
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
                return response()->json('Item não encontrado.' , 404 );  
            }
            if( !$delete = $model->delete() ){
                return response()->json('Aconteceu um Erro interno.' , 500);
            }
            return response()->json(['erro' => false , 'msg' => $this->name . ' alterado no sistema' , 'data' =>  $delete ], 200 );            
        }         
        catch (Exception $e) {
                return response()->json( 'Aconteceu um Erro interno.', 500);
        }
    }
 






 

    public function show(Request $request , $id)
    {
        try {
            if( !$model = $this->model->find($id) ){       
                return response()->json('Item não encontrado.', 404 );    
            }                   
            return response()->json( $model , 200);
        }         
        catch(Exception $e) {           
            return response()->json( 'Erro interno', 500);    
        }
    }





 

 


}
