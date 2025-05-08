import Chart from "chart.js/auto";

const chartInstances = {};

export function createOrUpdateChart(canvasId, label, labels, data) {
    const ctx = document.getElementById(canvasId).getContext("2d");

    // Jika sudah ada instance untuk canvasId ini, update saja
    if (chartInstances[canvasId]) {
        const chart = chartInstances[canvasId];
        chart.data.labels = labels;
        chart.data.datasets[0].label = label;
        chart.data.datasets[0].data = data;
        chart.update();
    } else {
        // Buat chart baru dan simpan instance-nya
        chartInstances[canvasId] = new Chart(ctx, {
            type: "line",
            data: {
                labels,
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
