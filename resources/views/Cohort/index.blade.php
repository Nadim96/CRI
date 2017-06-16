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
                <div class="panel-heading"><h1>Cohort</h1></div>
                       <table class="table">
                        <thead>
                            <tr>
                            <th><b>Jaar</b></th>
                     
                            </tr>
                        </thead>
                        <tbody>
                        <!-- 3-06-2017 Lars: Voor iedere BPV-Bedrijf wordt er een foreach loop gemaakt doordoor de tabel meerdere resultaten kan tonen --> 
                            @foreach ($cohorts as $cohort) 
                          <tr>
                            <td>{{$cohort->jaar}}</td>

                            <td>
                          
                                <!-- 3-06-2017 Lars: Als er op de knop gedrukt hebt wordt je naar de edit pagina gestuurd waar je een nieuwe BPV-Bedrijf kan toevoegen-->
                                <a href="{{ route('Cohort.edit', $cohort->id)}}" class="btn btn-warning">Wijzigen</a>
                            </td>
                            <td>
                                {!! Form::close() !!}
                            </td>
                            
                          </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
            <!-- 11-05-2017 Lars: Als er op de knop gedruk hebt wordt je naar de create pagina gestuurd waar je een nieuwe BPV-Bedrijf kan toevoegen-->
           <button class="btn btn-primary" style="width:80px;height:35px"> <a href="/Cohort/create"><b style=""><span class="glyphicon glyphicon-plus" style="color:white;font-size: 20px;"></span></b></a></button>
        </div>
    </div>
@endsection

