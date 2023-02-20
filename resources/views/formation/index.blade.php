<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1> 
                    <div class="p-6 text-gray-900 ">
                        {{ __("En ligne!") }}
                        <a href="{{route('homepage')}}" class="btn btn-success offset-8">Ajout Formation</a>
                    </div> 
                </h1>
            </div>
            <table class="table table-bordered pt-2">
                <div class="card-header text-center bg-success text-white">LISTES DES FORMATION</div>
                <tr>
                    <th>#</th>
                    <th>NOM FORMATION</th>
                    <th>DUREE FORMATION</th>
                    <th>DESCRIPTION FORMATION</th>
                    <th>isStarted</th>
                    <th>DATE DEBUT FORMATION</th>
                </tr>
                @foreach($formation as $f)
                    <tr>
                       <td>{{$f->id}}</td>
                       <td>{{$f->nom}}</td>
                       <td>{{$f->duree}}</td>
                       <td>{{$f->description}}</td>
                       <td>{{$f->isStarted}}</td>
                       <td>{{$f->date_debut}}</td>
                       
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</x-app-layout>
