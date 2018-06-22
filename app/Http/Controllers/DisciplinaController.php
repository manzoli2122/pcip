<?php

namespace App\Http\Controllers ;
 


use App\Models\Disciplina;

use Illuminate\Http\Request;

use View;

// use DB ;

class DisciplinaController extends VueController
{

    
    protected $model;   
    
    protected $name = "Disciplina";    
    
    protected $view = 'disciplina' ;
    
    



    public function __construct(Disciplina $disciplina){        
        $this->model = $disciplina;         
        $this->middleware('auth');

                                         
    }



    public function getAssuntos( Request $request ,  $id ){        
        try {
            if( !$model = $this->model->find($id) ){       
                return response()->json(['erro' => true , 'msg' => ''  , 'data' => null ], 200);    
            }                   
            return response()->json( $model->assuntos()->withCount('perguntas')->get() , 200);
        }         
        catch(Exception $e) {           
            return response()->json(['erro' => true , 'msg' => ''  , 'data' => null ], 200);    
        }
                                         
    }




    

    public function disciplinas(){  
        $disciplina = Disciplina::select('id', 'nome' )->get();
        return response()->json(  $disciplina , 200);
    }



}
