<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\RekamMedis as RekamMedis;
use App\Pasien as Pasien;
use App\Dokter as Dokter;

Route::group(['middleware' => ['web']], function()    
{
	//Route::auth();
	// Authentication Routes...
	$this->get('login', 'Auth\AuthController@showLoginForm');
	$this->post('login', 'Auth\AuthController@login');
	Route::get('/', array('as'=>'admin', 'uses'=> 'AdminController@index'));
	$this->get('logout', 'Auth\AuthController@logout');
	
});

//Route as admin
Route::group(['middleware' => ['web','auth','level:11']], function()    
{	// Pasien 
	Route::get('admin/pasien',array('as'=>'pasien', 'uses'=> 'Admin\PasienController@index'));
	Route::get('admin/tambahpasien',array('as'=>'pasien.tambah.show', 'uses'=> 'Admin\PasienController@showTambahPasien'));
	Route::post('admin/pasien/tambah', array('as'=>'pasien.tambah', 'uses'=> 'Admin\PasienController@tambah'));
	Route::get('admin/pasien/{id}/hapus', array('as'=>'pasien.hapus', 'uses'=> 'Admin\PasienController@hapus'));
	Route::get('admin/pasien/{id}/edit', array('as'=>'pasien.edit', 'uses'=> 'Admin\PasienController@editpasien'));
	Route::put('admin/pasien/{id}/simpanedit', array('as'=>'pasien.simpanedit', 'uses'=> 'Admin\PasienController@simpanedit'));
	Route::get('admin/pasien/{id}/cetak/{kdPrint}',['as'=>'pasien.cetak', 'uses'=> 'Admin\PasienController@Cetak']);

	// Dokter 
	Route::get('admin/dokter',array('as'=>'dokter', 'uses'=> 'Admin\DokterController@index'));
	Route::get('admin/tambahdokter', array('as'=>'dokter.tambah.show', 'uses'=> 'Admin\DokterController@showTambahDokter'));
	Route::post('admin/dokter/tambah', array('as'=>'dokter.tambah', 'uses'=> 'Admin\DokterController@tambah'));
	Route::get('admin/dokter/{id}/hapus', array('as'=>'dokter.hapus', 'uses'=> 'Admin\DokterController@hapus'));
	Route::get('admin/dokter/{id}/edit', array('as'=>'dokter.edit', 'uses'=> 'Admin\DokterController@editdokter'));
	Route::put('admin/dokter/{id}/simpanedit', array('as'=>'dokter.simpanedit', 'uses'=> 'Admin\DokterController@simpanedit'));

});

//Route as dokter
Route::group(['middleware' => ['web','auth','level:12']], function()    
{	// RekamMedis
	Route::get('dokter/rekammedis',array('as'=>'rekammedis', 'uses'=> 'Dokter\RekamMedisController@index'));
	Route::get('dokter/tambahrekammedis', array('as'=>'rekammedis.tambah.show', 'uses'=> 'Dokter\RekamMedisController@showTambahRekamMedis'));
	Route::post('dokter/rekammedis/tambah', array('as'=>'rekammedis.tambah', 'uses'=> 'Dokter\RekamMedisController@tambah'));
	Route::get('dokter/rekammedis/{id}/hapus', array('as'=>'rekammedis.hapus', 'uses'=> 'Dokter\RekamMedisController@hapus'));
	Route::get('dokter/rekammedis/{id}/edit', array('as'=>'rekammedis.edit', 'uses'=> 'Dokter\RekamMedisController@editrekammedis'));
	Route::put('dokter/rekammedis/{id}/simpanedit', array('as'=>'rekammedis.simpanedit', 'uses'=> 'Dokter\RekamMedisController@simpanedit'));
	Route::get('dokter/rekammedis/{id}/cetak/{kdPrint}',['as'=>'rekammedis.cetak', 'uses'=> 'Dokter\RekamMedisController@Cetak']);
	// Resep
	Route::get('dokter/resep',array('as'=>'resep', 'uses'=> 'Dokter\ResepController@index'));	
	Route::get('dokter/tambahresep', array('as'=>'resep.tambah.show', 'uses'=> 'Dokter\ResepController@showTambahResep'));
	Route::post('dokter/resep/tambah', array('as'=>'resep.tambah', 'uses'=> 'Dokter\ResepController@tambah'));
	Route::get('dokter/resep/{id}/hapus', array('as'=>'resep.hapus', 'uses'=> 'Dokter\ResepController@hapus'));
	Route::get('dokter/resep/{id}/edit', array('as'=>'resep.edit', 'uses'=> 'Dokter\ResepController@editresep'));
	Route::put('dokter/resep/{id}/simpanedit', array('as'=>'resep.simpanedit', 'uses'=> 'Dokter\ResepController@simpanedit'));
	Route::get('dokter/resep/{id}/cetak/{kdPrint}',['as'=>'resep.cetak', 'uses'=> 'Dokter\ResepController@Cetak']);
	// Rujuk
	Route::get('dokter/rujuk',array('as'=>'rujuk', 'uses'=> 'Dokter\RujukController@index'));	
	Route::get('dokter/tambahrujuk', array('as'=>'rujuk.tambah.show', 'uses'=> 'Dokter\RujukController@showTambahRujuk'));
	Route::post('dokter/rujuk/tambah', array('as'=>'rujuk.tambah', 'uses'=> 'Dokter\RujukController@tambah'));
	Route::get('dokter/rujuk/{id}/hapus', array('as'=>'rujuk.hapus', 'uses'=> 'Dokter\RujukController@hapus'));
	Route::get('dokter/rujuk/{id}/edit', array('as'=>'rujuk.edit', 'uses'=> 'Dokter\RujukController@editrujuk'));
	Route::put('dokter/rujuk/{id}/simpanedit', array('as'=>'rujuk.simpanedit', 'uses'=> 'Dokter\RujukController@simpanedit'));
	Route::get('dokter/rujuk/{id}/cetak/{kdPrint}',['as'=>'rujuk.cetak', 'uses'=> 'Dokter\RujukController@Cetak']);
});

//Route as pimpinan
Route::group(['middleware' => ['web','auth','level:13']], function()    
{	// Pimpinan
	Route::get('pimpinan/laporan_rekammedis',array('as'=>'rekammedis.laporan', 'uses'=> 'Pimpinan\RekamMedisController@indexLapRedis'));
	// Cetak
	Route::post('pimpinan/laporan_rekammedis/cetak/{kdPrint}',['as'=>'pimpinan.laporan_rekammedis.cetak', 'uses'=> 'Pimpinan\RekamMedisController@CetakDateRange']);

});

//Route as teknisi
Route::group(['middleware' => ['web','auth','level:14']], function()    
{	// DApat Mengakses Menu Admin, Dokter, dan Pimpinan
	// ADMIN
	// Pasien
	Route::get('teknisi/pasien',array('as'=>'pasien', 'uses'=> 'Teknisi\PasienController@index'));
	Route::get('teknisi/tambahpasien',array('as'=>'pasien.tambah.show', 'uses'=> 'Teknisi\PasienController@showTambahPasien'));
	Route::post('teknisi/pasien/tambah', array('as'=>'pasien.tambah', 'uses'=> 'Teknisi\PasienController@tambah'));
	Route::get('teknisi/pasien/{id}/hapus', array('as'=>'pasien.hapus', 'uses'=> 'Teknisi\PasienController@hapus'));
	Route::get('teknisi/pasien/{id}/edit', array('as'=>'pasien.edit', 'uses'=> 'Teknisi\PasienController@editpasien'));
	Route::put('teknisi/pasien/{id}/simpanedit', array('as'=>'pasien.simpanedit', 'uses'=> 'Teknisi\PasienController@simpanedit'));
	Route::get('teknisi/pasien/{id}/cetak/{kdPrint}',['as'=>'pasien.cetak', 'uses'=> 'Teknisi\PasienController@Cetak']);
	// Dokter
	Route::get('teknisi/dokter',array('as'=>'dokter', 'uses'=> 'Teknisi\DokterController@index'));
	Route::get('teknisi/tambahdokter', array('as'=>'dokter.tambah.show', 'uses'=> 'Teknisi\DokterController@showTambahDokter'));
	Route::post('teknisi/dokter/tambah', array('as'=>'dokter.tambah', 'uses'=> 'Teknisi\DokterController@tambah'));
	Route::get('teknisi/dokter/{id}/hapus', array('as'=>'dokter.hapus', 'uses'=> 'Teknisi\DokterController@hapus'));
	Route::get('teknisi/dokter/{id}/edit', array('as'=>'dokter.edit', 'uses'=> 'Teknisi\DokterController@editdokter'));
	Route::put('teknisi/dokter/{id}/simpanedit', array('as'=>'dokter.simpanedit', 'uses'=> 'Teknisi\DokterController@simpanedit'));

	
	// DOKTER
	// RekamMedis
	Route::get('teknisi/rekammedis',array('as'=>'rekammedis', 'uses'=> 'Teknisi\RekamMedisController@index'));
	Route::get('teknisi/tambahrekammedis', array('as'=>'rekammedis.tambah.show', 'uses'=> 'Teknisi\RekamMedisController@showTambahRekamMedis'));
	Route::post('teknisi/rekammedis/tambah', array('as'=>'rekammedis.tambah', 'uses'=> 'Teknisi\RekamMedisController@tambah'));
	Route::get('teknisi/rekammedis/{id}/hapus', array('as'=>'rekammedis.hapus', 'uses'=> 'Teknisi\RekamMedisController@hapus'));
	Route::get('teknisi/rekammedis/{id}/edit', array('as'=>'rekammedis.edit', 'uses'=> 'Teknisi\RekamMedisController@editrekammedis'));
	Route::put('teknisi/rekammedis/{id}/simpanedit', array('as'=>'rekammedis.simpanedit', 'uses'=> 'Teknisi\RekamMedisController@simpanedit'));
	Route::get('teknisi/rekammedis/{id}/cetak/{kdPrint}',['as'=>'rekammedis.cetak', 'uses'=> 'Teknisi\RekamMedisController@Cetak']);		
	// Resep
	Route::get('teknisi/resep',array('as'=>'resep', 'uses'=> 'Teknisi\ResepController@index'));	
	Route::get('teknisi/tambahresep', array('as'=>'resep.tambah.show', 'uses'=> 'Teknisi\ResepController@showTambahResep'));
	Route::post('teknisi/resep/tambah', array('as'=>'resep.tambah', 'uses'=> 'Teknisi\ResepController@tambah'));
	Route::get('teknisi/resep/{id}/hapus', array('as'=>'resep.hapus', 'uses'=> 'Teknisi\ResepController@hapus'));
	Route::get('teknisi/resep/{id}/edit', array('as'=>'resep.edit', 'uses'=> 'Teknisi\ResepController@editresep'));
	Route::put('teknisi/resep/{id}/simpanedit', array('as'=>'resep.simpanedit', 'uses'=> 'Teknisi\ResepController@simpanedit'));
	Route::get('teknisi/resep/{id}/cetak/{kdPrint}',['as'=>'resep.cetak', 'uses'=> 'Teknisi\ResepController@Cetak']);			
	// Rujuk
	Route::get('teknisi/rujuk',array('as'=>'rujuk', 'uses'=> 'Teknisi\RujukController@index'));	
	Route::get('teknisi/tambahrujuk', array('as'=>'rujuk.tambah.show', 'uses'=> 'Teknisi\RujukController@showTambahRujuk'));
	Route::post('teknisi/rujuk/tambah', array('as'=>'rujuk.tambah', 'uses'=> 'Teknisi\RujukController@tambah'));
	Route::get('teknisi/rujuk/{id}/hapus', array('as'=>'rujuk.hapus', 'uses'=> 'Teknisi\RujukController@hapus'));
	Route::get('teknisi/rujuk/{id}/edit', array('as'=>'rujuk.edit', 'uses'=> 'Teknisi\RujukController@editrujuk'));
	Route::put('teknisi/rujuk/{id}/simpanedit', array('as'=>'rujuk.simpanedit', 'uses'=> 'Teknisi\RujukController@simpanedit'));
	Route::get('teknisi/rujuk/{id}/cetak/{kdPrint}',['as'=>'rujuk.cetak', 'uses'=> 'Teknisi\RujukController@Cetak']);

	// PIMPINAN
	// RekamMedis Laporan 
	Route::get('teknisi/laporan_rekammedis',array('as'=>'rekammedis.laporan', 'uses'=> 'Teknisi\RekamMedisController@indexLapRedis'));
	// RekamMedis Laporan Cetak	
	Route::post('teknisi/laporan_rekammedis/cetak/{kdPrint}',['as'=>'laporan_rekammedis.cetak', 'uses'=> 'Teknisi\RekamMedisController@CetakDateRange']);
});