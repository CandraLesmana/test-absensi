<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendace;
use App\Models\Employee;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request){
        $nip = $request->nip ?? null;
        if($nip){
            $att     = Attendace::with('employee') // load the employee relationship
            ->whereHas('employee', function($q) use ($nip) { // filter by nip
                $q->where('nip', $nip);
            })
            ->whereDate('date', Carbon::now()->format('Y-m-d')) // filter by today's date
            ->first();

        }else{
            $att = null;
        }   
        
        return view('welcome', compact('nip', 'att'));
    }

    public function check_in(Request $request) {
        $emp = Employee::where('nip', $request->nip)->first();

        $working_hours = Carbon::parse(Work::find(1)->working_hours);
        $working_hours_plus_15 = $working_hours->addMinutes(15);

        if($working_hours_plus_15 > Carbon::now()->format('H:i:s')){
            $status = 2;
        }else{
            $status = 1;
        }

        Attendace::create([
            'employee_id' => $emp->id,
            'date' => Carbon::now()->format('Y-m-d'),
            'check_in' => Carbon::now()->format('H:i:s'),
            'status' => $status
        ]);

        return redirect()->route('welcome', ['nip'=> $request->nip])->with('success', 'Berhasil Absen Masuk');
    }

    public function check_out(Request $request) {
        $nip = $request->nip;
        $emp = Employee::where('nip', $nip)->first();

        if($nip){
            $att = Attendace::with('employee') // load the employee relationship
            ->whereHas('employee', function($q) use ($nip) { // filter by nip
                $q->where('nip', $nip);
            })
            ->whereDate('date', Carbon::now()->format('Y-m-d')) // filter by today's date
            ->first();

        }else{
            $att = null;
        }  

        $att->update([
            'check_out' => Carbon::now()->format('H:i:s'),
        ]);

        return redirect()->route('welcome', ['nip'=> $request->nip])->with('success', 'Berhasil Absen Keluar');
    }
}

