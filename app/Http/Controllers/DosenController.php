<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::get();
        return view('keloladosen', compact('dosen'));
    }

    public function tambahdosen()
    {
        return view('tambahdosen');
    }

    public function simpanDosen(Request $request)
    {
        // Validasi formulir
        $request->validate([
            'nidn' => 'required|string|max:11',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'tgl_lahir' => 'required',
            'foto_dosen' => 'image|mimes:jpeg,png|max:2048', // Aturan validasi untuk gambar
        ]);

        // Simpan gambar ke storage
        if ($request->hasFile('foto_dosen')) {
            $image = $request->file('foto_dosen');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('gambar'), $imageName);
        } else {
            $imageName = null; // Atau sesuaikan dengan nilai default jika tidak ada gambar yang diunggah
        }
        $data = [
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'foto_dosen' => $imageName
        ];

        Dosen::create($data);

        return redirect()->back()->with('success', 'Data Berhasil Disimpan');
    }

    public function tampildatadosen($id)
    {
        $dosen = Dosen::where('id', $id)->first();
        return view('tampildosen', compact('dosen'));
    }

    public function updatedosen(Request $request, $id)
    {
        // Validasi formulir
        $request->validate([
            'nidn' => 'required|string|max:11',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'tgl_lahir' => 'required',
            'foto_dosen' => 'image|mimes:jpeg,png|max:2048', // Aturan validasi untuk gambar
        ]);

        // Simpan gambar ke storage hanya jika ada gambar yang diunggah
        if ($request->hasFile('foto_dosen')) {
            // Hapus gambar lama jika ada
            Storage::delete('public/gambar/' . $request->input('gambar_lama'));

            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('gambar'), $imageName);
        } else {
            $imageName = $request->input('gambar_lama');
        }

        // Perbarui data di database
        $data = [
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'foto_dosen' => $imageName
        ];
        Dosen::find($id)->update($data);

        // Pemberitahuan sukses
        return redirect()->back()->with('success', 'Data Berhasil Diperbarui!');
    }

    public function hapusdosen($id)
    {
        $dosen = Dosen::findOrFail($id);

        // Hapus gambar terkait dari storage jika ada
        if ($dosen->foto_dosen) {
            Storage::delete('public/gambar/' . $dosen->foto_dosen);
        }

        // Hapus data dari database
        $dosen->delete();
        return redirect('/dosen')->with('success', 'Data berhasil dihapus!');
    }
}
