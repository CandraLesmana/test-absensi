<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendace;
use App\Models\Employee;
use App\Models\SlipGaji;
use App\Models\Work;
use Exception;
use Illuminate\Http\Request;

class SlipGajiController extends Controller
{
    public function index(Request $request) {
        $periode = $request->periode ?? '';

        if($periode){
            $data = SlipGaji::with('employee')->where('periode', $periode)->get();
        }else{
            $data = [];
        }

        return view('slip_gaji.index', compact('data'));
    }

    public function store(Request $request)
    {
        $periode = $request->periode;

        // Periksa apakah slip gaji untuk periode sudah ada
        $chek_periode = SlipGaji::where('periode', $periode);
        if ($chek_periode->exists()) {
            return redirect()->route('slip_gaji.index', ['periode' => $periode])
                ->with('success', 'Slip Gaji Periode Ini Sudah Ada!');
        }

        // Ambil semua karyawan
        $emp = Employee::all();

        // Ambil data hari kerja
        $work = Work::find(1);
        if (!$work) {
            return redirect()->route('slip_gaji.index', ['periode' => $periode])
                ->with('error', 'Data hari kerja tidak ditemukan.');
        }

        // Ambil data kehadiran
        $attendances = Attendace::whereIn('employee_id', $emp->pluck('id'))->get();

        foreach ($emp as $item) {
            // Hitung total kehadiran
            $att_total = $attendances->where('employee_id', $item->id)->count();

            // Hitung jumlah absen tanpa check-in atau check-out
            $not_att_checkin_chekout = $attendances->where('employee_id', $item->id)
                ->filter(function ($attendance) {
                    return is_null($attendance->check_in) || is_null($attendance->check_out);
                })->count();

            // Hitung jumlah hari tidak hadir
            $not_att = $work->working_days - $att_total;

            // Hitung jumlah keterlambatan
            $late_att = $attendances->where('employee_id', $item->id)
                ->where('status', 2)->count();

            // Hitung denda
            $not_att_checkin_chekout_total = ($item->salary / $work->working_days) * $not_att_checkin_chekout * 0.5;
            $not_att_total = ($item->salary / $work->working_days) * $not_att;
            $late_att_total = $late_att * $item->late_charge;

            $charge_total = $not_att_checkin_chekout + $not_att_total + $late_att_total;
            $net_total = $item->salary - $charge_total;

            // Simpan slip gaji
            try {
                SlipGaji::create([
                    'employee_id' => $item->id,
                    'periode' => $periode,
                    'working_days' => $work->working_days,
                    'att_total' => $att_total ?? 0,
                    'not_att_checkin_chekout' => $not_att_checkin_chekout ?? 0,
                    'not_att' => $not_att ?? 0,
                    'late_att' => $late_att ?? 0,
                    'not_att_checkin_chekout_total' => $not_att_checkin_chekout_total ?? 0,
                    'not_att_total' => $not_att_total ?? 0,
                    'late_att_total' => $late_att_total ?? 0,
                    'charge_total' => $charge_total ?? 0,
                    'net_total' => $net_total ?? 0,
                ]);
            } catch (Exception $e) {
                return redirect()->route('slip_gaji.index', ['periode' => $periode])
                    ->with('error', 'Gagal menyimpan slip gaji untuk ' . $item->name . ': ' . $e->getMessage());
            }
        }

        return redirect()->route('slip_gaji.index', ['periode' => $periode])
            ->with('success', 'Slip Gaji Berhasil Digenerate');
    }

    
}
