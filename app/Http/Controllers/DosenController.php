<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dosen;

class DosenController extends Controller{
    public function insert(){
        
        //RAW SQL
        $sql = DB::insert("INSERT INTO dosen (nidn,nama,jenis_kelamin,alamat,tempat_lahir,tanggal_lahir,photo,created_at,updated_at) 
        VALUES ('0402047903', 'Adhi Rizal, MT','laki-laki','Karawang','Karawang','1985-05-23','adhi.png',now(),now())");
        dump($sql);

        //QUERY BUILDER 
        $sql1 = DB::table('dosen')->insert(
            [
                'nidn' => '0402047904',
                'nama' => 'Aji Primajaya, S.Si., M.Kom',
                'jenis_kelamin' => 'laki-laki',
                'alamat' => 'Rengasdengklok',
                'tempat_lahir' => 'Karawang',
                'tanggal_lahir' => '1986-05-20',
                'photo' => 'aji.png',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        dump($sql1);

        //ELOQUENT
        $sql2 = Dosen::create(
            [
                'nidn' => '0402047905',
                'nama' => 'Arip Solehudin, M.Kom',
                'jenis_kelamin' => 'laki-laki',
                'alamat' => 'Cikampek',
                'tempat_lahir' => 'Bekasi',
                'tanggal_lahir' => '1982-11-15',
                'photo' => 'Arip.png',
                'created_at' => now(),
                'updated_at' => now()
            ]
            );
            dump($sql2);
    }

    public function select(){

        //RAW SQL
        $sql = DB::select("SELECT * FROM dosen");
        dd($sql);

        //QUERY BUILDER 
        $sql2 = DB::table('dosen')->get();
        dd($sql2);

        //ELOQUENT
        $sql3 = Dosen::all();
        dd($sql3);
    }

    public function update(){

        //RAW SQL
        $sql = DB::update("UPDATE dosen SET alamat='Karawang',updated_at=now() WHERE id=?",[1]);
        dd($sql);

        //QUERY BUILDER 
        $sql1 = DB::table('dosen')
        ->where('id','3')
        ->update(
            [
                'alamat' => 'Rengasdengklok',
                'updated_at' => now(),
            ]
            );
        dd($sql1);

        //ELOQUENT
        $sql2 = Dosen::where('id','1')->first()->update([
            'alamat' => 'Cikampek',
            'updated_at' => now(),
        ]);
        dd($sql2);
    }

    public function delete(){

        //RAW
        $sql = DB::delete("DELETE FROM dosen WHERE nidn=?",['0402047903']);
        dd($sql);

        //QUERY BUILDER 
        $sql1 = DB::table('dosen')
        ->where('nidn','0402047904')
        ->delete();
        dd($sql1);

        //ELOQUENT
        $sql2 = Dosen::where('nidn','0402047905')->delete();
        dd($sql2);
    }
}