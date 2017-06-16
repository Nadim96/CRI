@extends('layouts.app')

@section('content')


<head>
  <meta charset="UTF-8">  
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
  <br>
      <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="title">Voeg bezoek toe</h4>
              
            </div>
            <div class="modal-body">
              <input id="subtitle" style="border: 0; font-weight: bold;">
              <input type="hidden" id="id"> 
              <input type="hidden" id="bezoek">
              <div><input type="Date" placeholder="2017-01-01" id="addItem" LIMIT 4> </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="saveChanges" style="display: none" data-dismiss="modal">Opslaan</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div>
  </div>

  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  
   <script>

  //Nadim 13-06-2017 Haalt de data uit de formulier en stopt deze in een 'modal'
    $(document).ready(function() {
      $('.ourItem').each(function() {
        $(this).click(function(event) {
          var text = $.trim($(this).text());
          var id = $(this).find('#itemId').val();
          var bezoek = $(this).find('#bezoekId').val();
          $('#title').text('Voeg bezoek toe');
          $('#subtitle').val(bezoek);
          $("#subtitle").prop("readonly", true);
          $('#addItem').val('');
          $('#saveChanges').show('400');
          $('#id').val(id);
          $('#bezoek').val(bezoek);
          console.log(id, bezoek);
        });
      });
    
  //Nadim 13-06-2017 Als er op een bezoek is gedrukt stuurt hij deze waardes naar de controller en slaat ze op.
    $('#saveChanges').click(function(event) {
     var id = $("#id").val();
     var bezoek = $("#bezoek").val();
     console.log(bezoek);
     var value = $.trim($("#addItem").val());
     $.post('update', {'id': id,'value': value,'bezoek': bezoek,'_token':$('input[name=_token]').val()}, function(data) {
     
     });
     if (Date.parse(value)) {
        window.location.href = "bezoekenbeheer?message=success";
     } else {
        window.location.href = "bezoekenbeheer?message=fail";
     }

     });

    

  });



// 14-06-2017 Als er enter wordt gedrukt bij de textvak wordt de button geselecteerd
$(document).ready(function() {
     $('#addItem').keypress(function(e){
      if(e.keyCode==13)
      $('#saveChanges').click();
    });
     return false;
  });

  </script>

 



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">



           
                <div class="panel-heading"><h1>Bezoeken Beheer</h1></div>
            <!-- 11-05-2017 Lars: Als een student succesvol wordt toegevoegd laat dan het bericht uit de BpvBedrijfController zien -->
            @if (Session::has('message'))
            <div class="alert alert-success alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{Session::get('message')}}</div>
            @endif
            <!-- 14-06-2017 Nadim: Als er een bezoek is toegevoegd komt er een success melding -->
            @if(isset($_GET["message"]))
              @if($_GET["message"] == 'success')
               <div class="alert alert-success alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Bezoek is succesvol toegevoegd!</div> 
              @elseif($_GET["message"] == 'fail')
              <div class="alert alert-danger alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Bezoek is niet toegevoegd!</div>
              @endif
            @endif
                       <table class="table">
                        <thead>
                            <tr>
                            <th><b>Student</b></th>
                            <th><b>Bezoek 1</b></th>
                            <th><b>Bezoek 2</b></th>
                            <th><b>Bezoek 3</b></th>
                            <th><b>Bezoek 4</b></th>
                            <th><b>Bezoek 5</b></th>
                            <th><b>Bezoek 6</b></th>
                            <th><b>Bezoek 7</b></th>
                            <th><b>Bezoek 8</b></th>
                            <th></th>
        
                            </tr>
                        </thead>
                        <tbody>
                        <!-- 11-05-2017 Lars: Voor iedere student wordt er een foreach loop gemaakt doordoor de tabel meerdere resultaten kan tonen --> 
                        @foreach ($bezoekenfromdocentid as $bezoeken)
                          {{ !!! $findbezoek = App\Bezoeken::find($bezoeken->bezoek_id) }}
                          {{ !!! $findstudentidfrombezoek = App\Bezoeken_Student_Docent::where('id', $bezoeken->id)->value('student_id')}}
                          {{ !!! $student = App\Student::find($findstudentidfrombezoek)}}


                            <tr>
                            <td value="{{$student->id}}">{{$student->naamstudent}}</td>
                              <td>@if($findbezoek->bezoek1 != 0000-00-00) {{$findbezoek->bezoek1}} @else <div class="ourItem" data-toggle="modal" data-target="#myModal" style="margin-left: 20px;"> <span class="glyphicon glyphicon-plus" style="color:black:#F5F8FA;font-size: 20px;"></span> <input type="hidden" id="itemId" value="{{$findbezoek->id}}"> <input type="hidden" id="bezoekId" value="bezoek1"></div> @endif</td>
                              <td>@if($findbezoek->bezoek2 != 0000-00-00) {{$findbezoek->bezoek2}} @else <div class="ourItem" data-toggle="modal" data-target="#myModal" style="margin-left: 20px;"> <span class="glyphicon glyphicon-plus" style="color:black:#F5F8FA;font-size: 20px;"></span> <input type="hidden" id="itemId" value="{{$findbezoek->id}}"> <input type="hidden" id="bezoekId" value="bezoek2"></div> @endif</td>
                              <td>@if($findbezoek->bezoek3 != 0000-00-00) {{$findbezoek->bezoek3}} @else <div class="ourItem" data-toggle="modal" data-target="#myModal" style="margin-left: 20px;"> <span class="glyphicon glyphicon-plus" style="color:black:#F5F8FA;font-size: 20px;"></span> <input type="hidden" id="itemId" value="{{$findbezoek->id}}"> <input type="hidden" id="bezoekId" value="bezoek3"></div> @endif</td>
                              <td>@if($findbezoek->bezoek4 != 0000-00-00) {{$findbezoek->bezoek4}} @else <div class="ourItem" data-toggle="modal" data-target="#myModal" style="margin-left: 20px;"> <span class="glyphicon glyphicon-plus" style="color:black:#F5F8FA;font-size: 20px;"></span> <input type="hidden" id="itemId" value="{{$findbezoek->id}}"> <input type="hidden" id="bezoekId" value="bezoek4"></div> @endif</td>
                              <td>@if($findbezoek->bezoek5 != 0000-00-00) {{$findbezoek->bezoek5}} @else <div class="ourItem" data-toggle="modal" data-target="#myModal" style="margin-left: 20px;"> <span class="glyphicon glyphicon-plus" style="color:black:#F5F8FA;font-size: 20px;"></span> <input type="hidden" id="itemId" value="{{$findbezoek->id}}"> <input type="hidden" id="bezoekId" value="bezoek5"></div> @endif</td>
                              <td>@if($findbezoek->bezoek6 != 0000-00-00) {{$findbezoek->bezoek6}} @else <div class="ourItem" data-toggle="modal" data-target="#myModal" style="margin-left: 20px;"> <span class="glyphicon glyphicon-plus" style="color:black:#F5F8FA;font-size: 20px;"></span> <input type="hidden" id="itemId" value="{{$findbezoek->id}}"> <input type="hidden" id="bezoekId" value="bezoek6"></div> @endif</td>
                              <td>@if($findbezoek->bezoek7 != 0000-00-00) {{$findbezoek->bezoek7}} @else <div class="ourItem" data-toggle="modal" data-target="#myModal" style="margin-left: 20px;"> <span class="glyphicon glyphicon-plus" style="color:black:#F5F8FA;font-size: 20px;"></span> <input type="hidden" id="itemId" value="{{$findbezoek->id}}"> <input type="hidden" id="bezoekId" value="bezoek7"></div> @endif</td>
                              <td>@if($findbezoek->bezoek8 != 0000-00-00) {{$findbezoek->bezoek8}} @else <div class="ourItem" data-toggle="modal" data-target="#myModal" style="margin-left: 20px;"> <span class="glyphicon glyphicon-plus" style="color:black:#F5F8FA;font-size: 20px;"></span> <input type="hidden" id="itemId" value="{{$findbezoek->id}}"> <input type="hidden" id="bezoekId" value="bezoek8"></div> @endif</td>

                              <td>
                                <!-- 09-06-2017 Nadim: Als er op de knop gedrukt hebt wordt je naar de edit pagina gestuurd waar je een nieuwe student kan toevoegen-->
                                <a href="{{ route('bezoekenbeheer.edit', $findbezoek->id)}}" class="btn btn-warning">Wijzigen</a>
                            </td>

                              </tr>

                        @endforeach 


                         {{--   @foreach ($coaches as $coach) 
                        

                   
                            <td>
                                <!-- 11-05-2017 Lars: Als er op de knop gedrukt hebt wordt je naar de edit pagina gestuurd waar je een nieuwe student kan toevoegen-->
                                <a href="{{ route('Coach.edit', $coach->id)}}" class="btn btn-warning">Wijzigen</a>
                            </td>
                            <td>

                                {!! Form::open(['method'=>'delete', 'route'=>['Coach.destroy', $coach->id]])!!}
                                <!-- 11-05-2017 Lars: Hiermee bevestig je dat je de BPV-Bedrijf wilt verwijderen door middel en een pop-up functie -->
                                {!! Form::submit('Status', ['class'=>'btn btn-primary', 'onclick'=>'return confirm("Weet je zeker dat je deze student wilt verwijderen?")'])!!}
                                {!! Form::close() !!}
                            </td>
                            
                          </tr>
                            @endforeach
                            --}}






                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection

