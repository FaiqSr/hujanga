import { db } from "./getDb.js";
import { ref, onValue, get, child } from "firebase/database";
import Feature from "ol/Feature";
import Point from "ol/geom/Point";
import { Vector as VectorSource } from "ol/source";
import { Vector as VectorLayer } from "ol/layer";
import { Icon, Style } from "ol/style";
import { fromLonLat } from "ol/proj";
import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";
import "dayjs/locale/id";

dayjs.extend(relativeTime);
dayjs.locale("id");

let previousLayer = null;

export function createInformationMark(map) {
    const dbRef = ref(db, "informasi");

    onValue(dbRef, (snapshot) => {
        const data = snapshot.val();
        if (!data) return;

        const points = Object.entries(data).map(([key, value]) => ({
            ...value,
            key,
        }));

        const nowTimestamp = Date.now();
        const fiveMinutesAgoTimestamp = nowTimestamp - 5 * 60 * 1000;

        const features = points.map((data) => {
            const timestamp = data.timestamp * 1000;
            console.log(timestamp);
            console.log(fiveMinutesAgoTimestamp);
            if (timestamp >= fiveMinutesAgoTimestamp) {
                return createMark(map, data);
            }
            return undefined;
        });

        const filteredFeatures = features.filter(Boolean);
        if (filteredFeatures.length === 0) return;

        const vectorSource = new VectorSource({ features: filteredFeatures });
        const vectorLayer = new VectorLayer({ source: vectorSource });
        map.addLayer(vectorLayer);
        previousLayer = vectorLayer;
    });
}

const createMark = (map, points) => {
    if (previousLayer) {
        map.removeLayer(previousLayer);
    }

    const feature = new Feature({
        geometry: new Point(fromLonLat([points.Lon, points.Lat])),
        name: points.key || "Tanpa Nama",
        type: "userInformation",
    });

    switch (points.type) {
        case "sedang":
            feature.setStyle(
                new Style({
                    image: new Icon({
                        src: "/assets/images/map/type/sedang.png",
                        scale: 0.1,
                    }),
                })
            );
            break;
        case "badai":
            feature.setStyle(
                new Style({
                    image: new Icon({
                        src: "/assets/images/map/type/badai.png",
                        scale: 0.1,
                    }),
                })
            );
            break;
        case "rintik":
            feature.setStyle(
                new Style({
                    image: new Icon({
                        src: "/assets/images/map/type/rintik.png",
                        scale: 0.1,
                    }),
                })
            );
            break;
        default:
            break;
    }

    return feature;
};

export function showInformationModal(name) {
    const modal = document.getElementById("info-modal");
    const items = document.getElementById("infoItems");
    const dbRef = ref(db);
    if (modal.classList.contains("hidden")) {
        modal.classList.remove("hidden");
        document.body.classList.add("overflow-hidden");
    } else {
        modal.classList.add("hidden");
        document.body.classList.remove("overflow-hidden");
    }

    console.log(name);

    get(child(dbRef, `informasi/${name}`))
        .then((snapshot) => {
            if (snapshot.exists()) {
                const data = snapshot.val();

                items.innerHTML = `<div
                                    class="p-3 border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 pt-0.5">
                                            <i class="fa-solid fa-info-circle text-blue-500"></i>
                                        </div>
                                        <div class="ml-3 w-0 flex-1">
                                            <p class="text-sm font-medium text-gray-900 dark:text-white">
                                                ${data.type}
                                            </p>
                                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                                ${data.pesan}
                                            </p>
                                            <p class="mt-1 text-xs text-gray-400">
                                                ${dayjs(
                                                    data.timestamp * 1000
                                                ).fromNow()}
                                            </p>
                                        </div>
                                    </div>
                                </div>
`;
            } else {
                console.log("No data available");
            }
        })
        .catch((err) => {
            console.log(err);
        });
}
