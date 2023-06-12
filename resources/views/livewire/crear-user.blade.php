<div>
    <x-dialog-modal wire:model="modal">

        <x-slot name="title">
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold text-gray-500">Usuario</p>
            </div>
        </x-slot>

        <x-slot name="content">
            
             <div class="mb-4 text-md text-gray-600">
                <label for="name" class="text-md text-gray-600">Nombre</label>
                <input type="text" id="name" wire:model="name" autocomplete="off" wire:keydown.enter="guardar()"
                name="name" class="h-3 p-6 w-full text-sm text-black border-2 border-gray-300 rounded-md" placeholder="Juan">

            <x-input-error for="name" />
            </div>
             <div class="mb-4 text-md text-gray-600">
                <label for="name" class="text-md text-gray-600">Email</label>
                <input type="text" id="email" wire:model="email" autocomplete="off" wire:keydown.enter="guardar()"
                name="name" class="h-3 p-6 w-full text-sm text-black border-2 border-gray-300 rounded-md" placeholder="juan@gmail.com">

            <x-input-error for="email" />
            </div>
             <div class="mb-4 text-md text-gray-600">
                <label for="name" class="text-md text-gray-600">Dirección</label>
                <input type="text" id="email" wire:model="direccion" autocomplete="off" wire:keydown.enter="guardar()"
                name="name" class="h-3 p-6 w-full text-sm text-black border-2 border-gray-300 rounded-md" placeholder="Av. de los Palotes">

            <x-input-error for="direccion" />
            </div>
             <div class="mb-4 text-md text-gray-600">
                <label for="name" class="text-md text-gray-600">CI</label>
                <input type="text" id="email" wire:model="ci" autocomplete="off" wire:keydown.enter="guardar()"
                name="name" class="h-3 p-6 w-full text-sm text-black border-2 border-gray-300 rounded-md" placeholder="2938929">

            <x-input-error for="ci" />
            </div>
            <div class="mb-4 text-md text-gray-600">
                <label for="name" class="text-md text-gray-600">Fecha de Nacimiento</label>
                <input type="date" id="date" wire:model="fecha_nacimiento" autocomplete="off" wire:keydown.enter="guardar()"
                name="name" class="h-3 p-6 w-full text-sm text-black border-2 border-gray-300 rounded-md">

            <x-input-error for="fecha" />
            </div>
            <div class="mb-4 text-md text-gray-600">
                <label for="name" class="text-md text-gray-600">Contraseña</label>
                <input type="password" id="password" wire:model="password" autocomplete="off" wire:keydown.enter="guardar()"
                name="name" class="h-3 p-6 w-full text-sm text-black border-2 border-gray-300 rounded-md" placeholder="Password">

            <x-input-error for="password" />
            </div>

            <div class = "mb-4">
                <label for="phone" class="text-md text-gray-600">Rol</label>   
                <select required wire:model="rol" wire:keydown.enter="guardar()" class="form-select appearance-none
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding bg-no-repeat
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                    <option hidden >Desplega este menú</option>
                     @foreach($roles as $stateAct)
                        <option value="{{$stateAct->id}}" {{ $stateAct->id == $rol ? 'selected' : '' }}>{{ $stateAct->name }}</option>
                     @endforeach
                </select>
                <x-input-error for="state" />
            </div>

        </x-slot>

        <x-slot name="footer">
            
            <div class="flex justify-between pt-2">
                <button
                    wire:click="cerrarModal()" 
                    class="px-4 bg-gray-200 p-3 rounded text-black hover:bg-gray-300 font-semibold">
                    Cancel
                </button>
                <button
                    wire:click.prevent="guardar()" 
                    class="px-4 bg-blue-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400">
                    Guardar
                </button>
            </div>

        </x-slot>

    </x-dialog-modal>
</div>