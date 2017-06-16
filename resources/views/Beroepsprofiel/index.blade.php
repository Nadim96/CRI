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
                <div class="panel-heading"><h1>Beroepsprofiel</h1></div>
                       <table class="table">
                        <thead>
                            <tr>
                            <th><b>Beroepsprofielnaam</b></th>
        
                            </tr>
                        </thead>
                        <tbody>
                        <!-- 11-05-2017 Lars: Voor iedere student wordt er een foreach loop gemaakt doordoor de tabel meerdere resultaten kan tonen --> 
                            @foreach ($beroepsprofielen as $beroepsprofiel) 
                          <tr>
                            <td>{{$beroepsprofiel->beroepsprofielnaam}}</td>

                   
                            <td>
                                <!-- 11-05-2017 Lars: Als er op de knop gedrukt hebt wordt je naar de edit pagina gestuurd waar je een nieuwe student kan toevoegen-->
                                <a href="{{ route('Beroepsprofiel.edit', $beroepsprofiel->id)}}" class="btn btn-warning">Wijzigen</a>
                            </td>
                            <td>

                                {!! Form::open(['method'=>'delete', 'route'=>['Beroepsprofiel.destroy', $beroepsprofiel->id]])!!}
                                <!-- 11-05-2017 Lars: Hiermee bevestig je dat je de BPV-Bedrijf wilt verwijderen door middel en een pop-up functie -->
                                {!! Form::submit('Status', ['class'=>'btn btn-primary', 'onclick'=>'return confirm("Weet je zeker dat je deze beroepsprofiel wilt verwijderen?")'])!!}
                                {!! Form::close() !!}
                            </td>
                            
                          </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
            <!-- 11-05-2017 Lars: Als er op de knop gedruk hebt wordt je naar de create pagina gestuurd waar je een nieuwe BPV-Bedrijf kan toevoegen-->
            <button class="btn btn-primary" style="width:80px;height:35px"> <a href="/Beroepsprofiel/create"><b style=""><span class="glyphicon glyphicon-plus" style="color:white;font-size: 20px;"></span></b></a></button>
        </div>
    </div>
@endsection

