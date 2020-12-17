<x-app-layout>
    <x-slot name="header">
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Configuración
        </h2>
    </x-slot>
    <div  class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('msg'))
            <div class="alert alert-success">
                {{ session('msg')}}
            </div>
            @endif
            
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 style="text-align: center;">
                        Configura tus datos:
                    </h2>
                    <br>
                    <form method="POST" action="update" enctype="multipart/form-data" aria-label="Configuracion">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">Apellido</label>
                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{ Auth::user()->surname }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nick" class="col-md-4 col-form-label text-md-right">Nick</label>
                            <div class="col-md-6">
                                <input id="nick" type="text" name="nick" class="form-control" value="{{ Auth::user()->nick }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image_path" class="col-md-4 col-form-label text-md-right">Avatar</label>
                            <div class="col-md-6">
                                @include('includes.avatar')
                                <input id="image_path" type="file" name="image_path" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar Cambios
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</x-app-layout>