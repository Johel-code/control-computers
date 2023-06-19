<?php

namespace App\Http\Livewire;

use App\Models\Funcion;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use PhpParser\Node\Expr\FuncCall;

class Docentes extends Component
{
    use WithPagination;

    public $search = "";
    
    public $id_docente, $rol, $name, $email, $direccion, $ci, $fecha_nacimiento, $password;

    public $modal = false;
    
    protected $rules = [
        'name' => 'required',
        'email' => 'required',
        'direccion' => 'required',
        'ci' => 'required', 
        'fecha_nacimiento' => 'required', 
        'password' => 'required', 
    ];

    public function render()
    {
        $docentes = User::where('name', 'like', '%' . $this->search . '%')
            ->whereHas('roles', function ($query){
                $query->where('roles.id', 2);
            })
            ->paginate(5);

        return view('livewire.docentes', [
            'docentes' => $docentes,
            'roles' => Role::all()
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
        $this->name = '';
        $this->direccion = '';
        $this->password = '';
        $this->ci = '';
        $this->email = '';
        $this->fecha_nacimiento = '';
        $this->rol = '';
        $this->id_docente = null;
    }

    public function editar($id)
    {
        $docente = User::findOrFail($id);
        $this->id_docente = $id;
        $this->name = $docente->name;
        $this->email = $docente->email;
        $this->direccion = $docente->direccion;
        $this->ci = $docente->ci;
        $this->fecha_nacimiento = $docente->fecha_nacimiento;
        $this->password = $docente->password;
        $this->rol = $docente->roles()->first()->id;
        //dd($this->state);
        $this->abrirModal();
    }
    public function guardar()
    {
        $this->validate();
        $user = User::updateOrCreate(['id'=>$this->id_docente],
        [
            'name' => $this->name,
            'email' => $this->email,
            'direccion' => $this->direccion,
            'ci' => $this->ci,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'password' => bcrypt($this->password),
        ]);

        $user->roles()->attach($this->rol);

        Session()->flash('message', $this->id_docente ? 'Actualizacion exitosa' : 'Creado exitosamente');
        $this->cerrarModal();
        $this->limpiarCampos();
    }

    public function mostrarModal($docenteId)
    {
        $this->emit('mostrarModal', $docenteId);
    }
}
