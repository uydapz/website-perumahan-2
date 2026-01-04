@if ($title != 'Blog')
    <div class="hero">
        <div class="hero-slide">
            @if ($title == 'Beranda' || $title == 'About Us')
                @foreach ($banner as $b)
                    <div class="img overlay" style="background-image: url('{{ asset('storage/' . $b->image) }}')"></div>
                @endforeach
            @elseif(isset($article))
                <div class="img overlay" style="background-image: url('{{ asset('storage/' . $article->image) }}')"></div>
            @endif
        </div>

        @if (isset($article) && $title != 'Beranda' && $title != 'About Us')
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-9 text-center mt-5">
                        <h1 class="heading" data-aos="fade-up">
                            {{ $article->title }}
                        </h1>
                        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                            <ol class="breadcrumb text-center justify-content-center">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active text-white-50" aria-current="page">
                                    {{ $article->title }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endif