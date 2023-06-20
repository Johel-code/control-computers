<div>
    <x-dialog-modal wire:model="modal">

        <x-slot name="title">
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold text-gray-500">Computadora</p>
            </div>
        </x-slot>

        <x-slot name="content">
            
             <div class="mb-4 text-md text-gray-600">
                <label for="name" class="text-md text-gray-600">Serial</label>
                <input type="text" id="name" wire:model="serial" autocomplete="off" wire:keydown.enter="guardar()"
                name="name" class="h-3 p-6 w-full text-sm text-black border-2 border-gray-300 rounded-md" placeholder="38292">

            <x-input-error for="serial" />
            </div>
             <div class="mb-4 text-md text-gray-600">
                <label for="name" class="text-md text-gray-600">Marca</label>
                <input type="text" id="name" wire:model="marca" autocomplete="off" wire:keydown.enter="guardar()"
                name="name" class="h-3 p-6 w-full text-sm text-black border-2 border-gray-300 rounded-md" placeholder="Dell">

            <x-input-error for="marca" />
            </div>
            <div class = "mb-4">
                <label for="phone" class="text-md text-gray-600">Estado</label>   
                <select required wire:model="state" wire:keydown.enter="guardar()" class="form-select appearance-none
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
                     @foreach($states as $stateAct)
                        <option value="{{$stateAct->id}}" {{ $stateAct->id == $state ? 'selected' : '' }}>{{ $stateAct->name }}</option>
                     @endforeach
                </select>
                <x-input-error for="state" />
            </div>
             <div class="mb-4 text-md text-gray-600">
                <label for="name" class="text-md text-gray-600">Imagen</label>
                <input  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 border-solid border-black leading-tight focus:outline-none focus:shadow-none" accept="image/*" 
                        id="foto" name="img" type="file"  wire:model="image" placeholder="Seleccionar">
                @if($flag)
                    <img src="{{ asset('storage/'.$image) }}" alt="">
                @elseif($image)
                    <img src="{{ $image->temporaryUrl() }}" alt="">
                @endif

            <x-input-error for="image" />
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
                    enctype="multipart/form-data"
                    wire:click.prevent="guardar()" 
                    class="px-4 bg-blue-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400">
                    Guardar
                </button>
            </div>

        </x-slot>

    </x-dialog-modal>
</div>