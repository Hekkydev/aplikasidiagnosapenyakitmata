<?php

namespace App\Http\Controllers;

use App\Gejala;
use App\Penyakitmodel;
use App\Admin;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{   
    
    public function __construct()
    {
        $this->menus = $this->menus();
    }
    
    public function index()
    {
        $menus = $this->menus;
        $judul = "Welcome";
        $judul_desc = "Selamat datang di administrator sistem";

        $gejala = Gejala::all()->count();
        $penyakit = Penyakitmodel::all()->count();
        $user = Admin::all()->count();
        $pasien = User::all()->count();
        $data = [
            'gejala'=>$gejala,
            'penyakit'=>$penyakit,
            'users'=>$user,
            'pasien'=>$pasien
        ];

        //print_r($data); die();

        return view('dashboard.page',compact('menus','judul','judul_desc','data'));
    }
}
