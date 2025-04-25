@extends('templateLayout')
@section('title', 'Home')


@section('content')
    <main>
        <section
            class="flex min-h-svh w-full justify-center items-center flex-col lg:flex-row container mx-auto py-10 sm:py-36 lg:py-0 px-5 ">
            <section class="absolute top-0 w-80 h-80 rounded-full bg-gradient-to-r from-primary/20 to-blue-400/20 blur-3xl">
            </section>
            <section class="w-full lg:w-1/2 flex justify-center flex-col gap-10 py-20 lg:py-0">
                <section>
                    <section class="mb-5">
                        <section class="border rounded-xl px-1 py-1 border-slate-200">
                            <p class="text-slate-600 font-semibold flex items-center"><img width="30px"
                                    src="{{ asset('assets/images/logos/waterDrop.png') }}" alt=""> Inovation
                                Start
                                in
                                Here</p>
                        </section>
                    </section>
                    <section>
                        <section>
                            <h1 class="font-bold text-3xl sm:text-5xl lg:text-6xl">BIAR GA KEHUJANAN</h1>
                            <h1 class="font-bold text-3xl sm:text-5xl lg:text-6xl"> BUKA <span
                                    class="text-primary">HUJANGA?</span>
                        </section>
                        </h1>
                        <p class="text-slate-500 mt-2 sm:text-xl">Sebuah platform digital yang menyediakan informasi
                            lengkap
                            dan
                            terkini tentang kondisi cuaca di lokasi sekitarmu, membantu kamu tetap siap menghadapi
                            perubahan
                            cuaca kapan saja.</p>
                    </section>
                </section>
                <section>
                    <a href="/map"
                        class="px-5 py-2 border border-primary bg-secondary rounded-lg hover:bg-third text-white primary-gradient font-semibold">Map</a>
                    <a href="{{ route('about') }}"
                        class="px-5 py-2 border border-primary rounded-lg primary-border-button text-black dark:text-white hover:text-white transition-all ease-in-out duration-300 font-semibold">Learn
                        more...</a>
                </section>
                <section class="flex gap-10 ">
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
            <section class="w-full lg:w-1/2 flex justify-center">
                <section
                    class="w-fit h-[350px] sm:h-[450px] lg:h-[500px] rounded-lg flex items-center shadow-xl border border-slate-200">
                    <img src="{{ asset('assets/images/logos/logo.png') }}" alt="">
                </section>
            </section>
        </section>
        <section class="container mx-auto min-h-svh">

        </section>

    </main>
    <script>
        var makeItRain = function() {
            //clear out everything
            $('.rain').empty();

            var increment = 0;
            var drops = "";
            var backDrops = "";

            while (increment < 100) {
                //couple random numbers to use for various randomizations
                //random number between 98 and 1
                var randoHundo = (Math.floor(Math.random() * (98 - 1 + 1) + 1));
                //random number between 5 and 2
                var randoFiver = (Math.floor(Math.random() * (5 - 2 + 1) + 2));
                //increment
                increment += randoFiver;
                //add in a new raindrop with various randomizations to certain CSS properties
                drops += '<div class="drop" style="left: ' + increment + '%; bottom: ' + (randoFiver + randoFiver - 1 +
                        100) + '%; animation-delay: 0.' + randoHundo + 's; animation-duration: 0.5' + randoHundo +
                    's;"><div class="stem" style="animation-delay: 0.' + randoHundo + 's; animation-duration: 0.5' +
                    randoHundo + 's;"></div><div class="splat" style="animation-delay: 0.' + randoHundo +
                    's; animation-duration: 0.5' + randoHundo + 's;"></div></div>';
                backDrops += '<div class="drop" style="right: ' + increment + '%; bottom: ' + (randoFiver + randoFiver -
                        1 + 100) + '%; animation-delay: 0.' + randoHundo + 's; animation-duration: 0.5' + randoHundo +
                    's;"><div class="stem" style="animation-delay: 0.' + randoHundo + 's; animation-duration: 0.5' +
                    randoHundo + 's;"></div><div class="splat" style="animation-delay: 0.' + randoHundo +
                    's; animation-duration: 0.5' + randoHundo + 's;"></div></div>';
            }

            $('.rain.front-row').append(drops);
            $('.rain.back-row').append(backDrops);
        }

        $('.splat-toggle.toggle').on('click', function() {
            $('body').toggleClass('splat-toggle');
            $('.splat-toggle.toggle').toggleClass('active');
            makeItRain();
        });

        $('.back-row-toggle.toggle').on('click', function() {
            $('body').toggleClass('back-row-toggle');
            $('.back-row-toggle.toggle').toggleClass('active');
            makeItRain();
        });

        $('.single-toggle.toggle').on('click', function() {
            $('body').toggleClass('single-toggle');
            $('.single-toggle.toggle').toggleClass('active');
            makeItRain();
        });

        makeItRain();
    </script>
@endsection
