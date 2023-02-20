<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Referentiel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <h1> 
                    <div class="p-6 text-gray-900 ">
                        {{ __("En ligne!") }}
                        <a href="{{route('referentielpage')}}" class="btn btn-primary offset-8">Ajout Referentiel</a>
                    </div>
                </h1>
            </div>

            <table class="table table-bordered pt-2">
                <div class="card-header text-center bg-primary text-white">LISTES DES REFERENTIELS</div>
                <tr>
                    <th>#</th>
                    <th>LIBELLE REFERENRIEL</th>
                    <th>VALIDATED</th>
                    <th>HORAIRE</th>
                </tr>
                @foreach($referentiel as $r)
                    <tr>
                       <td>{{$r->id}}</td>
                       <td>{{$r->libelle}}</td>
                       <td>{{$r->validated}}</td>
                       <td>{{$r->horaire}}</td>
                       
                    </tr>
                @endforeach
                </div>     
            </table>
        </div>
    </div>
</x-app-layout>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <title>REFERENRIEL</title>
    </head>
    <body>
        <div class="card-body">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid bg-success " >
                <a class="navbar-brand text-dark" href="#">GestionCandidat</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="{{route('homepage')}}">Formation</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('candidatpage')}}">Candidat</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('referentielpage')}}">Referentiel</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white"  href="{{route('typepage')}}">Type</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav> 
            <table class="table table-bordered pt-2">
                <div class="card-header text-center bg-success text-white">LISTES DES REFERENTIELS</div>
                <tr>
                    <th>#</th>
                    <th>LIBELLE REFERENRIEL</th>
                    <th>VALIDATED</th>
                    <th>HORAIRE</th>
                </tr>
                @foreach($referentiel as $r)
                    <tr>
                       <td>{{$r->id}}</td>
                       <td>{{$r->libelle}}</td>
                       <td>{{$r->validated}}</td>
                       <td>{{$r->horaire}}</td>
                       <td>   
                            <a href="{{ route('referentiel.edit',$r->id)}}" class="btn btn-success">Modifier</a>
                            <form method="POST" action="{{route('referentiel.delete',$r->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger " title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> supprimer</button>
                            </form>
                       </td>
                    </tr>
                @endforeach
                </div>   
            </div>  
            </table>
        </div>
    </body>
    
</html>
