<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    //
    public function index(){
        $customer = session("customer");
        return view ('TambahCustomer', compact('customer'));
    }

    public function store(Request $request){
        $customer = session("customer");

        $messages = [
            'required'      => 'Inputan Wajib Diisi',
            'string'        => 'Inputan Harus Berupa Huruf',
            'max'           => 'Atribut Harus Diisi Maximal 100 Character',
            'alpha_num'     => 'Hanya Boleh Menginputkan Huruf dan Angka',
            'numeric'       => 'Hanya Boleh Menginputkan Angka',
        ];
        
        $request->validate([
            'nama_cus'      => 'required|string|max:100|regex:/^[a-zA-Z ]+$/',
            'alamat'        => 'required|alpha_num|max:100',
            'kota'          => 'required',
            'email'         => 'required|email',
            'telfon'        => 'required|max:13|min:10',
            'perusahaan'    => 'required|string|max:50'
        ], $messages);

        $customer[] = [
            "nama" => $request->nama_cus,
            "alamat" => $request->alamat,
            "kota" => $request->kota,
            "email" => $request->email,
            "hp" => $request->telfon,
            "perusahaan" => $request->perusahaan
        ];
        // dd($request);
        session(["customer" => $customer]);
        $count = count($customer);
        Session::put('count', $count);
        return back()->with('success', 'success');
    }

    public function hapus($id){

        $customer = session("customer");
        unset($customer[$id]);
        session(["customer" => $customer]);
        $count = count($customer);
        Session::put('count', $count);
        return back()->with('hapus', 'success');

    }
}
