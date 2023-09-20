<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        // $loker = Loker::latest()->paginate(6);
        $loker = Loker::where('tanggal_tutup', '>', now())->latest()->paginate(6);

        return view('home', ["data" => $loker]);
    }

    public function search(Request $request)
    {
        $loker = Loker::where('nama_pekerjaan', 'like', '%' . $request->search . '%')
            ->paginate(6);

        return view('home', ["data" => $loker]);
    }

    public function show($id)
    {
        $loker = Loker::find($id);

        return view('detail', compact('loker'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string',
            'asal_sekolah' => 'required|string',
            'domisili' => 'required|string',
            'email' => 'required|string',
            'nohp' => 'required|string',
            'cv' => 'required|mimes:pdf|max:2048',
            'loker_id' => 'required'
        ]);

        $data = $validate->validated();

        $pendaftar = Pendaftar::create([
            'nama_lengkap' => $data['nama_lengkap'],
            'asal_sekolah' => $data['asal_sekolah'],
            'domisili' => $data['domisili'],
            'email' => $data['email'],
            'nohp' => $data['nohp'],
            'cv' => 'default.png',
            'loker_id' => $data['loker_id']
        ]);

        if ($request->hasFile('cv')) {
            $cvName = $request->nama_lengkap . "-" . mt_rand(1, 9999) . "." . $request->file('cv')->extension();
            Storage::disk('public')->put(
                $cvName,
                file_get_contents($request->file('cv')->getRealPath())
            );

            $pendaftar->cv = $cvName;
            $pendaftar->save();
        }

        return back()->with('message','Kami Akan Segera Menghubungi Anda!');
    }
}
