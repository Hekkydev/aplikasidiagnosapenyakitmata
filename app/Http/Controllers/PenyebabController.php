<?php

namespace App\Http\Controllers;

use App\Penyebab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PenyebabController extends Controller
{

    public function __construct()
    {
        $this->menus = $this->menus();
    }

    public function index()
    {
        $judul = 'Daftar Penyebab';
        $menus = $this->menus;
        $penyebab = Penyebab::all();
        return view('master_penyebab.page', compact('menus', 'judul', 'penyebab'));
    }

    function add()
    {
        $judul = 'Daftar Penyabab';
        $menus = $this->menus;
        return view('master_penyebab.add',compact('menus','judul'));
    }

    function add_proses(Request $e)
    {

    }

    function edit()
    {

        $judul = 'Daftar Penyabab';
        $menus = $this->menus;
        return view('master_penyebab.edit',compact('menus','judul'));
    }

    function update_proses(Request $e)
    {

    }

    function  delete($id)
    {

    }
}
