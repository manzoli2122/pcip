<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Pergunta;
use App\Models\Resposta;

class JogoController extends Controller
{

   
  	protected $model;   



    public function __construct(Pergunta $pergunta)
    {
    	$this->model = $pergunta;       
    }



    
    public function index()
    {
        return view('jogo.index');
    }






    public function iniciar(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('jogo.index') ; //view('jogo.index');
    }








    public function respostas(Request $request , $id){  
        sleep(1);
        if( !$model = $this->model->find($id)    ){       
            return response()->json( 'pergunta não encontrada' , 500);                  
        } 
        $resposta = $model->resposta()->select('id', 'texto' )->get() ;        
        return response()->json(  $resposta->shuffle() , 200);
         
    }







    public function responder(Request $request)
    {

        if( !$model = $this->model->find(  $request->input('pergunta_id')  )   ){       
            return response()->json(  'pergunta nao encontrada' , 500);
        }

        if( !$resposta = Resposta::find(  $request->input('selected')  )   ){       
            return response()->json(  'resposta nao encontrada' , 500);
        }

        $resposta->count = $resposta->count + 1  ;
        $resposta->save();

        $tentativa =  intval( $request->input('selected') ); 
        $resposta_certa =intval(  $model->resposta_certa_id );
       
        $resultado =   $tentativa === $resposta_certa ;

        $temp = session('perguntas.id' , 0 );

        //if(!array_has( $temp , $model->id )){
            $request->session()->push('perguntas.id',  $model->id );
        //}


        if($resultado){
            $certas = session('certas' , 0 ) + 1 ;
            session(['certas' =>  $certas  ]);


        }
        else{
            $erradas = session('erradas' , 0 ) + 1 ;
            session(['erradas' => $erradas ]);
        }
        
        return response()->json( [  'certas' =>  session('certas' , 0 ) , 'erradas' =>  session('erradas' , 0 )  ,  'realizadas' => session('perguntas.id' , 0 )  ]   , 200);

    }









    public function proximo(Request $request )
    {
        try {
            if( !$model = $this->model->whereNotIn( 'id' , session('perguntas.id' , [] ) )->get()->random()    ){       
                return response()->json(  'pergunta nao encontrada' , 500);             
            } 
            return response()->json(  $model->only( 'id' , 'texto' , 'resposta_certa_id' , 'resumo' , 'assunto' ) , 200);
        }         
        catch(Exception $e) {        
            return response()->json(  'pergunta nao encontrada' , 500);  ;
        }
    }










}
