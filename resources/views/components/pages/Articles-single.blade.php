<x-HomeLayout :title="$title ?? ''" :banner="$banner" :article="$article">
    @section('meta_description', Str::limit(strip_tags($article->deskripsi ?? 'Deskripsi article'), 160))
    <div class="section">
        <div class="container">
            <div class="row justify-content-between">
                {{-- Gambar Properti --}}
                <div class="col-lg-7">
                    <div class="img-property-slide-wrap">
                        <div class="img-property-slide">
                            @forelse ($article->gambar as $prop)
                                <img src="{{ asset('storage/' . $prop->image) }}"
                                    alt="Rumah di {{ $article->address }} - {{ $article->title }}"
                                    class="img-fluid mb-2" />
                            @empty
                                <img src="{{ asset('images/default.jpg') }}"
                                    alt="Rumah di {{ $article->address }} - {{ $article->title }}" loading="lazy"
                                    class="img-fluid mb-2" />
                            @endforelse
                        </div>
                    </div>
                </div>


                {{-- Info Properti --}}
                <div class="col-lg-4">
                    <article class="property-detail">
                        <header>
                            <h1 class="heading text-primary">{{ $article->title ?? 'Tanpa Judul' }}</h1>
                            <p class="meta">{{ $article->address }}</p>
                        </header>
                        <p>
                            {!! $article->deskripsi ?? 'Tanpa Deskripsi' !!}
                        </p>
                    </article>

                </div>
            </div>
        </div>
    </div>
</x-HomeLayout>
