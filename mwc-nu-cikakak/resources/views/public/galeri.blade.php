@extends('layouts.app')
@section('title','Galeri MWC NU Cikakak')
@section('content')
<section class="page-hero section-pad"><div class="container"><span class="eyebrow">05 — Dokumentasi</span><h1>Jejak kegiatan,<br><span>dalam gambar.</span></h1><p>Klik dokumentasi untuk melihat informasi dan foto tanpa meninggalkan halaman.</p></div></section>
<section class="section-pad"><div class="container"><div class="gallery-grid gallery-page">
@forelse($galeri as $g)
    <button class="gallery-item" type="button" data-modal-open="galeri-modal-{{ $g->id }}" aria-label="Buka dokumentasi {{ $g->judul }}">
        <x-media :path="$g->gambar" :alt="$g->judul"/>
        <span>{{ $g->judul }}</span>
        <small>{{ optional($g->tanggal)->translatedFormat('d F Y') }}</small>
    </button>
@empty
    <div class="empty-state">Belum ada dokumentasi.</div>
@endforelse
</div></div></section>
@foreach($galeri as $g)
<div class="modal" id="galeri-modal-{{ $g->id }}" data-modal role="dialog" aria-modal="true" aria-labelledby="galeri-title-{{ $g->id }}" hidden>
    <div class="modal-backdrop" data-modal-close></div>
    <div class="modal-dialog modal-dialog-article">
        <button class="modal-close" type="button" data-modal-close aria-label="Tutup">×</button>
        <div class="modal-article-image"><x-media :path="$g->gambar" :alt="$g->judul" loading="eager"/></div>
        <span class="tag">Dokumentasi @if($g->tanggal) · {{ $g->tanggal->translatedFormat('d F Y') }} @endif</span>
        <h2 id="galeri-title-{{ $g->id }}">{{ $g->judul }}</h2>
        @if($g->deskripsi)<p class="lead">{{ $g->deskripsi }}</p>@endif
        <div class="modal-actions"><a class="btn btn-primary" href="{{ route('galeri.show', $g) }}">Buka halaman dokumentasi</a></div>
    </div>
</div>
@endforeach
@endsection
