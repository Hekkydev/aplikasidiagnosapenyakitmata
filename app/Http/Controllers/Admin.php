<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin extends Controller
{
   
   function listdata()
   {
       return view('admin/list');
   }
    
   function add()
   {
       $data = [
            'title'=>'Add New User'
       ];

       return view('admin/add');
   }


   function entri()
   {
       print_r($_POST);

       


   }
}
