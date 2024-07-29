const modal = document.getElementById("modalSupport");
const btnShowModal = document.querySelectorAll(".showModal");
const btnClose = document.getElementById("closeModal");

btnShowModal.forEach((item) =>
  item.addEventListener("click", (e) => {
    modal.classList.remove("hidden");
    document.body.style.overflowY = "hidden";
  })
);

btnClose.addEventListener("click", (e) => {
  modal.classList.add("hidden");
  document.body.style.overflowY = "auto";
});

const megaMenu = document.querySelectorAll(".mega-menu");
const megaMenuContent = document.querySelectorAll(".mega-menu-content");

megaMenu.forEach((item, index) => {
  item.addEventListener("mouseenter", (e) => {
    megaMenuContent[index].classList.remove("hidden");
  });
  item.addEventListener("mouseleave", (e) => {
    const time = setTimeout(() => {
      megaMenuContent[index].classList.add("hidden");
    }, 200);
    megaMenuContent[index].addEventListener("mouseenter", () => {
      clearTimeout(time);
    });
    megaMenuContent[index].addEventListener("mouseleave", () => {
      megaMenuContent[index].classList.add("hidden");
    });
  });
});

const menuMobile = document.getElementById("menu-mobile");
const toggleMenu = document.getElementById("toggleMenu");

toggleMenu.addEventListener("click", () => {
  menuMobile.classList.toggle("active");
  if (menuMobile.classList.contains("active")) {
    toggleMenu.querySelector("i").classList.replace("bx-menu", "bx-x");
    document.body.style.overflowY = "hidden";
  } else {
    toggleMenu.querySelector("i").classList.replace("bx-x", "bx-menu");
    document.body.style.overflowY = "auto";
  }
});

document.querySelector("main").style.marginTop =
  document.querySelector("header").offsetHeight;
