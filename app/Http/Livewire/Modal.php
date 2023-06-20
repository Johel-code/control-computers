<?php

namespace App\Http\Livewire;

use App\Models\Computer;
use App\Models\Operation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Modal extends Component
{
    use WithPagination;

    public $docente, $computer, $computerQuitar;
    public $isOpen = false;

    public $var;
    protected $listeners = ['mostrarModal'];

    protected $rules = [
        'computer' => 'required',
    ];

    public function render()
    {
        $computers = Computer::where('state_id', '=', 2)->get();
        
        if($this->docente !== null){
            $this->var = $this->docente->id;
        }else{
            $this->var = 1;
        }
        
        $computersQuitar = Computer::where('state_id', 1)    
            ->whereHas('operations', function ($query){
                $query->where('user_id', $this->var );
            })
            ->get();

        $asignaciones = Operation::select('computers.id', 'computers.serial', 'type_operations.name', 'operations.updated_at')
            ->where('operations.user_id', '=', $this->var)
            ->whereIn('operations.type_operation_id', [2, 3])
            ->join('computers', 'operations.computer_id', '=', 'computers.id')
            ->join('type_operations', 'operations.type_operation_id', '=', 'type_operations.id')
            ->paginate(5);

        return view('livewire.modal', [
            'computers' => $computers,
            'asignaciones' => $asignaciones,
            'computersQuitar' => $computersQuitar
        ]);
    }

    public function asignar()
    {
        $this->validate();
        $operation = new Operation;
        $operation->computer_id = $this->computer;
        $operation->user_id = $this->docente->id;
        $operation->type_operation_id = 2;
        $operation->encargado_id = Auth::id();
        $operation->save();

        $computer = Computer::find($this->computer);
        $computer->state_id = 1;
        $computer->save();
    }
    public function quitar()
    {
        $operation = new Operation;
        $operation->computer_id = $this->computerQuitar;
        $operation->user_id = $this->docente->id;
        $operation->type_operation_id = 3;
        $operation->encargado_id = Auth::id();
        $operation->save();

        $computer = Computer::find($this->computerQuitar);
        $computer->state_id = 2;
        $computer->save();

    }

    public function mostrarModal($docenteId)
    {
        $this->docente = User::find($docenteId);
        $this->isOpen = true;
    }

    public function cerrarModal()
    {
        $this->isOpen = false;
    }
}
