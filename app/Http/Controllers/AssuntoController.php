<?php

namespace App\Http\Controllers ;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Models\Assunto;

use App\Models\Disciplina;

use Illuminate\Http\Request;

use View;

use DB ;

class AssuntoController extends VueController
{

    
    protected $model;   
    
    protected $name = "Assunto";    
    
    protected $view = 'assunto' ;
    
    




    public function __construct(Assunto $assunto){        
        $this->model = $assunto;         
        $this->middleware('auth');                                 
    }




    public function disciplinas(){  
        $disciplina = Disciplina::select('id', 'nome' )->get();
        return response()->json(  $disciplina , 200);
    }





    public function show(Request $request , $id)
    {
        try {
            if( !$model = $this->model->with('disciplina')->find($id) ){       
                return response()->json(['erro' => true , 'msg' => ''  , 'data' => null ], 200);    
            }                   
            return response()->json( $model , 200);
        }         
        catch(Exception $e) {           
            return response()->json(['erro' => true , 'msg' => ''  , 'data' => null ], 200);    
        }
    }




    public function perguntas(Request $request , $id)
    {
        try {
            if( !$model = $this->model->find($id) ){       
                return response()->json(['erro' => true , 'msg' => ''  , 'data' => null ], 200);    
            }                   
            return response()->json( $model->perguntas()->with('resposta')->get() , 200);
        }         
        catch(Exception $e) {           
            return response()->json(['erro' => true , 'msg' => ''  , 'data' => null ], 200);    
        }
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
            }

            if( $model->perguntas->count() !== 0 ){     
                return response()->json(['erro' => true , 'msg' => 'Aconteceu um Erro interno.'  , 'data' => null ], 500);  
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
 
   


}
