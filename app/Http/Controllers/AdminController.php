<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index() {

        $data = User::orderBy('name', 'asc')->get();

        return view('admin.index', compact('data'));
    }

    public function store(Request $request){
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
            'email' => 'email|required',
        ],[
            'name.required' => 'Nama Harus Diisi',
            'password.required' => 'Password Harus Diisi',
            'email.required' => 'Email Harus Diisi',
        ]);

        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }

        try{
            User::create($request->all());

            return redirect()->back()->with('success', 'Admin Berhasil Ditambahkan');
        }catch (Exception $e){
            return redirect()->back()->with('error', $e->getMessage());

        }
    }

    public function update(Request $request, $id) {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'email|required',
        ],[
            'name.required' => 'Nama Harus Diisi',
            'email.required' => 'Email Harus Diisi',
        ]);

        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }

        try{
            $data = User::find($id);

            $data->update($request->except('password'));
            
            return redirect()->back()->with('success', 'Admin Berhasil Diubah');
        }catch (Exception $e){
            return redirect()->back()->with('error', $e->getMessage());

        }
    }

    public function delete($id) {
        try{
            $data = User::find($id);

            $data->delete();

            return redirect()->back()->with('success', 'Admin Berhasil Dihapus');
        }catch (Exception $e){
            return redirect()->back()->with('error', $e->getMessage());

        }
    }
}
