<x-HomeLayout :title="$title ?? ''" :banner="$banner">
    {{-- Search Form --}}
    <div class="section abu py-5 bg-light">
        <div class="container">
            <h2 class="mb-4 text-center fw-bold">ㅤ</h2>
            <form action="{{ url()->current() }}" method="GET" class="row justify-content-center">
                <div class="col-md-10 mb-3">
                    <input type="text" name="search" class="form-control form-control-lg shadow-sm"
                        placeholder="🔍 Search article by title or content..." value="{{ request('search') }}">
                </div>
                <div class="col-md-2 mb-3">
                    <button class="btn btn-dark btn-lg w-100" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Blog Article Slider --}}
    <div class="section abu section-4">
        <div class="container">
            @if (count($articles))
                <div class="property-slider-wrap">
                    <div class="property-slider">
                        @foreach ($articles as $a)
                            <div class="property-item card border-0 shadow-lg p-2 bg-white rounded h-100">
                                <a href="/detail-articles/{{ $a->id }}"
                                    class="img d-block overflow-hidden rounded">
                                    <img src="{{ asset('storage/' . $a->image) }}" alt="{{ $a->title }}"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 240px; transition: transform .3s;"
                                        onmouseover="this.style.transform='scale(1.05)'"
                                        onmouseout="this.style.transform='scale(1)'">
                                </a>

                                <div class="property-content p-3">
                                    <h5 class="mb-2 fw-bold">
                                        <a href="/detail-articles/{{ $a->id }}"
                                            class="text-dark text-decoration-none">
                                            {{ $a->title }}
                                        </a>
                                    </h5>

                                    <div class="text-muted small mb-2">
                                        <i class="fa fa-calendar-alt me-1"></i> {{ $a->created_at->format('d M Y') }}
                                    </div>

                                    <p class="text-muted">
                                        {{ \Illuminate\Support\Str::words(strip_tags($a->deskripsi), 20, '...') }}
                                    </p>

                                    <a href="/detail-articles/{{ $a->id }}"
                                        class="btn btn-outline-primary btn-sm mt-2">
                                        Read more →
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div id="property-nav" class="controls text-center mt-4" tabindex="0"
                        aria-label="Carousel Navigation">
                        <span class="prev btn btn-outline-dark me-2" data-controls="prev" aria-controls="property"
                            tabindex="-1">‹ Prev</span>
                        <span class="next btn btn-outline-dark" data-controls="next" aria-controls="property"
                            tabindex="-1">Next ›</span>
                    </div>
                </div>
            @else
                <div class="alert alert-warning text-center">
                    <strong>No articles found.</strong> Try different keywords.
                </div>
            @endif
        </div>
    </div>

    {{-- Slider Init --}}
    <script>
        tns({
            container: '.property-slider',
            items: 1,
            slideBy: 'page',
            autoplay: true,
            gutter: 20,
            mouseDrag: true,
            controlsContainer: '#property-nav',
            nav: false,
            responsive: {
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        });
    </script>
</x-HomeLayout>
