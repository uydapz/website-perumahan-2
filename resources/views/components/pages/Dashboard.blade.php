<x-DashLayout :title="$title ?? 'Beranda'">
    <div class="container p-4">
        <h1 class="mb-4">Statistik Dashboard</h1>
        
        <div class="row g-4">
            {{-- Total Users --}}
            <div class="col-md-3">
                <div class="card shadow-sm bg-primary text-white">
                    <div class="card-body text-center">
                        <h6 class="mb-1">Total Users</h6>
                        <h2 class="mb-0">{{ $total_users }}</h2>
                    </div>
                </div>
            </div>

            {{-- Total Banners --}}
            <div class="col-md-3">
                <div class="card shadow-sm bg-success text-white">
                    <div class="card-body text-center">
                        <h6 class="mb-1">Total Banners</h6>
                        <h2 class="mb-0">{{ $total_banners }}</h2>
                    </div>
                </div>
            </div>

            {{-- Total Properti --}}
            <div class="col-md-3">
                <div class="card shadow-sm bg-warning text-dark">
                    <div class="card-body text-center">
                        <h6 class="mb-1">Total Artikel</h6>
                        <h2 class="mb-0">{{ $total_articles }}</h2>
                    </div>
                </div>
            </div>

            {{-- Total Testimoni --}}
            <div class="col-md-3">
                <div class="card shadow-sm bg-danger text-white">
                    <div class="card-body text-center">
                        <h6 class="mb-1">Total Testimoni</h6>
                        <h2 class="mb-0">{{ $total_testimoni }}</h2>
                    </div>
                </div>
            </div>

            {{-- Rata-rata Rating --}}
            <div class="col-md-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <p class="mb-1">Rata-rata Bintang</p>
                        <h3 class="mb-0">{{ $average_rating }} ⭐</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-DashLayout>
