<x-app-layout>
    <x-slot name="header">
        ini member
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
@include('member.dashboard', ['stores' => $stores])
@section('content')
<div class="container mt-4">

    <h3 class="mb-4">Daftar Semua Toko</h3>

    <div class="row">
        @forelse($stores as $store)
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">

                @if($store->logo)
                <img src="{{ asset('storage/'.$store->logo) }}" 
                     class="card-img-top" style="height:160px; object-fit:cover;">
                @else
                <img src="https://via.placeholder.com/300x160?text=No+Logo" 
                     class="card-img-top">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $store->name }}</h5>

                    <p class="card-text text-muted">
                        {{ Str::limit($store->about, 60) }}
                    </p>

                    <p>
                        <strong>Total Produk:</strong> {{ $store->products_count }}
                    </p>

                    <a href="{{ route('member.store.products', $store->id) }}" 
                       class="btn btn-primary btn-sm">
                        Lihat Produk Toko
                    </a>
                </div>
            </div>
        </div>
        @empty
        <p class="text-muted">Belum ada toko yang terdaftar.</p>
        @endforelse
    </div>

    <div class="mt-4">
        <a href="{{ route('member.products') }}" class="btn btn-success">
            Lihat Semua Produk
        </a>
    </div>

</div>
@endsection

</x-app-layout>
