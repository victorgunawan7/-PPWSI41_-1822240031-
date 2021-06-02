<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function insert()
    {
        $result = DB::insert('insert into mahasiswas (npm, nama_mahasiswa, tempat_lahir, tanggal_lahir
        alamat, created_at) values (?, ?, ?, ?, ?, ?', ['1822240031', 'Victor','Palembang','2000-11-05',
        'Jl Segaran', now()]);
        dump($result);
        
    }

    public function update()
    {
        $result = DB::update('update mahasiswas set nama_mahasiswa = "Ali", updated_at = now() where npm =?',['1822240032']);
        dump($result);
    }

    public function delete()
    {
        $result = DB::delete('delete from mahasiswas where npm = ?', ['1822240031']);
        dump($result);
    }

    public function select()
    {
        $result = DB::select('select * from mahasiswas');
        //dump($result);
        return view ('mahasiswa.index', ['all-mahasiswa' => $result, 'kampus' => $kampus])
    }

    public function insertQb()
    {
        $result = DB::table('mahasiswas')- insert(
            [
                'npm' => '1822240031',
                'nama_mahasiswa' => 'Victor Gunawan',
                'tempat_lahir' => 'Palembang',
                'tanggal_lahir' => '2000-11-05',
                'alamat' => 'Jl Segaran',
                'created_at' => now()

            ]
            );
            dump($result);
    }

    public function updateQb()
    {
        $result = DB::table('mahasiswas')
        -> where('npm', '1822240031')
        -> update(
            [
                'nama_mahasiswa' => 'Victor',
                'updated_at' => now()
            ]
        
            );
            dump($result);
        
    }

    public function updateQb()
    {
        $result = DB::table('mahasiswas')
        -> where('npm', '1822240031')
        -> delete();
            dump($result);
    }

    public function selectQb()
    {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::table('mahasiswas')->get();
        -> where('npm', '1822240031')
        return view('mahasiswa.index', ['allmahasiswa'=> $result, 'kampus' =>$kampus]);
    }

    public function insertElq()
    {
        $mahasiswa = new Mahasiswa;
        $mahasiswa ->npm ='1822240031';
        $mahasiswa ->nama_mahasiswa ='Victor Gunawan';
        $mahasiswa ->tempat_lahir='Bandung';
        $mahasiswa ->tanggal_lahir ='2000-11-05';
        $mahasiswa ->alamat ='Jl Segaran';
        $mahasiswa ->save();
        dump($mahasiswa);
    }

    public function updateElq()
    {
        $mahasiswa = Mahasiswa::where('npm', '1822240031')->first();
        $mahasiswa ->nama_mahasiswa ='Victor Gunawan';
        $mahasiswa ->save();
        dump($mahasiswa);
    }

    public function deleteElq()
    {
        $mahasiswa = Mahasiswa::where('npm', '1822240031')->first();
        $mahasiswa ->delete();
        dump($mahasiswa);
    }

    public function SelectElq()
    {
        $kampus = "Universitas Multi Data Palembang"
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', ['allmahasiswa' => $mahasiswa, 'kampus' => $kampus])
        dump($mahasiswa);
    }




