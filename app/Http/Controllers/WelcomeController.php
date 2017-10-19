<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __construct()
    {
        $this->menus = [
            '0'=>[
                'menu'=>'Dashboard',
                'url'=>'backend/dashboard',
                'icon'=>'fa fa-dashboard',
             ],
             '1'=>[
                'menu'=>'Telusuri Penyakit',
                'url'=>'backend/penyakit/search',
                'icon'=>'fa fa-search',
             ],
             '2'=>[
                    'menu'=>'Daftar Penyakit',
                    'url'=>'backend/penyakit',
                    'icon'=>'fa fa-hospital-o',
                 ],
            '3'=>[
                 'menu'=>'Daftar Gejala',
                 'url'=>'backend/gejala',
                 'icon'=>'fa fa-medkit',
                 ],

            '4'=>[
            'menu'=>'Daftar Solusi',
            'url'=>'backend/solusi',
            'icon'=>'fa fa-stethoscope ',
            ], 
            
            '5'=>[
                'menu'=>'Basis Aturan',
                'url'=>'backend/account',
                'icon'=>'fa fa-clipboard ',
                ], 

            '6'=>[
                'menu'=>'Lihat Usulan',
                'url'=>'backend/account',
                'icon'=>'fa fa-heartbeat  ',
                ], 
            
            '7'=>[
                'menu'=>'Manajemen Akun',
                'url'=>'backend/account',
                'icon'=>'fa fa-user-md ',
                ], 
            
            
        ];
    }

    public function index()
    {
        $menus = $this->menus;
        $judul = "Welcome";
        $judul_desc = "Selamat datang di administrator sistem";
        
        return view('dashboard.page',compact('menus','judul','judul_desc'));
        //
    }

    function login()
    {
            return view('admin.login');
    }
}
