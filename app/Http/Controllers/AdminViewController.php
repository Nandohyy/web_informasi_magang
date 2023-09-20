<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class AdminViewController extends Controller
{
    public function dashboard()
    {
        $pendaftar = Pendaftar::with('loker')->get();

        return view('admin.home.dashboard')->with([
            "pendaftar" => $pendaftar,
            "totalLowongan" => Loker::count(),
            "totalPendaftar" => Pendaftar::count(),
        ]);
    }

    public function dataMagang()
{
    $data = Loker::latest()->paginate(6);

    $currentDate = now();

    foreach ($data as $loker) {
        // Compare the closing date with the current date to determine status
        if ($loker->tanggal_tutup >= $currentDate) {
            $loker->status = 'Aktif';
        } else {
            $loker->status = 'Tidak Aktif';
        }
    }

    return view('admin.jobmagang.data', compact('data'));
}

    public function dataPeserta()
    {
        $pendaftar = Pendaftar::with('loker')->get();

        return view('admin.peserta.peserta', ["pendaftar" => $pendaftar]);
    }

    public function detailAdmin($id)
    {
        $loker = Loker::find($id);
        
        return view('admin.jobmagang.detailadmin', compact('loker'));
    }


    public function tambahDataView()
    {
        return view('admin.jobmagang.tambahdata');
    }

    public function editDataView($id)
    {
        $loker = Loker::find($id);

        if (!$loker) {
            return redirect()->json(['message' => 'Loker not found.'], 404);
        }

        return view('admin.jobmagang.editdata', compact('loker'));
    }
}
