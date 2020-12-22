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
        @if (!isset($image))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>ERROR AL ENCONTRAR LA IMAGEN</p>
                </div>
            </div>
        </div>
        @else
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
                            <div style="float:right;padding-top:19px;color:#969896">
                                {{\FormatTime::LongTimeFilter($image->created_at)}}
                            </div>
                        </div>
                        <div class="card-body" style="padding:0px">
                            <div style="width:100%;max-height:1000px;overflow:hidden">
                                <img style="width:100%" src="{{route('postImage', ['filename'=>$image->image_path])}}">
                            </div>
                            <hr>
                        </div>

                        <div class="likes" style="margin-left:10px;width:35px;padding-bottom:0px;" >
                            <img src="{{route('getIcon', ['iconname'=>'heart-black.png'])}}">
                        </div>
                        <div class="descripcion" style="padding:10px;padding-top:0px">
                            <p>{{ $image->description }}<p>
                        </div>
                        <div class="clearfix" style="padding:20px">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                Comentarios: ({{count($image->comments)}})
                            </h2>   
                            <hr>
                            @if(isset($image->comments))
                                @foreach($image->comments as $comment)
                                <div style="padding:10px">
                                    <div style="color:#969896">
                                        {{'@'.$comment->user->nick}} | {{\FormatTime::LongTimeFilter($comment->created_at)}}
                                    @if (Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id )) 
                                        <a href="{{ route('delete', ['id'=>$comment->id]) }}" class="btn btn-sm btn-danger" style="float:right;margin-top:10px">
                                            Eliminar
                                        </a>
                                    @endif
                                    </div>
                                    {{$comment->content}}
                                </div>
                                <hr>
                                @endforeach
                            @endif
                            <br>
                            <hr>
                            <form method="POST" action="{{route('store')}}">
                                @csrf
                                <input type="hidden" name="image_id" value="{{$image->id}}" />
                                <label for="content">Comentar:</label>
                                <textarea name='content' class="form-control" required></textarea>
                                <br>
                                <button type="submit" class="btn btn-success">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <hr>
    <footer>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);float:bottom">
            © 2020 Copyright:
            <strong class="text-dark">Ignacio Viacava</strong>
        </div>
    </footer>
</x-app-layout>
