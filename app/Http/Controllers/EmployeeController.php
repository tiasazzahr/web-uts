<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){

        $data = Employee::all();
        return view('datapasien', compact('data'));
    }

    public function tambahpasien(){
        return view('tambahdata');
    }

    public function insertdata(Request $request){
        //dd($request->all());
        Employee::create($request->all());
        return redirect()->route('diet')->with('succes','Data Berhasil Ditambahkan');
    }

    public function tampilkandata($id){

        $data = Employee::find($id);
        dd($data);

        return view('tampildata', compact('data'));
    }

    public function updatedata(Reques $request, $id) {
        $request->validata(
            [
                'nama'=>'required',
                'alamat'=>'required',
            ],
            [
                'nama.required'=>'Nama wajib diisi',
                'alamat.required'=>'Alamat wajib diisi',
            ]
        );
        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ];

        diet:where('id', $id)->update($data);
        return redirect()->to('diet')->with('succes', 'Berhasil melakukan update');

    }

    public function delete($id){
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('diet')->with('succes','Data Berhasil Di Hapus');
    }

    
}
