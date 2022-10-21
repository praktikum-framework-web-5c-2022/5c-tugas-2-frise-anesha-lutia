<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;

Route::controller(DosenController::class)->group(function () {
    Route::get('/insert_dsn', 'insert');
    Route::get('/select_dsn', 'select');
    Route::get('/update_dsn', 'update');
    Route::get('/delete_dsn', 'delete');
});

Route::controller(MatakuliahController::class)->group(function () {
    Route::get('/insert_mk', 'insert');
    Route::get('/select_mk', 'select');
    Route::get('/update_mk', 'update');
    Route::get('/delete_mk', 'delete');
});

Route::controller(MahasiswaController::class)->group(function () {
    Route::get('/insert_mhs', 'insert');
    Route::get('/select_mhs', 'select');
    Route::get('/update_mhs', 'update');
    Route::get('/delete_mhs', 'delete');
});

Route::get('/', function () {
    $dsn = [
        'Adhi Rizal, MT',
        'Aji Primajaya, S.Si., M.Kom',
        'Arip Solehudin, M.Kom',
        'Asep Jamaludin, S.Si., M.Kom',
        'Betha Nurina Sari, M.Kom',
        'Carudin, M.Kom',
        'Dadang Yusup, M.Kom',
        'Intan Purnamasari, M.Kom',
        'Purwantoro, M.Kom',
        'Rini Mayasari, M.Kom',
    ];
    return view('dosen') ->with('dosen',$dsn);
});

Route::get('/mahasiswa', function () {
    $mhs = [
        'Frise Anesha Lutia',
        'Aina Salsabila',
        'Aisa Nurfajri',
        'Andini Nafasya Aprillia',
        'Farel Tearsense',
        'Ekra Dehia',
        'Aditya Sanovriyanto',
        'Danu Aldri',
        'Khaira Vincy',
        'jammy Ulael',
    ];
    return view('mahasiswa')->with('mahasiswa',$mhs);
});

Route::get('/matkul', function () {
    $mk = [
        'Technopreneur',
        'Data Mining',
        'Cloud Coumputing',
        'Pemprograman Berbasis Mobile',
        'Pemprograman Berbasis Web',
        'Framework pemprograman Web',
        'Blockchain',
        'Jaringan Komputer',
        'Embedded System Enteligence System',
        'Metode Numerik',
    ];
    return view('matakuliah')->with('matkul',$mk);;
});