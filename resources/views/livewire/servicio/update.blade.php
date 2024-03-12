<div>
    <!-- Botón para abrir la modal -->
    {{-- <button wire:click="openModal">Abrir Modal</button> --}}

    <!-- Modal -->
    <div class="fixed inset-0 w-full h-full bg-gray-500 bg-opacity-75 flex items-center justify-center">
        <!-- Contenido de la modal -->

        <div class="bg-white p-4 min-w-96 max-w-md mx-auto rounded-md">
            <!-- Contenido de tu modal aquí -->
            <!-- Modal header -->
            <div class="flex items-center justify-between border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Actualizar servicio
                </h3>
                <button wire:click="closeModal()" type="button" class="mb-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-4">
                <form class="space-y-4" wire:submit.prevent="update()">

                    <div class="p-4 md:p-4">
                <form class="space-y-4" wire:submit.prevent="store()">
                    <div>
                        <label for="nombre_servicio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                        <input type="text" wire:model="nombre_servicio" name="nombre_servicio " id="nombre_servicio " class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Nombre del servicio" required />
                        @error('nombre_servicio ') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tipo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Servicio</label>
                        <select  wire:model="tipo_servicio_id" name="tipo_servicio_id" id="tipo_servicio_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected>Seleccione un tipo</option>
                            @foreach ($tipos as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nivel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nivel de Servicio</label>
                        <select  wire:model="nivel_servicio_id" name="nivel_servicio_id" id="nivel_servicio_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected>Seleccione un nivel</option>
                            @foreach ($nivels as $nivel)
                            <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="clave_presupuestaria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Clave Presupuestaria</label>
                        <input type="text" wire:model="clave_presupuestaria" name="clave_presupuestaria" id="clave_presupuestaria" placeholder="Clave presupuestaria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                    </div>

                    <div>
                        <label for="importes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Importes</label>
                        <input type="text" wire:model="importes" name="importes" id="importes" placeholder="importes $" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                    </div>

                    <div>
                        <label for="fecha_creacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha Creacion</label>
                        <input type="text" wire:model="fecha_creacion" name="fecha_creacion" id="fecha_creacion" placeholder="Fecha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                    </div>

                    <div>
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <input type="text" wire:model="status" name="status" id="status" placeholder="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                    </div>

                    <div class="content-center justify-center place-content-center">
                        <button  data-modal-hide="popup-modal" type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Actualizar
                        </button>
                        <button wire:click="closeModal()" data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancelar</button>
                        {{-- <button wire:click="closeModal">Cerrar Modal</button> --}}

                    </div>

                </form>
            </div>
    </div>
</div>