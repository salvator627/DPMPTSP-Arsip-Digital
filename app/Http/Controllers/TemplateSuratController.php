<?php

namespace App\Http\Controllers;

use App\Models\TemplateSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemplateSuratController extends Controller
{
    // DAFTAR TEMPLATE
    public function index()
    {
        $templates = TemplateSurat::latest()->get();
        return view('template_surat.index', compact('templates'));
    }

    // FORM TAMBAH
    public function create()
    {
        return view('template_surat.create');
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'nama_template' => 'required|string|max:255',
            'file_template' => 'required|file|mimes:doc,docx',
        ]);

        $path = $request->file('file_template')
                        ->store('template_surat', 'public');

        TemplateSurat::create([
            'nama_template' => $request->nama_template,
            'file_template' => $path,
        ]);

        return redirect()
            ->route('template-surat.index')
            ->with('success', 'Template surat berhasil ditambahkan');
    }

    // DOWNLOAD FILE
    public function download(TemplateSurat $template)
    {
        return Storage::disk('public')->download($template->file_template);
    }

    // HAPUS
    public function destroy(TemplateSurat $template)
    {
        Storage::disk('public')->delete($template->file_template);
        $template->delete();

        return back()->with('success', 'Template berhasil dihapus');
    }
}
