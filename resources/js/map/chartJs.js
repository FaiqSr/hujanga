import Chart from "chart.js/auto";
import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";
import "dayjs/locale/id"; // pakai bahasa Indonesia

dayjs.extend(relativeTime);
dayjs.locale("id");

const chartInstances = {};

export function createOrUpdateChart(canvasId, label, labels, data) {
    const ctx = document.getElementById(canvasId).getContext("2d");

    const formattedTimes = labels.map((ts) => {
        return dayjs(ts * 1000).fromNow();
    });

    // Jika sudah ada instance untuk canvasId ini, update saja
    if (chartInstances[canvasId]) {
        const chart = chartInstances[canvasId];
        chart.data.labels = formattedTimes;
        chart.data.datasets[0].label = label;
        chart.data.datasets[0].data = data;
        chart.update();
    } else {
        // Buat chart baru dan simpan instance-nya
        chartInstances[canvasId] = new Chart(ctx, {
            type: "line",
            data: {
                formattedTimes,
                datasets: [
                    {
                        label,
                        data,
                        borderColor: "rgba(75,192,192,1)",
                        backgroundColor: "rgba(75,192,192,0.2)",
                        tension: 0.3,
                    },
                ],
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true },
                },
            },
        });
    }
}
