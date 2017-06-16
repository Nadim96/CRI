@extends('layouts.co')

@section('title', 'bezoeken')
@section('body')
@section('content')

<html>
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
    rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../style/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
  </head>
  
  <body>



    <!--Lars 20-04 dwdw -->
     <div class="section">

      <div class="container">

        <div class="row">
          <div class="col-lg-6">
              <div id="docenten">

                <div id="studenten">
                  <h3>Opleiding</h3>
                <div class="btn-group btn-group-sm">
                
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="#">Action</a>
                  </li>
                </ul>
              </div>
              <div class="btn-group btn-group-sm">
              
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="#">Action</a>
                  </li>
                </ul>
              </div>
              <ul class="list-group text-left">

                <thead>
                <tr>
                  <th></th>
                  <th>Opleidingsnaam</th><br>
                </tr>
                </thead>
                  <tbody>
                   <form method="post">
                     @foreach($opleidingen as $opleiding)
                      {{ csrf_field() }}
                    <tr>
                      <td>  <input type="radio" id="{{$opleiding->id}}" name="opleiding[]" value="{{$opleiding->id}}"/></td>
                      <td>  {{$opleiding->opleidingnaam}}</td><br>
                    </tr>
                   @endforeach
                   <br>
                      <td> <input type="submit" value="zoeken"></td> 
                 </form>
                @if(isset($opleidingkeuze))

                    <script type="text/javascript">
                      document.querySelector("input[value='{{$opleidingkeuze}}']").checked = true;
                    </script>
                @endif
                  </tbody>
              </ul>
              <div>
              </div>

                </div>
              <div class="col-lg-6">
                <div id="studenten">
                  <h3>Klas</h3>
                  <div class="btn-group btn-group-sm">
                
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="#">Action</a>
                  </li>
                </ul>
              </div>
              <div class="btn-group btn-group-sm">
              
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="#">Action</a>
                  </li>
                </ul>
              </div>
              <ul class="list-group text-left"> @if (isset($klassen))
                <thead>
                <tr>
                  <th></th>
                  <th>Klasnaam</th>
                </tr>
                </thead>
                  <tbody>

                     <form method="post">
                   
                     @foreach($klassen as $klas)
                      {{ csrf_field() }}
                    <tr>
                      <td>  <input type="radio" id="{{$klas->id}}" name="klas[]" value="{{$klas->id}}"/></td>
                      <td>  {{$klas->klasnaam}}</td>
                    </tr>
                     @endforeach

                      <br><br><td> <input type="submit" value="zoeken"></td> 
                   @else
                    <tr>
                      <td><b> {{ 'Kies een opleiding'}} </b></td>
                    </tr>
                   @endif
                 </form>
                 <tr>        
               </ul>
              <div>
              </div>

                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="col-md-12 text-center">
           
            <div class="btn-group btn-group-sm">
            
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="#">Action</a>
                </li>
              </ul>
            </div>
            <div class="btn-group btn-group-sm">
          
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="#">Action</a>
                </li>
              </ul>
            </div>
            <div class="btn-group btn-group-sm">
             
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="#">Action</a>
                </li>
              </ul>
            </div>

              @if(isset($studentcode))
                        
                  {{ !!!  $opleiding = App\Opleiding::find($opleidingkeuze) }}
                  {{ !!!  $klas = App\Klas::find($klaskeuze) }}

               <p style="float:left;">   {!! 'Resultaten voor opleiding ' . '<b>' . $opleiding->opleidingnaam . '</b>' .' en klas ' . '<b>' . $klas->klasnaam . '</b>' !!} </p>

                             <hr>
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th style="text-align: center;">Student</th>
                                    <th style="text-align: center;">BPV-Docent</th>
                                    <th style="text-align: center;">Bezoek1</th>
                                    <th style="text-align: center;">Bezoek2</th>
                                    <th style="text-align: center;">Bezoek3</th>
                                    <th style="text-align: center;">Bezoek4</th>
                                    <th style="text-align: center;">Bezoek5</th>
                                    <th style="text-align: center;">Bezoek6</th>
                                    <th style="text-align: center;">Bezoek7</th>
                                    <th style="text-align: center;">Bezoek8</th>
                                  </tr>
                                </thead>
                                <tbody>

                  

                          @foreach($studentcode as $stucode)


                           {{ !!! $bezoekidfromstudentcode = App\Bezoeken_Student_Docent::where('student_id', $stucode)->pluck('bezoek_id') }}

                           {{ !!! $bezoeken = App\Bezoeken::findMany($bezoekidfromstudentcode) }}

                           {{ !!! $docentid = App\Bezoeken_Student_Docent::where('student_id', $stucode)->pluck('bpvdocent_id') }}

                           {{ !!! $docenten = App\BPVDocent::findMany($docentid)}}


                            @foreach($bezoeken as $bezoek)
                              {{ !!! $studentnaam = App\Student::find($stucode) }}
                                @foreach($docenten as $docent)








                                <tr>
                                    <td>{{$studentnaam->naamstudent}}</td>
                                    <td>{{$docent->naam}}</td>
                                    <td>@if($bezoek->bezoek1 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek1}} @endif</td>
                                    <td>@if($bezoek->bezoek2 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek2}} @endif</td>
                                    <td>@if($bezoek->bezoek3 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek3}} @endif</td>
                                    <td>@if($bezoek->bezoek4 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek4}} @endif</td>
                                    <td>@if($bezoek->bezoek5 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek5}} @endif</td>
                                    <td>@if($bezoek->bezoek6 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek6}} @endif</td>
                                    <td>@if($bezoek->bezoek7 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek7}} @endif</td>
                                    <td>@if($bezoek->bezoek8 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek8}} @endif</td>
                                </tr>


                              @endforeach
          
                            @endforeach

                          @endforeach
                    

                    @else

                      <hr>
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th style="text-align: center;">Student</th>
                                    <th style="text-align: center;">BPV-Docent</th>
                                    <th style="text-align: center;">Bezoek1</th>
                                    <th style="text-align: center;">Bezoek2</th>
                                    <th style="text-align: center;">Bezoek3</th>
                                    <th style="text-align: center;">Bezoek4</th>
                                    <th style="text-align: center;">Bezoek5</th>
                                    <th style="text-align: center;">Bezoek6</th>
                                    <th style="text-align: center;">Bezoek7</th>
                                    <th style="text-align: center;">Bezoek8</th>
                                  </tr>
                                </thead>
                                <tbody>

                     {{ !!! $bezoeken = App\Bezoeken::all() }}



                     

                     @foreach($bezoeken as $bezoek)

                          {{ !!! $studentidfrombezoek = App\Bezoeken_Student_Docent::where('bezoek_id', $bezoek->id)->pluck('student_id') }}
                          {{ !!! $docentidfrombezoek = App\Bezoeken_Student_Docent::where('bezoek_id', $bezoek->id)->pluck('bpvdocent_id') }}

                           @foreach($studentidfrombezoek as $stucode)
                               {{ !!! $studentnaam = App\Student::find($stucode) }}
                                @foreach($docentidfrombezoek as $docentcode)
                                   {{ !!! $docentnaam = App\BPVDocent::find($docentcode) }}



                                <tr>
                                    <td>{{$studentnaam->naamstudent}}</td>
                                    <td>{{$docentnaam->naam}}</td>
                                    <td>@if($bezoek->bezoek1 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek1}} @endif</td>
                                    <td>@if($bezoek->bezoek2 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek2}} @endif</td>
                                    <td>@if($bezoek->bezoek3 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek3}} @endif</td>
                                    <td>@if($bezoek->bezoek4 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek4}} @endif</td>
                                    <td>@if($bezoek->bezoek5 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek5}} @endif</td>
                                    <td>@if($bezoek->bezoek6 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek6}} @endif</td>
                                    <td>@if($bezoek->bezoek7 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek7}} @endif</td>
                                    <td>@if($bezoek->bezoek8 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek8}} @endif</td>
                                </tr>

                             @endforeach
                          @endforeach
                      @endforeach
          

                    @endif

{{--
            
                    @if (isset($studentcode))
                    
                    <hr>
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="text-align: center;">Student</th>
                            <th style="text-align: center;">Bezoek1</th>
                            <th style="text-align: center;">Bezoek2</th>
                            <th style="text-align: center;">Bezoek3</th>
                            <th style="text-align: center;">Bezoek4</th>
                            <th style="text-align: center;">Bezoek5</th>
                            <th style="text-align: center;">Bezoek6</th>
                            <th style="text-align: center;">Bezoek7</th>
                            <th style="text-align: center;">Bezoek8</th>
                          </tr>
                        </thead>
                        <tbody>

                 @foreach($studentcode as $stucode)
                            {{ !!! $findbezoek = App\Bezoeken::where('studentcode', $stucode->studentcode)->get() }}
                              @foreach($findbezoek as $findbe)
                                 <tr>
                                    <td>{{$stucode->naamstudent}}</td>
                                    <td>@if($findbe->bezoek1 == 0000-00-00) {{'-'}} @else {{$findbe->bezoek1}} @endif</td>
                                    <td>@if($findbe->bezoek2 == 0000-00-00) {{'-'}} @else {{$findbe->bezoek2}} @endif</td>
                                    <td>@if($findbe->bezoek3 == 0000-00-00) {{'-'}} @else {{$findbe->bezoek3}} @endif</td>
                                    <td>@if($findbe->bezoek4 == 0000-00-00) {{'-'}} @else {{$findbe->bezoek4}} @endif</td>
                                    <td>@if($findbe->bezoek5 == 0000-00-00) {{'-'}} @else {{$findbe->bezoek5}} @endif</td>
                                    <td>@if($findbe->bezoek6 == 0000-00-00) {{'-'}} @else {{$findbe->bezoek6}} @endif</td>
                                    <td>@if($findbe->bezoek7 == 0000-00-00) {{'-'}} @else {{$findbe->bezoek7}} @endif</td>
                                    <td>@if($findbe->bezoek8 == 0000-00-00) {{'-'}} @else {{$findbe->bezoek8}} @endif</td>
                                </tr>
                              @endforeach 
                         @endforeach 
                   @endif


                  @if(isset($klassen) AND !isset($studentcode))
                    {{'Kies een klas'}}
                  @endif




                   @if (!isset($studentcode))
                  
                    @if (isset($bezoeken))
                     <hr>
                        <table class="table">
                          <thead>
                            <tr>
                              <th style="text-align: center;">Student</th>
                              <th style="text-align: center;">Bezoek1</th>
                              <th style="text-align: center;">Bezoek2</th>
                              <th style="text-align: center;">Bezoek3</th>
                              <th style="text-align: center;">Bezoek4</th>
                              <th style="text-align: center;">Bezoek5</th>
                              <th style="text-align: center;">Bezoek6</th>
                              <th style="text-align: center;">Bezoek7</th>
                              <th style="text-align: center;">Bezoek8</th>
                            </tr>
                          </thead>
                          <tbody>
                      @foreach($bezoeken as $bezoek)
                         {{ !!! $findstudent = App\Student::where('studentcode', $bezoek->studentcode)->get()}}
                             @foreach($findstudent as $findstu)

                          <tr>
                              <td>{{$findstu->naamstudent}}</td>
                              <td>@if($bezoek->bezoek1 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek1}} @endif</td>
                              <td>@if($bezoek->bezoek2 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek2}} @endif</td>
                              <td>@if($bezoek->bezoek3 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek3}} @endif</td>
                              <td>@if($bezoek->bezoek4 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek4}} @endif</td>
                              <td>@if($bezoek->bezoek5 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek5}} @endif</td>
                              <td>@if($bezoek->bezoek6 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek6}} @endif</td>
                              <td>@if($bezoek->bezoek7 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek7}} @endif</td>
                              <td>@if($bezoek->bezoek8 == 0000-00-00) {{'-'}} @else {{$bezoek->bezoek8}} @endif</td>
                          </tr>
                        @endforeach
                      @endforeach
                    @endif
                   @endif

--}}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
   

</html>
@endsection

@endsection

