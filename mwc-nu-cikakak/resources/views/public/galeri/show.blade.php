@extends('layouts.app')

@section('title', $galeri->judul . ' — MWC NU Cikakak')

@section('content')
    <section class="max-w-6xl mx-auto px-5 md:px-8 py-10 md:py-16">
        <div class="max-w-4xl mx-auto">
            <p class="text-[10px] md:text-xs uppercase tracking-widest text-[#1F3A22] mb-3 md:mb-4">
                {{ optional($galeri->tanggal)->translatedFormat('d F Y') }}
            </p>
            <h1 class="font-heading text-3xl md:text-4xl mb-4 leading-tight">{{ $galeri->judul }}</h1>

            @if ($galeri->deskripsi)
                <p class="text-[#232620]/70 leading-relaxed mb-7 md:mb-10">{{ $galeri->deskripsi }}</p>
            @endif

            @if ($galeri->gambar)
                <figure>
                    <img
                        src="{{ Str::startsWith($galeri->gambar, 'assets/') ? asset($galeri->gambar) : Storage::url($galeri->gambar) }}"
                        alt="{{ $galeri->judul }}"
                        class="w-full max-h-[75vh] object-contain rounded-2xl bg-[#232620]/5"
                        draggable="false"
                    >
                </figure>
            @else
                <div class="aspect-video rounded-2xl bg-[#232620]/5 flex items-center justify-center text-sm text-[#232620]/50">
                    Belum ada gambar dokumentasi.
                </div>
            @endif

            <div class="mt-8">
                <a href="{{ route('galeri.index') }}" class="inline-flex items-center min-h-11 px-5 rounded-full border border-[#1F3A22]/15 text-sm hover:bg-[#1F3A22]/5 transition">
                    ← Kembali ke Galeri
                </a>
            </div>
        </div>
    </section>
@endsection
