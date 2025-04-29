import 'ol/ol.css';
import Map from 'ol/Map';
import View from 'ol/View';
import TileLayer from 'ol/layer/Tile';
import OSM from 'ol/source/OSM';
import { fromLonLat } from 'ol/proj';

export function initializeMap(targetId) {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition((pos) => {
            const longitude = pos.coords.longitude;
            const latitude = pos.coords.latitude;

            const map = new Map({
                target: targetId,
                layers: [
                    new TileLayer({
                        source: new OSM()
                    })
                ],
                view: new View({
                    center: fromLonLat([longitude, latitude]),
                    zoom: 12
                })
            });
            return map;

            // Kalau mau return map, di sini kamu bisa
            // return map;
        }, (error) => {
            console.error('Error getting location:', error);
        });
    } else {
        console.error('Geolocation not supported.');
    }

}
