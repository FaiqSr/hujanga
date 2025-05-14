@extends('dashboard.dashboardLayout')

@section('title', 'Dashboard')

@section('top-scripts')
    @vite(['resources/js/map/map.js'])
@endsection

@section('content')
    <section id="map" class="w-full h-screen rounded-lg"></section>

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

    <section
        class="fixed right-5 bottom-5 bg-slate-50 dark:bg-gray-800 dark:border-gray-700 rounded-lg border border-slate-200 p-4">
        <button id="tambahInformasi"><i class="fa-solid fa-plus text-2xl"></i></button>
    </section>

    <section id="add-info-modal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 transition-all duration-300 ease-in-out opacity-0 invisible p-2 lg:p-4">
        <div class="relative w-full max-w-md max-h-[90vh] overflow-auto">
            <!-- Close Button -->
            <button onclick="ModalsManager.hideAddInfoModal()"
                class="absolute top-2 right-2 z-50 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition-colors bg-white dark:bg-gray-800 rounded-full p-2 shadow-lg">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>

            <!-- Modal Content -->
            <div class="bg-white dark:bg-gray-900 rounded-xl shadow-2xl overflow-hidden p-6">
                <h2 class="text-xl font-bold text-center mb-6">Add Rainfall Information</h2>

                <form id="rainfall-form" class="space-y-4">
                    <div>
                        <label for="tipeHujan" class="block text-sm font-medium mb-2">Rainfall Type</label>
                        <select id="tipeHujan" name="rain_type" required
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary dark:bg-gray-800">
                            <option value="" disabled selected>Select rainfall type</option>
                            <option value="badai">Badai (Storm)</option>
                            <option value="sedang">Sedang (Moderate)</option>
                            <option value="rintik">Rintik (Drizzle)</option>
                        </select>
                    </div>

                    <div>
                        <label for="pesanInformasi" class="block text-sm font-medium mb-2">Message</label>
                        <textarea id="pesanInformasi" name="pesanInformasi" rows="4" required
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary dark:bg-gray-800"
                            placeholder="Enter additional information about the rainfall..."></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="button" id="informationButtonSubmit"
                            class="w-full bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded-md transition-colors">
                            Submit Information
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Notification Modal -->
    <div id="info-modal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0">
            <!-- Modal panel -->
            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white" id="modal-headline">
                            Informasi pengguna
                        </h3>
                        <button type="button" class="text-gray-400 hover:text-gray-500"
                            onclick="ModalsManager.hideInformationModal()">
                            <span class="sr-only">Close</span>
                            <i class="fa-solid fa-times"></i>
                        </button>
                    </div>

                    <div class="max-h-96 overflow-y-auto" id="infoItems">

                    </div>
                </div>
                <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm dark:bg-gray-700 dark:text-white dark:border-gray-600"
                        onclick="ModalsManager.hideInformationModal()">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-bottom')
    <script>
        // Add this to your existing ModalManager object or create it if it doesn't exist
        const ModalsManager = {
            // ... existing modal functions ...

            showAddInfoModal: function() {
                const modal = document.getElementById('add-info-modal');
                modal.classList.remove('opacity-0', 'invisible');
                modal.classList.add('opacity-100', 'visible');
            },

            hideAddInfoModal: function() {
                const modal = document.getElementById('add-info-modal');
                modal.classList.remove('opacity-100', 'visible');
                modal.classList.add('opacity-0', 'invisible');
            },

            hideInformationModal: () => {
                const modal = document.getElementById('info-modal');
                const items = document.getElementById('infoItems')
                modal.classList.remove('overflow-hidden');
                modal.classList.add('hidden');
                items.INNERHTML = ""
            }
        };

        // Update your button event listener
        const button = document.getElementById('tambahInformasi');
        button.addEventListener('click', () => {
            ModalsManager.showAddInfoModal();
        });

        // Form submission handler
        document.getElementById('rainfall-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const rainType = document.getElementById('rain-type').value;
            const message = document.getElementById('message').value;

            // Here you would typically send this data to your server

            // You can add AJAX/fetch here to submit the data
            // fetch('/api/rainfall-info', {
            //     method: 'POST',
            //     body: JSON.stringify({ rainType, message }),
            //     headers: { 'Content-Type': 'application/json' }
            // })
            // .then(response => response.json())
            // .then(data => {
            //     console.log('Success:', data);
            //     ModalManager.hideAddInfoModal();
            // })
            // .catch(error => console.error('Error:', error));

            // For now, just close the modal
            ModalsManager.hideAddInfoModal();
        });
    </script>
@endsection
