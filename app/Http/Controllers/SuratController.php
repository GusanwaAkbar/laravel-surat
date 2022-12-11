<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
 


class SuratController extends Controller
{
    public function input(Request $request){
        DB::table('surat_masuks')->insert([
            'Kode_surat'=> $request -> kode,
            'Tanggal_surat'=> $request -> tanggal,
            'Isi_surat_masuk'=> $request -> isi,
            'Fakultas'=> $request -> fakultas,
            'Jurusan'=> $request -> jurusan,
            'Universitas'=> $request -> universitas,
            'user_id' => Auth::user()->id,
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

        if (is_null(optional(Auth::user())->id)) {

            $select = DB::select('select * from show_null');
            // do somethin
            return view('surat_views')->with('name', $select)->with('email', 'harap login terlebih dahulu');
        }

        else {


            $user = Auth::user()->id;

            $select = DB::table('surat_masuks')->where('user_id', $user)->get();
            // Get the currently authenticated user's ID...
            $email = Auth::user()->email;
            return view('surat_views')->with('name', $select)->with('email', $email);
        }

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

        print($id);
        $post = DB::table('surat_masuks')->where('id',$id)->delete() ;
        


        return redirect('surat');
    }


    public function update_surat($id,Request $request){



        $post = DB::table('surat_masuks')->where('id',$id)->update([
            'Kode_surat'=> $request -> kode,
            'Tanggal_surat'=> $request -> tanggal,
            'Isi_surat_masuk'=> $request -> isi,
            'Fakultas'=> $request -> fakultas,
            'Jurusan'=> $request -> jurusan,
            'Universitas'=> $request -> universitas
        ]);
         
        

      
        return redirect('surat')->with('status','Surat berhasil ditambahkan');
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
