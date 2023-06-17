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
                class="border-8 border-white inline-block bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all align-middle">
                <!--Contenido-->
                <div class="divide-y">
                    <div class="mb-5">
                        <div class="flex justify-between">
                            <div>
                                <h2 class="text-2xl text-center font-bold ml-8 mt-5 text-ellipsis overflow-hidden">
                                    {{$docente->name}}</h2>
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
                                <h1 class="font-bold text-lg my-3">ASIGNACIONES</h1>
                            </div>
                        </div>
                        <div class="mx-6 grid grid-cols-6 transition">
                            <div class="col-span-1">
                                <div class="font-bold">Name</div>
                                <div class="font-bold">Email</div>
                                <div class="font-bold">CI</div>
                                <div class="font-bold">Dirección</div>
                                <div class="font-bold">Rol</div>
                                {{--{{dd($product->category_id)}}--}}
                                <div class="font-bold">Fecha de nac.</div>


                                {{-- <div class="font-bold">Estado</div>
                                <div class="">@if($product->estado_product == 0) Activo @else Inactivo @endif</div> --}}

                            </div>
                            <div class="col-span-1">
                                <div>{{ $docente->name }}</div>
                                <div class="">{{ $docente->email }}</div>
                                <div class="">{{ $docente->ci }}</div>
                                <div class="">{{$docente->direccion}}</div>
                                <div class="">{{$docente->roles->first()->name}}</div>
                                <div class="">
                                    @if($docente->fecha_nacimiento)
                                    {{date('d/m/Y', strtotime($docente->fecha_nacimiento))}}
                                    @else
                                    Sin fecha de nacimiento
                                    @endif
                                </div>
                            </div>
                            <div class="col-span-4 ml-6">
                                <table class="w-full">
                                    <thead class="h-8">
                                        <tr class="bg-white text-dark">
                                            <th class="text-center text-ellipsis border-b-2 border-black">
                                                ID</th>
                                            <th class="text-center text-ellipsis border-b-2 border-black">
                                                PC</th>
                                            <th class="text-center text-ellipsis border-b-2 border-black">
                                                TYPE</th>
                                            <th class="text-center text-ellipsis border-b-2 border-black">
                                                FECHA</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($asignaciones as $asignacion)

                                        <tr class="hover:bg-blue-200">
                                            <td
                                                class="cursor-pointer px-3 2xl:py-3 text-center text-ellipsis overflow-hidden border-b border-gray-400">
                                                {{$asignacion->id }}
                                                </th>
                                            <td
                                                class="cursor-pointer pr-3 text-center text-ellipsis md:overflow-hidden ms:overflow-hidden  border-b border-gray-400 whitespace-nowrap">
                                                {{ $asignacion->serial }}</th>

                                            <td
                                                class="cursor-pointer pr-3 text-center text-ellipsis overflow-hidden border-b border-gray-400">
                                                {{$asignacion->name }}</th>
                                            <td
                                                class="cursor-pointer pr-3 text-center text-ellipsis overflow-hidden border-b border-gray-400">
                                                {{ date('d/m/Y', strtotime($asignacion->updated_at )) }}</th>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $asignaciones->links() }}
                            </div>
                        </div>
                    </div>
                    <div class="mx-5 mb-5 grid grid-cols-2 divide-x">
                        <div class="col-span-1 mr-3">
                            <div class="font-bold text-lg my-2">ASIGNAR</div>
                            <div class="flex flex-row place-content-between items-center">
                                <div class="lg:max-2xl:col-span-2 
                                        2xl:col-span-2
                                        sm:max-lg:col-span-3 sm:max-lg:ml-12">
                                    <select id="categoria_id" wire:model="computer"
                                        class="shadow appearance-none border rounded w-full text-gray-700 border-solid border-black leading-tight focus:outline-none focus:shadow-none font-anek">


                                        <option value="">Seleccione</option>

                                        @foreach($computers as $computer)
                                        <option value="{{ $computer->id }}">{{ $computer->serial }}</option>
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
                        <div class="col-span-1 ml-3 pl-3">
                            <div class="font-bold text-lg my-2">QUITAR</div>
                            <div class="flex flex-row place-content-between items-center">
                                <div class="lg:max-2xl:col-span-2 
                                        2xl:col-span-2
                                        sm:max-lg:col-span-3 sm:max-lg:ml-12">
                                    <select id="categoria_id" wire:model="computerQuitar"
                                        class="shadow appearance-none border rounded w-full text-gray-700 border-solid border-black leading-tight focus:outline-none focus:shadow-none font-anek">


                                        <option value="">Seleccione</option>

                                        @foreach($computersQuitar as $computer)
                                        <option value="{{ $computer->id }}">{{ $computer->serial }}</option>
                                        @endforeach
                                    </select>
                                    @error('computerQuitar') <span class="error text-red-700">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <button wire:click.prevent="quitar()"
                                        class="px-4 bg-red-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400">
                                        QUITAR
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