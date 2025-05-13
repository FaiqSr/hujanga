import "./bootstrap";
document.addEventListener("DOMContentLoaded", async () => {
    const theme = localStorage.getItem("color-theme");

    if (theme === "dark") {
        document.documentElement.classList.add("dark");
    } else {
        document.documentElement.classList.remove("dark");
    }
});
