<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<section id="contact" class="py-5" style="background-color: #fdfaf5;">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <div class="d-inline-block px-4 py-1 mb-3 shadow-sm" style="background: white; color: #126d61; border-radius: 50px; font-weight: 800; font-size: 0.75rem; letter-spacing: 2px; border: 1px solid rgba(18, 109, 97, 0.2);">
                HUBUNGI KAMI
            </div>
            <h1 class="display-5 mb-4 fw-bold" style="color: #1a1a1a; letter-spacing: -1px;">Ada Pertanyaan? <br><span style="color: #126d61;">Kirimkan Pesan</span> kepada Kami</h1>
            <p class="text-muted">Tim kami siap membantu Anda 24/7. Jangan ragu untuk menyapa!</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="bg-white h-100 p-4 p-xl-5 shadow-sm border-0" style="border-radius: 30px;">
                    <div class="contact-info-item d-flex align-items-center mb-4 p-3 rounded-4">
                        <div class="flex-shrink-0 rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 55px; height: 55px; background-color: #fbb034;">
                            <i class="fa fa-map-marker-alt text-white fs-5"></i>
                        </div>
                        <div class="ms-4">
                            <h6 class="fw-bold mb-1" style="color: #126d61; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px;">Alamat</h6>
                            <p class="mb-0 text-muted small">Jl. Raya GIVEHOPE No. 123, Jakarta</p>
                        </div>
                    </div>

                    <div class="contact-info-item d-flex align-items-center mb-4 p-3 rounded-4">
                        <div class="flex-shrink-0 rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 55px; height: 55px; background-color: #126d61;">
                            <i class="fa fa-phone-alt text-white fs-5"></i>
                        </div>
                        <div class="ms-4">
                            <h6 class="fw-bold mb-1" style="color: #126d61; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px;">Telepon</h6>
                            <p class="mb-0 text-muted small">+012 345 67890</p>
                        </div>
                    </div>

                    <div class="contact-info-item d-flex align-items-center p-3 rounded-4">
                        <div class="flex-shrink-0 rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 55px; height: 55px; background-color: #fbb034;">
                            <i class="fa fa-envelope text-white fs-5"></i>
                        </div>
                        <div class="ms-4">
                            <h6 class="fw-bold mb-1" style="color: #126d61; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px;">Email</h6>
                            <p class="mb-0 text-muted small">info@givehope.org</p>
                        </div>
                    </div>

                    <hr class="my-5 opacity-25">
                    
                    <div class="social-links d-flex gap-2">
                        <a href="#" class="btn btn-light rounded-circle shadow-sm"><i class="fab fa-facebook-f text-primary"></i></a>
                        <a href="#" class="btn btn-light rounded-circle shadow-sm"><i class="fab fa-instagram text-danger"></i></a>
                        <a href="#" class="btn btn-light rounded-circle shadow-sm"><i class="fab fa-whatsapp text-success"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="bg-white p-4 p-xl-5 shadow-sm border-0" style="border-radius: 30px;">
                    <form action="{{ route('contact.send') }}" method="POST" id="contactForm">
                        @csrf 
                        <div class="row g-3">
                            <div class="col-md-6 mb-2">
                                <label class="small fw-bold mb-2 text-muted">Nama Anda</label>
                                <input type="text" name="name" class="form-control custom-input" placeholder="Masukkan nama..." required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="small fw-bold mb-2 text-muted">Alamat Email</label>
                                <input type="email" name="email" class="form-control custom-input" placeholder="email@contoh.com" required>
                            </div>
                            <div class="col-12 mb-2">
                                <label class="small fw-bold mb-2 text-muted">Subjek</label>
                                <input type="text" name="subject" class="form-control custom-input" placeholder="Apa yang ingin Anda tanyakan?" required>
                            </div>
                            <div class="col-12 mb-4">
                                <label class="small fw-bold mb-2 text-muted">Pesan</label>
                                <textarea name="message" class="form-control custom-input" rows="5" placeholder="Tulis pesan lengkap di sini..." required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-submit-contact shadow" id="btnSubmit">
                                    <span class="btn-text">KIRIM PESAN SEKARANG <i class="fa fa-paper-plane ms-2"></i></span>
                                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .custom-input {
        background-color: #f8f9fa !important;
        border: 2px solid transparent !important;
        border-radius: 15px !important;
        padding: 12px 20px !important;
        transition: all 0.3s ease !important;
        font-size: 0.95rem;
    }
    .custom-input:focus {
        background-color: #fff !important;
        border-color: #fbb034 !important;
        box-shadow: 0 10px 20px rgba(251, 176, 52, 0.1) !important;
    }
    .btn-submit-contact {
        background: linear-gradient(45deg, #fbb034, #ffc107);
        border: none; padding: 18px; border-radius: 15px;
        font-weight: 800; color: white; width: 100%;
        transition: all 0.3s ease; text-transform: uppercase; letter-spacing: 1px;
    }
    .btn-submit-contact:hover { transform: translateY(-3px); box-shadow: 0 15px 30px rgba(251, 176, 52, 0.3) !important; color: white; }
    .contact-info-item { transition: all 0.3s ease; border: 1px solid transparent; }
    .contact-info-item:hover { background: #fdfaf5; border-color: rgba(251, 176, 52, 0.3); transform: translateX(10px); }
</style>

<script>
    // 1. Notifikasi Toast (Mengambang di pojok)
    @if(session('contact_success'))
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end', // Muncul di pojok kanan atas
          showConfirmButton: false,
          timer: 4000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

        Toast.fire({
          icon: 'success',
          title: '{{ session("contact_success") }}'
        })
    @endif

    // 2. Efek Loading saat tombol diklik
    document.getElementById('contactForm').addEventListener('submit', function() {
        const btn = document.getElementById('btnSubmit');
        btn.disabled = true;
        btn.querySelector('.btn-text').innerText = 'Sedang Mengirim...';
        btn.querySelector('.spinner-border').classList.remove('d-none');
    });
</script>