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

    // console.log(points);

    const features = points
        // .filter((p) => p.settings && p.settings.lat && p.settings.lon)
        .map((p) => {
            // console.log(p.settings);
            const feature = new Feature({
                geometry: new Point(
                    // fromLonLat([+p.settings.lon, +p.settings.lat])
                    fromLonLat([p.settings.Lon, p.settings.Lat])
                ),
                name: p.uid || "Tanpa Nama",
            });

            feature.setStyle(
                new Style({
                    image: new Icon({
                        src: "https://openlayers.org/en/v6.5.0/examples/data/icon.png",
                        scale: 1,
                    }),
                })
            );

            return feature;
        });

    const vectorSource = new VectorSource({ features });
    const vectorLayer = new VectorLayer({ source: vectorSource });

    map.addLayer(vectorLayer);
    previousLayer = vectorLayer;
}
