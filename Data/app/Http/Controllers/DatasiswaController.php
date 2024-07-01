<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datasiswa;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DatasiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $datasiswa = null;

        if ($query) {
            $datasiswa = Datasiswa::where('nama', 'LIKE', "%$query%")
                    ->orderBy('created_at', 'desc')
                    ->get();
        }
        else {
            $datasiswa = Datasiswa::orderBy('created_at', 'desc')->get();
        }
        return view('datasiswa', compact('datasiswa'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Validate form
        $request->validate([
        'nama'          => 'required',
        'ttl'           => 'required',
        'sekolah'       => 'required',
        'keterangan'    => 'required'
        ]);

        // Save the data
        Datasiswa::create([
            'nama'=> $request->nama,
            'ttl'=> $request->ttl,
            'sekolah'=> $request->sekolah,
            'keterangan'=> $request->keterangan,
        ]);
        // Redirect with success message
        return redirect()->route('datasiswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    // datasiswa delete
    public function destroy($id): RedirectResponse
    {
        //get siswa by ID
        $datasiswa = Datasiswa::findOrFail($id);

        //delete siswa
        $datasiswa->delete();

        //redirect to index
        return redirect()->route('datasiswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function update(Request $request, $id)
    {
        // dd('b');
    $request->validate([
        'nama' => 'required',
        'ttl' => 'required',
        'sekolah' => 'required',
        'keterangan' => 'required',
    ]);

    $datasiswa = datasiswa::findOrFail($id);
    $datasiswa->update($request->all());

    return redirect()->route('datasiswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }
    
}
