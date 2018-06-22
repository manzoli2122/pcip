<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Tymon\JWTAuth\Contracts\JWTSubject ;
use Manzoli2122\AAL\Traits\AALUsuarioTrait;



class User extends Authenticatable  implements JWTSubject
{
    use Notifiable;
    use AALUsuarioTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'apelido', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    
    
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    
    
    
   
    public function getJWTCustomClaims()
    {
        return [];
    }


    public function rules($id = ''){
        return [
            'name' => 'required|min:3|max:191',
            'email' => 'required|min:3|max:500',                
        ];
    }



    public function getDatatable(){
        return $this->select([ 'id' ,  'name', 'email',   ])->orderBy('name', 'asc');        
    }
    
    
    
}
