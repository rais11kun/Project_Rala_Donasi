<section id="donasi" class="container-xxl py-5">
    <div class="container py-5">
        <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <div class="d-inline-flex align-items-center mb-3">
                <div style="width: 40px; height: 2px; background-color: #fbb034;"></div>
                <p class="text-uppercase fw-bold mb-0 mx-3" style="color: #fbb034; letter-spacing: 2px;">Donation</p>
                <div style="width: 40px; height: 2px; background-color: #fbb034;"></div>
            </div>
            <h1 class="display-6 mb-5 fw-bold" style="color: #1a1a1a;">Our Donation Causes Around the World</h1>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="donation-item d-flex h-100 p-4 shadow-sm border-0" style="background: #fff; border-radius: 15px;">
                    <div class="donation-progress d-flex flex-column flex-shrink-0 text-center me-4">
                        <h6 class="mb-0 small fw-bold text-muted">Raised</h6>
                        <span class="mb-2 fw-bold text-dark">$8000</span>
                        <div class="progress d-flex align-items-end w-100 h-100 mb-2" style="background: #f0f0f0; border-radius: 5px; width: 40px !important;">
                            <div class="progress-bar w-100" role="progressbar" style="height: 85%; background-color: #126d61;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                <span class="small fw-bold text-white" style="font-size: 10px;">85%</span>
                            </div>
                        </div>
                        <h6 class="mb-0 small fw-bold text-muted">Goal</h6>
                        <span class="fw-bold text-dark">$10000</span>
                    </div>
                    <div class="donation-detail w-100">
                        <div class="position-relative mb-3 overflow-hidden" style="border-radius: 10px;">
                            <img class="img-fluid w-100" src="{{ asset('asset-landing/img/donation-1.jpg') }}" alt="Food">
                            <span class="btn-sm px-3 position-absolute top-0 end-0 m-2 text-white" style="background-color: #126d61; border-radius: 5px; font-size: 12px;">Food</span>
                        </div>
                        <h4 class="mb-3 fw-bold">Healthy Food</h4>
                        <p class="text-muted small">Membantu menyediakan makanan bergizi bagi anak-anak di komunitas yang membutuhkan.</p>
                        {{-- Tombol dengan parameter Kategori --}}
                        <a href="{{ url('/donasi/food') }}" class="btn w-100 py-3 fw-bold" style="background-color: #fbb034; color: #1a1a1a; border-radius: 10px; border: none;">
                            Donate Now
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="donation-item d-flex h-100 p-4 shadow-sm border-0" style="background: #fff; border-radius: 15px;">
                    <div class="donation-progress d-flex flex-column flex-shrink-0 text-center me-4">
                        <h6 class="mb-0 small fw-bold text-muted">Raised</h6>
                        <span class="mb-2 fw-bold text-dark">$8000</span>
                        <div class="progress d-flex align-items-end w-100 h-100 mb-2" style="background: #f0f0f0; border-radius: 5px; width: 40px !important;">
                            <div class="progress-bar w-100" role="progressbar" style="height: 95%; background-color: #126d61;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                                <span class="small fw-bold text-white" style="font-size: 10px;">95%</span>
                            </div>
                        </div>
                        <h6 class="mb-0 small fw-bold text-muted">Goal</h6>
                        <span class="fw-bold text-dark">$10000</span>
                    </div>
                    <div class="donation-detail w-100">
                        <div class="position-relative mb-3 overflow-hidden" style="border-radius: 10px;">
                            <img class="img-fluid w-100" src="{{ asset('asset-landing/img/donation-2.jpg') }}" alt="Health">
                            <span class="btn-sm px-3 position-absolute top-0 end-0 m-2 text-white" style="background-color: #126d61; border-radius: 5px; font-size: 12px;">Health</span>
                        </div>
                        <h4 class="mb-3 fw-bold">Water Treatment</h4>
                        <p class="text-muted small">Menyediakan akses air bersih dan sistem sanitasi yang layak untuk kesehatan keluarga.</p>
                        <a href="{{ url('/donasi/health') }}" class="btn w-100 py-3 fw-bold" style="background-color: #fbb034; color: #1a1a1a; border-radius: 10px; border: none;">
                            Donate Now
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="donation-item d-flex h-100 p-4 shadow-sm border-0" style="background: #fff; border-radius: 15px;">
                    <div class="donation-progress d-flex flex-column flex-shrink-0 text-center me-4">
                        <h6 class="mb-0 small fw-bold text-muted">Raised</h6>
                        <span class="mb-2 fw-bold text-dark">$8000</span>
                        <div class="progress d-flex align-items-end w-100 h-100 mb-2" style="background: #f0f0f0; border-radius: 5px; width: 40px !important;">
                            <div class="progress-bar w-100" role="progressbar" style="height: 75%; background-color: #126d61;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                <span class="small fw-bold text-white" style="font-size: 10px;">75%</span>
                            </div>
                        </div>
                        <h6 class="mb-0 small fw-bold text-muted">Goal</h6>
                        <span class="fw-bold text-dark">$10000</span>
                    </div>
                    <div class="donation-detail w-100">
                        <div class="position-relative mb-3 overflow-hidden" style="border-radius: 10px;">
                            <img class="img-fluid w-100" src="{{ asset('asset-landing/img/donation-3.jpg') }}" alt="Education">
                            <span class="btn-sm px-3 position-absolute top-0 end-0 m-2 text-white" style="background-color: #126d61; border-radius: 5px; font-size: 12px;">Education</span>
                        </div>
                        <h4 class="mb-3 fw-bold">Education Support</h4>
                        <p class="text-muted small">Memberikan beasiswa dan peralatan sekolah untuk masa depan yang lebih cerah.</p>
                        <a href="{{ url('/donasi/education') }}" class="btn w-100 py-3 fw-bold" style="background-color: #fbb034; color: #1a1a1a; border-radius: 10px; border: none;">
                            Donate Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>