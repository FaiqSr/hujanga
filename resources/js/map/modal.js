import { limitToLast, onValue, query, ref, off } from "firebase/database";
import { db } from "./getDb";
import { createOrUpdateChart } from "./chartJs";
import DataTable from "datatables.net-dt";
import "datatables.net-dt/css/dataTables.dataTables.css";

let dataTableInstance = null;
let unsubscribe = null;
let currentRef = null;
let currentCallback = null;
let renderedKeys = new Set();

export function showModal(name) {
    // Reset rendered keys dan listener jika ada
    renderedKeys = new Set();

    if (unsubscribe) {
        unsubscribe();
        unsubscribe = null;
    }

    const modal = document.getElementById("modal");
    const sensorName = document.getElementById("sensor-name");

    modal.classList.remove("invisible", "opacity-0");
    modal.classList.add("visible", "opacity-100");

    const modalContent = modal.querySelector("div");
    modalContent.classList.remove("scale-95");
    modalContent.classList.add("scale-100");
    sensorName.textContent = name;

    const dataRef = ref(db, `sensor/${name}/data`);
    const lastFive = query(dataRef, limitToLast(5));

    // Buat callback-nya dan simpan
    const onData = (snapshot) => {
        const sensors = snapshot.val();
        if (!sensors) return;

        const labels = Object.keys(sensors).sort(); // pastikan urut waktu
        const tempData = labels.map((key) => sensors[key].temp);
        const humidityData = labels.map((key) => sensors[key].humidity);
        const pressureData = labels.map((key) => sensors[key].pressure);

        const latestKey = labels.at(-1);
        const data = sensors[latestKey];

        if (data) {
            document.getElementById("sensor-temp").textContent = data.temp;
            document.getElementById("sensor-humidity").textContent =
                data.humidity;
            document.getElementById("sensor-pressure").textContent =
                data.pressure;
            document.getElementById("sensor-ujan").textContent = data.ujan
                ? "Ya"
                : "Tidak";
        }

        createOrUpdateChart("tempChart", "Suhu (°C)", labels, tempData);
        createOrUpdateChart(
            "humidityChart",
            "Kelembaban (%)",
            labels,
            humidityData
        );
        createOrUpdateChart(
            "pressureChart",
            "Tekanan (hPa)",
            labels,
            pressureData
        );

        const tableElement = document
            .getElementById("data")
            .querySelector("tbody");

        labels.forEach((key) => {
            if (renderedKeys.has(key)) return; // Skip if already added

            const record = sensors[key];
            const row = document.createElement("tr");

            row.innerHTML = `
                <td>${new Date(record.timestamp * 1000).toLocaleString()}</td>
                <td>${record.temp ?? "-"}</td>
                <td>${record.humidity ?? "-"}</td>
                <td>${record.pressure ?? "-"}</td>
                <td>${record.ujan ? "Ya" : "Tidak"}</td>
            `;

            // Jika DataTable sudah ada, tambah baris baru
            if (dataTableInstance) {
                dataTableInstance.row.add(row).draw();
            } else {
                tableElement.appendChild(row);
            }

            renderedKeys.add(key); // Tandai sudah ditampilkan
        });

        // Inisialisasi DataTable hanya sekali
        if (!dataTableInstance) {
            dataTableInstance = new DataTable("#data");
        }
    };

    // Simpan referensi ref dan callback
    currentRef = lastFive;
    currentCallback = onData;

    // Pasang listener
    onValue(lastFive, onData);

    // Simpan fungsi unsubscribe
    unsubscribe = () => {
        if (currentRef && currentCallback) {
            off(currentRef, "value", currentCallback);
        }
    };
}

export function hideModal() {
    const modal = document.getElementById("modal");

    modal.classList.add("invisible", "opacity-0");
    modal.classList.remove("visible", "opacity-100");

    const modalContent = modal.querySelector("div");
    const tbody = document.getElementById("data").querySelector("tbody");

    // Hapus semua baris dalam DataTable
    if (dataTableInstance) {
        dataTableInstance.clear().draw();
    } else {
        tbody.innerHTML = "";
    }
    modalContent.classList.add("scale-95");
    modalContent.classList.remove("scale-100");

    // Hentikan listener Firebase jika ada
    if (unsubscribe) {
        unsubscribe();
        unsubscribe = null;
    }
}

window.ModalManager = {
    showModal,
    hideModal,
};
