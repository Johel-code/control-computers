<?php

namespace App\Http\Livewire;

use App\Models\Computer as ModelsComputer;
use Livewire\Component;
use Livewire\WithPagination;

class Computer extends Component
{
    use WithPagination;

    public $search = "";
    
    public $id_computer, $serial, $marca, $state;

    public $modal = false;

    public function render()
    {
        $computers = ModelsComputer::where('serial', 'like', '%' . $this->search . '%')->paginate(5);

        return view('livewire.computer', ['computers' => $computers]);
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
        $this->id_computer = null;
    }

    public function editar($id)
    {
        $computer = Computer::findOrFail($id);
        $this->id_computer = $id;
        $this->serial = $computer->serial;
        $this->marca = $computer->marca;
        $this->state = $computer->state;
        $this->abrirModal();
    }
    public function guardar()
    {
        $this->validate();
        Computer::updateOrCreate(['id'=>$this->id_computer],
        [
            'serial' => $this->serial,
            'marca' => $this->marca,
            'state' => $this->state
        ]);

        Session()->flash('message', $this->id_computer ? 'Actualizacion exitosa' : 'Creado exitosamente');
        $this->cerrarModal();
        $this->limpiarCampos();
    }
}
