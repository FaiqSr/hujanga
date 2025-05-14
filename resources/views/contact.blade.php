@extends('templateLayout')
@section('title', 'Contact Us')

@section('content')
    <canvas id="canvas" style="position: fixed; top: 0; left: 0; z-index: -1"></canvas>
    <main>
        {{-- Hero Section --}}
        <section class="relative">
            {{-- Background Gradients --}}
            <section
                class="absolute right-2/5 top-0 w-80 h-80 rounded-full bg-gradient-to-r from-primary/20 to-blue-400/20 blur-3xl -z-10">
            </section>
            <section
                class="absolute bottom-0 top-1/5 w-80 h-80 rounded-full bg-gradient-to-r from-primary/20 to-blue-400/20 blur-3xl -z-10">
            </section>
            <section
                class="absolute bottom-0 right-0 w-80 h-80 rounded-full bg-gradient-to-r from-primary/20 to-blue-400/20 blur-3xl -z-10">
            </section>

            <section class="container mx-auto px-5 py-20 lg:py-32">
                <section class="flex flex-col lg:flex-row items-center gap-10">
                    {{-- Left Content --}}
                    <section class="w-full lg:w-1/2 animate__animated animate__fadeInDown">
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-5">Hubungi <span
                                class="text-primary">Kami</span></h1>
                        <p class="text-slate-500 text-lg mb-8">
                            Punya pertanyaan, masukan, atau ingin berkolaborasi? Tim HujanGa siap membantu Anda.
                            Isi form kontak atau hubungi kami melalui informasi di bawah ini.
                        </p>
                        <div class="flex gap-5">
                            <a href="#contact-form"
                                class="px-5 py-2 border border-primary bg-secondary rounded-lg hover:bg-third text-white primary-gradient font-semibold">Kirim
                                Pesan</a>
                            <a href="/faq"
                                class="px-5 py-2 border border-primary rounded-lg primary-border-button text-black dark:text-white hover:text-white transition-all duration-500 font-semibold hover:dark:bg-secondary">FAQ</a>
                        </div>
                    </section>

                    {{-- Right Image --}}
                    <section class="w-full lg:w-1/2 flex justify-center animate__animated animate__fadeInUp">
                        <section
                            class="w-fit h-[350px] sm:h-[450px] rounded-lg flex items-center shadow-xl border border-slate-200 dark:border-gray-700 hover:dark:border-white transition-colors">
                            <img src="{{ asset('assets/images/anggota/kel5.jpeg') }}" alt="Contact Us"
                                class="w-full h-full object-contain">
                        </section>
                    </section>
                </section>
            </section>
        </section>

        {{-- Contact Info Section --}}
        <section class="py-20 dark:bg-gradient-to-b dark:via-gray-800 dark:from-25% dark:to-none  dark:to-75">
            <section class="container mx-auto px-5">
                <section class="text-center mb-16">
                    <h1
                        class="rounded-2xl w-fit px-5 py-2 text-secondary dark:text-fifth bg-sky-100 font-semibold dark:bg-sky-900 mx-auto">
                        Informasi Kontak</h1>
                    <h2 class="font-semibold text-4xl my-4">Cara Menghubungi Kami</h2>
                    <p class="text-slate-500 max-w-3xl mx-auto">
                        Kami selalu senang mendengar dari pengguna HujanGa. Berikut beberapa cara untuk terhubung dengan tim
                        kami.
                    </p>
                </section>

                <section class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                    <div
                        class="border rounded-xl p-6 dark:border-gray-700 dark:bg-gray-800 shadow-lg hover:shadow-xl transition-shadow">
                        <div
                            class="w-14 h-14 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center mb-4 mx-auto">
                            <i class="fa-solid fa-envelope text-2xl text-primary dark:text-secondary"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-center">Email</h3>
                        <p class="text-slate-500 text-center">info@hujanga.com</p>
                        <p class="text-slate-500 text-center">support@hujanga.com</p>
                    </div>

                    <div
                        class="border rounded-xl p-6 dark:border-gray-700 dark:bg-gray-800 shadow-lg hover:shadow-xl transition-shadow">
                        <div
                            class="w-14 h-14 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center mb-4 mx-auto">
                            <i class="fa-solid fa-phone text-2xl text-primary dark:text-secondary"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-center">Telepon</h3>
                        <p class="text-slate-500 text-center">+62 123 4567 890</p>
                        <p class="text-slate-500 text-center">Senin-Jumat, 09:00-17:00</p>
                    </div>

                    <div
                        class="border rounded-xl p-6 dark:border-gray-700 dark:bg-gray-800 shadow-lg hover:shadow-xl transition-shadow">
                        <div
                            class="w-14 h-14 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center mb-4 mx-auto">
                            <i class="fa-solid fa-location-dot text-2xl text-primary dark:text-secondary"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-center">Kantor</h3>
                        <p class="text-slate-500 text-center">Jl. Hujan No. 123</p>
                        <p class="text-slate-500 text-center">Bogor, Indonesia</p>
                    </div>
                </section>
            </section>
        </section>

        {{-- Contact Form Section --}}
        <section id="contact-form" class="py-20 relative">
            <section
                class="absolute left-0 bottom-1/2 w-80 h-80 rounded-full bg-gradient-to-r from-primary/20 to-blue-400/20 blur-3xl -z-10">
            </section>

            <section class="container mx-auto px-5">
                <section class="flex flex-col lg:flex-row gap-10 items-center">
                    {{-- Left Side --}}
                    <section class="w-full lg:w-1/2">
                        <h1
                            class="rounded-2xl w-fit px-5 py-2 text-secondary dark:text-fifth bg-sky-100 font-semibold dark:bg-sky-900 mb-4">
                            Form Kontak</h1>
                        <h2 class="font-semibold text-4xl mb-6">Kirim Pesan Langsung</h2>
                        <p class="text-slate-500 mb-8">
                            Isi form berikut untuk mengirim pesan langsung ke tim kami. Kami akan membalas pesan Anda dalam
                            waktu 1-2 hari kerja.
                        </p>

                        <div class="space-y-6">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center mt-1 flex-shrink-0">
                                    <i class="fa-solid fa-circle-info text-primary dark:text-secondary"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-xl mb-1">Butuh Bantuan Cepat?</h3>
                                    <p class="text-slate-500">Lihat <a href="/faq"
                                            class="text-primary hover:underline">halaman FAQ</a> kami untuk jawaban cepat
                                        atas pertanyaan umum.</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center mt-1 flex-shrink-0">
                                    <i class="fa-solid fa-bug text-primary dark:text-secondary"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-xl mb-1">Laporkan Masalah?</h3>
                                    <p class="text-slate-500">Untuk laporan bug teknis, silakan sertakan detail lengkap
                                        termasuk screenshot jika memungkinkan.</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    {{-- Right Side - Form --}}
                    <section
                        class="w-full lg:w-1/2 border dark:border-gray-700 rounded-xl p-8 shadow-lg bg-white dark:bg-gray-800">
                        <form action="/contact" method="POST">
                            @csrf
                            <div class="mb-6">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Lengkap</label>
                                <input type="text" id="name" name="name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <div class="mb-6">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                                    Email</label>
                                <input type="email" id="email" name="email"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <div class="mb-6">
                                <label for="subject"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subjek</label>
                                <select id="subject" name="subject"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600"
                                    required>
                                    <option value="" disabled selected>Pilih subjek</option>
                                    <option value="General Inquiry">Pertanyaan Umum</option>
                                    <option value="Technical Support">Dukungan Teknis</option>
                                    <option value="Bug Report">Laporan Bug</option>
                                    <option value="Feature Request">Permintaan Fitur</option>
                                    <option value="Partnership">Kerjasama/Kemitraan</option>
                                </select>
                            </div>

                            <div class="mb-6">
                                <label for="message"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pesan Anda</label>
                                <textarea id="message" name="message" rows="6"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600"
                                    required></textarea>
                            </div>

                            <button type="submit"
                                class="w-full px-5 py-3 bg-secondary hover:bg-third text-white font-semibold rounded-lg transition-colors">
                                Kirim Pesan
                            </button>
                        </form>
                    </section>
                </section>
            </section>
        </section>

        {{-- FAQ Preview Section --}}
        <section class="py-20  dark:bg-gradient-to-t dark:from-gray-900 dark:from-50%% dark:to-none  dark:to-75">
            <section class="container mx-auto px-5">
                <section class="text-center mb-16">
                    <h1
                        class="rounded-2xl w-fit px-5 py-2 text-secondary dark:text-fifth bg-sky-100 font-semibold dark:bg-sky-900 mx-auto">
                        Pertanyaan Umum</h1>
                    <h2 class="font-semibold text-4xl my-4">Mungkin Jawaban Anda Ada di Sini</h2>
                    <p class="text-slate-500 max-w-3xl mx-auto">
                        Berikut beberapa pertanyaan yang sering diajukan oleh pengguna HujanGa.
                    </p>
                </section>

                <section class="max-w-4xl mx-auto">
                    <div class="border dark:border-gray-700 rounded-xl overflow-hidden mb-6">
                        <div
                            class="accordion-header p-5 bg-white dark:bg-gray-800 cursor-pointer flex justify-between items-center">
                            <h3 class="font-semibold text-lg">Bagaimana cara menggunakan HujanGa?</h3>
                            <i class="fa-solid fa-chevron-down text-primary transition-transform duration-300"></i>
                        </div>
                        <div class="accordion-content px-5 pb-5 bg-white dark:bg-gray-800 hidden">
                            <p class="text-slate-500">Anda cukup membuka aplikasi HujanGa atau mengakses website kami, lalu
                                sistem akan secara otomatis menampilkan prediksi cuaca di lokasi Anda. Untuk melihat lokasi
                                lain, Anda bisa menggunakan fitur pencarian atau peta.</p>
                        </div>
                    </div>

                    <div class="border dark:border-gray-700 rounded-xl overflow-hidden mb-6">
                        <div
                            class="accordion-header p-5 bg-white dark:bg-gray-800 cursor-pointer flex justify-between items-center">
                            <h3 class="font-semibold text-lg">Apakah HujanGa gratis digunakan?</h3>
                            <i class="fa-solid fa-chevron-down text-primary transition-transform duration-300"></i>
                        </div>
                        <div class="accordion-content px-5 pb-5 bg-white dark:bg-gray-800 hidden">
                            <p class="text-slate-500">Ya, HujanGa sepenuhnya gratis untuk digunakan oleh semua orang. Kami
                                berkomitmen untuk menyediakan informasi cuaca yang akurat tanpa biaya.</p>
                        </div>
                    </div>

                    <div class="border dark:border-gray-700 rounded-xl overflow-hidden mb-6">
                        <div
                            class="accordion-header p-5 bg-white dark:bg-gray-800 cursor-pointer flex justify-between items-center">
                            <h3 class="font-semibold text-lg">Bagaimana akurasi prediksi cuaca HujanGa?</h3>
                            <i class="fa-solid fa-chevron-down text-primary transition-transform duration-300"></i>
                        </div>
                        <div class="accordion-content px-5 pb-5 bg-white dark:bg-gray-800 hidden">
                            <p class="text-slate-500">Hujanga menggunakan data kondisi terkini dari lingkungan sekitar,
                                sehingga keakuratan data mencapai 90%.</p>
                        </div>
                    </div>

                    <div class="text-center mt-10">
                        <a href="/faq"
                            class="px-5 py-2 border border-primary rounded-lg primary-border-button text-black dark:text-white hover:text-white transition-all duration-500 font-semibold hover:dark:bg-secondary">
                            Lihat Semua FAQ
                        </a>
                    </div>
                </section>
            </section>
        </section>
    </main>
@endsection

@push('scripts')
    <script>
        // Same canvas animation script from home page
        requestAnimFrame = (function() {
            return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                window.oRequestAnimationFrame ||
                window.msRequestAnimationFrame ||
                function(callback) {
                    window.setTimeout(callback, 1000 / 60);
                };
        })();

        var canvas = document.getElementById('canvas');
        var ctx = canvas.getContext('2d');

        var width = 0;
        var height = 0;

        window.onresize = function onresize() {
            width = canvas.width = window.innerWidth;
            height = canvas.height = window.innerHeight;
        }

        window.onresize();

        var mouse = {
            X: 0,
            Y: 0
        }

        window.onmousemove = function onmousemove(event) {
            mouse.X = event.clientX;
            mouse.Y = event.clientY;
        }

        var particules = [];
        var gouttes = [];
        var nombrebase = 5;
        var nombreb = 2;

        var controls = {
            rain: 2,
            Object: "Nothing",
            alpha: 1,
            color: 200,
            auto: false,
            opacity: 1,
            saturation: 100,
            lightness: 50,
            back: 100,
            red: 0,
            green: 0,
            blue: 0,
            multi: false,
            speed: 2
        };

        function Rain(X, Y, nombre) {
            if (!nombre) {
                nombre = nombreb;
            }
            while (nombre--) {
                particules.push({
                    vitesseX: (Math.random() * 0.25),
                    vitesseY: (Math.random() * 9) + 1,
                    X: X,
                    Y: Y,
                    alpha: 1,
                    couleur: "hsla(" + controls.color + "," + controls.saturation + "%, " + controls.lightness +
                        "%," + controls.opacity + ")",
                })
            }
        }

        function explosion(X, Y, couleur, nombre) {
            if (!nombre) {
                nombre = nombrebase;
            }
            while (nombre--) {
                gouttes.push({
                    vitesseX: (Math.random() * 4 - 2),
                    vitesseY: (Math.random() * -4),
                    X: X,
                    Y: Y,
                    radius: 0.65 + Math.floor(Math.random() * 1.6),
                    alpha: 1,
                    couleur: couleur
                })
            }
        }

        function rendu(ctx) {
            if (controls.multi == true) {
                controls.color = Math.random() * 360;
            }

            ctx.save();
            ctx.clearRect(0, 0, width, height);

            var particuleslocales = particules;
            var goutteslocales = gouttes;
            var tau = Math.PI * 2;

            for (var i = 0, particulesactives; particulesactives = particuleslocales[i]; i++) {
                ctx.globalAlpha = particulesactives.alpha;
                ctx.fillStyle = particulesactives.couleur;
                ctx.fillRect(particulesactives.X, particulesactives.Y, particulesactives.vitesseY / 4, particulesactives
                    .vitesseY);
            }

            for (var i = 0, gouttesactives; gouttesactives = goutteslocales[i]; i++) {
                ctx.globalAlpha = gouttesactives.alpha;
                ctx.fillStyle = gouttesactives.couleur;
                ctx.beginPath();
                ctx.arc(gouttesactives.X, gouttesactives.Y, gouttesactives.radius, 0, tau);
                ctx.fill();
            }

            ctx.restore();

            if (controls.auto) {
                controls.color += controls.speed;
                if (controls.color >= 360) {
                    controls.color = 0;
                }
            }
        }

        function update() {
            var particuleslocales = particules;
            var goutteslocales = gouttes;

            for (var i = 0, particulesactives; particulesactives = particuleslocales[i]; i++) {
                particulesactives.X += particulesactives.vitesseX;
                particulesactives.Y += particulesactives.vitesseY + 5;
                if (particulesactives.Y > height - 15) {
                    particuleslocales.splice(i--, 1);
                    explosion(particulesactives.X, particulesactives.Y, particulesactives.couleur);
                }
            }

            for (var i = 0, gouttesactives; gouttesactives = goutteslocales[i]; i++) {
                gouttesactives.X += gouttesactives.vitesseX;
                gouttesactives.Y += gouttesactives.vitesseY;
                gouttesactives.radius -= 0.075;
                if (gouttesactives.alpha > 0) {
                    gouttesactives.alpha -= 0.005;
                } else {
                    gouttesactives.alpha = 0;
                }
                if (gouttesactives.radius < 0) {
                    goutteslocales.splice(i--, 1);
                }
            }

            var i = controls.rain;
            while (i--) {
                Rain(Math.floor((Math.random() * width)), -15);
            }
        }

        (function boucle() {
            requestAnimFrame(boucle);
            update();
            rendu(ctx);
        })();

        // Accordion functionality for FAQ section
        document.addEventListener('DOMContentLoaded', function() {
            const accordionHeaders = document.querySelectorAll('.accordion-header');

            accordionHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    const icon = this.querySelector('i');

                    // Toggle content
                    content.classList.toggle('hidden');

                    // Rotate icon
                    icon.classList.toggle('rotate-180');

                    // Close other open accordions
                    accordionHeaders.forEach(otherHeader => {
                        if (otherHeader !== header) {
                            otherHeader.nextElementSibling.classList.add('hidden');
                            otherHeader.querySelector('i').classList.remove('rotate-180');
                        }
                    });
                });
            });

            // Animation on scroll script
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in-view');
                        return;
                    }
                    entry.target.classList.remove('in-view');
                });
            });

            const allAnimatedElements = document.querySelectorAll('.animate');
            allAnimatedElements.forEach((element) => observer.observe(element));
        });
    </script>
@endpush
