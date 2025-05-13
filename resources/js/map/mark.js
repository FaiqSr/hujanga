import Feature from "ol/Feature";
import Point from "ol/geom/Point";
import { Vector as VectorSource } from "ol/source";
import { Vector as VectorLayer } from "ol/layer";
import { Icon, Style } from "ol/style";
import { fromLonLat } from "ol/proj";

let previousLayer = null;

export default function showPointsOnMap(points, map) {
    if (previousLayer) {
        map.removeLayer(previousLayer);
    }

    const features = points
        // .filter((p) => p.settings && p.settings.lat && p.settings.lon)
        .map((p) => {
            console.log(p);
            // console.log(p.settings);
            const keys = Object.keys(p.data);
            const lastKey = keys.sort().at(-1); // sort untuk urutan waktu, lalu ambil terakhir
            const lastData = p.data[lastKey];

            const feature = new Feature({
                geometry: new Point(
                    // fromLonLat([+p.settings.lon, +p.settings.lat])
                    fromLonLat([p.settings.Lon, p.settings.Lat])
                ),
                name: p.uid || "Tanpa Nama",
            });

            if (lastData.ujan) {
                feature.setStyle(
                    new Style({
                        image: new Icon({
                            src: "/assets/images/map/ujan.png",
                            scale: 0.1,
                        }),
                    })
                );
            } else {
                feature.setStyle(
                    new Style({
                        image: new Icon({
                            src: "/assets/images/map/gaUjan.png",
                            scale: 0.1,
                        }),
                    })
                );
            }

            return feature;
        });

    const vectorSource = new VectorSource({ features });
    const vectorLayer = new VectorLayer({ source: vectorSource });

    map.addLayer(vectorLayer);
    previousLayer = vectorLayer;
}
