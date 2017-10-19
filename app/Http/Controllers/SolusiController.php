<?php

namespace App\Http\Controllers;


use App\Solusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class SolusiController extends Controller
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
        $menus  = $this->menus;
        $judul = "Daftar Solusi";
        $solusi = Solusi::all();
        return view('master_solusi.page',compact('judul','menus','solusi'));
    }

    public function add()
    {
        $menus  = $this->menus;
        $judul = "Daftar Solusi";
        return view('master_solusi.add',compact('menus','judul'));
    }

    public function addproses(Request  $request)
    {
        $rules = [
            'kode_solusi'=>'required',
            'nama_solusi'=>'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            Session::flash('message','Error  insert data');
            return Redirect::to('backend/solusi/add');
        } else {
            
            $s = new Solusi();
            $s->kode_solusi = $request->kode_solusi;
            $s->nama_solusi = $request->nama_solusi;
            $s->save();

            Session::flash('message','Success  insert data');
            return Redirect::to('backend/solusi');

        }
        
    }

    public function update($id)
    {
        $menus  = $this->menus;
        $judul = "Daftar Solusi";
        $data = Solusi::find($id);
        return view('master_solusi.read',compact('menus','judul','data'));
    }
    

    public function updateproses(Request  $request)
    {
        $rules = [
            'kode_solusi'=>'required',
            'nama_solusi'=>'required',
        ];

        $id = $request->id;

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            Session::flash('message','Error  update data');
            return Redirect::to('backend/solusi/'.$id.'/update');
        } else {
            
            $s = Solusi::find($id);
            $s->kode_solusi = $request->kode_solusi;
            $s->nama_solusi = $request->nama_solusi;
            $s->save();

            Session::flash('message','Success  update data');
            return Redirect::to('backend/solusi');

        }
    }


    public function deleted($id)
    {
        $s = Solusi::find($id);
        $s->delete();
        Session::flash('message','Success  deleted data');
        return Redirect::to('backend/solusi');
    }

}