
<!-- navbar.php -->
<nav class="bg-[#8b5e34] text-white py-4 shadow-md relative z-50 px-6">
    <div class="flex justify-between items-center max-w-7xl mx-auto">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="text-2xl font-bold">AdoptMe</a>

        <!-- Navigation & Icons -->
        <div class="flex space-x-6 items-center">
            <!-- Menu -->
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="/tentang" :active="request()->is('tentang')">Tentang</x-nav-link>
            <x-nav-link href="/hewan" :active="request()->is('hewan')">Hewan</x-nav-link>
            <x-nav-link href="/kontak" :active="request()->is('kontak')">Kontak</x-nav-link>

            <!-- Keranjang Icon -->
            <a href="keranjang.php" class="relative">
                <img src="https://cdn-icons-png.flaticon.com/512/107/107831.png" alt="Keranjang" class="w-5 h-5">
                <span class="absolute -top-2 -right-2 bg-green-500 text-xs rounded-full px-1">0</span>
            </a>
                
                <!-- Dropdown User -->
                <div class="relative">
                    <button id="userDropdown" class="bg-white text-[#8b5e34] w-8 h-8 rounded-full font-bold focus:outline-none">
                    </button>

                    <!-- Menu Dropdown User -->
                    <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-300 text-gray-800">
                        <a href="{{ route('profil') }}" class="block px-4 py-2 hover:bg-gray-100">Profil</a>
                        <a href="{{ route('toko') }}" class="block px-4 py-2 hover:bg-gray-100">Toko</a>
                        <a href="{{ route('panduan') }}" class="block px-4 py-2 hover:bg-gray-100">Panduan</a>
                        <a href=" {{ route('logout') }}" class="block px-4 py-2 text-[#8b5e34] hover:bg-gray-100 font-bold">Logout</a>
                    </div>
                </div>

                <a href="{{ route('login') }}" class="hover:text-gray-300">Login</a>
           
        </div>
    </div>
</nav>

<!-- Script untuk Dropdown -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const dropdownBtn = document.getElementById("userDropdown");
        const dropdownMenu = document.getElementById("dropdownMenu");

        if (dropdownBtn && dropdownMenu) {
            dropdownBtn.addEventListener("click", function (event) {
                dropdownMenu.classList.toggle("hidden");
                event.stopPropagation();
            });

            document.addEventListener("click", function (event) {
                if (!dropdownBtn.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add("hidden");
                }
            });
        }
    });
</script>
