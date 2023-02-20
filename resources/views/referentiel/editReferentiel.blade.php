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
        <a href="{{route('referentiel.index')}}" class="btn btn-success mt-2">Liste Referentiel</a>
            <div class="card col-md-8 offset-2 mt-5">
                <form action="{{route('referentiel.edit',['id'=>$referentiel->id])}}" method="post">
                    @csrf
                    <div class="card-header text-center bg-success text-white h4">Modification Referentiel</div>

                    <div class="form-group">
                    <label for="" >Libelle</label>
                    <input type="text" class="form-control"  placeholder="Libelle" name="libelle" required value="{{$referentiel->libelle}}">
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-3 pt-1">Validated</label>
                        <select name="validated" id="" class="form-control" required>
                            <option value="1" {{ $referentiel->validated =="1" ? 'selected' : ''}} >Oui</option>
                            <option value="0" {{ $referentiel->validated =="0" ? 'selected' : ''}} >Non</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-2">Horaire</label>
                        <input type="text" class="form-control"  placeholder="18.00" name="horaire" required value="{{$referentiel->horaire}}">
                    </div>
                    <button type="submit" class="btn btn-success offset-5 mt-2">Modifier</button>
                </form>
            </div>
        </div> 
    </body>
    
</html>
