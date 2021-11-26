<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Producto;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

   public function buyPropioProducto(User $user, Producto $sl){

    if($user->rol='vendedor'){
        if ($user->id == $sl->propietario) {
         return false;   
        } 
        if ($user->id != $sl->propietario) {
         return true;   
        } 

    }
    
   
   }

}
