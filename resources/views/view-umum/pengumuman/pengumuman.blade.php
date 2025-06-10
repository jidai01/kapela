@extends('template/main')

@section('menu-navbar')
    @include('template/navbar')
@endsection

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp

    <div class="container-fluid p-0 mt-5 mb-5">
        <h4 class="border-top border-bottom border-2 border-dark py-1 m-0 mb-3 text-center">
            {{ $title }}
        </h4>

        <div class="d-flex flex-column align-items-center">
            @forelse($pengumuman as $item)
                <div class="card mb-3 w-75">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $item->judul_pengumuman }}</h5>
                        <p class="card-text">{{ Str::limit(strip_tags($item->isi_pengumuman), 100) }}</p>
                        <p class="card-text">
                            <small class="text-muted">
                                Diterbitkan pada {{ \Carbon\Carbon::parse($item->tanggal_terbit)->format('d M Y') }}
                            </small>
                        </p>
                        <a href="pengumuman/{{ $item->slug }}" class="btn btn-sm btn-primary">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada pengumuman.</p>
            @endforelse

            <div class="mt-4">
                {{ $pengumuman->links() }}
            </div>
        </div>
    </div>
@endsection
