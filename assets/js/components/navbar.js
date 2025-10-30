function initNavbar() {
    const dropdownToggle = document.querySelector(".nav__dropdown-toggle");
    const dropdownMenu = document.querySelector(".nav__dropdown-menu");

    if (dropdownToggle && dropdownMenu) {
        function closeDropdown() {
            dropdownMenu.classList.remove("nav__dropdown-menu--active");
            const overlay = document.querySelector(".dropdown-overlay");
            if (overlay) overlay.remove();
        }

        function openDropdown() {
            dropdownMenu.classList.add("nav__dropdown-menu--active");

            // Crear overlay
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
            overlay.addEventListener("click", closeDropdown);
        }

        // Remover listeners previos si existen
        dropdownToggle.replaceWith(dropdownToggle.cloneNode(true));
        const newDropdownToggle = document.querySelector(
            ".nav__dropdown-toggle"
        );

        newDropdownToggle.addEventListener("click", function (e) {
            e.preventDefault();
            e.stopPropagation();

            const isActive = dropdownMenu.classList.contains(
                "nav__dropdown-menu--active"
            );

            if (!isActive) {
                openDropdown();
            } else {
                closeDropdown();
            }
        });

        // Cerrar al hacer click fuera
        document.addEventListener("click", function (e) {
            if (!e.target.closest(".nav__dropdown")) {
                closeDropdown();
            }
        });
    }
}

// Ejecutar en carga inicial
document.addEventListener("DOMContentLoaded", initNavbar);

// Ejecutar después de cada navegación Turbo
document.addEventListener("turbo:load", initNavbar);
document.addEventListener("turbo:render", initNavbar);
