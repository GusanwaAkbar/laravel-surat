<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratController extends Controller
{
    public function input(Request $request){
        DB::table('surat_masuks')->insert([
            'Kode_surat'=> $request -> kode,
            'Tanggal_surat'=> $request -> tanggal,
            'Isi_surat_masuk'=> $request -> isi,
            'Fakultas'=> $request -> fakultas,
            'Jurusan'=> $request -> jurusan,
            'Universitas'=> $request -> universitas
        ]);
        return redirect('surat')->with('status','Surat berhasil ditambahkan');
    }
    public function tambah_notulen(Request $request){
        DB::table('notulensi')->insert([
            'Kode_notulen'=> $request -> kode,
            'Tanggal_rapat'=> $request -> tanggal,
            'Upload_surat_undangan'=> $request -> isi,
            'Jurusan'=> $request -> fakultas,
            'Catatan'=> $request -> jurusan,
            'Rekomendasi'=> $request -> universitas
        ]);
        return redirect('notulensi')->with('status','Surat berhasil ditambahkan');
    }


    public function tambah(Request $request){
        DB::table('surat_keluars')->insert([
            'Kode_surat'=> $request -> kode,
            'Tanggal_keluar'=> $request -> tanggal,
            'Isi_surat_keluar'=> $request -> isi,
            'Fakultas'=> $request -> fakultas,
            'Jurusan'=> $request -> jurusan,
            'Universitas'=> $request -> universitas
        ]);
        return redirect('keluar')->with('status','Surat berhasil ditambahkan');
    }


    public function surat(){
        

        $select = DB::select('select * from surat_masuks');
        return view ('surat_views')->with('name',$select);

        

    }
    public function keluar(){

        $select = DB::select('select * from surat_keluars');
        return view ('surat_keluar')->with('name',$select);


        
    }

    public function notulen(){

        $select = DB::select('select * from notulensi');
        return view ('notulensi')->with('name',$select);


        
    }

    public function delete_surat($id)
    
    {
        $post = Post::find($id); 
        $post->delete();
        return redirect('/surat')->with(); 
    }

    public function delete_keluar($id)
    
    {
        $post = Post::find($id); 
        $post->delete();
        return redirect('/surat')->with(); 
    }

    public function delete_notulen($id)
    
    {
        $post = DB::table('notulensi')->where('id',$id);
        $post->delete();

        return redirect("/notulensi")->with('status','Surat berhasil ditambahkan');
        
    }

}
