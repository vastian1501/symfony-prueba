document.addEventListener("DOMContentLoaded", function () {
    const dropdownToggle = document.querySelector(".nav__dropdown-toggle");
    const dropdownMenu = document.querySelector(".nav__dropdown-menu");

    if (dropdownToggle && dropdownMenu) {
        dropdownToggle.addEventListener("click", function () {
            dropdownMenu.classList.toggle("nav__dropdown-menu--active");

            // Crear o remover el overlay
            if (dropdownMenu.classList.contains("nav__dropdown-menu--active")) {
                const overlay = document.createElement("div");
                overlay.className = "dropdown-overlay";
                overlay.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 998;
            transition: opacity 0.3s ease;
          `;
                document.body.appendChild(overlay);

                // Cerrar al hacer clic en el overlay
                overlay.addEventListener("click", function () {
                    dropdownMenu.classList.remove("nav__dropdown-menu--active");
                    overlay.remove();
                });
            } else {
                const overlay = document.querySelector(".dropdown-overlay");
                if (overlay) overlay.remove();
            }
        });

        document.addEventListener("click", function (e) {
            if (!e.target.closest(".nav__dropdown")) {
                dropdownMenu.classList.remove("nav__dropdown-menu--active");
                const overlay = document.querySelector(".dropdown-overlay");
                if (overlay) overlay.remove();
            }
        });
    }
});
