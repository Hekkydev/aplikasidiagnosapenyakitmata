<?php

namespace App\Http\Controllers;

use App\Gejala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class GejalaController extends Controller
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
    function index()
    {
            $menus = $this->menus;
            $judul = "Daftar Gelaja";
            $gejala = Gejala::all();
            return view('master_gejala.page',compact('menus','judul','gejala'));
    }

    public function add()
    {
        $menus = $this->menus;
        $judul = "Daftar Gelaja";
       
        return view('master_gejala.add',compact('menus','judul'));
    }

    function addproses(Request $request)
    {
        $rules = [
            'kode_gejala'=>'required',
            'nama_gejala'=>'required',
            'present_positif'=>'required',
            'present_negatif'=>'required',
            'absen_positif'=>'required',
            'absen_negatif'=>'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            Session::flash('message','Error insert data');
            return Redirect::to('backend/gejala/add');
        } else {

            $s = new Gejala();
            $s->kode_gejala = $request->kode_gejala;
            $s->nama_gejala = $request->nama_gejala;
            $s->keterangan = '';
            $s->present_positif = $request->present_positif;
            $s->present_negatif = $request->present_negatif;
            $s->absen_negatif = $request->absen_negatif;
            $s->absen_positif = $request->absen_positif;
            $s->save();

            Session::flash('message','Success  insert data');
            return Redirect::to('backend/gejala');
        }
        
    }

    public function update($id)
    {
        $menus = $this->menus;
        $judul = "Data Gejala";
        $data =  Gejala::find($id);
        return view('master_gejala.read',compact('menus','judul','data'));
    }

    public function updateproses(Request $e)
    {
        $rules = [
            'id'=>'required',
            'kode_gejala'=>'required',
            'nama_gejala'=>'required',
            'present_positif'=>'required',
            'present_negatif'=>'required',
            'absen_positif'=>'required',
            'absen_negatif'=>'required'
        ];
        $id = $e->id;
        $validator = Validator::make($e->all(), $rules);
        if ($validator->fails()) {
            Session::flash('message','Error update data');
            return Redirect::to('backend/gejala/'.$id.'/update');
        } else {

            $s =  Gejala::find($id);
            $s->kode_gejala = $request->kode_gejala;
            $s->nama_gejala = $request->nama_gejala;
            $s->keterangan = '';
            $s->present_positif = $request->present_positif;
            $s->present_negatif = $request->present_negatif;
            $s->absen_negatif = $request->absen_negatif;
            $s->absen_positif = $request->absen_positif;
            $s->save();

            Session::flash('message','Success  update data');
            return Redirect::to('backend/gejala');
        }
    }

    public function deleted($id)
    {
        $nerd = Gejala::find($id);
        $nerd->delete();

        Session::flash('message', 'Successfully delete data');
        return Redirect::to('backend/gejala');
    }
}
