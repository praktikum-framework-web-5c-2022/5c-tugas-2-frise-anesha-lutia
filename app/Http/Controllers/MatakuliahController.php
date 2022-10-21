<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Matakuliah;

class MatakuliahController extends Controller
{
    public function insert(){

        //RAW SQL
        $sql = DB::insert("INSERT INTO matakuliah (kode_mk,nama_mk,created_at,updated_at) 
        VALUES ('TI01', 'Technopreneur',now(),now())");
        dump($sql);

        //QUERY BUILDER 
        $sql1 = DB::table('matakuliah')->insert(
            [
                'kode_mk' => 'TI02',
                'nama_mk' => 'Data Mining',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        dd($sql1);

        //ELOQUENT
        $sql2 = Matakuliah::create(
            [
                'kode_mk' => 'TI03',
                'nama_mk' => 'Framework',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        dd($sql2);
        return "Berhasil Diproses!";
    }

    public function select(){

        //RAW SQL
        $sql = DB::select("SELECT * FROM matakuliah");
        dd($sql);

        //QUERY BUILDER 
        $sql2 = DB::table('matakuliah')->get();
        dd($sql2);

        //ELOQUENT
        $sql3 = Matakuliah::all();
        dd($sql3);
    }

    public function update(){

        //RAW SQL
        $sql = DB::update("UPDATE matakuliah SET kode_mk='TI01',updated_at=now() WHERE id=?",[1]);
        dd($sql);

        //QUERY BUILDER 
        $sql1 = DB::table('matakuliah')
        ->where('id','1')
        ->update(
            [
                'kode_mk' => 'TI02',
                'updated_at' => now()
            ]
            );
        dd($sql1);

        #ELOQUENT
        $sql2 = Matakuliah::where('id','1')->first()->update([
            'kode_mk' => 'TI03',
            'updated_at' => now()
        ]);
        dd($sql2);

    }

    public function delete(){

        //RAW SQL
        $sql = DB::delete("DELETE FROM matakuliah WHERE id=?",[1]);
        dd($sql);

        //QUERY BUILDER 
        $sql1 = DB::table('matakuliah')
        ->where('id','1')
        ->delete();
        dd($sql1);

        //ELOQUENT
        $sql2 = Matakuliah::where('id','1')->delete();
        dd($sql2);
    }
}