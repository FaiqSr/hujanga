@extends('dashboard.dashboardLayout')

@section('title', 'Dashboard')

@section('top-scripts')
    @vite(['resources/js/map/map.js'])
@endsection

@section('content')
    <section id="map" class="w-full h-screen rounded-lg"></section>

    <!-- Modal -->
    <section id="modal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 transition-all duration-300 ease-in-out opacity-0 invisible p-2 lg:p-4">

        <div class="relative w-full max-w-7xl max-h-[90vh] overflow-auto">
            <!-- Close Button -->
            <button onclick="ModalManager.hideModal()"
                class="absolute top-2 right-2 z-50 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition-colors bg-white dark:bg-gray-800 rounded-full p-2 shadow-lg">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>

            <!-- Modal Content -->
            <div
                class="bg-white dark:bg-gray-900 rounded-xl shadow-2xl overflow-hidden h-full flex flex-col lg:flex-row transition-all duration-300 transform">
                <!-- Left Column - Sensor Data -->
                <div class="w-full lg:w-1/2 p-4 overflow-y-auto">
                    <h1 id="sensor-name" class="text-xl lg:text-2xl font-bold text-center pt-4 lg:pt-10 mb-4"></h1>

                    <!-- Sensor Cards Grid -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-2 gap-3 p-2">
                        <!-- Temperature Card -->
                        <div
                            class="flex flex-col items-center border rounded-lg border-slate-200 dark:border-gray-700 p-3 h-32 lg:h-40">
                            <div
                                class="w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-primary/10 dark:bg-primary/20 flex items-center justify-center mb-2">
                                <i
                                    class="fa-solid fa-temperature-three-quarters text-primary dark:text-secondary text-lg lg:text-xl"></i>
                            </div>
                            <p class="text-sm lg:text-base">Temperature</p>
                            <p class="text-xl lg:text-2xl font-bold"><span id="sensor-temp">-</span>°C</p>
                        </div>

                        <!-- Humidity Card -->
                        <div
                            class="flex flex-col items-center border rounded-lg border-slate-200 dark:border-gray-700 p-3 h-32 lg:h-40">
                            <div
                                class="w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-primary/10 dark:bg-primary/20 flex items-center justify-center mb-2">
                                <i class="fa-solid fa-droplet text-primary dark:text-secondary text-lg lg:text-xl"></i>
                            </div>
                            <p class="text-sm lg:text-base">Humidity</p>
                            <p class="text-xl lg:text-2xl font-bold"><span id="sensor-humidity">-</span>%</p>
                        </div>

                        <!-- Pressure Card -->
                        <div
                            class="flex flex-col items-center border rounded-lg border-slate-200 dark:border-gray-700 p-3 h-32 lg:h-40">
                            <div
                                class="w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-primary/10 dark:bg-primary/20 flex items-center justify-center mb-2">
                                <i class="fa-solid fa-gauge text-primary dark:text-secondary text-lg lg:text-xl"></i>
                            </div>
                            <p class="text-sm lg:text-base">Pressure</p>
                            <p class="text-xl lg:text-2xl font-bold"><span id="sensor-pressure">-</span> hPa</p>
                        </div>

                        <!-- Rain Status Card -->
                        <div
                            class="flex flex-col items-center border rounded-lg border-slate-200 dark:border-gray-700 p-3 h-32 lg:h-40">
                            <div
                                class="w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-primary/10 dark:bg-primary/20 flex items-center justify-center mb-2">
                                <i class="fa-solid fa-cloud-rain text-primary dark:text-secondary text-lg lg:text-xl"></i>
                            </div>
                            <p class="text-sm lg:text-base">Rain Status</p>
                            <p class="text-xl lg:text-2xl font-bold"><span id="sensor-ujan">-</span></p>
                        </div>
                    </div>

                    <!-- Charts Section -->
                    <div class="mt-4 space-y-4 px-2">
                        <div class="w-full h-48 lg:h-56">
                            <canvas id="humidityChart" class="w-full h-full"></canvas>
                        </div>
                        <div class="w-full h-48 lg:h-56">
                            <canvas id="pressureChart" class="w-full h-full"></canvas>
                        </div>
                        <div class="w-full h-48 lg:h-56">
                            <canvas id="tempChart" class="w-full h-full"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Data Table -->
                <div class="w-full lg:w-1/2 bg-gray-50 dark:bg-gray-800 p-2 lg:p-4 overflow-auto">
                    <div class="sticky top-0 bg-gray-50 dark:bg-gray-800 pb-2 z-10">
                        <h2 class="text-lg lg:text-xl font-semibold mb-2">Historical Data</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table id="data" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th
                                        class="px-3 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Waktu</th>
                                    <th
                                        class="px-3 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Temp</th>
                                    <th
                                        class="px-3 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Humidity</th>
                                    <th
                                        class="px-3 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Pressure</th>
                                    <th
                                        class="px-3 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Rain</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script-bottom')

@endsection
