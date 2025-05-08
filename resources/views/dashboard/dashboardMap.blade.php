@extends('dashboard.dashboardLayout')

@section('title', 'Dashboard')

@section('content')
    <section id="map" class="w-full h-screen rounded-lg"></section>
    <section id="modal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 transition-all duration-300 ease-in-out">

        <div class="max-h-screen w-full overflow-y-auto p-4">
            <div
                class="w-full flex flex-col lg:flex-row rounded-xl shadow-2xl transform transition-all duration-300 scale-100 bg-white dark:bg-gray-900">
                <button onclick="closeModal()"
                    class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition-colors absolute top-4 right-4 z-50">
                    <i class="fa-solid fa-xmark text-2xl"></i>
                </button>

                <div
                    class=" w-full flex flex-col lg:flex-row  rounded-xl shadow-2xl  transform transition-all duration-300 scale-100">
                    <!-- Modal Header -->
                    <section class="w-full lg:w-1/2 flex flex-col">
                        <h1 id="sensor-name"></h1>
                        <section class=" max-w-full flex flex-wrap justify-center gap-5 p-5 py-20">

                            <!-- Modal Body -->
                            {{-- <div class="p-6 flex gap-2 flex-col items-center justify-center flex-wrap sm:flex-row"> --}}
                            <!-- Temperature Card -->
                            <section
                                class="flex flex-col justify-center items-center border rounded-lg border-slate-200 dark:border-gray-700 w-32 h-32 lg:w-52 lg:h-52 p-3">
                                <div
                                    class="w-12 h-12 rounded-full bg-primary/10 dark:bg-primary/20 flex items-center justify-center mr-4">
                                    <i
                                        class="fa-solid fa-temperature-three-quarters text-primary dark:text-secondary text-xl"></i>
                                </div>
                                <p>Temperature</p>

                                <p class="text-2xl font-bold"><span id="sensor-temp">-</span>°C</p>
                            </section>
                            <section
                                class="flex flex-col justify-center items-center border rounded-lg border-slate-200 dark:border-gray-700 w-32 h-32 lg:w-52 lg:h-52 p-3">
                                <div
                                    class="w-12 h-12 rounded-full bg-primary/10 dark:bg-primary/20 flex items-center justify-center mr-4">
                                    <i class="fa-solid fa-droplet text-primary dark:text-secondary text-xl"></i>
                                </div>
                                <p>Humidity</p>

                                <p class="text-2xl font-bold"><span id="sensor-humidity">-</span>%</p>
                            </section>
                            <section
                                class="flex flex-col justify-center items-center border rounded-lg border-slate-200 dark:border-gray-700 w-32 h-32 lg:w-52 lg:h-52 p-3">
                                <div
                                    class="w-12 h-12 rounded-full bg-primary/10 dark:bg-primary/20 flex items-center justify-center mr-4">
                                    <i class="fa-solid fa-gauge text-primary dark:text-secondary text-xl"></i>
                                </div>
                                <p>Pressure</p>

                                <p class="text-2xl font-bold"><span id="sensor-pressure">-</span> hPa</p>
                            </section>
                            <section
                                class="flex flex-col justify-center items-center border rounded-lg border-slate-200 dark:border-gray-700 w-32 h-32 lg:w-52 lg:h-52 p-3">
                                <div
                                    class="w-12 h-12 rounded-full bg-primary/10 dark:bg-primary/20 flex items-center justify-center mr-4">
                                    <i class="fa-solid fa-cloud-rain text-primary dark:text-secondary text-xl"></i>
                                </div>
                                <p>Rain Status</p>

                                <p class="text-2xl font-bold"><span id="sensor-ujan">-</span></p>
                            </section>
                            {{-- <div
                                    class="flex items-center p-4 rounded-xl bg-white dark:bg-gray-800 shadow-lg border border-slate-200 dark:border-gray-700">
                                    <div
                                        class="w-12 h-12 rounded-full bg-primary/10 dark:bg-primary/20 flex items-center justify-center mr-4">
                                        <i
                                            class="fa-solid fa-temperature-three-quarters text-primary dark:text-secondary text-xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-slate-500 dark:text-slate-400">Temperature</p>
                                        <p class="text-2xl font-bold"><span id="sensor-temp">-</span>°C</p>
                                    </div>
                                </div>

                                <!-- Humidity Card -->
                                <div
                                    class="flex items-center p-4 rounded-xl bg-white dark:bg-gray-800 shadow-lg border border-slate-200 dark:border-gray-700">
                                    <div
                                        class="w-12 h-12 rounded-full bg-primary/10 dark:bg-primary/20 flex items-center justify-center mr-4">
                                        <i class="fa-solid fa-droplet text-primary dark:text-secondary text-xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-slate-500 dark:text-slate-400">Humidity</p>
                                        <p class="text-2xl font-bold"><span id="sensor-humidity">-</span>%</p>
                                    </div>
                                </div>

                                <!-- Pressure Card -->
                                <div
                                    class="flex items-center p-4 rounded-xl bg-white dark:bg-gray-800 shadow-lg border border-slate-200 dark:border-gray-700">
                                    <div
                                        class="w-12 h-12 rounded-full bg-primary/10 dark:bg-primary/20 flex items-center justify-center mr-4">
                                        <i class="fa-solid fa-gauge text-primary dark:text-secondary text-xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-slate-500 dark:text-slate-400">Pressure</p>
                                        <p class="text-2xl font-bold"><span id="sensor-pressure">-</span> hPa</p>
                                    </div>
                                </div>

                                <!-- Rain Card -->
                                <div
                                    class="flex items-center p-4 rounded-xl bg-white dark:bg-gray-800 shadow-lg border border-slate-200 dark:border-gray-700">
                                    <div
                                        class="w-12 h-12 rounded-full bg-primary/10 dark:bg-primary/20 flex items-center justify-center mr-4">
                                        <i class="fa-solid fa-cloud-rain text-primary dark:text-secondary text-xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-slate-500 dark:text-slate-400">Rain Status</p>
                                        <p class="text-2xl font-bold"><span id="sensor-ujan">-</span></p>
                                    </div>
                                </div> --}}
                            {{-- </div> --}}

                        </section>
                        <section class="flex flex-col gap-5">
                            <section>
                                <canvas id="humidityChart" class="w-full"></canvas>
                            </section>
                            <section>
                                <canvas id="pressureChart"></canvas>
                            </section>
                            <section>
                                <canvas id="tempChart"></canvas>
                            </section>
                        </section>
                    </section>
                    <section class="w-full lg:w-1/2">
                    </section>
                </div>
            </div>
    </section>
@endsection

@section('script-bottom')
    <script>
        const closeModal = () => {
            const modal = document.getElementById('modal');
            const modalContent = modal.querySelector('div');

            modalContent.classList.remove('scale-100');
            modalContent.classList.add('scale-95');

            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0');

            setTimeout(() => {
                modal.classList.remove('visible');
                modal.classList.add('invisible');
            }, 300);
        }
    </script>
@endsection
