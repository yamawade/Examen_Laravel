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
                        <a href="{{route('formation.index')}}" class="btn btn-success offset-8">Liste Formation</a>
                    </div> 
                </h1>
            </div>
            <div class="card col-md-8 offset-2 mt-5">
                    <form action="/store" method="post">
                        @csrf
                        <div class="card-header text-center bg-success text-white h4">Ajout Formation</div>
                        <div class="form-group">
                            <label for="">Referentiel</label>
                            <select name="referentiel_id[]" id="" class="form-control" required>
                                <option value="">.....Choisissez un referentiel.....</option>
                                @foreach ($referentiel as $r)
                                    <option value="{{$r->id}}">{{$r->libelle}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="" >Nom</label>
                        <input type="text" class="form-control"  placeholder="Nom" name="nom" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-2">Duree</label>
                            <input type="number" class="form-control"  placeholder="duree" name="duree" min="1" max="12" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-2">Description</label>
                            <textarea name="description" cols="30" rows="5" class="form-control col-md-8" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-3 pt-1">isStarted</label>
                            <select name="isStarted" id="" class="form-control" required>
                                <option selected>-------Faites votre choix---------</option>
                                <option value="1">Oui</option>
                                <option value="0">Non</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-2">Date Debut</label>
                            <input type="date" class="form-control" name="date_debut" required>
                        </div>
                        <button type="submit" class="btn btn-success offset-5 mt-2">Enregistrer</button>
                    </form>
                </div>
        </div>
    </div>
</x-app-layout>

