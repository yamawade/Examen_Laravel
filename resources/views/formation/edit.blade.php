<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

        <title>ETUDIANT</title>
    </head>
    <body class="bg-dark">
        <div class="container">  
        <a href="{{route('formation.index')}}" class="btn btn-success mt-2">Liste Formation</a>
            <div class="card col-md-8 offset-2 mt-5">
                <form action="{{route('formation.editformation',['id'=>$formation->id])}}" method="post">
                    @csrf
                    <div class="card-header text-center bg-success text-white h4">Modification Formation</div>

                    <div class="form-group">
                    <label for="" >Nom</label>
                    <input type="text" class="form-control"  placeholder="Nom" name="nom" required value="{{$formation->nom}}">
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-2">Duree</label>
                        <input type="number" class="form-control"  placeholder="duree" name="duree" min="1" max="12" required value="{{$formation->duree}}">
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-2">Description</label>
                        <input type="text" class="form-control"  placeholder="description" name="description" required value="{{$formation->description}}">
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-3 pt-1">isStarted</label>
                        <select name="isStarted" id="" class="form-control" required>
                            <option value="1" {{ $formation->isStarted =="1" ? 'selected' : ''}}>Oui</option>
                            <option value="0" {{ $formation->isStarted =="0" ? 'selected' : ''}}>Non</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-2">Date Debut</label>
                        <input type="date" class="form-control" name="date_debut" required value="{{$formation->date_debut}}">
                    </div>
                    <button type="submit" class="btn btn-success offset-5 mt-2">Modifier</button>
                </form>
            </div>
        </div> 
    </body>
    
</html>
