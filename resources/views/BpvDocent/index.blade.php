@extends('layouts.co')

@section('content')

<head><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

            <!-- 11-05-2017 Lars: Als een BPV bedrijf succesvol wordt toegevoegd laat dan het bericht uit de BpvBedrijfController zien -->
            @if (Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif

                <div class="panel-heading"><h1>BPV-Docent </h1></div><br>
              

               <div class="form-group">
        <input type="text" class="form-control" id="search" name="search"></input>
        </div>
        <!--Tabel kolommen- Irsjaad Ketwaru--> 
        <table class="table">
            <thead>
                <tr>
                    
                    <th><b>Naam</b></th>
                    <th><b>Woonplaats</b></th>
                     
                </tr>
            </thead>



<!--Knop exporteer alle gegevens-->


            <tbody>
<!--Ingevulde tabel- Irsjaad Ketwaru--> 
                @if(isset($fulltable))
                <br><br><div  id="fulltable">
                    @foreach($fulltable as $table)
                         <tr>
                            
                            <td>{{$table->name}}</td>
                            <td>{{$table->woonplaats}}</td>
                           
                            <td>
                                <!-- 11-05-2017 Lars: Als er op de knop gedrukt hebt wordt je naar de edit pagina gestuurd waar je een nieuwe BPV-Bedrijf kan toevoegen-->
                                <a href="{{ route('BPV-Docent.edit', $table->id)}}" class="btn btn-warning">Wijzigen</a>
                            </td>
                            <td>

                                {!! Form::open(['method'=>'delete', 'route'=>['BPV-Docent.destroy', $table->id]])!!}
                                <!-- 11-05-2017 Lars: Hiermee bevestig je dat je de BPV-Bedrijf wilt verwijderen door middel en een pop-up functie -->
                                {!! Form::submit('Status', ['class'=>'btn btn-primary', 'onclick'=>'return confirm("Weet je zeker dat je deze BPV-Docent wilt verwijderen?")'])!!}
                                {!! Form::close() !!}
                            </td>
                            
                          </tr>
                    @endforeach
                @endif
                
                </div>
            </tbody>
        </table>
        </div>
    </div>
            <!-- 11-05-2017 Lars: Als er op de knop gedruk hebt wordt je naar de create pagina gestuurd waar je een nieuwe BPV-Bedrijf kan toevoegen-->
            <button class="btn btn-primary" style="width:80px;height:35px"> <a href="/Register"><b style=""><span class="glyphicon glyphicon-plus" style="color:white;font-size: 20px;"></span></b></a></button>
        </div>
    </div>

    <!--Live search- Irsjaad Ketwaru--> 
    <script type="text/javascript">
        $('#search').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
                type    :   'get',
                url     :   '{{URL::to('search')}}',    
                data    :   {'search':$value},
                success:function(data){
                    $('#test').hide();
                    $('tbody').html(data);
                    
                }
            });
        })  
    </script>

@endsection

