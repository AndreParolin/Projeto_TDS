<script>
    const images = ["Tesla1.jpeg", "Tesla2.png", "Tesla3.jpeg", "Tesla4.jpeg"];
    let currentIndex = 0;

    const prevButton = document.getElementById("prev-button");
    const nextButton = document.getElementById("next-button");
    const carouselImage = document.getElementById("carousel-image");

    function updateImage() {
        carouselImage.src = `../assets/img/${images[currentIndex]}`;
    }

    prevButton.addEventListener("click", () => {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateImage();
    });

    nextButton.addEventListener("click", () => {
        currentIndex = (currentIndex + 1) % images.length;
        updateImage();
    });
</script>