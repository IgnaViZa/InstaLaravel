
<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Listado de likes
        </h2>
    </x-slot>

    <div  class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   @foreach ($likes as $like)
                    @include('includes.image', ['image'=>$like->image])
                   @endforeach
                </div>
            </div>
        </div>
        <!--Pagination -->
        <div class="clearfix col-md-7" style="text-align:center">
            {{$likes->links()}}
        </div>
    </div>
    <hr>
    <footer>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);float:bottom">
            © 2020 Copyright:
            <strong class="text-dark">Ignacio Viacava</strong>
        </div>
    </footer>
</x-app-layout>
