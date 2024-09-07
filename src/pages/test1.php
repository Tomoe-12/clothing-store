<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- flowbite -->
    <link rel="stylesheet" href="node_modules/flowbite/dist/flowbite.min.css">
    <script src="node_modules/flowbite/dist/flowbite.min.js"></script>

    <!-- tailwind -->
    <link href="../output.css" rel="stylesheet">

    <!-- alpine -->
    <script src="../../public/script.js"></script>
</head>

<body>
    <div class="max-w-4xl mx-auto p-4">
        <!-- Carousel Container -->
        <div class="relative">
            <!-- Images -->
            <div id="carousel" class="w-full overflow-hidden">
                <img src="../../img/images (1).jpg" class="w-full h-auto" />
                <img src="../../img/images (2).jpg" class="w-full h-auto hidden" />
                <img src="../../img/images (3).jpg" class="w-full h-auto hidden" />
            </div>

            <!-- Previous Button -->
            <button id="prevBtn"
                class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-700 text-white p-2 rounded-full">
                &#10094;
            </button>

            <!-- Next Button -->
            <button id="nextBtn"
                class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-700 text-white p-2 rounded-full">
                &#10095;
            </button>
        </div>

        <!-- Thumbnails -->
        <div class="flex justify-center mt-4 space-x-4 ">
            <img src="../../img/images (1).jpg" class="w-20 h-auto cursor-pointer thumbnail" />
            <img src="../../img/images (2).jpg" class="w-20 h-auto cursor-pointer thumbnail" />
            <img src="../../img/images (3).jpg" class="w-20 h-auto cursor-pointer thumbnail" />
            <img src="../../img/images (3).jpg" class="w-20 h-auto cursor-pointer thumbnail" />
            <img src="../../img/images (3).jpg" class="w-20 h-auto cursor-pointer thumbnail" />
        </div>
    </div>

</body>
<script>
const carousel = document.getElementById('carousel');
const images = carousel.getElementsByTagName('img');
const thumbnails = document.querySelectorAll('.thumbnail');
let currentIndex = 0;

// Function to show the current image in the carousel
function showImage(index) {
    for (let i = 0; i < images.length; i++) {
        images[i].classList.add('hidden');
    }
    images[index].classList.remove('hidden');
}

// Event listeners for next/prev buttons
document.getElementById('nextBtn').addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % images.length;
    showImage(currentIndex);
});

document.getElementById('prevBtn').addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    showImage(currentIndex);
});

// Event listeners for thumbnails
thumbnails.forEach((thumbnail, index) => {
    thumbnail.addEventListener('click', () => {
        currentIndex = index;
        showImage(index);
    });
});

// Initially show the first image
showImage(currentIndex);
</script>

</html>