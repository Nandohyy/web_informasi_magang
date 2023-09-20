<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function tambahDataMagang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pekerjaan' => 'required|string',
            'perusahaan' => 'required|string',
            'departemen' => 'required|string',
            'deskripsi' => 'required|string',
            'kualifikasi' => 'required|string',
            'lokasi' => 'required|string',
            'tanggal_buka' => 'required|date',
            'tanggal_tutup' => 'required|date'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        $loker = Loker::create($data);

        return redirect()->route('admin.view.data')->with('success', 'Job posting added successfully!');
    }

    public function searchPendaftar(Request $request)
    {
        $pendaftar = Pendaftar::join('lokers', 'pendaftars.loker_id', '=', 'lokers.id')
            ->where('lokers.nama_pekerjaan', 'LIKE', '%' . $request->keyword . '%')
            ->get();

        return view('admin.peserta.peserta', ["pendaftar" => $pendaftar]);
    }

    public function deleteLoker($id)
    {
        $loker = Loker::find($id);
        if (!$loker) {
            return response()->json(['message' => 'Loker not found.'], 404);
        }

        $loker->delete();

        return response()->json(['message' => 'Loker deleted successfully.']);
    }


    public function editDataMagang(Request $request, $id)
{
    // Validate the form data
    $validatedData = $request->validate([
        'nama_pekerjaan' => 'required|string|max:255',
        'departemen' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'kualifikasi' => 'required|string|max:255',
        'tanggal_buka' => 'required|date',
        'tanggal_tutup' => 'required|date',
    ]);

    // Update the job internship data
    $loker = Loker::find($id);
    $loker->nama_pekerjaan = $validatedData['nama_pekerjaan'];
    $loker->departemen = $validatedData['departemen'];
    $loker->deskripsi = $validatedData['deskripsi'];
    $loker->kualifikasi = $validatedData['kualifikasi'];
    $loker->tanggal_buka = $validatedData['tanggal_buka'];
    $loker->tanggal_tutup = $validatedData['tanggal_tutup'];
    $loker->save();

    return redirect()->route('admin.view.data')->with('success', 'Job Internship updated successfully.');
}


}
