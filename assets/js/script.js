document.addEventListener('DOMContentLoaded', function () {
    var imageUrls = [
        "images/slide1.jpg",
        "images/slide2.jpg",
        "images/slide3.jpg",
    ];

    var sliderContainer = document.getElementById("image-slider");

    imageUrls.forEach(function (imageUrl) {
        var imgElement = document.createElement("img");
        imgElement.src = imageUrl;
        imgElement.classList.add("slider-image");
        sliderContainer.appendChild(imgElement);
    });

    var currentIndex = 0;
    var sliderImages = document.querySelectorAll(".slider-image");

    function showImage(index) {
        sliderImages.forEach(function (img, i) {
            img.style.display = i === index ? "block" : "none";
        });
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % imageUrls.length;
        showImage(currentIndex);
    }

    function prevImage() {
        currentIndex = (currentIndex - 1 + imageUrls.length) % imageUrls.length;
        showImage(currentIndex);
    }

    showImage(currentIndex);
    document.getElementById("nextBtn").addEventListener("click", nextImage);
    document.getElementById("prevBtn").addEventListener("click", prevImage);
});