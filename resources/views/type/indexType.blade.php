<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Type') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1> 
                    <div class="p-6 text-gray-900 ">
                        {{ __("En ligne!") }}
                        <a href="{{route('typepage')}}" class="btn btn-info offset-8 text-white">Ajout Type</a>
                    </div>
                </h1>
            </div>
            <table class="table table-bordered pt-2">
                <div class="card-header text-center bg-info text-white">LISTES DES TYPES</div>
                <tr>
                    <th>#</th>
                    <th>LIBELLE TYPE</th>
                </tr>
                @foreach($type as $t)
                    <tr>
                       <td>{{$t->id}}</td>
                       <td>{{$t->libelle}}</td>
                       
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</x-app-layout>
