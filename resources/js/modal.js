import { onValue, ref } from "firebase/database";
import { db } from "./getDb";
import { createOrUpdateChart } from "./chartJs";
import DataTable from "datatables.net-dt";
import "datatables.net-dt/css/dataTables.dataTables.css";

let dataTableInstance = null;

export function showModal(name) {
    const modal = document.getElementById("modal");
    const sensorName = document.getElementById("sensor-name");

    // const modal = document.getElementById("modal");
    modal.classList.remove("invisible", "opacity-0");
    modal.classList.add("visible", "opacity-100");

    const modalContent = modal.querySelector("div");
    modalContent.classList.remove("scale-95");
    modalContent.classList.add("scale-100");
    sensorName.textContent = name;

    onValue(ref(db, `sensor/${name}/data`), (snapshot) => {
        const sensors = snapshot.val();

        if (!sensors) return;

        const labels = Object.keys(sensors);
        const tempData = labels.map((key) => sensors[key].temp);
        const humidityData = labels.map((key) => sensors[key].humidity);
        const pressureData = labels.map((key) => sensors[key].pressure);

        // Ambil sensor pertama secara dinamis
        const sensorId = Object.keys(sensors)[0];
        const data = sensors[sensorId];

        console.log(sensors);
        console.log(labels);

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

        // Render table
        const tableElement = document
            .getElementById("data")
            .querySelector("tbody");
        tableElement.innerHTML = "";

        if (dataTableInstance) {
            dataTableInstance.destroy();
            document.querySelector("#data tbody").innerHTML = ""; // pastikan kosong
        }

        labels.forEach((key) => {
            const record = sensors[key];
            const row = document.createElement("tr");

            row.innerHTML = `
                    <td>${new Date(parseInt(key)).toLocaleString()}</td>
                    <td>${record.temp ?? "-"}</td>
                    <td>${record.humidity ?? "-"}</td>
                    <td>${record.pressure ?? "-"}</td>
                    <td>${record.ujan ? "Ya" : "Tidak"}</td>
                `;

            tableElement.appendChild(row);
        });

        // Inisialisasi DataTable hanya sekali
        dataTableInstance = new DataTable("#data");
    });
}
