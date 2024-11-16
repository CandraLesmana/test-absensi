<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkController extends Controller
{
    public function index() {

        $data = Work::find(1);

        return view('work.index', compact('data'));
    }

    public function update(Request $request) {
        $valid = Validator::make($request->all(), [
            'working_days' => 'required',
            'work_hours' => 'required',
        ],[
            'working_days.required' => 'Hari Kerja Harus Diisi',
            'work_hours.required' => 'Jam Masuk Kerja Harus Diisi',
        ]);

        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }

        try{
            $data = Work::find(1);

            if($data){
                $data->update($request->all());
            }else{
                Work::create($request->all());
            }


            return redirect()->back()->with('success', 'Jadwal Kerja Berhasil Diubah');
        }catch (Exception $e){
            return redirect()->back()->with('error', $e->getMessage());

        }
    }
}
