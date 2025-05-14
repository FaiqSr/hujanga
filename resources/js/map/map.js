import { initializeMap } from "./olMap.js";
import "./getDb.js";
import { showModal } from "./modal.js";
import getSensorData from "./getDb.js";
import "./addInformation.js";
import {
    createInformationMark,
    showInformationModal,
} from "./createInformationMark.js";

document.addEventListener("DOMContentLoaded", async () => {
    try {
        const map = await initializeMap("map");
        getSensorData(map);
        createInformationMark(map);
        map.on("singleclick", function (evt) {
            map.forEachFeatureAtPixel(evt.pixel, function (feature) {
                const name = feature.get("name");
                const type = feature.get("type");
                const content = feature.get("content");
                console.log(name);

                console.log(type);

                switch (type) {
                    case "userInformation":
                        showInformationModal(name);
                        break;
                    case "sensor":
                        showModal(name);
                        break;
                }

                // console.log(content);

                // Tampilkan modal (bisa pakai Bootstrap atau custom)
                // showModal(name, content);
            });
        });
    } catch (error) {
        console.error("Gagal inisialisasi peta:", error);
    }
});
