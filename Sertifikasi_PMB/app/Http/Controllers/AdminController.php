<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prospectivependaftaran;
use App\Models\pendaftaran;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Show list
    public function index()
    {
        $pendaftaran = pendaftaran::all();
        return view('user.index', compact('pendaftaran'));
    }

    // Show specific 
    public function show($id)
    {
        $pendaftaran = pendaftaran::findOrFail($id);
        return view('user.show', compact('pendaftaran'));
    }

    // Update status regis
    public function updateStatus(Request $request, $id)
    {
        $pendaftaran = pendaftaran::findOrFail($id);
        $pendaftaran->update($request->only(['status'])); // Assuming 'registration_status' is a column in your table
        return back()->with('success', 'pendaftaran registration status updated.');
    }

    // Delete 
    public function destroy($id)
    {
        $pendaftaran = pendaftaran::findOrFail($id);
        // delete dokument
        if ($pendaftaran->document_path) {
            Storage::delete($pendaftaran->document_path);
        }
        $pendaftaran->delete();
        return back()->with('success', 'pendaftaran berhasil didelete.');
    }

}
