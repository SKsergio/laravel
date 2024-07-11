<?php

namespace App\Http\Controllers;

// send mails
use App\Mail\ContactanosMailAble;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('content.contactanos.index');
    }

    public function store(Request $request){
        //return $request->all();

        $correo = new ContactanosMailAble($request->all());
        Mail::to('correo899@gmail.com')->send($correo);

        return redirect()->route('contactanos.index');
    }
}
