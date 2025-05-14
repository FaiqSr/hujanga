import { getDatabase, ref, onValue } from "firebase/database";
import { app } from "./firebaseSdk"; // pastikan sudah setup firebase
import showPointsOnMap from "./mark"; // fungsi yang render marker ke map

export const db = getDatabase(app);

export default function getSensorData(map) {
    const sensorRef = ref(db, "/sensor");
    onValue(sensorRef, (snapshot) => {
        const data = snapshot.val();

        if (!data) {
            console.log("Tidak ada data dari Firebase.");
            return;
        }

        // Ubah object ke array dan tambahkan uid
        const points = Object.entries(data).map(([uid, value]) => ({
            uid,
            ...value,
        }));

        // console.log("getSensorData", points);

        // Tampilkan ke peta
        showPointsOnMap(points, map);
    });
}
