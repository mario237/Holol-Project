<?php

namespace App\Listeners;

use App\Models\Consult;

class ConsultsListener
{

   static function getNewConsultsCount(): int
   {
       return Consult::all()->where('seen' , '=' , '0')->count();
   }


   static function resetNewConsultsCount(){

       Consult::query()->update(['seen' => 1]);

   }
}
