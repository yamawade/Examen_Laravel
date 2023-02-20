<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1> 
                    <div class="p-6 text-gray-900 text-success">
                        {{ __("En ligne!") }}
                        <a href="{{route('candidatpage')}}" class="btn btn-dark offset-8">Ajout Candidat</a>
                    </div>
                </h1>
            </div>
            <table class="table table-bordered pt-2 ">
                <div class="card-header text-center bg-dark text-white">LISTES DES CANDIDATS</div>
                <tr>
                    <th>#</th>
                    <th>NOM CANDIDAT</th>
                    <th>PRENOM CANDIDAT</th>
                    <th>EMAIL CANDIDAT</th>
                    <th>AGE CANDIDAT</th>
                    <th>NIVEAU ETUDE CANDIDAT</th>
                    <th>SEXE CANDIDAT</th>
                </tr>
                @foreach($candidat as $c)
                    <tr>
                       <td>{{$c->id}}</td>
                       <td>{{$c->nom}}</td>
                       <td>{{$c->prenom}}</td>
                       <td>{{$c->email}}</td>
                       <td>{{$c->age}}</td>
                       <td>{{$c->niveuEtude}}</td>
                       <td>{{$c->sexe}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</x-app-layout>

