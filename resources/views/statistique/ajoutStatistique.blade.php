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
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid bg-dark " >
                    <a class="navbar-brand text-white" href="#">GestionCandidat</a>
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

            <div class="col-xl-3 col-md-3">
                <div class="card text-white mb-4" style="background-color: indigo;">
                    <div class="card-body"><h3>Formation</h3></div>
                    @foreach($formationCount as $frm)
                        <li>{{$frm->nom}}: {{$frm->candidats_count}} candidat(s)</li>
                    @endforeach
                    
                </div>   
            </div>  
            <div class="col-xl-3 col-md-3">
                <div class="card text-white mb-4 bg-success">
                    <div class="card-body"><h3>Total Candidat</h3></div>
                    <h4>{{$candidatCount}} candidat(s)</h4>
                    <li>{{$candidatCountfemme}} femme(s)</li>
                    <li>{{$candidatCounthomme}} homme(s)</li>  
                </div>   
            </div>  
            <div class="col-xl-3 col-md-3">
                <div class="card text-white mb-4 bg-primary">
                    <div class="card-body"><h3>Referentiel</h3></div>
                    @foreach($referentiel as $r)
                        <li>{{$r->libelle}}: {{$r->formations_count}} formation</li>
                    @endforeach
                </div> 
            </div>  
        </div>
        <div class="col-xl-3 col-md-3">
            <div class="card text-white mb-4" style="background-color: black;">
                <div class="card-body"><h3>Formation/type</h3></div>
                <li>{{$typeCount}} type(s)</li>
                @foreach($repartition_formations as $ref)
                    <p> {{$ref->libelle}}</p>
                    <li>
                        @foreach($ref->referentiels as $refnbr)
                        @foreach($refnbr->formations as $f)
                            <li>{{$f->nom}}</li>
                        @endforeach
                        @endforeach
                    </li>
                @endforeach
            </div>   
        </div>     
       
        <div>
            <canvas id="myChart"></canvas>
            <canvas id="formationChart"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const ctx = document.getElementById('myChart');
            var ages = <?php echo $ages; ?>;
                    var labels = [], data = [];
                    for (var i = 0; i < ages.length; i++) {
                        labels.push(ages[i].age);
                        data.push(ages[i].total);
                    }
            
            new Chart(ctx, {
                type: 'bar',
                data: {
                labels: labels,
                datasets: [{
                    label: '# Tranche age',
                    data: data,
                    backgroundColor: [
                    'rgba(31, 58, 147, 1)',
                    'rgba(37, 116, 169, 1)',
                    'rgba(92, 151, 191, 1)',
                    'rgb(200, 247, 197)',
                    'rgb(77, 175, 124)',
                    'rgb(30, 130, 76)'
                    ],
                    borderColor: [
                        'rgba(31, 58, 147, 1)',
                        'rgba(37, 116, 169, 1)',
                        'rgba(92, 151, 191, 1)',
                        'rgb(200, 247, 197)',
                        'rgb(77, 175, 124)',
                        'rgb(30, 130, 76)'
                    ],
                    borderWidth: 1
                }]
                },
                options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
                }
                
            });

            
           
            const ctx1 = document.getElementById('formationChart');

            var formation_tranche = <?php echo $formation_tranche; ?>;
            var labelformation = [], dataformation = [];
            for (var i = 0; i < formation_tranche.length; i++) {
                labelformation.push(formation_tranche[i].isStarted);
                dataformation.push(formation_tranche[i].total);
            }
            new Chart(ctx1, {
                type: 'bar',
                data: {
                labels: labelformation,
                datasets: [{
                    label: '# Statistique formation',
                    data: dataformation,
                    backgroundColor: [
                    'rgba(31, 58, 147, 1)',
                    'rgba(37, 116, 169, 1)',
                    'rgba(92, 151, 191, 1)',
                    'rgb(200, 247, 197)',
                    'rgb(77, 175, 124)',
                    'rgb(30, 130, 76)'
                    ],
                    borderColor: [
                        'rgba(31, 58, 147, 1)',
                        'rgba(37, 116, 169, 1)',
                        'rgba(92, 151, 191, 1)',
                        'rgb(200, 247, 197)',
                        'rgb(77, 175, 124)',
                        'rgb(30, 130, 76)'
                    ],
                    borderWidth: 1
                }]
                },
                options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
                }
                
            });
        </script>
        
    </body>
    
</html>
