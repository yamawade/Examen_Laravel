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
                        <a href="{{route('type.index')}}" class="btn btn-info offset-8 text-white">Liste Type</a>
                    </div>
                </h1>
            </div>
            <div class="card col-md-8 offset-2 mt-5">
                <form action="/storeType" method="post">
                    @csrf
                    <div class="card-header text-center bg-info text-white h4">Ajout Type</div>
                    <div class="form-group">
                        <label for="" class="mt-3 pt-1">Libelle</label>
                        <select name="libelle" id="" class="form-control" required>
                            <option value="">-------Faites Votre Choix-----------</option>
                            <option value="metier">Metier</option>
                            <option value="initiation">Initiation</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info offset-5 mt-2 text-white">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
