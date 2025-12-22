@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show container mt-4" role="alert" style="border-radius: 10px;">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<section id="event" class="container-xxl py-5">
    </section>
<section id="event" class="container-xxl py-5">
<div class="container py-5">
        <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <div class="d-inline-flex align-items-center mb-3">
                <div style="width: 40px; height: 2px; background-color: #fbb034;"></div>
                <p class="text-uppercase fw-bold mb-0 mx-3" style="color: #fbb034; letter-spacing: 2px;">Event</p>
                <div style="width: 40px; height: 2px; background-color: #fbb034;"></div>
            </div>
            <h1 class="display-6 fw-bold">Be a Part of a Global Movement</h1>
        </div>
        <div class="row g-4">
            @php
                $events = [
                    ['id' => 1, 'title' => 'Education Program', 'img' => 'event-1.jpg', 'cat' => 'FIELD WORK', 'reg' => '12/20'],
                    ['id' => 2, 'title' => 'Health Program', 'img' => 'event-2.jpg', 'cat' => 'HEALTH CARE', 'reg' => '8/15'],
                    ['id' => 3, 'title' => 'Awareness Program', 'img' => 'event-3.jpg', 'cat' => 'CAMPAIGN', 'reg' => '5/10'],
                ];
            @endphp

            @foreach($events as $event)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
                    <div class="position-relative">
                        <img src="{{ asset('asset-landing/img/' . $event['img']) }}" class="img-fluid w-100" style="height: 220px; object-fit: cover;">
                        <span class="position-absolute top-0 start-0 m-3 px-3 py-1 fw-bold text-white small" 
                              style="background: #126d61; border-radius: 5px;">{{ $event['cat'] }}</span>
                    </div>

                    <div class="card-body p-4 d-flex flex-column">
                        <h4 class="fw-bold mb-3">{{ $event['title'] }}</h4>
                        <p class="text-muted small mb-2">Membantu anak-anak di pedalaman mendapatkan akses buku dan alat tulis layak.</p>
                        
                        <p class="small fw-bold mb-4" style="color: #126d61;">{{ $event['reg'] }} Relawan Terdaftar</p>

                        <div class="mt-auto d-grid gap-2">
                            <a href="{{ route('relawan.daftar', $event['id']) }}" class="btn fw-bold text-white" 
                               style="background-color: #fbb034; border-radius: 8px; padding: 10px; border: none; text-decoration: none; text-align: center;">
                                Daftar Relawan
                            </a>
                            
                            <a href="{{ route('donasi.create') }}" class="btn fw-bold" 
                               style="border: 1px solid #126d61; color: #126d61; border-radius: 8px; padding: 10px; background: transparent; text-decoration: none; text-align: center;">
                                Donasi Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>