<?php

namespace App\Listeners;

use App\Client;

class ClientsListener
{

   static function getNewClientsCount(): int
   {
       return Client::all()->where('seen' , '=' , '0')->count();
   }


   static function resetNewClientsCount(){

       Client::query()->update(['seen' => 1]);

   }
}
