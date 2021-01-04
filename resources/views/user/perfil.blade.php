<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div  class="py-12">
        @if (!isset($user->images))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Your are logged! <br>
                    <p>Welcome to this website. Post you first image</p>
                </div>
            </div>
        </div>
        @else
        <div class="data-user">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="col-md-4">
                            @if($user->image)
                            <div style="float:left;width:250px;height:250px;border-radius:700px;overflow:hidden;">
                                <img style="height:100%" src="{{ route('user.avatar',['filename' => $user->image]) }}" />
                            </div>
                            @endif
                        </div>
                        <div class="col-md-8" style="padding:5px;">
                            <h1 style="font-size:50px">{{'@'.$user->nick}}</h1> 
                            <h2 style="font-size:30px">{{$user->name.' '.$user->surname}}</h2><br>
                            <p style="color: grey">{{ 'Se unió: '.\FormatTime::LongTimeFilter($user->created_at) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        @foreach($user->images as $image)
        @include('includes.image', ['image'=>$image])
        @endforeach
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
