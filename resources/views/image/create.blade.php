<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Subir Imagen
        </h2>
    </x-slot>

    <div  class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card">
                        <div class="card-header">
                            Subir Imagen
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{route('save')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">                                
                                    <label for="image_path" class="col-md-2 col-form-label text-md-right">Imagen:</label>
                                    <div class="col-md-8">
                                        <input id="image_path" type="file" name="imagen_path" class="form-control" required/>
                                        @if(isset($errors) && $errors->has('image_path'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$errors->first('image_path')}}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="descripcion" class="col-md-2 col-form-label text-md-right">Descripción:</label>
                                    <div class="col-md-8">
                                        <input id="descripcion" name="descripcion" type="text" class="form-control">
                                        @if($errors->has('descripcion'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$errors->first('descripcion')}}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-2">
                                        <input type="submit" value="Postear" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
