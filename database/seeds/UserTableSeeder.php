<?php

use Illuminate\Database\Seeder;
use App\User;
use Manzoli2122\AAL\Models\Perfil;
use Manzoli2122\AAL\Models\Permissao;

class UserTableSeeder extends Seeder
{
   
    public function run()
    {

       

        $user = new User();
        $user->name = 'Bruno manzoli do Nascimento';
        $user->apelido = 'Bruno';
        $user->email = 'manzoli2122@gmail.com';
        $user->password = bcrypt('manzoli2122');
        $user->save();




        $perfil = new perfil();
        $perfil->nome = 'Admin';
        $perfil->descricao = 'Super Usuario';
        $perfil->save();



        $user->perfis()->attach($perfil->id);
        

        

    }
}
