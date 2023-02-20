<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('Referentiel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1> 
                    <div class="p-6 text-gray-900 ">
                        {{ __("En ligne!") }}
                        <a href="{{route('referentiel.index')}}" class="btn btn-primary offset-8">Liste Referentiel</a>
                    </div>
                </h1>
            </div>
            <div class="card col-md-8 offset-2 mt-5">
                <form action="/storeReferentiel" method="post">
                    @csrf
                    <div class="card-header text-center bg-primary text-white h4">Ajout Referentiel</div>

                    <div class="form-group">
                    <label for="" >Libelle</label>
                    <input type="text" class="form-control"  placeholder="Libelle" name="libelle" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-3 pt-1">Validated</label>
                        <select name="validated" id="" class="form-control" required>
                            <option selected>-------Faites votre choix---------</option>
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-2">Horaire</label>
                        <input type="text" class="form-control"  placeholder="18.00" name="horaire" required>
                    </div>
                    <div class="form-group">
                        <label for="">Type</label>
                        <select name="type_id[]" id="" class="form-control" required>
                            <option value="">.....Choisissez un type.....</option>
                            @foreach ($type as $t)
                                <option value="{{$t->id}}">{{$t->libelle}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary offset-5 mt-2">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
