<?php

namespace App\Http\Controllers;

use App\Admin as Adminmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class Admin extends Controller
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


   




   function listdata()
   {
       $menus = $this->menus;
       $judul = "Manajemen Akun";
       $account = Adminmodel::all();
       return view('admin.list',compact('menus','account','judul'));
   }

   function add()
   {
        $menus = $this->menus;
        $kode_administrator = strtoupper(uniqid());
        $judul = "Manajemen Akun";
       return view('admin.add',compact('menus','kode_administrator','judul'));
   }

   function addproses(Request $e) {
      $rules = [
          'nama_lengkap'=>'required',
          'username'=>'required',
          'password'=>'required',
      ];

      $validator = Validator::make($e->all(),$rules);

      if ($validator->fails()) {
          Session::flash('message','Error  added data');
          return Redirect::to('backend/account/add');
      } else {

          $s = new Adminmodel();
          $s->kode_administrator = $e->kode_administrator;
          $s->nama_lengkap = $e->nama_lengkap;
          $s->username = $e->username;
          $s->password = $e->password;
          $s->save();

          Session::flash('message','Success  added data');
          return Redirect::to('backend/account');

      }
   }

   function update($id) {

         $menus = $this->menus;
         $judul = "Manajemen Akun";
         $data = Adminmodel::find($id);
         return view('admin.read',compact('menus','data','judul'));
   }


   function updateproses(Request $e) {
      $rules = [
          'nama_lengkap'=>'required',
          'username'=>'required',
          'password'=>'required',
      ];
      $id = $e->id;
      $validator = Validator::make($e->all(),$rules);

      if ($validator->fails()) {
          Session::flash('message','Error  update  data');
          return Redirect::to('backend/account/'.$id.'/update');
      } else {

          $s = Adminmodel::find($id);
          $s->kode_administrator = $e->kode_administrator;
          $s->nama_lengkap = $e->nama_lengkap;
          $s->username = $e->username;
          $s->password = $e->password;
          $s->save();

          Session::flash('message','Success  update data');
          return Redirect::to('backend/account');

      }
   }

   function delete($id) {
     $nerd = Adminmodel::find($id);
     $nerd->delete();

     Session::flash('message', 'Successfully delete data');
     return Redirect::to('backend/account');
   }

   function profile()
   {
            $id =   session('id');
            $menus = $this->menus;
            $judul = "Manajemen Akun";
            $data = Adminmodel::find($id);

            //print_r($data); die();
            return view('admin/profile',compact('menus','data','judul'));
   }


}
