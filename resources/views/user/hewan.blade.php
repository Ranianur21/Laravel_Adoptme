<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css') 
    <title>Hewan untuk Adopsi</title>

    <style>
        .active-filter {
            background-color: #d9a36a !important;
            color: white !important;
        }
        #loginModal {
            transition: opacity 0.3s ease;
        }
    </style>
</head>

{{-- Menggunakan X-component Laravel untuk navbar --}}
<x-navbar></x-navbar>

<body class="bg-white text-gray-900">

<header class="bg-white shadow-md py-10 text-[#8b5e34] text-center">
    <h1 class="text-4xl font-bold">Temukan Sahabat Barumu</h1>
    <p class="mt-2 text-lg">Berikan mereka rumah yang penuh kasih 💕</p>
</header>

<section class="container mx-auto mt-12 text-center px-6">
    <h2 class="text-2xl font-semibold text-[#4a2c1f]">Filter Hewan</h2>
    <div class="flex justify-center gap-4 mt-4">
        <button class="filter-btn px-4 py-2 bg-[#8b5e34] text-white rounded-lg active-filter" data-filter="Semua">Semua</button>
        <button class="filter-btn px-4 py-2 bg-[#8b5e34] text-white rounded-lg" data-filter="Anjing">Anjing</button>
        <button class="filter-btn px-4 py-2 bg-[#8b5e34] text-white rounded-lg" data-filter="Kucing">Kucing</button>
        <button class="filter-btn px-4 py-2 bg-[#8b5e34] text-white rounded-lg" data-filter="Kelinci">Kelinci</button>
    </div>
</section>

<section class="container mx-auto py-12 text-center px-6">
    <h2 class="text-4xl font-bold text-[#4a2c1f] mb-6">Hewan yang Tersedia untuk Adopsi</h2>

    <div class="grid md:grid-cols-3 gap-6" id="hewan-list">
        {{-- Ini adalah placeholder. Anda perlu mengirim variabel $hewans dari controller. --}}
        {{-- Contoh struktur data $hewans:
        $hewans = [
            ['id' => 1, 'nama' => 'Max', 'jenis' => 'Anjing', 'jenis_kelamin' => 'Jantan', 'usia' => 2, 'deskripsi' => 'Anjing Golden Retriever yang ceria dan setia.', 'gambar' => 'max.jpg'],
            ['id' => 2, 'nama' => 'Momo', 'jenis' => 'Kucing', 'jenis_kelamin' => 'Betina', 'usia' => 1, 'deskripsi' => 'Kucing Persia yang lucu dan suka bermain.', 'gambar' => 'momo.jpg'],
            // ... data hewan lainnya
        ];
        --}}
        @foreach($hewans as $h)
            <div class="hewan-item bg-white p-6 border border-[#8b5e34] rounded-lg shadow-md flex flex-col justify-between h-full transition-transform duration-300 hover:scale-105" data-jenis="{{ $h['jenis'] }}">
                <div class="w-full h-56 flex items-center justify-center bg-white">
                    {{-- Sesuaikan path gambar ke folder `public/images` --}}
                    <img loading="lazy" src="{{ asset('images/' . $h['gambar']) }}" alt="Foto {{ $h['nama'] }}" class="w-full h-full object-contain rounded-md">
                </div>
                <h3 class="text-xl font-bold text-[#8b5e34] mt-3">{{ $h['nama'] }}</h3>
                <p class="mt-2 text-gray-600 text-sm">{{ $h['jenis_kelamin'] }}, {{ $h['usia'] }} tahun</p>
                {{-- Menggunakan nl2br untuk baris baru dari deskripsi --}}
                <p class="mt-2 text-gray-700 text-sm">{!! nl2br(e($h['deskripsi'])) !!}</p>
                <div class="flex justify-center space-x-4 mt-4">
                    {{-- Menggunakan Blade @auth dan @guest untuk cek status login --}}
                    @auth
                        <a href="{{ url('form_adopsi.php?hewan_id=' . $h['id']) }}" {{-- Jika Anda punya rute Laravel untuk ini, gunakan route() helper --}}
                           class="bg-[#8b5e34] text-white px-4 py-2 rounded-lg shadow-md hover:bg-[#6b3f21] transition duration-300">
                            Adopsi
                        </a>
                    @else {{-- Pengguna belum login --}}
                        <button onclick="showLoginModal()"
                                class="bg-[#8b5e34] text-white px-4 py-2 rounded-lg shadow-md hover:bg-[#6b3f21] transition duration-300">
                                Adopsi
                        </button>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
</section>

<section class="container mx-auto mt-8 px-6">
    <h2 class="text-3xl font-bold text-center text-[#4a2c1f] mb-6">Testimoni Pengadopsi</h2>

    <div class="bg-white p-6 rounded-lg shadow-md mb-4 border border-[#8b5e34]">
        <p class="text-gray-600 italic">"Saya selalu ingin memiliki kucing, tetapi ragu karena takut tidak bisa merawatnya dengan baik. Setelah mengadopsi Momo melalui AdoptMe, saya menyadari betapa menyenangkannya memiliki teman berbulu di rumah."</p>
        <p class="text-right text-sm font-semibold">- Naya, Pengadopsi Kucing Persia</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md mb-4 border border-[#8b5e34]">
        <p class="text-gray-600 italic">"Mengadopsi kelinci adalah keputusan terbaik yang pernah saya buat! Bubu sangat menggemaskan dan cepat beradaptasi di rumah."</p>
        <p class="text-right text-sm font-semibold">- Balqis, Pengadopsi Kelinci Holland Lop</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md border border-[#8b5e34]">
        <p class="text-gray-600 italic">"Saya mengadopsi Max, seekor anjing golden retriever, melalui AdoptMe satu tahun lalu. Awalnya dia pemalu dan takut dengan lingkungan baru, tetapi sekarang ceria dan setia."</p>
        <p class="text-right text-sm font-semibold">- Rania, Pengadopsi Anjing Golden Retriever</p>
    </div>
</section>

<section class="container mx-auto mt-12 px-6">
    <h2 class="text-3xl font-bold text-center text-[#4a2c1f] mb-6">Galeri Adopsi Berhasil</h2>

    <div class="flex flex-wrap justify-center gap-6">
        <div class="shadow-lg rounded-xl overflow-hidden w-40 h-40 flex items-center justify-center bg-white">
            <img src="{{ asset('images/a1.jpg') }}" alt="Adopsi 1" class="object-cover w-full h-full">
        </div>
        <div class="shadow-lg rounded-xl overflow-hidden w-40 h-40 flex items-center justify-center bg-white">
            <img src="{{ asset('images/ku.jpg') }}" alt="Adopsi 2" class="object-cover w-full h-full">
        </div>
        <div class="shadow-lg rounded-xl overflow-hidden w-40 h-40 flex items-center justify-center bg-white">
            <img src="{{ asset('images/K1.jpg') }}" alt="Adopsi 3" class="object-cover w-full h-full">
        </div>
        <div class="shadow-lg rounded-xl overflow-hidden w-40 h-40 flex items-center justify-center bg-white">
            <img src="{{ asset('images/momo.jpg') }}" alt="Adopsi 4" class="object-cover w-full h-full">
        </div>
        <div class="shadow-lg rounded-xl overflow-hidden w-40 h-40 flex items-center justify-center bg-white">
            <img src="{{ asset('images/bubu.jpg') }}" alt="Adopsi 5" class="object-cover w-full h-full">
        </div>
        <div class="shadow-lg rounded-xl overflow-hidden w-40 h-40 flex items-center justify-center bg-white">
            <img src="{{ asset('images/max.jpg') }}" alt="Adopsi 6" class="object-cover w-full h-full">
        </div>
        <div class="shadow-lg rounded-xl overflow-hidden w-40 h-40 flex items-center justify-center bg-white">
            <img src="{{ asset('images/luna.jpg') }}" alt="Adopsi 7" class="object-cover w-full h-full">
        </div>
        <div class="shadow-lg rounded-xl overflow-hidden w-40 h-40 flex items-center justify-center bg-white">
            <img src="{{ asset('images/rocky.jpg') }}" alt="Adopsi 8" class="object-cover w-full h-full">
        </div>
    </div>
</section>

<footer class="bg-[#4a2c1f] text-white py-6 text-center mt-12">
    <p>&copy; 2025 AdoptMe | Semua Hak Cipta Dilindungi</p>
</footer>

{{-- Gunakan urlencode untuk mengamankan nomor telepon --}}
<a href="https://wa.me/{{ urlencode('62812118001') }}" class="fixed bottom-6 right-6 bg-green-500 text-white px-4 py-2 rounded-full shadow-lg">
    Chat via WhatsApp
</a>

<div id="loginModal" class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50">
    <div class="bg-white p-8 rounded-lg w-96">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-[#8b5e34]">Login Diperlukan</h3>
            <button onclick="hideLoginModal()" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
        </div>
        <p class="mb-6">Anda harus login terlebih dahulu untuk mengadopsi hewan.</p>
        <div class="flex justify-end space-x-4">
            <button onclick="hideLoginModal()" class="px-4 py-2 border border-[#8b5e34] text-[#8b5e34] rounded hover:bg-gray-100 transition duration-300">Nanti</button>
            {{-- Menggunakan route() helper untuk login. Pastikan rute login Anda bernama 'login' --}}
            <a href="{{ route('login', ['redirect' => url()->current()]) }}" class="px-4 py-2 bg-[#8b5e34] text-white rounded hover:bg-[#6b3f21] transition duration-300">Login Sekarang</a>
        </div>
    </div>
</div>

{{-- Pastikan Anda memiliki script ini atau dienkapsulasi dalam file JS terpisah --}}
<script>
// Filter hewan
document.querySelectorAll('.filter-btn').forEach(button => {
    button.addEventListener('click', () => {
        const filter = button.dataset.filter;

        // Hapus class aktif dari semua tombol
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('active-filter');
        });

        // Tambahkan class aktif ke tombol yang dipilih
        button.classList.add('active-filter');

        // Tampilkan/saring hewan
        document.querySelectorAll('.hewan-item').forEach(item => {
            if (filter === 'Semua' || item.dataset.jenis === filter) {
                item.classList.remove('hidden');
            } else {
                item.classList.add('hidden');
            }
        });
    });
});

// Fungsi untuk modal login
function showLoginModal() {
    document.getElementById('loginModal').classList.remove('hidden');
}

function hideLoginModal() {
    document.getElementById('loginModal').classList.add('hidden');
}
</script>

</body>
</html>