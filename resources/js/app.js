document.addEventListener("DOMContentLoaded", () => {
    const userButton = document.getElementById("userButton");
    const userDropdown = document.getElementById("userDropdown");

    if (!userButton || !userDropdown) return; // por si estás en otra vista

    // Abrir/cerrar al hacer clic en "DS"
    userButton.addEventListener("click", () => {
        userDropdown.style.display =
            userDropdown.style.display === "block" ? "none" : "block";
    });

    // Cerrar cuando hago clic fuera
    document.addEventListener("click", (e) => {
        if (!userButton.contains(e.target) && !userDropdown.contains(e.target)) {
            userDropdown.style.display = "none";
        }
    });
});
