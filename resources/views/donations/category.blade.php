<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Donasi - {{ $category->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 antialiased">

    <header class="bg-white border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex justify-between items-center">
                <h2 class="font-bold text-xl text-gray-800 tracking-tight">
                    Konfirmasi Donasi
                </h2>
                <a href="/" class="text-sm font-semibold bg-gray-100 hover:bg-gray-200 text-gray-600 py-2.5 px-5 rounded-xl transition-all">
                    ← Kembali ke Beranda
                </a>
            </div>
        </div>
    </header>

    <main class="py-12 px-4">
        <div class="max-w-4xl mx-auto">
            
            @if(session('success'))
            <div class="mb-8 p-5 bg-green-50 border-l-4 border-green-500 text-green-800 shadow-sm rounded-r-2xl flex justify-between items-center animate-bounce-in" id="notification">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <div>
                        <p class="font-bold">Berhasil Terkirim!</p>
                        <p class="text-sm opacity-90">{{ session('success') }}</p>
                    </div>
                </div>
                <button onclick="document.getElementById('notification').remove()" class="text-green-800 hover:bg-green-100 p-2 rounded-lg transition">&times;</button>
            </div>
            @endif

            <div class="bg-white shadow-xl shadow-gray-200/50 rounded-3xl p-6 sm:p-10 border border-gray-100">
                
                <div class="flex flex-col sm:flex-row items-center bg-blue-50/50 p-6 rounded-2xl mb-10 border border-blue-100">
                    <img src="{{ asset('asset-landing/img/' . $category->image) }}" 
                         class="w-24 h-24 sm:w-28 sm:h-28 rounded-2xl object-cover shadow-lg border-4 border-white">
                    <div class="mt-4 sm:mt-0 sm:ml-6 text-center sm:text-left">
                        <p class="text-blue-600 text-xs font-extrabold uppercase tracking-[0.2em] mb-1">{{ $category->label }}</p>
                        <h3 class="text-2xl font-extrabold text-gray-800 leading-tight">Program: {{ $category->name }}</h3>
                    </div>
                </div>

                <form action="{{ route('donation.store') }}" method="POST" class="space-y-8">
                    @csrf
                    <input type="hidden" name="category_id" value="{{ $category->id }}">

                    <div>
                        <label class="block font-bold text-gray-800 mb-4 text-lg">Pilih Nominal Donasi</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach([10000, 50000, 100000, 200000] as $amt)
                            <label class="cursor-pointer group">
                                <input type="radio" name="amount" value="{{ $amt }}" class="peer hidden">
                                <div class="border-2 border-gray-100 rounded-2xl p-4 text-center font-bold text-gray-500 peer-checked:border-green-500 peer-checked:bg-green-50 peer-checked:text-green-700 hover:border-green-200 hover:bg-gray-50 transition-all duration-200">
                                    <span class="block text-xs opacity-60 mb-1">IDR</span>
                                    Rp {{ number_format($amt, 0, ',', '.') }}
                                </div>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100">
                        <label class="block font-bold text-gray-800 mb-3 text-base">Atau Masukkan Nominal Sendiri</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-5 flex items-center text-gray-400 font-bold text-lg">Rp</span>
                            <input type="number" name="manual_amount" 
                                   class="block w-full pl-14 pr-5 py-4 bg-white border border-gray-200 rounded-2xl focus:ring-4 focus:ring-green-500/10 focus:border-green-500 outline-none text-xl font-bold transition-all" 
                                   placeholder="Contoh: 25000">
                        </div>
                    </div>

                    <hr class="border-gray-100">

                    <div class="text-center p-8 border-2 border-dashed border-gray-200 rounded-3xl bg-white relative overflow-hidden">
                        <div class="absolute top-0 right-0 bg-yellow-400 text-[10px] font-black px-3 py-1 rounded-bl-xl uppercase tracking-widest">Metode QRIS</div>
                        
                        <h4 class="font-extrabold text-gray-800 mb-6 text-sm uppercase tracking-[0.2em]">Scan QRIS di Bawah Ini</h4>
                        
                        <div class="relative inline-block p-4 bg-white border border-gray-100 rounded-3xl shadow-inner">
                            <img src="{{ asset('asset-landing/img/qris-yayasan.png.jpg') }}" 
                                 alt="QRIS YAYASAN" 
                                 class="mx-auto w-64 h-auto rounded-lg"
                                 onerror="this.src='https://placehold.co/400x500?text=QR+Code+Not+Found'">
                        </div>
                        
                        <div class="mt-6">
                            <p class="text-xs font-black text-gray-400 uppercase tracking-widest">Nama Merchant:</p>
                            <p class="text-sm font-bold text-gray-700">YAYASAN GIVEHOPE INDONESIA</p>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-extrabold py-5 rounded-2xl shadow-lg shadow-yellow-500/30 transition-all transform active:scale-[0.98] hover:scale-[1.01] uppercase tracking-[0.15em] text-sm">
                        Saya Sudah Transfer & Konfirmasi
                    </button>
                    
                    <p class="text-center text-gray-400 text-xs font-medium">
                        *Data donasi Anda akan diproses secara otomatis oleh sistem kami.
                    </p>
                </form>

            </div>
        </div>
    </main>

    <footer class="py-10 text-center text-gray-400 text-sm">
        &copy; {{ date('Y') }} Yayasan Givehope Indonesia. Seluruh Hak Cipta Dilindungi.
    </footer>

</body>
</html>