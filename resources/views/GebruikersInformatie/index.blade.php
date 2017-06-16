@extends('layouts.co')

@section('content')
	<div class="col-md-12">
        <!-- Student -->
         <div class="panel-heading"><h1>Gebruikers Informatie</h1></div>
        <div class="btn-group btn-group-lg" role="group">
            <form action="GebruikersInformatie" method="POST">
            {{ csrf_field() }}
            <button name="studie" value="student" class="btn btn-primary">Studenten</button>
            <!-- Docent -->
            <form action="GebruikersInformatie" method="POST">
            {{ csrf_field() }}
            <button name="docent" value="docent" class="btn btn-primary">BPV-Docenten</button>
            <!-- BPV-Bedrijf -->
            <form action="GebruikersInformatie" method="POST">
            {{ csrf_field() }}
            <button name="bpvbedrijf" value="bpvbedrijf" class="btn btn-primary">BPV-Bedrijven</button>
            </form>
            
        </div>
    </div>
    ,
    
        <!-- 30-05-2017 Lars: Laat de studenten gegevens zien -->
            @if(isset($studie))



            <div class="panel panel-default">
                <div class="panel-heading">Studenten informatie</div><br>
                <table class="table">
                <thead>
                	<tr>
                		<th>#</th>
                		<th>Student Naam</th>
                		<th>Woonplaats</th>
                		<th>Coach</th>
                        <th>Opleiding</th>
                		<th>Klas</th>
                		<th>Beroepsprofiel</th>
                        <th>BPV-Bedrijf</th>
                        <th>BPV-Docent</th>
                        
                	</tr>
                </thead>
	                <tbody>
		                @foreach ($studie as $stud)
                         {{ !!! $findcohortid = App\Studie::where('id', $stud->id)->value('cohort_id')}}  <br>
                         {{ !!! $findklasid = App\Studie::where('id', $stud->id)->value('klas_id')}} 
                         {{ !!! $findopleidingid = App\Studie::where('id', $stud->id)->value('opleiding_id')}} 
                         {{ !!! $findstudentid = App\Studie::where('id', $stud->id)->value('student_id')}} 
                         {{ !!! $findberoepsprofielid = App\Studie::where('id', $stud->id)->value('beroepsprofiel_id')}}
                        

                         {{ !!! $findcohort = App\Cohort::where('id', $findcohortid)->get()}}
                         {{ !!! $findklas = App\Klas::where('id', $findklasid)->get()}}
                         {{ !!! $findopleiding = App\Opleiding::where('id', $findopleidingid)->get()}}
                         {{ !!! $findstudent = App\Student::where('id', $findstudentid)->get()}}
                         {{ !!! $findberoepsprofiel = App\Beroepsprofiel::where('id', $findberoepsprofielid)->get()}}
                         
                           

                        @foreach($findstudent as $student)
                             {{ !!! $findcoachid = App\CoachStudent::where('student_id', $student->id)->value('coach_id')}}
                             {{ !!! $findcoach = App\Coach::where('id', $findcoachid)->get()}}
                                @foreach($findcoach as $coach)
                                    @foreach($findopleiding as $opleiding)
                                        @foreach($findklas as $klas)
                                            @foreach($findcohort as $cohort)
                                                @foreach($findberoepsprofiel as $profiel)

                        
                        
                            <tr>
                                <td></td>
                                <td>{{$student->naamstudent}}</td>
                                <td>{{$student->woonplaats}}</td>
                                <td>{{$coach->coachnaam}}</td>
                                <td>{{$opleiding->opleidingnaam}}</td>
                                <td>{{$klas->klasnaam}}</td>
                                <td>{{$profiel->beroepsprofielnaam}}</td>
                                
                                
                                            
                            </tr>

                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                           
                        @endforeach
	                </tbody>
                </table>
	   			</div>
    </div>
            @endif

        <!-- 30-05-2017 Lars: Laat de docenten gegevens zien -->
            @if(isset($bpvdocent))
            <div class="panel panel-default">
                <div class="panel-heading">BPV-Docenten informatie</div>
                <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Naam</th>
                        <th>Woonplaats</th>
                    
                    </tr>
                </thead>
                    <tbody>
                        @foreach ($bpvdocent as $docent)
                            <tr>
                                <td>{{ $docent->id }}</td>
                                <td>{{ $docent->naam }}</td>
                                <td>{{ $docent->woonplaats}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            @endif

         <!-- 30-05-2017 Lars: Laat de BPV-Bedrijven gegevens zien -->
            @if(isset($bpvbedrijf))
            <div class="panel panel-default">
                <div class="panel-heading">BPV-Bedrijf informatie</div>
                <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Naam</th>
                        <th>Adres</th>
                        <th>Plaats</th>
                        <th>Tel.nr</th>
                        <th>Praktijkbegeleider</th>
                        <th>E-mail</th>
                        <th>Beroepsprofiel</th>
                        <th>Erkenning</th>
                    </tr>
                </thead>
                    <tbody>

                        @foreach ($bpvbedrijf as $bpvbedr)
                            <tr>
                                <td>{{ $bpvbedr->id }}</td>
                                <td>{{ $bpvbedr->name }}</td>
                                <td>{{ $bpvbedr->adres}}</td>
                                <td>{{ $bpvbedr->plaats}}</td>
                                <td>{{ $bpvbedr->telnr}}</td>
                                <td>{{ $bpvbedr->praktijkbegeleider}}</td>
                                <td>{{ $bpvbedr->mail}}</td>
                                <td>{{ $bpvbedr->beroepsprofiel}}</td>
                                <td>{{ $bpvbedr->erkenning}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            @endif
             
			


        </div>
@endsection