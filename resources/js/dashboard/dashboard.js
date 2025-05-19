import { onValue, ref } from "firebase/database";
import { db } from "../firebase/firebase";
import { getDistanceFromLatLonInKm } from "../helpers/helper";

document.addEventListener("DOMContentLoaded", async () => {
    getTheNumberOfUsers();
    await getClosestSensor();
    console.log("fak");
});

const getTheNumberOfUsers = () => {
    const userRef = ref(db, "users");
    const numberOfUsers = document.getElementById("numberOfUsers");

    onValue(userRef, (snapshot) => {
        const data = snapshot.val();
        const dataUser = Object.values(data);
        const users = dataUser.length;
        numberOfUsers.innerHTML = users;
    });
};

const getClosestSensor = async () => {
    const sensorRef = ref(db, "/sensor");
    if (!navigator.geolocation) {
        const error = new Error("Geolocation tidak didukung browser ini.");
        console.error(error);
        return;
    }
    navigator.geolocation.getCurrentPosition(async (pos) => {
        const myLon = pos.coords.longitude;
        const myLat = pos.coords.latitude;
        onValue(sensorRef, (snapshot) => {
            const data = snapshot.val();
            const sensor = Object.values(data);
            console.log(data);
            const sensorData = sensor.map((item) => {
                return item.settings;
            });
            console.log(sensorData[sensorData.length - 1]);
        });
    });
};
