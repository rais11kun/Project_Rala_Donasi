<section id="about" class="container-xxl py-5" style="background-color: #ffffff;">  
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="position-relative">
                    <img class="img-fluid w-100 shadow-sm" src="{{ asset('asset-landing/img/about.jpg') }}" 
                         alt="About Us" style="border-radius: 2px;">
                    </div>
            </div>

            <div class="col-lg-6">
                <div class="ps-lg-4">
                    <div class="d-flex align-items-center mb-3">
                        <span class="text-uppercase fw-bold small" style="color: #fbb034; letter-spacing: 2px;">About Us</span>
                        <div class="ms-3" style="width: 50px; height: 2px; background-color: #fbb034;"></div>
                    </div>

                    <h1 class="display-6 mb-4 fw-bold" style="color: #1a1a1a;">Join Hands, Change the World</h1>
                    
                    <p class="mb-4 text-muted">
                        Setiap uluran tangan yang diberikan dengan ketulusan membawa kita lebih dekat ke dunia yang bebas dari penderitaan. Jadilah bagian dari gerakan global untuk masa depan yang lebih baik.
                    </p>
                    
                    <div class="row g-4 pt-2">
                        <div class="col-sm-6">
                            <h4 class="fw-bold mb-3" style="color: #126d61;">Our Mission</h4>
                            <p class="small mb-3">Misi kami adalah mengangkat komunitas yang kurang beruntung melalui sumber daya dan pendidikan.</p>
                            
                            <div class="d-flex align-items-center mb-2">
                                <i class="fa fa-check me-2" style="color: #126d61;"></i>
                                <span class="small fw-bold">Ketahanan Pangan</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fa fa-check me-2" style="color: #126d61;"></i>
                                <span class="small fw-bold">Kasih Sayang & Dukungan</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fa fa-check me-2" style="color: #126d61;"></i>
                                <span class="small fw-bold">Mengubah Masa Depan</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="h-100 p-4 text-center d-flex flex-column justify-content-center align-items-center" 
                                 style="background-color: #fbb034; border-radius: 4px;">
                                <p class="fw-bold text-dark mb-4" style="line-height: 1.5;">
                                    "Melalui donasi Anda, kita menebarkan kebaikan bagi mereka."
                                </p>
                                <a class="btn py-2 px-4 shadow-sm" 
                                   href="{{ route('donasi.create') }}" 
                                   style="background-color: #126d61; color: white; border: none; font-weight: 700; text-uppercase: uppercase; font-size: 13px;">
                                   Donate Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>