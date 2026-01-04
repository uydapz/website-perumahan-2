<x-HomeLayout :title="$title ?? ''" :banner="$banner" :articles="$articles" :testimoni="$testimoni">
    <div class="section abu">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-lg-6">
                    <h2 class="font-weight-bold text-primary heading">
                        Popular Properties
                    </h2>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <p>
                        <a href="#" target="_blank" class="btn btn-primary text-white py-3 px-4">View all
                            properties</a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="property-slider-wrap">
                        <div class="property-slider">
                            @foreach ($articles as $a)
                                <div class="property-item">
                                    <a href="property-single.html" class="img">
                                        <img src="{{ asset('storage/' . $a->image) }}" alt="Image"
                                            class="img-fluid" />
                                    </a>

                                    <div class="property-content">
                                        <div>
                                            <span class="city d-block mb-3">{{ $a->title }}</span>

                                            {{-- @php
                                                use Illuminate\Support\Str;
                                            @endphp --}}

                                            <div class="specs d-flex mb-4">
                                                <span class="d-block d-flex align-items-center me-3">
                                                    <span class="caption">
                                                        {{ Str::words(strip_tags($a->deskripsi), '...') }}
                                                    </span>
                                                </span>
                                            </div>


                                            <a href="/detail-articles/{{ $a->id }}"
                                                class="btn btn-primary py-2 px-3">See
                                                details</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div id="property-nav" class="controls" tabindex="0" aria-label="Carousel Navigation">
                            <span class="prev" data-controls="prev" aria-controls="property"
                                tabindex="-1">Prev</span>
                            <span class="next" data-controls="next" aria-controls="property"
                                tabindex="-1">Next</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="features-1 abu">
        <div class="container">
            <div class="row">
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="box-feature">
                        <span class="flaticon-house"></span>
                        <h3 class="mb-3"></h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Voluptates, accusamus.
                        </p>
                        <p><a href="#" class="learn-more">Learn More</a></p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                    <div class="box-feature">
                        <span class="flaticon-building"></span>
                        <h3 class="mb-3">Sect 2</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Voluptates, accusamus.
                        </p>
                        <p><a href="#" class="learn-more">Learn More</a></p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="box-feature">
                        <span class="flaticon-house-3"></span>
                        <h3 class="mb-3">Sect 3</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Voluptates, accusamus.
                        </p>
                        <p><a href="#" class="learn-more">Learn More</a></p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                    <div class="box-feature">
                        <span class="flaticon-house-1"></span>
                        <h3 class="mb-3">Sect 4</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Voluptates, accusamus.
                        </p>
                        <p><a href="#" class="learn-more">Learn More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <div class="section sec-testimonials">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-md-6">
                    <h2 class="font-weight-bold heading text-primary mb-4 mb-md-0">
                        Customer Says
                    </h2>
                </div>
                <div class="col-md-6 text-md-end">
                    <div id="testimonial-nav">
                        <span class="prev" data-controls="prev">Prev</span>

                        <span class="next" data-controls="next">Next</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4"></div>
            </div>
            <div class="testimonial-slider-wrap">
                <div class="testimonial-slider">
                    @foreach ($testimoni as $t)
                        <div class="item">
                            <div class="testimonial">
                                <img src="{{ $t->image }}" alt="Image"
                                    class="img-fluid rounded-circle w-25 mb-4" />
                                <div class="rate">
                                    @for ($i = 0; $i < $t->rating; $i++)
                                        <span class="icon-star text-warning"></span>
                                    @endfor
                                </div>
                                <h3 class="h5 text-primary mb-4">{{ $t->name }}</h3>
                                <blockquote>
                                    <p>
                                        &ldquo;{{ $t->message }}&rdquo;
                                    </p>
                                </blockquote>
                                <p class="text-black-50">{{ $t->jabatan }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div> --}}

    <div class="section abu section-4">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-5">
                    <h2 class="font-weight-bold heading text-primary mb-4">
                        Mari kita mencari hunian yang sempurna untukmu
                    </h2>
                    <p class="text-black-50">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam
                        enim pariatur similique debitis vel nisi qui reprehenderit.
                    </p>
                </div>
            </div>
            <div class="row justify-content-between mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0 order-lg-2">
                    <div class="img-about dots">
                        <img src="assets/images/hero_bg_3.jpg" alt="Image" class="img-fluid" />
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center">
                    <p class="text-black-50" style="font-size: 24px;">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum iste. Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Nostrum iste. Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Nostrum iste.
                    </p>
                </div>
            </div>
            <div class="flex justify-center mt-10">
                <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="mb-5">
                        <div class="counter-wrap mb-5 mb-lg-0">
                            <span class="block text-4xl font-bold text-primary countup number"
                                style="font-size: 64px;">{{ number_format($totalVisitors) }}</span>
                            <span class="caption text-gray-500" style="font-size: 24px;">VISITOR</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section abu">
        <div class="row justify-content-center footer-cta" data-aos="fade-up">
            <div class="col-lg-7 mx-auto text-center">
                <h2 class="mb-4">Jadilah bagian dari kami</h2>
                <p>
                    <a href="#" target="_blank" class="btn btn-primary text-white py-3 px-4">tanyakan</a>
                </p>
            </div>
            <!-- /.col-lg-7 -->
        </div>
        <!-- /.row -->
    </div>
</x-HomeLayout>
