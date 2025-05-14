import { db } from "./getDb.js";
import { ref, push } from "firebase/database";

const submitButton = document.getElementById("informationButtonSubmit");

submitButton.addEventListener("click", function () {
    const tipeHujan = document.getElementById("tipeHujan");
    const pesan = document.getElementById("pesanInformasi");
    const timestampInSeconds = Math.floor(Date.now() / 1000);
    const modal = document.getElementById("add-info-modal");
    if (!navigator.geolocation) {
        console.error("Geolocation tidak didukung browser ini.");
        return;
    }

    navigator.geolocation.getCurrentPosition(
        (pos) => {
            const dbRef = ref(db, "informasi/");

            modal.classList.remove("opacity-100", "visible");
            modal.classList.add("opacity-0", "invisible");
            push(dbRef, {
                type: tipeHujan.value,
                pesan: pesan.value,
                Lon: pos.coords.longitude,
                Lat: pos.coords.latitude,
                timestamp: timestampInSeconds,
            })
                .then(() => {
                    console.log("Data berhasil dikirim.");
                })
                .catch((error) => {
                    console.error("Gagal menyimpan data:", error);
                });
            tipeHujan.value = "";
            pesan.value = "";
        },
        (err) => {
            console.error("Gagal mendapatkan lokasi:", err);
        }
    );
});
