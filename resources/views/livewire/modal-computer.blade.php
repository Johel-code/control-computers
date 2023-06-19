<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <!-- Botón para abrir el modal -->
    <!--Modal-->
    @if($isOpen)
    <div class="fixed inset-0 z-20" id="">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="modal-bg-container fixed inset-0 bg-gray-700 bg-opacity-30"></div>
            <div class="modal-space-container sm:inline-block sm:align-middle sm:h-screen"></div>
            <div
                class="border-8 border-white inline-block bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all align-middle" style="width: 15cm; height: 12cm;">
                <!--Contenido-->
                <div class="divide-y">
                    <div class="mb-5">
                        <div class="flex justify-between">
                            <div>
                                <h2 class="text-2xl text-center font-bold ml-8 mt-5 text-ellipsis overflow-hidden">
                                    {{$computer->serial}}</h2>
                            </div>
                            <div>
                                <button wire:click="cerrarModal()" id="botonCerrar"
                                    class=" rounded-md  shadow-md px-2 bg-[#597AAB] text-white font-semibold">x</button>
                            </div>
                        </div>

                    </div>
                    <div class="mb-5">
                        <div class="grid grid-cols-6 text-center">
                            <div class="col-span-2">
                                <div class="font-bold text-lg my-3 mx-5">DATOS</div>
                            </div>
                            <div class="col-span-4">
                                <h1 class="font-bold text-lg my-3">VISTA PREVIA</h1>
                            </div>
                        </div>
                        <div class="mx-6 grid grid-cols-6 transition">
                            <div class="col-span-1">
                                <div class="font-bold">Id</div>
                                <div class="font-bold">Serial</div>
                                <div class="font-bold">Marca</div>
                                <div class="font-bold">Estado</div>

                                {{-- <div class="font-bold">Estado</div>
                                <div class="">@if($product->estado_product == 0) Activo @else Inactivo @endif</div> --}}

                            </div>
                            <div class="col-span-1">
                                <div>{{ $computer->id }}</div>
                                <div class="">{{ $computer->serial }}</div>
                                <div class="">{{ $computer->marca }}</div>
                                <div class="">{{$computer->state->name }}</div>
                            </div>
                            <div class="col-span-4 ml-6">
                                <img src="{{ asset('storage/'.$computer->image) }}" alt="{{$computer->serial}}" style="width: 180px; height: 150px;" class="aspect-square shadow-lg object-cover mx-5 my-3">
                            </div>
                        </div>
                    </div>
                    <div class="mx-5 mb-5 divide-x">
                        <div class="mr-3">
                            <div class="font-bold text-lg my-2">ASIGNAR</div>
                            <div class="flex flex-row place-content-between items-center">
                                <div class="lg:max-2xl:col-span-2 
                                        2xl:col-span-2
                                        sm:max-lg:col-span-3 sm:max-lg:ml-12">
                                    <select id="categoria_id" wire:model="user"
                                        class="shadow appearance-none border rounded w-full text-gray-700 border-solid border-black leading-tight focus:outline-none focus:shadow-none font-anek">


                                        <option value="">Seleccione</option>

                                        @foreach($users as $computer)
                                        <option value="{{ $computer->id }}">{{ $computer->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('computer') <span class="error text-red-700">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <button wire:click.prevent="asignar()"
                                        class="px-4 bg-blue-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400">
                                        ASIGNAR
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>




                </div>
            </div>
        </div>
        @endif
    </div>