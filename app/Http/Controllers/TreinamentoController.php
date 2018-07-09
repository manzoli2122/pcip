<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Pergunta;
use App\Models\Resposta;

class TreinamentoController extends Controller
{
   
  	protected $model;   



    public function __construct(Pergunta $pergunta)
    {
    	$this->model = $pergunta;
        $this->middleware('auth');
    }



    
    public function index()
    {
        return view('treinamento.index');
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
        $request->session()->push('perguntas.id',  $model->id );
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
            if( !$model = $this->model->ativo()
                        ->whereNotIn( 'id' , session('perguntas.id' , [] ) )

                        //->join('assunto', 'assunto.id', '=', 'pergunta.assunto_id')

                        ->whereIn( 'pergunta.dificuldade' , session('dificuldade' , [ 'Muito Facil', 'Facil', 'Medio' ,  'Dificil' ,  'Muito Dificil'    ] ) )
                        
                        ->whereHas('assunto', function ($query) {
                            $query->whereIn('disciplina_id', session('disciplina' , [ 6 , 7 , 8 , 9 , 10 ] )  );
                        })

                      //  ->whereIn( 'assunto.disciplina_id' , [6] ) //session('disciplina' , [ 6 ] ) )


                        ->with('resposta')->get()->random()    ){       
                return response()->json(  'pergunta nao encontrada' , 500);             
            } 
            $model->resposta = $model->resposta->shuffle();
            return response()->json(  $model->only( 'id' , 'texto' , 'resposta_certa_id' , 'resumo' , 'assunto' ,'resposta' , 'dificuldade') , 200);              
        }         
        catch(Exception $e) {        
            return response()->json(  'pergunta nao encontrada' , 500);  ;
        }
    }






    public function alterarDificuldade(Request $request )
    {

        $request->session()->forget('dificuldade');

        if($request->input('muitofacil')){
             $request->session()->push('dificuldade',  'Muito Facil' );
        }   

        if($request->input('facil')){
             $request->session()->push('dificuldade',  'Facil' );
        }   

        if($request->input('medio')){
             $request->session()->push('dificuldade',  'Medio' );
        }   

        if($request->input('dificil')){
             $request->session()->push('dificuldade',  'Dificil' );
        }   

        if($request->input('muitodificil')){
             $request->session()->push('dificuldade',  'Muito Dificil' );
        }   
 
        return response()->json( [  'dificuldade' =>  session('dificuldade' , [] )    ]   , 200);
        
    }



    public function alterarDisciplina(Request $request )
    {

        $request->session()->forget('disciplina');

        if($request->input('disciplina')){

            $temp = $request->input('disciplina');
            foreach ($temp as $key  ) {
                $request->session()->push('disciplina', $key  );
            }
             //$request->session()->push('disciplina', $request->input('disciplina') );
        }   
 
        return response()->json( [  'disciplina' =>  session('disciplina' , [] )    ]   , 200);
        
    }






    public function proximo2(Request $request )
    {
        try {
            if( !$model = $this->model->get()->random()    ){       
            	return redirect()->route('treinamento.index')->withErrors(['message' => 'Aconteceu um erro!!']);
            } 
            $resposta = $model->resposta ;            	
            return view('treinamento.pergunta' , compact( "model" , 'resposta') ) ;
        }         
        catch(Exception $e) {        
        	return redirect()->route('treinamento.index')->withErrors(['message' => 'Aconteceu um erro!!']);  
        }
    }

    

}
