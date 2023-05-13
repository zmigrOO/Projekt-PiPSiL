@props(['images'])
<div>
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
    <div class="carousel overflow-hidden rounded-xl bg-gray-200 scroll">
        <div class="carousel-inner flex overflow-hidden">
            @foreach ($images as $key => $image)
                <div class="carousel-item">
                    <img class="w-full h-auto" src="/images/{{ $image }}" alt="Carousel Image">
                </div>
            @endforeach
        </div>

        <div class="carousel-pagination mt-2 mb-2 flex justify-center">
            @foreach ($images as $key => $image)
                <button class="pagination-dot @if ($key === 0) active @endif"></button>
            @endforeach
        </div>
    </div>

</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const carousel = document.querySelector('.carousel-inner');
        const items = carousel.querySelectorAll('.carousel-item');
        const dots = document.querySelectorAll('.pagination-dot');

        items.forEach((item, index) => {
            item.addEventListener('click', () => {
                carousel.scrollTo({
                    left: item.offsetLeft - carousel.offsetWidth / 2 + item
                        .offsetWidth / 2,
                    behavior: 'smooth'
                });

                setActiveDot(index);
            });
        });

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                carousel.scrollTo({
                    left: items[index].offsetLeft - carousel.offsetWidth / 2 + items[
                        index].offsetWidth / 2,
                    behavior: 'smooth'
                });

                setActiveDot(index);
            });
        });

        function setActiveDot(index) {
            dots.forEach(dot => dot.classList.remove('active'));
            dots[index].classList.add('active');
        }
    });
</script>
<style>
    .carousel-inner {
        scroll-snap-type: x mandatory;
        overflow-x: hidden;
        -webkit-overflow-scrolling: touch;
        scroll-behavior: smooth;
    }

    .carousel-item {
        scroll-snap-align: center;
        flex: none;
        width: 100%;
        height: auto;
    }

    .carousel-pagination .pagination-dot {
        width: 8px;
        height: 8px;
        margin: 0 2px;
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        cursor: pointer;
    }

    .carousel-pagination .pagination-dot.active {
        background-color: rgba(0, 0, 0, 0.9);
    }
</style>
