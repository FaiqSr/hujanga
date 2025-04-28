@extends('templateLayout')
@section('title', 'Home')

@section('content')
    <canvas id="canvas" style="position: fixed; top: 0; left: 0; z-index: -1"></canvas>
    <main>

        {{-- Main Section --}}
        <section>
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

            <section
                class="flex min-h-svh w-full justify-center items-center flex-col lg:flex-row container mx-auto py-10 sm:py-36 lg:py-0 px-5 gap-0 lg:gap-10">
                {{-- Left Content --}}
                <section
                    class="w-full lg:w-1/2 flex justify-center flex-col gap-10 py-20 lg:py-0 animate__animated animate__fadeInDown">
                    <section>
                        <section class="mb-5">
                            <section class="border rounded-xl px-1 py-1 border-slate-200">
                                <p class="text-slate-600 font-semibold flex items-center">
                                    <img width="30px" src="{{ asset('assets/images/logos/waterDrop.png') }}"
                                        alt="">
                                    <span class="px-1 hover:text-primary transition-colors duration-500">Inovation</span>
                                    <span class="px-1 hover:text-secondary transition-colors duration-500">Start</span>
                                    <span class="px-1 hover:text-third transition-colors duration-500">in</span>
                                    <span class="px-1 hover:text-fourth transition-colors duration-500">Here</span>
                                </p>
                            </section>
                        </section>

                        <section>
                            <h1 class="font-bold text-3xl sm:text-5xl lg:text-6xl">BIAR GA KEHUJANAN</h1>
                            <h1 class="font-bold text-3xl sm:text-5xl lg:text-6xl">
                                BUKA <span class="text-primary">HUJANGA?</span>
                            </h1>
                            <p class="text-slate-500 mt-2 sm:text-xl">
                                Sebuah platform digital yang menyediakan informasi lengkap dan terkini tentang kondisi cuaca
                                di lokasi sekitarmu, membantu kamu tetap siap menghadapi perubahan cuaca kapan saja.
                            </p>
                        </section>
                    </section>

                    <section class="flex gap-5">
                        <a href="/map"
                            class="px-5 py-2 border border-primary bg-secondary rounded-lg hover:bg-third text-white primary-gradient font-semibold">Map</a>
                        <a href="{{ route('about') }}"
                            class="px-5 py-2 border border-primary rounded-lg primary-border-button text-black dark:text-white hover:text-white transition-all duration-500 font-semibold hover:dark:bg-secondary">Learn
                            more...</a>
                    </section>

                    <section class="flex gap-10">
                        <section class="text-center">
                            <h3 class="text-primary text-2xl font-bold">1.0</h3>
                            <p>Version</p>
                        </section>
                        <section class="border-l border-slate-200"></section>
                        <section class="text-center">
                            <h3 class="text-primary text-2xl font-bold">121</h3>
                            <p>Installed</p>
                        </section>
                        <section class="border-l border-slate-200"></section>
                        <section class="text-center">
                            <h3 class="text-primary text-2xl font-bold">12</h3>
                            <p>Location</p>
                        </section>
                    </section>
                </section>

                {{-- Right Image --}}
                <section class="w-full lg:w-1/2 flex justify-center animate__animated animate__fadeInUp">
                    <section
                        class="w-fit h-[350px] sm:h-[450px] lg:h-[500px] rounded-lg flex items-center shadow-xl border border-slate-200 dark:border-gray-700 hover:dark:border-white transition-colors">
                        <img src="{{ asset('assets/images/logos/logo.png') }}" alt="">
                    </section>
                </section>
            </section>
        </section>
        {{-- End Main Section --}}

        {{-- About --}}
        <section class="container mx-auto py-10 dark:bg-slate relative ">
            <section
                class="absolute bottom-0 left-0 top-0 max-w-[400px] max-h-[400px] w-full h-full rounded-full bg-gradient-to-r from-primary/20 to-blue-400/20 blur-3xl -z-10">
            </section>

            <section class="px-5 pb-20 pt-10">
                <section class="text-center flex flex-col items-center">
                    <h1
                        class="rounded-2xl w-fit px-5 py-2 text-secondary dark:text-fifth bg-sky-100 font-semibold dark:bg-sky-900">
                        Sejarah</h1>
                    <h2 class="font-semibold text-4xl my-2">Bagaimana Kami Tercipta</h2>
                    <p class="text-slate-500 mt-2 sm:text-xl text-justify lg:text-center">Berawal dari keluh kesah kami para
                        pengguna
                        sepeda motor yang
                        tinggal di bogor. Kondisi cuaca yang bisa beda tiap RT membuat kami mencari adakah aplikasi yang
                        mampu untuk menampilkan cuaca secara realtime. DIcari-cari ternyata belum ada. jadilah kami membuat
                        HujanGa untuk menyelesaikan masalah kami ini.</p>
                </section>
            </section>

            <section class="px-5">
                <section class="text-center flex flex-col items-center">
                    <h1
                        class="rounded-2xl w-fit px-5 py-2 text-secondary dark:text-fifth bg-sky-100 font-semibold dark:bg-sky-900">
                        Tentang Kami</h1>
                    <h2 class="font-semibold text-4xl my-2">Mengenal Dengan Baik</h2>
                    <p class="text-slate-500 mt-2 sm:text-xl">Karena kita belum saling mengenal, wajar saja jika belum
                        tumbuh rasa sayang atau kedekatan di antara kita</p>
                </section>
            </section>

            <section class="flex lg:flex-row flex-col justify-center gap-10 mt-10 px-5 ">
                <x-card-photo-component name="Reynaldi Ilham" link="{{ url('/about/reynaldi') }}"
                    desc="Ketika kamu sedang di rumah, kamu bisa memilih perjalanan jarak jauh melalui HujanGa"
                    img="{{ asset('assets/images/anggota/abang.jpeg') }}" />
                <x-card-photo-component name="Niefa" link="{{ url('/about/niefa') }}"
                    desc="Ketika kamu sedang di rumah, kamu bisa memilih perjalanan jarak jauh melalui HujanGa"
                    img="{{ asset('assets/images/anggota/niefa.jpeg') }}" />
                <x-card-photo-component name="Faiq Subhi Ramadlan" link="{{ url('/about/faiq') }}"
                    desc="Ketika kamu sedang di rumah, kamu bisa memilih perjalanan jarak jauh melalui HujanGa"
                    img="{{ asset('assets/images/anggota/faiq.png') }}" />
            </section>
        </section>
        {{-- End About --}}

        {{-- Fitur --}}
        <section class="dark:bg-gradient-to-t dark:from-gray-800 dark:from-25% dark:to-none  dark:to-75% ">

            <section class="px-5 py-20 z-20 w-full">

                <section class="text-center flex flex-col items-center">
                    <h1
                        class="rounded-2xl w-fit px-5 py-2 text-secondary dark:text-fifth bg-sky-100 font-semibold dark:bg-sky-900">
                        Fitur Unggulan</h1>
                    <h2 class="font-semibold text-4xl my-2">Cara terbaik untuk merencanakan perjalanan anda</h2>
                    <p class="text-slate-500 mt-2 sm:text-xl"><span class="text-primary">HujanGa</span> hadir untuk membatu
                        kita semua dalam
                        mempersiapkan perjalanan jarak jauh maupun dekat</p>
                </section>
                <section class="flex flex-col lg:flex-row items-center justify-center mt-10 gap-10 x">
                    <section class="w-full lg:w-96 min-h-56 border rounded-xl p-5 dark:border-gray-700 dark:bg-gray-950">
                        <i
                            class="fa-solid fa-user border rounded-full dark:border-gray-700 px-2 py-2 mb-5 text-2xl  text-primary dark:text-secondary"></i>

                        <h5 class="text-xl font-semibold">User Friendly</h5>
                        <p class="text-slate-500 mt-2 ">Tampilan yang mudah digunakan</p>
                    </section>
                    <section class="w-full lg:w-96 min-h-56 border rounded-xl p-5 dark:border-gray-700 dark:bg-gray-950">
                        <i
                            class="fa-solid fa-map border rounded-full dark:border-gray-700 px-2 py-2 mb-5 text-2xl  text-primary dark:text-secondary"></i>

                        <h5 class="text-xl font-semibold">Map</h5>
                        <p class="text-slate-500 mt-2 ">Menggunakan map sehingga mempermudah user</p>
                    </section>
                    <section class="w-full lg:w-96 min-h-56 border rounded-xl p-5 dark:border-gray-700 dark:bg-gray-950">
                        <i
                            class="fa-regular fa-folder-open border rounded-full dark:border-gray-700 px-2 py-2 mb-5 text-2xl text-primary dark:text-secondary"></i>

                        <h5 class="text-xl font-semibold">Open Source</h5>
                        <p class="text-slate-500 mt-2 ">Kode sumber dapat diakses dan dikembangkan oleh siapa saja</p>
                    </section>
                </section>
            </section>
        </section>
        {{-- End Fitur --}}

        <section class="dark:bg-gradient-to-b dark:from-gray-800 dark:from-25% dark:to-none  dark:to-75% ">


            <section class="px-5 pb-20 z-20">

                <section class="text-center flex flex-col items-center">
                    <h1
                        class="rounded-2xl w-fit px-5 py-2 text-secondary dark:text-fifth bg-sky-100 font-semibold dark:bg-sky-900">
                        Contribute</h1>
                    <h2 class="font-semibold text-4xl my-2">Kontribusi untuk kebaikan bersama</h2>
                    <p class="text-slate-500 mt-2 sm:text-xl">Kontribusi dalam aplikasi ini, akan sangat membantu kita semua
                    </p>
                </section>
                <section class="flex flex-col lg:flex-row items-center justify-center mt-10 gap-10 ">
                    <section class="w-full lg:w-96 min-h-56 border rounded-xl p-5 dark:border-gray-700 dark:bg-gray-950">
                        <i
                            class="fa-solid fa-user border rounded-full dark:border-gray-700 px-2 py-2 mb-5 text-2xl  text-primary dark:text-secondary"></i>

                        <h5 class="text-xl font-semibold">User Friendly</h5>
                        <p class="text-slate-500 mt-2 ">Tampilan yang mudah digunakan</p>
                    </section>
                    <section class="w-full lg:w-96 min-h-56 border rounded-xl p-5 dark:border-gray-700 dark:bg-gray-950">
                        <i
                            class="fa-solid fa-map border rounded-full dark:border-gray-700 px-2 py-2 mb-5 text-2xl  text-primary dark:text-secondary"></i>

                        <h5 class="text-xl font-semibold">Map</h5>
                        <p class="text-slate-500 mt-2 ">Menggunakan map sehingga mempermudah user</p>
                    </section>
                    <section class="w-full lg:w-96 min-h-56 border rounded-xl p-5 dark:border-gray-700 dark:bg-gray-950">
                        <i
                            class="fa-regular fa-folder-open border rounded-full dark:border-gray-700 px-2 py-2 mb-5 text-2xl text-primary dark:text-secondary"></i>

                        <h5 class="text-xl font-semibold">Open Source</h5>
                        <p class="text-slate-500 mt-2 ">Kode sumber dapat diakses dan dikembangkan oleh siapa saja</p>
                    </section>
                </section>
            </section>
        </section>

        {{-- Contact --}}

        <section>
            <section class="container mx-auto pb-20 pt-10 px-5">

                <section class="text-center flex flex-col items-center pb-10">
                    <h1
                        class="rounded-2xl w-fit px-5 py-2 text-secondary dark:text-fifth bg-sky-100 font-semibold dark:bg-sky-900">
                        Contact Us</h1>
                    <h2 class="font-semibold text-4xl my-2">Hubungi kami untuk komunikasi dengan baik</h2>
                </section>
                <section
                    class=" flex flex-col lg:flex-row w-full border-2 border-primary dark:border-y-gray-700 rounded-xl min-h-96 h-[400px]">
                    <section class="flex flex-col w-full lg:w-1/2 p-5 gap-5">
                        <section class="w-full">
                            <h1 class="font-semibold text-2xl mb-5">Email</h1>
                            <input type="text" class="w-full bg-slate-50 dark:bg-gray-800 border-gray-600 rounded-lg">
                        </section>
                        <section class="w-full">
                            <h1 class="font-semibold text-2xl mb-5">Pesan</h1>
                            <textarea name="" id="" cols="30" rows="7"
                                class="w-full bg-slate-50 dark:bg-gray-800 border-gray-600 rounded-lg"></textarea>
                        </section>
                    </section>
                    <section class="w-full lg:w-1/2 bg-sixth dark:bg-gray-800 "></section>
                </section>
            </section>
        </section>

        {{-- End Contact --}}

    </main>
@endsection
@push('scripts')
    <script>
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
            // ctx.fillStyle = 'rgba(' + controls.red + ',' + controls.green + ',' + controls.blue + ',' + controls.alpha +
            //     ')';
            // ctx.fillRect(0, 0, width, height);
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

        function Screenshot() {
            window.open(canvas.toDataURL());
        }


        (function boucle() {
            requestAnimFrame(boucle);
            update();
            rendu(ctx);
        })();
    </script>
    <script>
        // Trigger CSS Animations when elements are scrolled into view

        // This JS uses the Intersection Observer API to determine if objects are within the viewport
        // It addes an 'in-view' class to elements when they come into view (and removes the class when not on screen)
        // Use to add @keyframe or transition animations to elements so they animate once they are on screen

        //TO USE
        // Simply add the .animate class to those HTML elements that you wish to animate. For example, <h1 class="animate">
        // Once in the viewport, the JS will add the 'in-view' class to those elements. For example, <h1 class="animate in-view">
        // Define your CSS to enable animations once that element is in view. For example, h1.in-view { }

        //Check if the document is loaded (so that this script can be placed in the <head>)
        document.addEventListener("DOMContentLoaded", () => {

            // Use Intersection Observer to determine if objects are within the viewport
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in-view');
                        return;
                    }
                    entry.target.classList.remove('in-view');
                });
            });

            // Get all the elements with the .animate class applied
            const allAnimatedElements = document.querySelectorAll('.animate');

            // Add the observer to each of those elements
            allAnimatedElements.forEach((element) => observer.observe(element));

        });
    </script>
@endpush
