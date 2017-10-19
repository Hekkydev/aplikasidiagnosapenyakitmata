<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Penyakitmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class PenyakitController extends Controller
{
    function __construct()
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

    function index()
    {
        $menus = $this->menus;
        $judul = "Database Penyakit";
        $penyakit =  Penyakitmodel::all();
        $no = 1;
        return view('master_penyakit.list',compact('menus','judul','judul_desc','penyakit','no'));
    }

    function search()
    {
        $menus = $this->menus;
        $judul = "Telusuri Data Penyakit";
        $judul_desc = "";
        return view('master_penyakit.search',compact('menus','judul','judul_desc'));
    }

    function searchproses(Request $request)
    {
        print_r($request->post('nama_penyakit'));
    }

    function add()
    {
        $menus = $this->menus;
        $judul = "Input Data  Penyakit";
        $judul_desc = "";
        return view('master_penyakit.create',compact('menus','judul','judul_desc'));
    }


    public function addproses(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'kode_penyakit'         => 'required',
            'nama_penyakit'         => 'required',
            'definisi'              => 'required',
            'keterangan'            => 'required'
        );

        //print_r($_POST); die();

        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            Session::flash('message','Error insert data');
            return Redirect::to('backend/penyakit/add');

        } else {
            // store
            $nerd = new Penyakitmodel;
            $nerd->kode_penyakit  = $request->kode_penyakit  ;
            $nerd->nama_penyakit  = $request->nama_penyakit;
            $nerd->definisi   = $request->definisi;
            $nerd->keterangan = $request->keterangan;
            $nerd->img = "";
            $nerd->save();

            // redirect
            Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('backend/penyakit');
        }
    }

    function update(Request $request,$id)
    {
        $data = Penyakitmodel::find($id);
        $menus = $this->menus;
        $judul = "Input Data  Penyakit";
        $judul_desc = "";
        return view('master_penyakit.read',compact('menus','judul','judul_desc','id','data'));
    }

    public function updateproses(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all()); die();
        $rules = array(
            'kode_penyakit'         => 'required',
            'nama_penyakit'         => 'required',
            'definisi'              => 'required',
            'keterangan'            => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        $id = $request->id;
        // process the login
        if ($validator->fails()) {
            Session::flash('message','Error update data');
            return Redirect::to('backend/penyakit/' . $id . '/update')
                ->withErrors($validator);
        } else {
            // store
            $nerd = Penyakitmodel::find($id);
            $nerd->kode_penyakit  = $request->kode_penyakit;
            $nerd->nama_penyakit  = $request->nama_penyakit;
            $nerd->definisi   = $request->definisi;
            $nerd->keterangan = $request->keterangan;
            $nerd->img = "";
            $nerd->save();

            // redirect
            Session::flash('message', 'Successfully updated data!');
            return Redirect::to('backend/penyakit');
        }
    }

    public function delete($id)
    {
        $nerd = Penyakitmodel::find($id);
        $nerd->delete();

        Session::flash('message', 'Successfully delete penyakit!');
        return Redirect::to('backend/penyakit');
    }
}
