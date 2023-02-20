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
                        <a href="{{route('candidat.index')}}" class="btn btn-dark offset-8">Liste Candidat</a>
                    </div>
                </h1>
            </div>

            <div class="card col-md-8 offset-2 mt-3">
                <form action="/storeCandidat" method="post">
                    @csrf
                    <div class="card-header text-center bg-dark text-white">Ajout Candidat</div>

                    <div class="form-group">
                    <label for="">Nom</label>
                    <input type="text" class="form-control"  placeholder="Nom" name="nom" required>
                    </div>
                    <div class="form-group">
                    <label for="">Prenom</label>
                    <input type="text" class="form-control"  placeholder="Prenom" name="prenom" required>
                    <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" id="" placeholder="candidat@gmail.com"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Age</label>
                        <input type="number" name="age" id="" placeholder="age" class="form-control" min="17" max="35" required>  
                    </div>
                    <div class="form-group">
                        <label for="">Niveau Etude</label>
                        <input type="text" class="form-control"  placeholder="niveau" name="niveuEtude" required>
                    </div>
                    <div class="form-group">
                        <label for="">Sexe</label>
                            <select name="sexe" id="" class="form-control" required>
                                <option value="">.....Faites votre choix......</option>
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option> 
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="">Formation</label>
                            <select name="formation_id[]" id="" class="form-control" required>
                                <option value="">.....Choisissez une formation.....</option>
                                @foreach ($formation as $f)
                                    <option value="{{$f->id}}">{{$f->nom}}</option>
                                @endforeach
                            </select>
                    </div>
                    <button type="submit" class="btn btn-dark offset-5 mt-2">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


