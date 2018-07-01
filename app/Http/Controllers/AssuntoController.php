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




}
