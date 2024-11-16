<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index() {

        $data = Employee::orderBy('full_name', 'asc')->get();

        return view('employee.index', compact('data'));
    }

    public function store(Request $request){
        $valid = Validator::make($request->all(), [
            'full_name' => 'required',
            'nip' => 'required',
            'salary' => 'required',
            'late_charge' => 'required'
        ],[
            'full_name.required' => 'Nama Karyawan Harus Diisi',
            'nip.required' => 'NIP Karyawan Harus Diisi',
            'salary.required' => 'Gaji Karyawan Harus Diisi',
            'late_charge.required' => 'Denda Keterlambatan Karyawan Harus Diisi',
        ]);

        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }

        try{
            Employee::create($request->all());

            return redirect()->back()->with('success', 'Karyawan Berhasil Ditambahkan');
        }catch (Exception $e){
            return redirect()->back()->with('error', $e->getMessage());

        }
    }

    public function update(Request $request, $id) {
        $valid = Validator::make($request->all(), [
            'full_name' => 'required',
            'nip' => 'required',
            'salary' => 'required',
            'late_charge' => 'required'
        ],[
            'full_name.required' => 'Nama Karyawan Harus Diisi',
            'nip.required' => 'NIP Karyawan Harus Diisi',
            'salary.required' => 'Gaji Karyawan Harus Diisi',
            'late_charge.required' => 'Denda Keterlambatan Karyawan Harus Diisi',
        ]);

        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }

        try{
            $data = Employee::find($id);

            $data->update($request->all());

            return redirect()->back()->with('success', 'Karyawan Berhasil Diubah');
        }catch (Exception $e){
            return redirect()->back()->with('error', $e->getMessage());

        }
    }

    public function delete($id) {
        try{
            $data = Employee::find($id);

            $data->delete();

            return redirect()->back()->with('success', 'Karyawan Berhasil Dihapus');
        }catch (Exception $e){
            return redirect()->back()->with('error', $e->getMessage());

        }
    }
}
