function initProductToggles() {
    const toggleButtons = document.querySelectorAll(".toggle-features");

    toggleButtons.forEach((button) => {
        // Remover listeners previos clonando el botón
        const newButton = button.cloneNode(true);
        button.replaceWith(newButton);
    });

    // Ahora agregamos los listeners a los nuevos botones
    const newToggleButtons = document.querySelectorAll(".toggle-features");

    newToggleButtons.forEach((button) => {
        button.addEventListener("click", function (e) {
            e.preventDefault();

            const productId = this.dataset.productId;
            const featuresSection = document.getElementById(
                `features-${productId}`
            );
            const toggleText = this.querySelector(".toggle-text");

            if (featuresSection) {
                if (
                    featuresSection.style.display === "none" ||
                    featuresSection.style.display === ""
                ) {
                    featuresSection.style.display = "table-row";
                    toggleText.textContent = "Mostrar menos ▲";
                } else {
                    featuresSection.style.display = "none";
                    toggleText.textContent = "Mostrar más ▼";
                }
            }
        });
    });
}

// Ejecutar en carga inicial
document.addEventListener("DOMContentLoaded", initProductToggles);

// Ejecutar después de cada navegación Turbo
document.addEventListener("turbo:load", initProductToggles);
document.addEventListener("turbo:render", initProductToggles);
