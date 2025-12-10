<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $store->name }} - Halaman Toko</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
</head>
<body class="dashboard-body">

    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <div class="logo-icon"><i class="fa-solid fa-cube"></i></div>
                <span class="logo-text">Gasol Store</span>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('member.dashboard') }}">Home</a></li>
                <li><a href="{{ route('member.transactionHistory') }}">Riwayat Transaksi</a></li>
            </ul>
            <div class="nav-actions">
                <a href="#" class="btn-nav-login">{{ Auth::user()->name }}</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <aside class="sidebar-left">
            <div class="card card-sidebar">
                <div class="card-header-sm"><h3>Etalase Toko</h3></div>
                <ul class="category-list etalase-list">
                    <li><a href="#" style="font-weight: bold; color: #fff;">Semua Produk <span class="count-badge">{{ $totalProducts }}</span></a></li>
                    </ul>
            </div>
            <div class="card info-card">
                <div class="info-item">
                    <small>Jam Operasional</small>
                    <div style="font-size: 13px; color: #fff; margin-top: 5px;">
                        <i class="fa-regular fa-clock" style="color: #6366f1;"></i> 09:00 - 17:00 WIB
                    </div>
                </div>
            </div>
        </aside>

        <main class="content-center">
            <div class="store-header-card">
                <div class="store-info-content">
                    <div class="store-logo-lg">
                        @if($store->logo)
                            <img src="{{ asset('logo/' . $store->logo) }}" alt="Logo" style="width:100%; height:100%; object-fit:cover; border-radius:50%;">
                        @else
                            <i class="fa-solid fa-store"></i>
                        @endif
                    </div>
                    
                    <div class="store-details">
                        <h1>{{ $store->name }} 
                            @if($store->is_verified)
                                <i class="fa-solid fa-circle-check verified-badge" title="Official Store"></i>
                            @endif
                        </h1>
                        <div class="store-stats">
                            <span><i class="fa-solid fa-box-open"></i> {{ $totalProducts }} Produk</span><span>|</span>
                            <span><i class="fa-solid fa-location-dot"></i> {{ $store->city }}</span>
                        </div>
                        <div style="margin-top: 10px; font-size: 12px; color: #9ca3af;">
                            {{ Str::limit($store->about, 100) }}
                        </div>
                    </div>
                    <div class="store-actions">
                        <button class="btn-outline" style="background: transparent; border-color: #fff; color: #fff;"><i class="fa-solid fa-plus"></i> Follow</button>
                    </div>
                </div>
            </div>

            <div class="store-tabs">
                <div class="tab-item active">Produk</div>
                <div class="tab-item">Ulasan</div>
                <div class="tab-item">Tentang Toko</div>
            </div>

            <div class="section-header" style="margin-top: 20px;"><h3>Daftar Produk</h3></div>
            
            <div class="product-grid">
                @forelse($store->Product as $product)
                <div class="card product-card">
                    <div class="product-img">
                        @if($product->photo) 
                             <img src="{{ asset('storage/' . $product->photo) }}" style="width:100%; height:100%; object-fit:cover;">
                        @else
                            <i class="fa-solid fa-box"></i>
                        @endif
                    </div>
                    <div class="product-info">
                        <h4><a href="{{ route('member.product', $product->id) }}">{{ Str::limit($product->name, 20) }}</a></h4>
                        
                        @if($product->productCategory)
                            <span class="category-tag">{{ $product->productCategory->name }}</span>
                        @endif

                        <div class="price-row">
                            <span class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            <a href="{{ route('member.product', $product->id) }}" class="btn-icon"><i class="fa-solid fa-cart-plus"></i></a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full" style="grid-column: 1 / -1; text-align: center; color: white;">
                    <p>Toko ini belum memiliki produk.</p>
                </div>
                @endforelse
            </div>
        </main>

        <aside class="sidebar-right">
            <div class="card support-card">
                <h3>Hubungi Penjual</h3>
                <p>Ada pertanyaan seputar produk? Chat langsung dengan admin toko.</p>
                <a href="https://wa.me/{{ $store->phone }}" target="_blank" class="btn-pill-white" style="width: 100%; margin-top: 10px; font-size: 13px; text-align:center; display:block; text-decoration:none; color:#000;">
                    <i class="fa-brands fa-whatsapp"></i> Chat WhatsApp
                </a>
            </div>
        </aside>
    </div>
</body>
</html>