@extends('layouts.co')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

            <!-- 11-05-2017 Lars: Als een BPV bedrijf succesvol wordt toegevoegd laat dan het bericht uit de BpvBedrijfController zien -->
            @if (Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
                <div class="panel-heading"><h1>BPV-Bedrijf</h1></div>
                       <table class="table">
                        <thead>
                            <tr>
                            <th><b>Naam</b></th>
                            <th><b>Adres</b></th>
                            <th><b>Plaats</b></th>
                            
                            </tr>
                        </thead>
                        <tbody>
                        <!-- 11-05-2017 Lars: Voor iedere BPV-Bedrijf wordt er een foreach loop gemaakt doordoor de tabel meerdere resultaten kan tonen --> 
                            @foreach ($bpv_bedrijven as $BpvBedrijf) 
                          <tr>
                            <td>{{$BpvBedrijf->name}}</td>
                            <td>{{$BpvBedrijf->adres}}</td>
                            <td>{{$BpvBedrijf->plaats}}</td>
                            
                            <td>
                                <!-- 11-05-2017 Lars: Als er op de knop gedrukt hebt wordt je naar de edit pagina gestuurd waar je een nieuwe BPV-Bedrijf kan toevoegen-->
                                <a href="{{ route('BPV-Bedrijf.edit', $BpvBedrijf->id)}}" class="btn btn-warning">Wijzigen</a>
                            </td>
                            <th>
                                  {!! Form::submit('Status', ['class'=>'btn btn-primary', 'onclick'=>'return confirm("Weet je zeker dat je deze BPV-Docent wilt verwijderen?")'])!!}
                                {!! Form::close() !!}
                            </th>
                          </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
            <!-- 11-05-2017 Lars: Als er op de knop gedruk hebt wordt je naar de create pagina gestuurd waar je een nieuwe BPV-Bedrijf kan toevoegen-->
            <button class="btn btn-primary" style="width:80px;height:35px"> <a href="/BPV-Bedrijf/create"><b style=""><span class="glyphicon glyphicon-plus" style="color:white;font-size: 20px;"></span></b></a></button>
        </div>
    </div>
@endsection

