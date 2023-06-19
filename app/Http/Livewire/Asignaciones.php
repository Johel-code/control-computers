<?php

namespace App\Http\Livewire;

use App\Models\Computer;
use App\Models\State;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Asignaciones extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search = "";
    
    public $id_computer, $serial, $marca, $state, $image;

    public $modal = false;
    
    protected $rules = [
        'serial' => 'required',
        'marca' => 'required',
        'state' => 'required', 
    ];

    public function render()
    {
        // $computers = Computer::where('serial', 'like', '%' . $this->search . '%')->paginate(5);

        $computers = Computer::where('serial', 'like', '%' . $this->search . '%')
            ->where('computers.state_id', '=', 1)
            ->whereHas('operations', function ($query){
                $query->where('operations.user_id', Auth::id());
            })
            ->paginate(5);

        // dd($computers);

        return view('livewire.asignaciones', [
            'computers' => $computers,
            'states' => State::all()
        ]);
    }

    public function mostrarModalComputer($computerId)
    {
        $this->emit('mostrarModalComputer', $computerId);
    }
}
