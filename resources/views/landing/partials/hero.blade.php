<section id="home">
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel py-5" style="background-color: #fdfaf5;"> {{-- Warna latar krem sesuai gambar --}}
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="carousel-text">
                            <h1 class="display-1 text-uppercase mb-3 fw-bold" style="color: #1a1a1a;">Together for a Better Tomorrow</h1>
                            <p class="fs-5 mb-5 text-muted">We believe in creating opportunities and empowering communities through
                                education, healthcare, and sustainable development.</p>
                            <div class="d-flex">
                                {{-- Tombol Donasi mengarah ke route create --}}
                                <a class="btn py-3 px-5 me-3 fw-bold text-white shadow-sm" 
                                   href="{{ route('donasi.create') }}" 
                                   style="background-color: #fbb034; border: none; border-radius: 5px; transition: 0.3s;">
                                   Donate Now
                                </a>
                                
                                {{-- Tombol Join Us (bisa diarahkan ke register atau kontak) --}}
                                <a class="btn py-3 px-5 fw-bold text-white shadow-sm" 
                                   href="{{ route('register') }}" 
                                   style="background-color: #126d61; border: none; border-radius: 5px; transition: 0.3s;">
                                   Join Us Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="carousel-img">
                            <img class="w-100 shadow-lg" src="{{ asset('asset-landing/img/carousel-1.jpg') }}" 
                                 alt="Hero Image" style="border-radius: 15px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>