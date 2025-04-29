import { getDatabase, ref, onValue } from "firebase/database";
import showPointsOnMap from "./mark";

const db = getDatabase();
const pointsRef = ref(db, 'points'); // contoh path

function connectToFirebase(){
    onValue(pointsRef, (snapshot) => {
      const data = snapshot.val();
      if (data) {
        // Ubah object ke array
        const pointArray = Object.keys(data).map((key) => ({
          id: key,
          ...data[key],
        }));
    
        // Panggil fungsi untuk tampilkan di olMap
        showPointsOnMap(pointArray);
      }
    });
}


export default connectToFirebase();