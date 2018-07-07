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







    public function destroy( Request $request, $id)
    {
        try
        {                      
            if( !$model = $this->model->find($id) ){     
                return response()->json('Item não encontrado.' , 404 );  
            }

            if( $model->assuntos->count() !== 0 ){     
                return response()->json(['erro' => true , 'msg' => 'Aconteceu um Erro interno.'  , 'data' => null ], 500);  
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
 

}
