import { onValue, ref } from "firebase/database";
import { db } from "./getDb";
import { createOrUpdateChart } from "./chartJs";

export function showModal(name) {
    const modal = document.getElementById("modal");
    const sensorName = document.getElementById("sensor-name");
    const temp = document.getElementById("tempChart").getContext("2d");
    const humidity = document.getElementById("humidityChart").getContext("2d");
    const pressure = document.getElementById("pressureChart").getContext("2d");

    if (name !== "Lokasi Anda") {
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

            console.log(labels);
            console.log(tempData);

            // if (data) {
            //     document.getElementById("sensor-temp").textContent = data.temp;
            //     document.getElementById("sensor-humidity").textContent =
            //         data.humidity;
            //     document.getElementById("sensor-pressure").textContent =
            //         data.pressure;
            //     document.getElementById("sensor-ujan").textContent = data.ujan
            //         ? "Ya"
            //         : "Tidak";
            // }
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
        });
    }
}
