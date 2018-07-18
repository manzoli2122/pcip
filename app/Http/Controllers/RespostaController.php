<?php

namespace App\Http\Controllers ;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Models\Resposta;

use App\Models\Pergunta;

use Illuminate\Http\Request;

use View;

use DB ;

class RespostaController extends VueController
{

    
    protected $model;   
    
    protected $name = "Resposta";    
    
    protected $view = 'resposta' ;
    
    

    public function __construct(Resposta $resposta){
        
        $this->model = $resposta; 
        
        $this->middleware('auth'); 

        $this->middleware('permissao:respostas') ;   
                            
    }




    /**
     * Show the page to create a new project.
     */
    public function create()
    {
    	$pergunta = Pergunta::select('id', 'texto' )->get();
        return view('resposta.create' , compact('pergunta'));
    }


     public function perguntas(){  
        $pergunta = Pergunta::select('id', 'texto' )->get();
        return response()->json(  $pergunta , 200);
    }



     /**
     * Store a new project in the database.
     */
    public function store(Request $request)
    {
        $this->validate( request(), $this->model->rules() );   
        $resposta = Resposta::create( $request->all() ) ;
        if( $request->input('correta') == 'true' ){
             $resposta->pergunta->resposta_correta()->associate($resposta) ;
              $resposta->pergunta->save();
        }
        return ['message' => 'resposta Created!'];
    }







    public function update(Request $request ,  $id )
    {        
        $this->validate( $request  , $this->model->rules() ); 
        if( !$model = $this->model->find($id) ){                 
            return response()->json( '' , 404);
        }  
        if( $request->input('correta') == 'true' ){
            // return response()->json($model, 200);
            $model->pergunta->resposta_correta()->associate($model) ;
            $model->pergunta->save();
        }
        if( !$update = $model->update($request->all()) ){
            return response()->json(['error' => 'not_update'], 500);
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
                return response()->json(['erro' => true , 'msg' => 'Aconteceu um Erro interno.'  , 'data' => null ], 200);        
               // return response()->json( '' , 404);
            }
            if( !$delete = $model->delete() ){
                return response()->json(['erro' => true , 'msg' => 'Aconteceu um Erro interno.'  , 'data' => null ], 200);
                //return response()->json(['error' => 'not_delete'], 500);
            }

            return response()->json(['erro' => false , 'msg' => $this->name . ' alterado no sistema' , 'data' =>  $delete ], 200 );
            // return response()->json( $delete , 200 );
            
        } 
        
        catch (Exception $e) {
                return response()->json(['erro' => true , 'msg' => 'Aconteceu um Erro interno.'  , 'data' => null ], 200);
               
            // return response()->json( $e->getMessage() , 500);
        }
    }




    
 









/**
     * Show the page to create a new project.
     */
    public function edit($id)
    {
       if( !$model = $this->model->find($id)    ){       
            return response()->json( 'resposta não encontrada' , 500);                  
        } 
        return view('resposta.edit' , compact('model'));
        
    }



   



}
