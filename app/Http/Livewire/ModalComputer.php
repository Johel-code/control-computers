<?php

namespace App\Http\Livewire;

use App\Models\Computer;
use App\Models\Operation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ModalComputer extends Component
{
    public $computer, $user;
    public $isOpen = false;

    protected $listeners = ['mostrarModalComputer'];

    protected $rules = [
        'user' => 'required'
    ];

    public function render()
    {
        $users = User::all();
        return view('livewire.modal-computer', [
            'users' => $users
        ]);
    }

    public function asignar()
    {
        $this->validate();
        $operation = new Operation;
        $operation->computer_id = $this->computer->id;
        $operation->user_id = $this->user;
        $operation->type_operation_id = 2;
        $operation->encargado_id = Auth::id();
        $operation->save();

        $computer = Computer::find($this->computer->id);
        $computer->state_id = 1;
        $computer->save();
    }

    public function mostrarModalComputer($computerId)
    {
        $this->computer = Computer::find($computerId);
        $this->isOpen = true;
    }

    public function cerrarModal()
    {
        $this->isOpen = false;
    }
}
