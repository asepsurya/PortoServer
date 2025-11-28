<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="icon" href="{{ asset('img/Fav_light.png') }}" media="(prefers-color-scheme: light)">
    <link rel="icon" href="{{ asset('img/Fav.png') }}" media="(prefers-color-scheme: dark)">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { darkMode: 'class' }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

    <style>
        #particles-js {
            position: fixed;
            inset: 0;
            z-index: -1;
            background: #0c0c0c;
        }

        .input-animated::placeholder {
            opacity: .4;
            transition: .25s ease;
        }
        .input-animated:focus::placeholder {
            opacity: 0;
            transform: translateX(6px);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4">

    <!-- PARTICLES -->
    <div id="particles-js"></div>

    <!-- MAIN WRAPPER 2 KOLOM -->
    <div class="bg-[#131313]/90 backdrop-blur-md p-0 rounded-2xl shadow-xl w-full max-w-4xl 
                border border-gray-800 relative z-10 flex overflow-hidden">

        <!-- ⚡ LEFT: LOGIN FORM -->
        <!-- MODIFIKASI: Ubah lebar menjadi full di mobile (w-full) dan 1/2 di desktop (md:w-1/2). Tambahkan padding yang lebih responsif. -->
        <div class="w-full md:w-1/2 p-6 sm:p-8 md:p-10">

            <div class="flex justify-center mb-6">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" width="160" class="shadow-xl">
            </div>

            <h2 class="text-2xl font-bold text-white mb-6 text-center">
                Login to Your Account
            </h2>

            @if($errors->any())
                <div class="bg-red-500/20 text-red-400 py-2 px-4 rounded mb-4 border border-red-600/40">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-300 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        placeholder="Masukkan email..."
                        class="input-animated w-full bg-[#1a1a1a] border border-gray-700 text-gray-200 
                        rounded px-3 py-2 focus:ring-2 focus:ring-gray-600 outline-none transition"
                        required>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-300 mb-1">Password</label>
                    <input type="password" name="password"
                        placeholder="Masukkan password..."
                        class="input-animated w-full bg-[#1a1a1a] border border-gray-700 text-gray-200 
                        rounded px-3 py-2 focus:ring-2 focus:ring-gray-600 outline-none transition"
                        required>
                </div>

               <button id="loginBtn" type="submit"
                    class="w-full bg-black text-white py-2 rounded-lg font-semibold
                        hover:bg-gray-900 transition shadow-md shadow-black/40 
                        border border-gray-700 flex items-center justify-center gap-2">

                    <span id="btnText">Masuk Sistem</span>

                    <!-- Spinner (default hidden) -->
                    <svg id="btnSpinner" class="animate-spin h-5 w-5 text-white hidden"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                    </svg>

                </button>


                <a href="/" class="relative block text-center text-white mt-5 text-sm transition group">
                    Kembali ke Halaman Utama
                    <span class="absolute left-1/2 -bottom-1 h-[1px] w-0 bg-white 
                        transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
                </a>

            </form>
        </div>

        <!-- ⚡ RIGHT: FOTO -->
        <!-- MODIFIKASI: Sembunyikan di mobile (hidden) dan tampilkan di desktop (md:block) dengan lebar 1/2. -->
        <div class="hidden md:block md:w-1/2 relative bg-black/30 flex items-center justify-center border-l border-gray-700">

            <!-- Glow neon -->
            <div class="absolute inset-0 bg-gradient-to-b from-cyan-500/10 to-transparent"></div>

            <img src="{{ asset('img/me.jpeg') }}"
                 class="w-full h-full object-cover opacity-90 
                        rounded-r-2xl shadow-[0_0_20px_rgba(0,255,255,0.3)]">

            <div class="absolute bottom-5 right-5 text-gray-300 text-sm bg-black/40 px-3 py-1 rounded">
                A. Surya Somantri
            </div>

        </div>
    </div>

    <!-- PARTICLE CONFIG -->
    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": { "value": 85, "density": { "enable": true, "value_area": 800 }},
                "color": { "value": "#ffffff" },
                "shape": { "type": "circle" },
                "opacity": { "value": 0.15, "random": true },
                "size": { "value": 3, "random": true },
                "line_linked": {
                    "enable": true,
                    "distance": 130,
                    "color": "#ffffff",
                    "opacity": 0.12,
                    "width": 1
                },
                "move": { "enable": true, "speed": 1.2, "direction": "none", "out_mode": "bounce" }
            },
            "interactivity": {
                "events": { "onhover": { "enable": true, "mode": "grab" } }
            },
            "retina_detect": true
        });
    </script>
<script>
    const form = document.querySelector("form");
    const loginBtn = document.getElementById("loginBtn");
    const btnText = document.getElementById("btnText");
    const btnSpinner = document.getElementById("btnSpinner");

    form.addEventListener("submit", function () {
        loginBtn.disabled = true;
        loginBtn.classList.add("opacity-80", "cursor-not-allowed");

        btnText.textContent = "Memproses...";
        btnSpinner.classList.remove("hidden");
    });
</script>

</body>
</html>