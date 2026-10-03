<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WargaNu;
use Illuminate\Http\Request;

class WargaNuController extends Controller
{
    public function index(Request $request)
    {
        $warga = WargaNu::query()
            ->when($request->filled('q'), function ($q) use ($request) {
                $term = $request->string('q');
                $q->where(function ($qq) use ($term) {
                    $qq->where('nama', 'like', "%{$term}%")
                        ->orWhere('nik', 'like', "%{$term}%")
                        ->orWhere('desa', 'like', "%{$term}%");
                });
            })
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->string('status')))
            ->orderBy('nama')
            ->paginate(20)
            ->withQueryString();

        return view('admin.warga-nu.index', compact('warga'));
    }

    public function create()
    {
        return view('admin.warga-nu.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('warga-nu', 'public');
        }

        WargaNu::create($data);

        return redirect()->route('admin.warga-nu.index')->with('success', 'Data warga berhasil ditambahkan.');
    }

    public function edit(WargaNu $wargaNu)
    {
        return view('admin.warga-nu.edit', compact('wargaNu'));
    }

    public function update(Request $request, WargaNu $wargaNu)
    {
        $data = $this->validated($request, $wargaNu->id);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('warga-nu', 'public');
        }

        $wargaNu->update($data);

        return redirect()->route('admin.warga-nu.index')->with('success', 'Data warga berhasil diperbarui.');
    }

    public function destroy(WargaNu $wargaNu)
    {
        $wargaNu->delete();

        return back()->with('success', 'Data warga berhasil dihapus.');
    }

    private function validated(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'nik' => ['nullable', 'string', 'max:32', 'unique:warga_nu,nik'.($ignoreId ? ",{$ignoreId}" : '')],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'alamat' => ['nullable', 'string'],
            'dusun' => ['nullable', 'string', 'max:255'],
            'desa' => ['nullable', 'string', 'max:255'],
            'no_hp' => ['nullable', 'string', 'max:30'],
            'pekerjaan' => ['nullable', 'string', 'max:255'],
            'foto' => ['nullable', 'image', 'max:2048'],
            'status' => ['required', 'in:aktif,tidak_aktif'],
        ]);
    }
}
