<section id="contact" class="py-5" style="background-color: #f8f9fa;">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <div class="d-inline-block px-4 py-1 mb-3" style="background: rgba(18, 109, 97, 0.1); color: #126d61; border-radius: 50px; font-weight: 700;">
                HUBUNGI KAMI
            </div>
            <h1 class="display-5 mb-4 fw-bold" style="color: #2c3e50;">Ada Pertanyaan? Kirimkan Pesan kepada Kami</h1>
        </div>
        
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <div class="bg-white h-100 p-5 shadow-sm" style="border-radius: 20px;">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-shrink-0 btn-square rounded-circle" style="width: 50px; height: 50px; background-color: #fbb034; display: flex; align-items: center; justify-content: center;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 style="color: #126d61;">Alamat</h5>
                            <p class="mb-0 text-muted">Jl. Raya GIVEHOPE No. 123, Jakarta</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-shrink-0 btn-square rounded-circle" style="width: 50px; height: 50px; background-color: #126d61; display: flex; align-items: center; justify-content: center;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 style="color: #126d61;">Telepon</h5>
                            <p class="mb-0 text-muted">+012 345 67890</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-0">
                        <div class="flex-shrink-0 btn-square rounded-circle" style="width: 50px; height: 50px; background-color: #fbb034; display: flex; align-items: center; justify-content: center;">
                            <i class="fa fa-envelope text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 style="color: #126d61;">Email</h5>
                            <p class="mb-0 text-muted">info@givehope.org</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-6">
                <div class="bg-white p-5 shadow-sm" style="border-radius: 20px;">
                    <form action="#" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0 bg-light shadow-none" id="name" placeholder="Nama Anda" style="border-radius: 10px;">
                                    <label for="name">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control border-0 bg-light shadow-none" id="email" placeholder="Email Anda" style="border-radius: 10px;">
                                    <label for="email">Alamat Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0 bg-light shadow-none" id="subject" placeholder="Subjek" style="border-radius: 10px;">
                                    <label for="subject">Subjek</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control border-0 bg-light shadow-none" placeholder="Tuliskan pesan Anda di sini" id="message" style="height: 150px; border-radius: 10px;"></textarea>
                                    <label for="message">Pesan Anda</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn w-100 py-3 fw-bold text-white shadow-sm" type="submit" 
                                    style="background-color: #fbb034; border-radius: 10px; transition: 0.3s; border: none;">
                                    KIRIM PESAN SEKARANG
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
    #contact .form-control:focus {
        background-color: #fff !important;
        border: 1px solid #126d61 !important;
    }
    #contact .btn:hover {
        background-color: #e69d2a !important;
        transform: translateY(-2px);
    }
</style>