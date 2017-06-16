<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is whichere you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/co-login', 'Auth\CoordinatorLoginController@showLoginForm')->name('co.login');
Route::post('/co-login', 'Auth\CoordinatorLoginController@login')->name('co-login.submit');
Route::get('/co', 'Auth\CoordinatorLoginController@index')->name('co.dashboard');




// 31-05-2017 Lars Student beheer pagina
Route::resource('Student', 'StudentController');
// 31-05-2017 Lars BPV-Bedrijf beheer pagina
Route::resource('BPV-Bedrijf', 'BpvBedrijfController');



// 31-05-2017 Lars BPV-Docent beheer pagina
Route::resource('BPV-Docent', 'BpvDocentController');
Route::patch('/BPV-Docent',[
    'as' => '/BPV-Docent',
    'uses' => 'BpvDocentController@index'
]);
Route::get('/BPV-Docent-Search','BpvDocentController@index');
Route::get('/BPV-DocentSearch','BpvDocentController@search');
Route::get('/Register', function(){
	return view('auth.register');
});





// 31-05-2017 Lars Klas beheer pagina
Route::resource('Klas', 'KlasController');
// 31-05-2017 Lars Coach beheer pagina
Route::resource('Coach', 'CoachController');
// 31-05-2017 Lars Praktijkbegeleider beheer pagina
Route::resource('Praktijkbegeleider', 'PraktijkbegeleiderController');
// 31-05-2017 Lars Opleiding beheer pagina
Route::resource('Opleiding' ,'OpleidingController');
// 31-05-2017 Lars Beroepsprofiel beheer pagina
Route::resource('Beroepsprofiel', 'BeroepsprofielController');
// 3-06-2017 Lars Cohort beheer pagina
Route::resource('Cohort', 'CohortController');


// 6-06-2017 Lars Beheer pagina
Route::resource('/Beheer', 'BeheerController');

// 1-06-2017 Lars Studie matchen pagina
Route::resource('/Studie' , 'StudieMatchenController');

// 3-06-2017 Lars Coach met een Student matchen
Route::resource('/CoachStudent', 'CoachStudentController');

// 3-06-2017 Lars BPV-Docent met een Student matchen
Route::resource('/BpvDocentStudent', 'BpvdocentStudentController');

// 3-06-2017 Lars Coach met een Student matchen
Route::resource('/BpvBedrijfPraktijkbegeleider', 'BpvbedrijfPraktijkbegeleiderController');

Route::resource('/PraktijkbegeleiderStudent', 'PraktijkbegeleiderStudentController');


// 3-06-2017 Lars Opleiding met een Klas matchen
Route::resource('/OpleidingKlas', 'OpleidingKlasController');



// 1-06-2017 Lars BPV-Traject aanmaken !!!!!!!!!!!!!!!! nog niet af
Route::resource('/BPV-Traject' , 'BpvTrajectController');



Route::get('/student_bpvdocent_matchen', 'StudentMatchenController@index');

// Lars maak een pagina aan voor BPV-CO maps
Route::get('/mapsCoordinator', 'MapsControllerCoordinator@index');
Route::get('/mapsBpvDocent', 'MapsControllerBpvDocent@index');

//Lars Categories
Route::resource('categories', 'CategoryController' , ['except' => ['create']]);

//Lars Posts
Route::resource('posts', 'PostController'); 
Route::resource('/showposts', 'PostController'); 

//Lars Student aan BPVBedrijf
Route::resource('/student', 'StudentMatchenController'); 


Route::resource('/GebruikersInformatie', 'GebruikersInformatieController');


//Nadim Bezoeken
Route::resource('/bezoeken' , 'BezoekenController');
Route::resource('/bezoekenbeheer' , 'BezoekenBeheerController');
Route::patch('/bezoekenbeheer',[
    'as' => '/bezoekenbeheer',
    'uses' => 'BezoekenBeheerController@index'
]);
Route::post('update','BezoekenBeheerController@updatebezoek');






//07-06-2017 Lars Exporteer all bezoeken
Route::get('/getExportBezoek','ExcelController@getExportBezoek');

//07-06-2017 Lars Exporteer all studenten
Route::get('/getExportStudent','ExcelController@getExportStudent');

//07-06-2017 Lars Exporteer all BPV-Docenten
Route::get('/getExportBPVDocent','ExcelController@getExportDocent');

//07-06-2017 Lars Exporteer all BPV-Bedrijven
Route::get('/getExportBPVBedrijf','ExcelController@getExportBPVBedrijf');

//07-06-2017 Lars Exporteer all praktijkbegeleider
Route::get('/getExportPraktijkbegeleider','ExcelController@getExportPraktijkbegeleider');

//07-06-2017 Lars Exporteer all coaches
Route::get('/getExportCoaches','ExcelController@getExportCoaches');

//Irsjaad
Route::get('/gebruiker_search', 'GebruikerSearchController@GebruikerSearch');


//12-06-2017 Lars Importeer BPV-Bedrijven (irsjaad export functies)
Route::get('/importBpvBedrijf', 'ImporteerBpvBedrijven@importExport');
Route::post('/importExcelBpvBedrijf', 'ImporteerBpvBedrijven@importExcel');

//12-06-2017 Lars Importeer BPV-Docenten
Route::get('/importBpvDocent', 'ImporteerBpvDocenten@importExport');
Route::post('/importExcelBpvDocent', 'ImporteerBpvDocenten@importExcel');

//12-06-2017 Lars Importeer Coaches
Route::get('/importCoach', 'ImporteerCoaches@importExport');
Route::post('/importExcelCoach', 'ImporteerCoaches@importExcel');

//12-06-2017 Lars Importeer Studenten
Route::get('/importStudent', 'ImporteerStudenten@importExport');
Route::post('/importExcelStudent', 'ImporteerStudenten@importExcel');

//12-06-2017 Lars Importeer Praktijkbegeleiders
Route::get('/importPraktijkbegeleider', 'ImporteerPraktijkbegeleider@importExport');
Route::post('/importExcelPraktijkbegeleider', 'ImporteerPraktijkbegeleider@importExcel');

//Nog een x import
Route::get('/import', 'MaatwebsiteDemoController@importExport');
Route::post('/importExcel', 'MaatwebsiteDemoController@importExcel');
//Export
Route::get('/export', 'MaatwebsiteDemoController@getExport');

//Live Search
Route::get('/searchlive','SearchController@index');
Route::get('/search','SearchController@search');

//Bezoek beheer
Route::get('/bezoekenbeheer' , 'BezoekenBeheerController@index');