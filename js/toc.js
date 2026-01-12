const toc = document.querySelector(".toc");
const tocToggle = document.querySelector(".toc-toggle");

// Estado inicial
if (window.innerWidth <= 768) {
  toc.classList.add("collapsed");
  tocToggle.textContent = "Show";
  tocToggle.setAttribute("aria-expanded", "false");
} else {
  toc.classList.remove("collapsed");
  tocToggle.textContent = "Hide";
  tocToggle.setAttribute("aria-expanded", "true");
}

// Toggle manual
tocToggle.addEventListener("click", () => {
  const isCollapsed = toc.classList.toggle("collapsed");

  tocToggle.textContent = isCollapsed ? "Show" : "Hide";
  tocToggle.setAttribute("aria-expanded", String(!isCollapsed));
});
