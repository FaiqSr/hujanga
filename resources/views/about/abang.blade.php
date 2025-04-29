@extends('templateLayout')
@section('title', 'About Reynaldi')

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
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-5">Reynaldi <span
                                class="text-primary">Ilham</span></h1>
                        <h2 class="text-2xl text-slate-500 dark:text-slate-300 mb-6">Founder & Lead Developer HujanGa</h2>
                        <p class="text-slate-500 text-lg mb-8">
                            Seorang pengembang full-stack dengan passion di bidang teknologi cuaca dan analisis data.
                            Memiliki pengalaman lebih dari 5 tahun dalam mengembangkan solusi berbasis lokasi.
                        </p>
                        <div class="flex gap-5">
                            <a href="#bio"
                                class="px-5 py-2 border border-primary bg-secondary rounded-lg hover:bg-third text-white primary-gradient font-semibold">Tentang
                                Saya</a>
                            <a href="#contact"
                                class="px-5 py-2 border border-primary rounded-lg primary-border-button text-black dark:text-white hover:text-white transition-all duration-500 font-semibold hover:dark:bg-secondary">Hubungi</a>
                        </div>
                    </section>

                    {{-- Right Image --}}
                    <section class="w-full lg:w-1/2 flex justify-center animate__animated animate__fadeInUp">
                        <section
                            class="w-fit h-[350px] sm:h-[450px] rounded-lg flex items-center shadow-xl border border-slate-200 dark:border-gray-700 hover:dark:border-white transition-colors overflow-hidden">
                            <img src="{{ asset('assets/images/anggota/abang.jpeg') }}" alt="Reynaldi Ilham"
                                class="w-full h-full object-cover">
                        </section>
                    </section>
                </section>
            </section>
        </section>

        {{-- Bio Section --}}
        <section id="bio" class="py-20 bg-gray-50 dark:bg-gray-900">
            <section class="container mx-auto px-5">
                <section class="flex flex-col lg:flex-row items-center gap-10">
                    {{-- Left Image --}}
                    <section class="w-full lg:w-1/3">
                        <section class="border rounded-xl p-5 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-lg">
                            <img src="{{ asset('assets/images/anggota/abang.jpeg') }}" alt="Reynaldi Profile"
                                class="w-full rounded-lg">
                            <section class="mt-5">
                                <h3 class="font-bold text-xl mb-2">Informasi Pribadi</h3>
                                <ul class="space-y-2 text-slate-500">
                                    <li class="flex items-center gap-2">
                                        <i class="fa-solid fa-calendar-days text-primary"></i>
                                        <span>TTL: Bogor, 15 Januari 1995</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <i class="fa-solid fa-location-dot text-primary"></i>
                                        <span>Domisili: Bogor, Jawa Barat</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <i class="fa-solid fa-graduation-cap text-primary"></i>
                                        <span>Pendidikan: S1 Ilmu Komputer</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <i class="fa-solid fa-briefcase text-primary"></i>
                                        <span>Pengalaman: 5+ tahun</span>
                                    </li>
                                </ul>
                            </section>
                        </section>
                    </section>

                    {{-- Right Content --}}
                    <section class="w-full lg:w-2/3">
                        <h1
                            class="rounded-2xl w-fit px-5 py-2 text-secondary dark:text-fifth bg-sky-100 font-semibold dark:bg-sky-900 mb-4">
                            Biografi</h1>
                        <h2 class="font-semibold text-4xl mb-6">Perjalanan Karier</h2>

                        <div class="space-y-6 text-slate-500">
                            <p>
                                Reynaldi memulai kariernya sebagai developer web di sebuah startup lokal setelah lulus
                                kuliah.
                                Pengalaman bekerja dengan data geospasial membawanya pada ide untuk menciptakan solusi cuaca
                                yang lebih akurat.
                            </p>

                            <p>
                                Pada tahun 2020, ia memulai proyek HujanGa sebagai solusi pribadi untuk masalah cuaca lokal
                                di Bogor.
                                Apa yang awalnya hanya proyek sampingan, berkembang menjadi platform yang digunakan ribuan
                                pengguna.
                            </p>

                            <h3 class="font-bold text-xl text-black dark:text-white mt-8 mb-4">Keahlian Teknis</h3>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                <div class="border dark:border-gray-700 rounded-lg p-3 flex items-center gap-2">
                                    <i class="fa-brands fa-laravel text-primary text-xl"></i>
                                    <span>Laravel</span>
                                </div>
                                <div class="border dark:border-gray-700 rounded-lg p-3 flex items-center gap-2">
                                    <i class="fa-brands fa-js text-primary text-xl"></i>
                                    <span>JavaScript</span>
                                </div>
                                <div class="border dark:border-gray-700 rounded-lg p-3 flex items-center gap-2">
                                    <i class="fa-brands fa-python text-primary text-xl"></i>
                                    <span>Python</span>
                                </div>
                                <div class="border dark:border-gray-700 rounded-lg p-3 flex items-center gap-2">
                                    <i class="fa-solid fa-database text-primary text-xl"></i>
                                    <span>SQL</span>
                                </div>
                                <div class="border dark:border-gray-700 rounded-lg p-3 flex items-center gap-2">
                                    <i class="fa-brands fa-vuejs text-primary text-xl"></i>
                                    <span>Vue.js</span>
                                </div>
                                <div class="border dark:border-gray-700 rounded-lg p-3 flex items-center gap-2">
                                    <i class="fa-solid fa-cloud text-primary text-xl"></i>
                                    <span>Cloud Computing</span>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
            </section>
        </section>

        {{-- Contributions Section --}}
        <section class="py-20">
            <section class="container mx-auto px-5">
                <section class="text-center mb-16">
                    <h1
                        class="rounded-2xl w-fit px-5 py-2 text-secondary dark:text-fifth bg-sky-100 font-semibold dark:bg-sky-900 mx-auto">
                        Kontribusi</h1>
                    <h2 class="font-semibold text-4xl my-4">Peran dalam Pengembangan HujanGa</h2>
                    <p class="text-slate-500 max-w-3xl mx-auto">
                        Berbagai kontribusi penting yang telah diberikan untuk kesuksesan HujanGa.
                    </p>
                </section>

                <section class="grid md:grid-cols-3 gap-8">
                    <div
                        class="border rounded-xl p-6 dark:border-gray-700 dark:bg-gray-800 shadow-lg hover:shadow-xl transition-shadow">
                        <div
                            class="w-14 h-14 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center mb-4 mx-auto">
                            <i class="fa-solid fa-code text-2xl text-primary dark:text-secondary"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-center">Arsitektur Sistem</h3>
                        <p class="text-slate-500 text-center">Mendesain arsitektur backend HujanGa yang scalable dan
                            reliable</p>
                    </div>

                    <div
                        class="border rounded-xl p-6 dark:border-gray-700 dark:bg-gray-800 shadow-lg hover:shadow-xl transition-shadow">
                        <div
                            class="w-14 h-14 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center mb-4 mx-auto">
                            <i class="fa-solid fa-chart-line text-2xl text-primary dark:text-secondary"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-center">Algoritma Prediksi</h3>
                        <p class="text-slate-500 text-center">Mengembangkan algoritma prediksi cuaca lokal dengan akurasi
                            tinggi</p>
                    </div>

                    <div
                        class="border rounded-xl p-6 dark:border-gray-700 dark:bg-gray-800 shadow-lg hover:shadow-xl transition-shadow">
                        <div
                            class="w-14 h-14 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center mb-4 mx-auto">
                            <i class="fa-solid fa-people-group text-2xl text-primary dark:text-secondary"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-center">Tim Pengembang</h3>
                        <p class="text-slate-500 text-center">Memimpin dan membimbing tim pengembang HujanGa</p>
                    </div>
                </section>
            </section>
        </section>

        {{-- Contact Section --}}
        <section id="contact" class="py-20 bg-gray-50 dark:bg-gray-900 relative">
            <section
                class="absolute left-0 bottom-1/2 w-80 h-80 rounded-full bg-gradient-to-r from-primary/20 to-blue-400/20 blur-3xl -z-10">
            </section>

            <section class="container mx-auto px-5">
                <section class="max-w-4xl mx-auto">
                    <h1
                        class="rounded-2xl w-fit px-5 py-2 text-secondary dark:text-fifth bg-sky-100 font-semibold dark:bg-sky-900 mb-4">
                        Hubungi Reynaldi</h1>
                    <h2 class="font-semibold text-4xl mb-6">Tertarik Berkolaborasi?</h2>
                    <p class="text-slate-500 mb-8 max-w-3xl">
                        Untuk pertanyaan profesional, undangan berbicara, atau peluang kolaborasi, silakan hubungi melalui
                        form berikut.
                    </p>

                    <section class="border dark:border-gray-700 rounded-xl p-8 shadow-lg bg-white dark:bg-gray-800">
                        <form action="/contact/reynaldi" method="POST">
                            @csrf
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                        Lengkap</label>
                                    <input type="text" id="name" name="name"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600"
                                        required>
                                </div>

                                <div>
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                                        Email</label>
                                    <input type="email" id="email" name="email"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600"
                                        required>
                                </div>
                            </div>

                            <div class="mt-6">
                                <label for="subject"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subjek</label>
                                <select id="subject" name="subject"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600"
                                    required>
                                    <option value="" disabled selected>Pilih subjek</option>
                                    <option value="Collaboration">Kolaborasi Proyek</option>
                                    <option value="Speaking Invitation">Undangan Berbicara</option>
                                    <option value="Technical Question">Pertanyaan Teknis</option>
                                    <option value="Other">Lainnya</option>
                                </select>
                            </div>

                            <div class="mt-6">
                                <label for="message"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pesan Anda</label>
                                <textarea id="message" name="message" rows="5"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600"
                                    required></textarea>
                            </div>

                            <button type="submit"
                                class="w-full mt-6 px-5 py-3 bg-secondary hover:bg-third text-white font-semibold rounded-lg transition-colors">
                                Kirim Pesan
                            </button>
                        </form>
                    </section>
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

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
@endpush
