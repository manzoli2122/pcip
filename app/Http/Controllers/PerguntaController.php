<?php

namespace App\Http\Controllers ;
 
use App\Models\Assunto;

use App\Models\Pergunta;

use Illuminate\Http\Request;

use View;

use DB ;

class PerguntaController extends VueController
{

    
    protected $model;   
    
    protected $name = "Pergunta";    
    
    protected $view = 'pergunta' ;
    
    

    public function __construct(Pergunta $pergunta){        
        $this->model = $pergunta;         
        $this->middleware('auth')->except('respostas');  

        $this->middleware('permissao:perguntas')->except('respostas') ;  

        $this->middleware('permissao:perguntas_cadastrar')->only('store');

        $this->middleware('permissao:perguntas_excluir')->only('destroy');

        $this->middleware('permissao:perguntas_ativar')->only('ativar');


    }





    public function respostas(Request $request , $id){  
            
        if( !$model = $this->model->find($id)    ){       
            return response()->json( 'pergunta não encontrada' , 500);                  
        } 
        $resposta = $model->resposta()->select('id', 'texto' )->get() ;        
        return response()->json(  $resposta->shuffle() , 200);
         
    }






    public function show(Request $request , $id)
    {
         
        try {
            if( !$model = $this->model->with('assunto')->with('resposta')->find($id) ){       
                return response()->json(['erro' => true , 'msg' => ''  , 'data' => null ], 200);    
            }                   
            return response()->json( $model , 200);
        }         
        catch(Exception $e) {           
            return response()->json(['erro' => true , 'msg' => ''  , 'data' => null ], 200);    
        }
    }







    public function ativar(Request $request , $id)
    {
        try {
            if( !$model = $this->model->with('assunto')->with('resposta')->find($id) ){       
                return response()->json(['erro' => true , 'msg' => ''  , 'data' => null ], 200);    
            }   
            $model->ativo =  !$model->ativo;               
            $model->save();
            return response()->json( $model , 200);
        }         
        catch(Exception $e) {           
            return response()->json(['erro' => true , 'msg' => ''  , 'data' => null ], 200);    
        }
    }
    





     public function assuntos(){  
        $assunto = Assunto::select('id', 'nome' )->get();
        return response()->json(  $assunto , 200);
    }






    public function destroy( Request $request, $id)
    {
        try
        {                      
            if( !$model = $this->model->find($id) ){     
                return response()->json(['erro' => true , 'msg' => 'Aconteceu um Erro interno.'  , 'data' => null ], 200);  
            }

            foreach ($model->resposta as $resposta ) {
                 $resposta->delete();
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
