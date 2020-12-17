<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div  class="py-12">
        @if(session('msg'))
        <div class="alert alert-success">
            {{ session('msg')}}
        </div>
        @endif
        @if (!isset($images))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in! <br>
                    <p>Por fin pude arreglar este modelo de pagina de autentificación</p>
                </div>
            </div>
        </div>
        @else
        @foreach($images as $image)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-bottom:10px">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card">
                        <div class="card-header">
                            <label class="col-md-4 col-form-label" style="margin-top:10px;font-weight:bold">{{'@'.$image->user->nick}}</label>
                            @if(isset($image->user->image))
                            <div style="float:left;border-radius:400px;overflow:hidden;width:50px;height:50px;margin:7px 5px 0px 0px;;background-color:gainsboro">
                                <img style="width:100%;margin-top:8px;margin-right:5px;" src="{{ route('user.avatar',['filename' => $image->user->image]) }}" class="avatar" />
                            </div>
                            @endif

                        </div>
                        <div class="card-body" style="padding:0px">
                            <div style="width:100%;max-height:500px;overflow:hidden">
                                <img style="width:100%" src="{{route('postImage', ['filename'=>$image->image_path])}}">
                            </div>
                            <hr>
                        </div>
                        
                        <div class="likes">
                        </div>
                        <div class="descripcion" style="padding: 10px">
                            <p>{{ $image->description }}<p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</x-app-layout>
