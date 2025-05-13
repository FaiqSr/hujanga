import { initializeMap } from "./olMap.js";
import "./getDb.js";
import { showModal } from "./modal.js";
import connectToFirebase from "./getDb.js";

document.addEventListener("DOMContentLoaded", async () => {
    const theme = localStorage.getItem("color-theme");

    if (theme === "dark") {
        document.documentElement.classList.add("dark");
    } else {
        document.documentElement.classList.remove("dark");
    }
    try {
        const map = await initializeMap("map");
        connectToFirebase(map); // 🔁 Mulai realtime listener
        map.on("singleclick", function (evt) {
            map.forEachFeatureAtPixel(evt.pixel, function (feature) {
                const name = feature.get("name");
                const content = feature.get("content");

                // console.log(content);
                if (name !== "Lokasi Anda") {
                    showModal(name);
                }

                // Tampilkan modal (bisa pakai Bootstrap atau custom)
                // showModal(name, content);
            });
        });
    } catch (error) {
        console.error("Gagal inisialisasi peta:", error);
    }
});
