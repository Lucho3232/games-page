  const menuIcon = document.querySelector(".nav-responsive > div > svg");
  const menuList = document.querySelector(".nav-responsive .ul-nav");

  menuIcon.addEventListener("click", () => {
    menuList.classList.toggle("active");
  });

  document.querySelectorAll(".has-submenu > a").forEach(link => {
    link.addEventListener("click", e => {
      if (window.innerWidth <= 1100) {
        e.preventDefault();
        link.parentElement.classList.toggle("open");
      }
    });
  });