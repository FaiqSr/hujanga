import "ol/ol.css";
import Map from "ol/Map";
import View from "ol/View";
import TileLayer from "ol/layer/Tile";
import OSM from "ol/source/OSM";
import StadiaMaps from "ol/source/StadiaMaps";
import Feature from "ol/Feature";
import Point from "ol/geom/Point";
import { Vector as VectorSource } from "ol/source";
import { Vector as VectorLayer } from "ol/layer";
import { Icon, Style } from "ol/style";
import { fromLonLat } from "ol/proj";

const theme = localStorage.getItem("color-theme");

export function initializeMap(targetId) {
    return new Promise((resolve, reject) => {
        if (!navigator.geolocation) {
            const error = new Error("Geolocation tidak didukung browser ini.");
            console.error(error);
            reject(error);
            return;
        }

        navigator.geolocation.getCurrentPosition(
            (pos) => {
                const lon = pos.coords.longitude;
                const lat = pos.coords.latitude;

                // Pilih tile source berdasarkan tema
                const tileSource =
                    theme === "light"
                        ? new OSM()
                        : new StadiaMaps({
                              layer: "alidade_smooth_dark",
                              retina: true,
                          });

                const map = new Map({
                    target: targetId,
                    layers: [new TileLayer({ source: tileSource })],
                    view: new View({
                        center: fromLonLat([lon, lat]),
                        zoom: 12,
                    }),
                });

                // Tambahkan titik lokasi pengguna
                const userFeature = new Feature({
                    geometry: new Point(fromLonLat([lon, lat])),
                    name: "Lokasi Anda",
                });

                userFeature.setStyle(
                    new Style({
                        image: new Icon({
                            src: "/assets/images/map/gps.png", // Pastikan path-nya sesuai
                            scale: 0.1,
                        }),
                    })
                );

                const vectorSource = new VectorSource({
                    features: [userFeature],
                });

                const userLayer = new VectorLayer({
                    source: vectorSource,
                });

                map.addLayer(userLayer);

                resolve(map); // ✅ ini penting
            },
            (err) => {
                console.error("Gagal mendapatkan lokasi:", err);
                reject(err);
            }
        );
    });
}
