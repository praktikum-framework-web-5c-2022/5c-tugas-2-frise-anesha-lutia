<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function insert(){

        //RAW SQL
        $sql = DB::insert("INSERT INTO mahasiswa (npm,nama,jenis_kelamin,alamat,tempat_lahir,tanggal_lahir,photo,created_at,updated_at) 
        VALUES ('2010631170073', 'Frise Anesha Lutia','Perempuan','Jakarta','Joho','2000-09-15','frise.png',now(),now())");
        dump($sql);

        //QUERY BUILDER
        $sql1 = DB::table('mahasiswa')->insert(
            [
                'npm' => '2010631170074',
                'nama' => 'Aina Salsabila',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Duri',
                'tempat_lahir' => 'Pekanbaru',
                'tanggal_lahir' => '2004-03-13',
                'photo' => 'aina.png',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        dd($sql1);

        //ELOQUENT
        $sql2 = Mahasiswa::create(
            [
                'npm' => '2010631170075',
                'nama' => 'Andini Nafasya Aprillia',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Aceh',
                'tempat_lahir' => 'Lampung',
                'tanggal_lahir' => '2007-04-07',
                'photo' => 'dini.png',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        dd($sql2);
        return "Data berhasil diproses";
    }

    public function select(){

        //RAW SQL
        $sql = DB::select("SELECT * FROM mahasiswa");
        dd($sql);

        //QUERY BUILDER
        $sql2 = DB::table('mahasiswa')->get();
        dd($sql2);

        //ELOQUENT
        $sql3 = Mahasiswa::all();
        dd($sql3);
    }

    public function update(){

        //RAW SQL
        $sql = DB::update("UPDATE mahasiswa SET alamat='Jakarta',updated_at=now() WHERE id=?",[1]);
        dd($sql);

        //QUERY BUILDER
        $sql1 = DB::table('mahasiswa')
        ->where('id','1')
        ->update(
            [
                'alamat' => 'Pekanbaru',
                'updated_at' => now()
            ]
            );
        dd($sql1);

        //ELOQUENT
        $sql2 = Mahasiswa::where('id','1')->first()->update([
            'alamat' => 'Aceh',
            'updated_at' => now()
        ]);
        dd($sql2);

    }

    public function delete(){

        //RAW SQL
        $sql = DB::delete("DELETE FROM mahasiswa WHERE npm=?",['2010631170073']);
        dd($sql);

        //QUERY BUILDER
        $sql1 = DB::table('mahasiswa')
        ->where('npm','2010631170074')
        ->delete();
        dd($sql1);

        //ELOQUENT
        $sql2 = Mahasiswa::where('mahasiswa','2010631170075')->delete();
        dd($sql2);
    }
    
}