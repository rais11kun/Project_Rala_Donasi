<style>
    .donation-item {
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.05);
        overflow: hidden;
    }

    .donation-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }

    .img-container {
        height: 200px;
        overflow: hidden;
        position: relative;
    }

    .img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .donation-item:hover .img-container img {
        transform: scale(1.1);
    }

    .custom-progress-container {
        width: 12px;
        background: #f0f0f0;
        border-radius: 10px;
        height: 100%;
        position: relative;
        margin: 0 auto;
    }

    .custom-progress-bar {
        width: 100%;
        border-radius: 10px;
        background: linear-gradient(to top, #126d61, #1abc9c);
        position: absolute;
        bottom: 0;
        transition: height 1s ease-in-out;
    }

    .btn-donate {
        background: #fbb034;
        color: #fff;
        font-weight: 700;
        border: none;
        border-radius: 8px;
        transition: all 0.3s;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-donate:hover {
        background: #e69a1f;
        color: #fff;
        box-shadow: 0 5px 15px rgba(251, 176, 52, 0.4);
    }

    .category-badge {
        backdrop-filter: blur(5px);
        background: rgba(18, 109, 97, 0.8) !important;
        font-size: 11px;
        font-weight: 600;
    }
</style>

<section id="donasi" class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <div class="d-inline-flex align-items-center mb-3">
                <div style="width: 50px; height: 3px; background-color: #fbb034; border-radius: 10px;"></div>
                <p class="text-uppercase fw-bold mb-0 mx-3" style="color: #fbb034; letter-spacing: 3px;">Donation</p>
                <div style="width: 50px; height: 3px; background-color: #fbb034; border-radius: 10px;"></div>
            </div>
            <h1 class="display-5 mb-5 fw-bold" style="color: #1a1a1a;">Mari Berbagi Kebaikan</h1>
        </div>

        <div class="row g-4">
            @foreach($categories as $cat)
                @php
                    $percent = ($cat->goal > 0) ? ($cat->raised / $cat->goal) * 100 : 0;
                    $displayPercent = ($percent > 100) ? 100 : $percent;
                @endphp

                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="donation-item d-flex h-100 p-3 bg-white rounded-4 shadow-sm">
                        
                        <div class="d-flex flex-column align-items-center me-3 py-2" style="width: 50px;">
                            <span class="small text-muted fw-bold mb-1" style="font-size: 10px;">Goal</span>
                            <div class="custom-progress-container">
                                <div class="custom-progress-bar" style="height: {{ $displayPercent }}%;">
                                    <div class="position-absolute w-100 text-center" style="bottom: 5px;">
                                        <span class="text-white fw-bold" style="font-size: 9px;">{{ round($percent) }}%</span>
                                    </div>
                                </div>
                            </div>
                            <span class="small text-muted fw-bold mt-1" style="font-size: 10px;">Raised</span>
                        </div>

                        <div class="flex-grow-1 d-flex flex-column">
                            <div class="img-container rounded-3 mb-3">
                                <img src="{{ asset('asset-landing/img/' . $cat->image) }}" alt="{{ $cat->name }}">
                                <span class="badge category-badge position-absolute top-0 end-0 m-2 px-3 py-2">
                                    {{ $cat->label }}
                                </span>
                            </div>

                            <div class="mb-3">
                                <h5 class="fw-bold mb-2">{{ $cat->name }}</h5>
                                <p class="text-muted small line-clamp-2" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                    {{ $cat->description }}
                                </p>
                            </div>

                            <div class="mt-auto">
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="text-start">
                                        <p class="mb-0 small text-muted">Terkumpul</p>
                                        <span class="fw-bold text-dark">${{ number_format($cat->raised) }}</span>
                                    </div>
                                    <div class="text-end">
                                        <p class="mb-0 small text-muted">Target</p>
                                        <span class="fw-bold text-primary">${{ number_format($cat->goal) }}</span>
                                    </div>
                                </div>
                                <a href="{{ route('donation.checkout', $cat->id) }}" class="btn btn-donate w-100 py-2">
                                    <i class="fas fa-heart me-2"></i>Donate Now
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>