import Feature from 'ol/Feature';
import Point from 'ol/geom/Point';
import { Vector as VectorSource } from 'ol/source';
import { Vector as VectorLayer } from 'ol/layer';
import { Icon, Style } from 'ol/style';
import { fromLonLat } from 'ol/proj';

export default function showPointsOnMap(points) {
  const features = points.map((point) => {
    const feature = new Feature({
      geometry: new Point(fromLonLat([point.lng, point.lat])),
      name: point.name,
    });

    feature.setStyle(new Style({
      image: new Icon({
        src: 'https://openlayers.org/en/v6.5.0/examples/data/icon.png', // contoh icon
        scale: 0.05,
      }),
    }));

    return feature;
  });

  const vectorSource = new VectorSource({
    features: features,
  });

  const vectorLayer = new VectorLayer({
    source: vectorSource,
  });

  map.addLayer(vectorLayer); // asumsi `map` sudah kamu buat sebelumnya
}