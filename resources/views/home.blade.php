<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Beranda</title>
</head>

<x-navbar> </x-navbar>
<body class="bg-white text-gray-900">

<!-- Hero Section -->
<header class="bg-[#8b5e34] text-white py-12">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-6">
        <div class="text-center md:text-left md:w-1/2">
            <h1 class="text-5xl font-bold text-white">Selamat Datang di AdoptMe</h1>
            <p class="mt-3 text-lg">Temukan sahabat setia Anda dan berikan mereka rumah penuh kasih</p>
            <a href="hewan.blade.php" class="mt-6 inline-block bg-[#d9a36a] text-white px-6 py-3 rounded-lg shadow-md hover:bg-[#c48950]">
                Jelajahi Hewan
            </a>
        </div>

        <div class="mt-6 md:mt-0 md:w-1/2 flex justify-center">
            <div class="relative w-96 h-72 overflow-hidden rounded-lg shadow-lg">
                <img src="images/h1.png" alt="Hewan Adopsi" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</header>

<!-- Cerita Singkat AdoptMe -->
<section class="container mx-auto px-6 py-12">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-3xl mx-auto text-center">
        <h2 class="text-3xl font-bold text-[#8b5e34]">AdoptMe</h2>
        <p class="text-gray-600 mt-4 text-justify">
            AdoptMe adalah platform yang menghubungkan hewan peliharaan yang membutuhkan rumah dengan calon adopter yang peduli. 
            Kami berkomitmen untuk memberikan kehidupan yang lebih baik bagi hewan-hewan terlantar dengan membantu mereka menemukan 
            keluarga yang penuh kasih.
        </p>
    </div>
</section>

<!-- Daftar Hewan untuk Adopsi -->
<section class="container mx-auto py-16 text-center">
    <h2 class="text-4xl font-bold text-[#4a2c1f]">Hewan yang Tersedia untuk Adopsi</h2>
    <p class="text-gray-600 max-w-2xl mx-auto mt-4 mb-10">
        Berbagai hewan menggemaskan yang siap diadopsi dan menemukan rumah barunya.
    </p>

    <div class="mt-10">
        <a href="hewan.blade.php" class="inline-block text-[#8b5e34] text-xl font-bold hover:text-[#c48950]">
            Lihat Hewan Lainnya ↓
        </a>
    </div>
</section>


<!-- Artikel Edukasi -->
<section class="container mx-auto py-16 text-center">
    <h2 class="text-4xl font-bold text-[#4a2c1f]">Artikel Edukasi</h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mt-10">
        <?php 
        $artikel = [
            ["judul" => "Manfaat Adopsi Hewan", "gambar" => "img/ed1.jpg", "link" => "artikel1.php"],
            ["judul" => "Persiapan Sebelum Adopsi", "gambar" => "img/ed2.jpg", "link" => "artikel2.php"],
            ["judul" => "Merawat Hewan dengan Baik", "gambar" => "img/ed3.jpg", "link" => "artikel3.php"],
            ["judul" => "Tips Adopsi yang Sukses", "gambar" => "img/ed4.jpg", "link" => "artikel4.php"],
        ];
        foreach ($artikel as $a) : ?>
            <div class="bg-white p-4 border-2 border-[#8b5e34] rounded-lg shadow-md">
                <uploads src="<?= $a['gambar']; ?>" alt="<?= $a['judul']; ?>" class="w-full h-40 object-cover rounded-md">
                <h3 class="text-xl font-bold text-[#8b5e34] mt-3"><?= $a['judul']; ?></h3>
                <a href="<?= $a['link']; ?>" class="mt-3 inline-block bg-[#d9a36a] text-white px-4 py-2 rounded-lg shadow-md hover:bg-[#c48950]">Baca Selengkapnya</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Footer -->
<footer class="bg-[#4a2c1f] text-white py-6 text-center w-full">
    <p>&copy; 2025 AdoptMe - Temukan Sahabat Sejatimu</p>
    <p>Jl. Mawar No. 49, Surabaya | Email: kontak@adoptme.com</p>
</footer>

</body>
</html>