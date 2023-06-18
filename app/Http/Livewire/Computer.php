<?php

namespace App\Http\Livewire;

use App\Models\Computer as ModelsComputer;
use App\Models\State;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Computer extends Component
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
        'image' => 'required'
    ];

    public function render()
    {
        $computers = ModelsComputer::where('serial', 'like', '%' . $this->search . '%')->paginate(5);

        return view('livewire.computer', [
            'computers' => $computers,
            'states' => State::all()
        ]);
    }

    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }
    public function abrirModal()
    {
        $this->modal = true;
        $this->resetValidation();
    }
    public function cerrarModal()
    {
        $this->modal = false;
    }
    public function limpiarCampos()
    {
        $this->marca = '';
        $this->serial = '';
        $this->state = '';
        $this->image = '';
        $this->id_computer = null;
    }

    public function editar($id)
    {
        $computer = ModelsComputer::findOrFail($id);
        $this->id_computer = $id;
        $this->serial = $computer->serial;
        $this->marca = $computer->marca;
        $this->image = $computer->image;
        $this->state = $computer->state->id;
        //dd($this->state);
        $this->abrirModal();
    }
    public function guardar()
    {
        $this->validate();
        $img = $this->image->store('images', 'public');

        ModelsComputer::updateOrCreate(['id'=>$this->id_computer],
        [
            'serial' => $this->serial,
            'marca' => $this->marca,
            'image' => $img,
            'state_id' => $this->state
        ]);

        Session()->flash('message', $this->id_computer ? 'Actualizacion exitosa' : 'Creado exitosamente');
        $this->cerrarModal();
        $this->limpiarCampos();
    }

    public function mostrarModalComputer($computerId)
    {
        $this->emit('mostrarModalComputer', $computerId);
    }
}
