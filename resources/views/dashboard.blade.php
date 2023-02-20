<x-app-layout>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1> 
                    <div class="p-6 text-gray-900 bg-primary text-white">
                        {{ __("En ligne!") }}
                    </div>
                </h1>
            </div>
            <br>
            <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Candidat/Formation</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                                @foreach($formationCount as $frm)
                                                    <li>{{$frm->nom}}: {{$frm->candidats_count}} candidat(s)</li>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Candidat/Sexe
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <h4>{{$candidatCount}} candidat(s)</h4>
                                                <li>{{$candidatCountfemme}} femme(s)</li>
                                                <li>{{$candidatCounthomme}} homme(s)</li>  
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Referentiel/Formation
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    @foreach($referentiel as $r)
                                                        <li>{{$r->libelle}}: {{$r->formations_count}} formation</li>
                                                    @endforeach 
                                                    
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Formation / Type
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
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
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <canvas id="myChart"></canvas>
                        <canvas id="formationChart"></canvas>
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <div id="content-wrapper" class="d-flex flex-column">
                        <div id="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xl-3 col-md-6 mb-4">
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

                                        </script>
                                    </div>
                                    <div class="col-xl-8 col-lg-7">
                                        <script>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                </div>
            </div>
                    
        </div>
    </div>
</x-app-layout>

