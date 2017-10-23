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
                'menu'=>'Data Pasien',
                'url'=>'backend/pasien',
                'icon'=>'fa fa-users ',
                ],
            
            '8'=>[
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
