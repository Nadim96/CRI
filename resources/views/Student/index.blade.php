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
                <div class="panel-heading"><h1>Student</h1></div>
                       <table class="table">
                        <thead>
                            <tr>
                            <th><b>Student Naam</b></th>
                            <th><b>Woonplaats</b></th>
                            </tr>
                        </thead>
                        <tbody>
                        <!-- 11-05-2017 Lars: Voor iedere student wordt er een foreach loop gemaakt doordoor de tabel meerdere resultaten kan tonen --> 
                            @foreach ($studenten as $student) 
                          <tr>
                            <td>{{$student->naamstudent}}</td>
                            <td>{{$student->woonplaats}}</td>               
                            <td>
                                <!-- 11-05-2017 Lars: Als er op de knop gedrukt hebt wordt je naar de edit pagina gestuurd waar je een nieuwe student kan toevoegen-->
                                <a href="{{ route('Student.edit', $student->id)}}" class="btn btn-warning">Wijzigen</a>
                            </td>
                            <th>
                            {!! Form::submit('Status', ['class'=>'btn btn-primary', 'onclick'=>'return confirm("Weet je zeker dat je deze opleiding wilt verwijderen?")'])!!}
                                {!! Form::close() !!}
                            </th>
                          </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
            <!-- 11-05-2017 Lars: Als er op de knop gedruk hebt wordt je naar de create pagina gestuurd waar je een nieuwe BPV-Bedrijf kan toevoegen-->
            <button class="btn btn-primary" style="width:80px;height:35px"> <a href="/Student/create"><b style=""><span class="glyphicon glyphicon-plus" style="color:white;font-size: 20px;"></span></b></a></button>
        </div>
    </div>
@endsection

