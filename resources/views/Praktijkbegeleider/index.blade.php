@extends('layouts.co')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

            <!-- 11-05-2017 Lars: Als een student succesvol wordt toegevoegd laat dan het bericht uit de BpvBedrijfController zien -->
            @if (Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
                <div class="panel-heading"><h1>Praktijkbegeleider</h1></div>
                       <table class="table">
                        <thead>
                            <tr>
                            <th><b>Naam</b></th>
                            <th><b>E-mail</b></th>
                            <th><b>Telefoonnummer</b></th>
                            </tr>
                        </thead>
                        <tbody>
                        <!-- 11-05-2017 Lars: Voor iedere student wordt er een foreach loop gemaakt doordoor de tabel meerdere resultaten kan tonen --> 
                            @foreach ($praktijkbegeleiders as $praktijkbegeleider) 
                          <tr>
                            <td> {{ $praktijkbegeleider->praktijkbegeleidernaam }} </td>
                            <td> {{ $praktijkbegeleider->email }} </td>
                            <td> {{ $praktijkbegeleider->telefoonnummer }} </td>
                   
                            <td>
                                <!-- 11-05-2017 Lars: Als er op de knop gedrukt hebt wordt je naar de edit pagina gestuurd waar je een nieuwe student kan toevoegen-->
                                <a href="{{ route('Praktijkbegeleider.edit', $praktijkbegeleider->id)}}" class="btn btn-warning">Wijzigen</a>
                            </td>
                            <td>
                                {!! Form::open(['method'=>'delete', 'route'=>['Praktijkbegeleider.destroy', $praktijkbegeleider->id]])!!}
                                <!-- 11-05-2017 Lars: Hiermee bevestig je dat je de BPV-Bedrijf wilt verwijderen door middel en een pop-up functie -->
                                {!! Form::submit('Status', ['class'=>'btn btn-primary', 'onclick'=>'return confirm("Weet je zeker dat je deze praktijkbegeleider wilt verwijderen?")'])!!}
                                {!! Form::close() !!}
                            </td>
                          </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
            <!-- 11-05-2017 Lars: Als er op de knop gedruk hebt wordt je naar de create pagina gestuurd waar je een nieuwe BPV-Bedrijf kan toevoegen-->
            <button class="btn btn-primary" style="width:80px;height:35px"> <a href="/Praktijkbegeleider/create"><b style=""><span class="glyphicon glyphicon-plus" style="color:white;font-size: 20px;"></span></b></a></button>
        </div>
    </div>
@endsection

