<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

        <title>CANDIDAT</title>
    </head>
    <body>
        <div class="container">  
        <a href="{{route('candidat.index')}}" class="btn btn-warning mt-3">Liste Candidat</a>
            <div class="card col-md-8 offset-2 mt-3">
                <form action="{{route('candidat.edit',['id'=>$candidat->id])}}" method="post">
                    @csrf
                    <div class="card-header text-center bg-warning text-white">Modification Candidat</div>

                    <div class="form-group">
                    <label for="">Nom</label>
                    <input type="text" class="form-control"  placeholder="Nom" name="nom" required value="{{$candidat->nom}}">
                    </div>
                    <div class="form-group">
                    <label for="">Prenom</label>
                    <input type="text" class="form-control"  placeholder="Prenom" name="prenom" required value="{{$candidat->prenom}}">
                    <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" id="" placeholder="candidat@gmail.com"  class="form-control" required value="{{$candidat->email}}">
                    </div>
                    <div class="form-group">
                    <label for="">Age</label>
                    <input type="number" name="age" id="" placeholder="age" class="form-control" min="17" max="35" required value="{{$candidat->age}}">  
                    </div>
                    <div class="form-group">
                    <label for="">Niveau Etude</label>
                    <input type="text" class="form-control"  placeholder="niveau" name="niveuEtude" required value="{{$candidat->niveuEtude}}">
                    <div class="form-group">
                    <label for="">Sexe</label>
                        <select name="sexe" id="" class="form-control" required>
                            <option value="Homme" {{ $candidat->sexe =="Homme" ? 'selected' : ''}} >Homme</option>
                            <option value="Femme" {{ $candidat->sexe =="Femme" ? 'selected' : ''}} >Femme</option> 
                        </select>
                    <button type="submit" class="btn btn-warning offset-5 mt-2">Modifier</button>
                </form>
            </div>
        </div> 
    </body>
    
</html>
