<section id="event" class="container-xxl py-5" style="background-color: #f8f9fa;">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <div class="d-inline-flex align-items-center mb-2">
                <div style="width: 40px; height: 2px; background-color: #fbb034;"></div>
                <p class="text-uppercase fw-bold mb-0 mx-3" style="color: #126d61;">Events</p>
                <div style="width: 40px; height: 2px; background-color: #fbb034;"></div>
            </div>
            <h1 class="display-6 fw-bold">Be a Part of a Global Movement</h1>
        </div>

        <div class="row g-4">
            @php
                $events = [
                    ['title' => 'Education Program', 'img' => 'event-1.jpg', 'cat' => 'FIELD WORK', 'color' => '#126d61'],
                    ['title' => 'Health Care Program', 'img' => 'event-2.jpg', 'cat' => 'HEALTH', 'color' => '#c06c6c'],
                    ['title' => 'Awareness Program', 'img' => 'event-3.jpg', 'cat' => 'CAMPAIGN', 'color' => '#126d61']
                ];
            @endphp

            @foreach($events as $event)
            <div class="col-md-6 col-lg-4">
                <div class="event-item h-100 shadow-sm border-0 bg-white" style="border-radius: 15px; overflow: hidden;">
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="{{ asset('asset-landing/img/' . $event['img']) }}" alt="{{ $event['title'] }}" style="height: 220px; object-fit: cover;">
                        <span class="position-absolute top-0 start-0 m-3 px-3 py-1 fw-bold text-white small" 
                              style="background: {{ $event['color'] }}; border-radius: 5px;">{{ $event['cat'] }}</span>
                    </div>

                    <div class="p-4">
                        <h4 class="fw-bold mb-3">{{ $event['title'] }}</h4>
                        <p class="text-muted small mb-4">Membantu sesama melalui aksi nyata bersama tim relawan GIVEHOPE di lapangan.</p>
                        
                        <div class="mb-4 small text-muted">
                            <div class="mb-2"><i class="fa fa-calendar-alt me-2"></i>Jan 01 - Jan 10, 2025</div>
                            <div class="fw-bold" style="color: #126d61;"><i class="fa fa-users me-2"></i>12/20 Relawan Terdaftar</div>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn fw-bold text-white py-2" 
                                    style="background-color: #fbb034; border-radius: 8px; border: none;"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#volunteerModal">
                                Daftar Relawan
                            </button>
                            
                            <a href="{{ url('/donasi') }}" class="btn fw-bold py-2" 
                               style="border: 1px solid #126d61; color: #126d61; border-radius: 8px; background: transparent;">
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