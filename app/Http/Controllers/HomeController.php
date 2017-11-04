<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function diagnosa()
    {
        $gejala = DB::table('master_gejala')
                    ->orderByRaw('id ASC')
                    ->get();
        return view('membership.diagnosa',compact('gejala'));
    }

    public function prosesdiagnosa(Request $e)
    {
        
        $jumlah_master_gejala = [];
        $master_gejala = 0;
        foreach ($e->all() as $key => $value) {
            
            if($value == '1')
            {
                $gejala = DB::table('master_gejala')->where('kode_gejala', $key)->first();
                $data = $gejala->probabilitas;
                $master_gejala += $gejala->probabilitas;
                array_push($jumlah_master_gejala,$data);
               
            }else{

                $master_gejala += 0;
                $data = [];
                array_push($jumlah_master_gejala,$data);
            }
        }

        $jumlah_nilai = $master_gejala;
        $jml_pembagi = count($jumlah_master_gejala);
        
       echo  $hasil = ($jumlah_nilai / $jml_pembagi);
    } 

     function profil()
    {
        $userId = Auth::id();
        $data = User::find($userId);
        return view('membership.profil',compact('data'));
    }
} 
