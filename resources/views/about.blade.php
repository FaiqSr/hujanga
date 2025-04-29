@extends('templateLayout')
@section('title', 'About Us')

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
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-5">Tentang <span
                                class="text-primary">HujanGa</span></h1>
                        <p class="text-slate-500 text-lg mb-8">
                            HujanGa adalah platform inovatif yang membantu masyarakat memprediksi kondisi cuaca secara
                            real-time
                            dengan akurasi tinggi. Kami berkomitmen untuk memberikan solusi praktis bagi mereka yang sering
                            beraktivitas di luar ruangan.
                        </p>
                        <div class="flex gap-5">
                            <a href="/dashboard"
                                class="px-5 py-2 border border-primary bg-secondary rounded-lg hover:bg-third text-white primary-gradient font-semibold">Coba
                                Sekarang</a>
                            <a href="#team"
                                class="px-5 py-2 border border-primary rounded-lg primary-border-button text-black dark:text-white hover:text-white transition-all duration-500 font-semibold hover:dark:bg-secondary">Tim
                                Kami</a>
                        </div>
                    </section>

                    {{-- Right Image --}}
                    <section class="w-full lg:w-1/2 flex justify-center animate__animated animate__fadeInUp">
                        <section
                            class="w-fit h-[350px] sm:h-[450px] rounded-lg flex items-center shadow-xl border border-slate-200 dark:border-gray-700 hover:dark:border-white transition-colors">
                            <img src="{{ asset('assets/images/logos/logo.png') }}" alt="HujanGa Logo"
                                class="w-full h-full object-contain">
                        </section>
                    </section>
                </section>
            </section>
        </section>

        {{-- Mission Section --}}
        <section class="py-20 dark:bg-gradient-to-b dark:via-gray-800 dark:from-25% dark:to-none  dark:to-75">
            <section class="container mx-auto px-5">
                <section class="text-center mb-16">
                    <h1
                        class="rounded-2xl w-fit px-5 py-2 text-secondary dark:text-fifth bg-sky-100 font-semibold dark:bg-sky-900 mx-auto">
                        Misi Kami</h1>
                    <h2 class="font-semibold text-4xl my-4">Mengapa Kami Membangun HujanGa</h2>
                    <p class="text-slate-500 max-w-3xl mx-auto">
                        Kami percaya bahwa informasi cuaca yang akurat dan mudah diakses dapat meningkatkan kualitas hidup
                        masyarakat.
                    </p>
                </section>

                <section class="grid md:grid-cols-3 gap-8">
                    <div
                        class="border rounded-xl p-6 dark:border-gray-700 dark:bg-gray-800 shadow-lg hover:shadow-xl transition-shadow">
                        <div
                            class="w-14 h-14 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center mb-4">
                            <i class="fa-solid fa-bolt text-2xl text-primary dark:text-secondary"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Realtime Data</h3>
                        <p class="text-slate-500">Update kondisi cuaca secara real-time dari berbagai lokasi</p>
                    </div>

                    <div
                        class="border rounded-xl p-6 dark:border-gray-700 dark:bg-gray-800 shadow-lg hover:shadow-xl transition-shadow">
                        <div
                            class="w-14 h-14 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center mb-4">
                            <i class="fa-solid fa-map-location-dot text-2xl text-primary dark:text-secondary"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Akurat Lokal</h3>
                        <p class="text-slate-500">Informasi cuaca yang spesifik untuk lokasi Anda</p>
                    </div>

                    <div
                        class="border rounded-xl p-6 dark:border-gray-700 dark:bg-gray-800 shadow-lg hover:shadow-xl transition-shadow">
                        <div
                            class="w-14 h-14 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center mb-4">
                            <i class="fa-solid fa-people-group text-2xl text-primary dark:text-secondary"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Untuk Masyarakat</h3>
                        <p class="text-slate-500">Dibangun oleh masyarakat, untuk masyarakat</p>
                    </div>
                </section>
            </section>
        </section>

        {{-- Team Section --}}
        <section id="team" class="py-20 relative">
            <section
                class="absolute left-0 bottom-1/2 w-80 h-80 rounded-full bg-gradient-to-r from-primary/20 to-blue-400/20 blur-3xl -z-10">
            </section>

            <section class="container mx-auto px-5">
                <section class="text-center mb-16">
                    <h1
                        class="rounded-2xl w-fit px-5 py-2 text-secondary dark:text-fifth bg-sky-100 font-semibold dark:bg-sky-900 mx-auto">
                        Tim Kami</h1>
                    <h2 class="font-semibold text-4xl my-4">Orang-Orang di Balik HujanGa</h2>
                    <p class="text-slate-500 max-w-3xl mx-auto">
                        Tim kecil dengan passion besar untuk membantu masyarakat melalui teknologi.
                    </p>
                </section>

                <section class="flex flex-col lg:flex-row justify-center gap-10">
                    <x-card-photo-component name="Reynaldi Ilham" link="{{ url('/about/reynaldi') }}"
                        desc="Hardware Engginer" img="{{ asset('assets/images/anggota/abang.jpeg') }}" />
                    <x-card-photo-component name="Niefa" link="{{ url('/about/niefa') }}" desc="UI/UX Designer"
                        img="{{ asset('assets/images/anggota/niefa.jpeg') }}" />
                    <x-card-photo-component name="Faiq Subhi Ramadlan" link="{{ url('/about/faiq') }}"
                        desc="Software Engginer" img="{{ asset('assets/images/anggota/faiq.png') }}" />
                </section>
            </section>
        </section>

        {{-- Values Section --}}
        <section class="py-20 dark:bg-gradient-to-b dark:via-gray-800 dark:from-25% dark:to-none  dark:to-75">
            <section class="container mx-auto px-5">
                <section class="flex flex-col lg:flex-row items-center gap-10">
                    <section class="w-full lg:w-1/2">
                        <img src="{{ asset('assets/images/anggota/kel5.jpeg') }}" alt="Team Values"
                            class="w-full max-w-md mx-auto rounded-lg">
                    </section>

                    <section class="w-full lg:w-1/2">
                        <h1
                            class="rounded-2xl w-fit px-5 py-2 text-secondary dark:text-fifth bg-sky-100 font-semibold dark:bg-sky-900 mb-4">
                            Nilai Kami</h1>
                        <h2 class="font-semibold text-4xl mb-6">Prinsip yang Kami Pegang</h2>

                        <div class="space-y-6">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center mt-1 flex-shrink-0">
                                    <i class="fa-solid fa-lightbulb text-primary dark:text-secondary"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-xl mb-1">Inovasi</h3>
                                    <p class="text-slate-500">Terus mencari solusi kreatif untuk masalah sehari-hari</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center mt-1 flex-shrink-0">
                                    <i class="fa-solid fa-hand-holding-heart text-primary dark:text-secondary"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-xl mb-1">Kolaborasi</h3>
                                    <p class="text-slate-500">Bekerja sama dengan berbagai pihak untuk hasil terbaik</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center mt-1 flex-shrink-0">
                                    <i class="fa-solid fa-shield-halved text-primary dark:text-secondary"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-xl mb-1">Integritas</h3>
                                    <p class="text-slate-500">Data yang akurat dan jujur adalah prioritas kami</p>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
            </section>
        </section>

        {{-- CTA Section --}}
        <section class="py-20 relative">
            <section
                class="absolute right-0 top-1/3 w-80 h-80 rounded-full bg-gradient-to-r from-primary/20 to-blue-400/20 blur-3xl -z-10">
            </section>

            <section class="container mx-auto px-5 text-center">
                <h2 class="font-bold text-3xl sm:text-4xl mb-6">Siap Memulai Perjalanan Tanpa Khawatir Hujan?</h2>
                <p class="text-slate-500 max-w-2xl mx-auto mb-8">
                    Bergabunglah dengan ribuan pengguna yang telah mempercayakan perencanaan perjalanan mereka pada HujanGa.
                </p>
                <a href="/dashboard"
                    class="px-8 py-3 border border-primary bg-secondary rounded-lg hover:bg-third text-white primary-gradient font-semibold text-lg inline-block">
                    Coba Sekarang
                </a>
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
            ctx.strokeStyle = "white";
            ctx.lineWidth = 2;

            if (controls.Object == "Umbrella") {
                ctx.beginPath();
                ctx.arc(mouse.X, mouse.Y + 10, 138, 1 * Math.PI, 2 * Math.PI, false);
                ctx.lineWidth = 3;
                ctx.strokeStyle = "hsla(0,100%,100%,1)";
                ctx.stroke();
            }
            if (controls.Object == "Cup") {
                ctx.beginPath();
                ctx.arc(mouse.X, mouse.Y + 10, 143, 1 * Math.PI, 2 * Math.PI, true);
                ctx.lineWidth = 3;
                ctx.strokeStyle = "hsla(0,100%,100%,1)";
                ctx.stroke();
            }
            if (controls.Object == "Circle") {
                ctx.beginPath();
                ctx.arc(mouse.X, mouse.Y + 10, 138, 1 * Math.PI, 3 * Math.PI, false);
                ctx.lineWidth = 3;
                ctx.strokeStyle = "hsla(0,100%,100%,1)";
                ctx.stroke();
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
                var umbrella = (particulesactives.X - mouse.X) * (particulesactives.X - mouse.X) + (particulesactives.Y -
                    mouse.Y) * (particulesactives.Y - mouse.Y);
                if (controls.Object == "Umbrella") {
                    if (umbrella < 20000 && umbrella > 10000 && particulesactives.Y < mouse.Y) {
                        explosion(particulesactives.X, particulesactives.Y, particulesactives.couleur);
                        particuleslocales.splice(i--, 1);
                    }
                }
                if (controls.Object == "Cup") {
                    if (umbrella > 20000 && umbrella < 30000 && particulesactives.X + 138 > mouse.X && particulesactives.X -
                        138 < mouse.X && particulesactives.Y > mouse.Y) {
                        explosion(particulesactives.X, particulesactives.Y, particulesactives.couleur);
                        particuleslocales.splice(i--, 1);
                    }
                }
                if (controls.Object == "Circle") {
                    if (umbrella < 20000) {
                        explosion(particulesactives.X, particulesactives.Y, particulesactives.couleur);
                        particuleslocales.splice(i--, 1);
                    }
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

        // Animation on scroll script
        document.addEventListener("DOMContentLoaded", () => {
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
