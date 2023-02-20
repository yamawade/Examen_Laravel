<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

        <title>TYPE</title>
    </head>
    <body>
        <div class="container">  
        <a href="{{route('type.index')}}" class="btn btn-info mt-2">Liste Type</a>
            <div class="card col-md-8 offset-2 mt-5">
                <form action="{{route('type.edit',['id'=>$type->id])}}" method="post">
                    @csrf
                    <div class="card-header text-center bg-info text-white h4">Modification Type</div>
                    <div class="form-group">
                        <label for="" class="mt-3 pt-1">Libelle</label>
                        <select name="libelle" id="" class="form-control" required>
                            <option value="metier" {{ $type->libelle =="metier" ? 'selected' : ''}}>Metier</option>
                            <option value="formation" {{ $type->libelle =="initiation" ? 'selected' : ''}}>Initiation</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info offset-5 mt-2">Modifier</button>
                </form>
            </div>
        </div> 
    </body>
    
</html>
