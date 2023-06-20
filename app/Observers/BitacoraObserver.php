<?php

namespace App\Observers;

use App\Models\Bitacora;
use App\Models\Computer;
use Illuminate\Support\Facades\Auth;

class BitacoraObserver
{
    public function created(Computer $computer)
    {
        $this->logAction('created', null, $computer);
    }

    public function updated(Computer $computer)
    {
        $original = $computer->getOriginal();
        $this->logAction('updated', $original, $computer);
    }

    public function logAction(string $action, $oldValue, $newValue)
    {
        $log = new Bitacora();
        $log->user_name = Auth::user() ? Auth::user()->name : 'Guest';
        $log->accion = "Computer {$action}";
        $log->fecha_accion = now();

        if($newValue){
            $log->dato_nuevo = $newValue->toJson(); 
        }

        if($oldValue){
            $log->dato_viejo = json_encode($oldValue);
        }

        $log->save();
    }
}
