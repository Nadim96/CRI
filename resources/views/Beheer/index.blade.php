@extends('layouts.co')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Beheer</h2></div>
                <div class="section">
				      <div class="container-responsive">
				        <div class="row-responsive">
				        <div class="panel-body">
				         
				          <div class="col-md-3">
				          <h3>BPV-Docent</h3>
					      	<p>
					        <li><a href="BPV-Docent">BPV-Docent Beheer</a><br></li>
					        <li><a href="importBpvDocent">BPV-Docenten XLSX Importeren</a><br></li>
					        <li><a href="getExportBPVDocent">BPV-Docenten XLSX Exporteren</a><br></li>
					        BPV-Docenten PDF Exporteren
					        </p>
				          </div>

				          <div class="col-md-3">
				          <h3>Coach</h3>
				          <p>
						    <li><a href="Coach">Coach Beheer</a><br></li>
							<li><a href="importCoach">Coaches XLSX Importeren</a><br></li>
					        <li><a href="getExportCoaches">Coaches XLSX Exporteren</a><br></li>
					        Coaches PDF Exporteren  
						  </p>
						  </div>

						   <div class="col-md-3">
				          <h3>Student</h3>
				          <p>
						    <li><a href="Student">Student Beheer</a><br>
							<li><a href="importStudent">Studenten XLSX Importeren</a><br></li>
					        <li><a href="getExportStudent">Studenten XLSX Exporteren</a><br></li>
					        Studenten PDF Exporteren  
						  </p>
				          </div>

				          <div class="col-md-3">
				          <h3>BPV-Bedrijf</h3>
					          <p>
						    <li><a href="BPV-Bedrijf">BPV-Bedrijf Beheer</a><br></li>
						    <li><a href="importBpvBedrijf">BPV-Bedrijven XLSX Importeren</a><br></li>
					        <li><a href="getExportBPVBedrijf">BPV-Bedrijven XLSX Exporteren</a><br></li>
					        BPV-Bedrijven PDF Exporteren  	
						       </p>
				          </div>

				          <div class="col-md-3">
				          <h3>Praktijkbegeleider</h3>
				          <p>
						    <li><a href="Praktijkbegeleider">Praktijkbegeleider Beheer</a><br></li>
						    <li><a href="importPraktijkbegeleider">Praktijkbegeleiders XLSX Importeren</a><br></li>
					        <li><a href="getExportPraktijkbegeleider">Praktijkbegeleiders XLSX Exporteren<br></a></li>
					        Praktijkbegeleiders PDF Exporteren  
						  </p>

				          </div>

				           <div class="panel-body">

				          <div class="col-md-3">
				          <h3>Opleiding</h3>
				          <p>
						        <li><a href="Opleiding">Opleiding Beheer</a><br></li> 
						       </p>
				          </div>
				          
				          <div class="col-md-3">
				          <h3>Klas</h3>
				          <p>
						        <li><a href="Klas">Klas Beheer</a><br></li>  
						       </p>
				          </div>

				          <div class="col-md-3">
				          <h3>Beroepsprofiel</h3>
				          <p>
						        <li><a href="Beroepsprofiel">Beroepsprofiel Beheer</a><br></li>
						       </p>
				          </div>
				          </div>

				          <div class="col-md-12">
				          <h3>Cohort</h3>
				          <p>
						        <li><a href="Cohort">Cohort Beheer</a><br></li>
						       </p>
				          </div>
				   

				          
				          <div class="col-md-3">
				          <h3>Matchen</h3>
				          <p>
						        <li><a href="CoachStudent">Coach -> Student</a><br></li>
						        <li><a href="BpvDocentStudent">BPV-Docent -> Student</a><br></li>
						        <li><a href="BpvBedrijfPraktijkbegeleider">BPV-Bedrijf -> Praktijkbegeleider</a><br></li>
						        <li><a href="PraktijkbegeleiderStudent">Praktijkbegeleider -> Student</a><br></li>
						        <hr>
						        <h4><li><a href="Studie"><b>Studie Matchen</b></a><br></li></h4>
						       </p>
				          </div>

				          </div>
				  		  </div>
				      </div>
				    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
