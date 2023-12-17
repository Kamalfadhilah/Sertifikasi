<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pendaftaran;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{
    // Show form
    public function create()
    {
        return view('pendaftaran.create');
    }

    // Store yang baru dibuat
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat_KTP' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'provinci' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:255',
            'email',
            'kewarganegaraan' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'status_menikah' => 'required|string|max:255',
            'agama' => 'required|string|max:255',
            'document' => 'required|file|mimes:pdf|max:2048', // 2MB Max
        ]);

        $pendaftaran = pendaftaran::create($request->all());

        if ($request->hasFile('document')) {
            $pdf = $request->file('document');
            $filename = time() . '_' . $pdf->getClientOriginalName();
            Storage::putFileAs(
                'documents',
                $pdf,
                $filename
            );

            // Save pdf di database
            $pendaftaran->document_path = 'documents/' . $filename;
            $pendaftaran->save();
        }

        // setelah store data, kemabali ke halaman regis
        return redirect()->route('pendaftaran.create')->with('success', 'pendaftaran data ditambahkan');
    }
}
