<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

use Illuminate\Database\Eloquent\SoftDeletes;


class Assunto extends Model  
{
    
    use SoftDeletes;

    
    protected $table = 'assunto'; 


    protected $fillable = [
            'nome',   'descricao' ,     'disciplina_id' ,
    ];

    protected $hidden = [
               'deleted_at' ,     'updated_at' ,  
    ];



    public function disciplina(){
        return $this->belongsTo('App\Models\Disciplina', 'disciplina_id');
    }



    public function rules($id = ''){
        return [
            'nome' => 'required|min:3|max:500',
            'descricao' => 'required|min:3|max:500',                
        ];
    }



    
    public function getDatatable(){
        return $this->with('disciplina')->select([ 'id' ,  'nome', 'descricao', 'disciplina_id'  ])->orderBy('nome', 'asc');        
    }
    
   

    public function numeroPerguntas(){
        return $this->select([ 'id' ,  'nome', 'descricao',   ])->orderBy('nome', 'asc');        
    }
    



    public function perguntas(){
         return $this->hasMany('App\Models\Pergunta', 'assunto_id', 'id'); 
    }


    


    
}
