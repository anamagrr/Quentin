document.addEventListener("DOMContentLoaded", () => {
  const track = document.querySelector(".galery-track");
  const prev = document.querySelector(".prev");
  const next = document.querySelector(".next");
  const images = track.querySelectorAll("img");

  let currentIndex = 0;
  const imgWidth = 240; 

  function updateSlider() {
    const offset = currentIndex * imgWidth;
    track.style.transform = `translateX(-${offset}px)`;
  }

  next.addEventListener("click", () => {
    if (currentIndex < images.length - 3) {
      currentIndex++;
      updateSlider();
    }
  });

  prev.addEventListener("click", () => {
    if (currentIndex > 0) {
      currentIndex--;
      updateSlider();
    }
  });

  // Zoom 
  const modal = document.getElementById("modal");
  const modalImg = document.getElementById("modalImg");
  const closeModal = document.getElementById("closeModal");

  images.forEach((img) => {
    img.addEventListener("click", () => {
      modalImg.src = img.src;
      modal.style.display = "flex";
    });
  });

  closeModal.addEventListener("click", () => {
    modal.style.display = "none";
  });

  modal.addEventListener("click", (e) => {
    if (e.target === modal) {
      modal.style.display = "none";
    }
  });
});
