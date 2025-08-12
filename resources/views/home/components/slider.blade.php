@php
  $sliders = [
      [
          'category' => 'System Design',
          'title' => 'Designing Scalable Microservices Architecture',
          'desc' =>
              'Explore the principles and patterns behind building distributed systems that can handle millions of users while maintaining high availability.',
          'author' => 'Alex Rodriguez',
          'time' => '15 min read',
          'date' => 'Dec 12, 2024',
          'image' => '/upload/system_design_slider.png',
      ],
      [
          'category' => 'Programming',
          'title' => 'Mastering Clean Code Practices',
          'desc' => 'Learn how to write clean, maintainable, and scalable code with practical examples and techniques.',
          'author' => 'Sarah Johnson',
          'time' => '10 min read',
          'date' => 'Jan 5, 2025',
          'image' => '/upload/clean_code_slider.webp',
      ],
      [
          'category' => 'Machine Learning',
          'title' => 'Deep Dive into Neural Networks',
          'desc' => 'Understand the inner workings of neural networks and how they power modern AI solutions.',
          'author' => 'Michael Lee',
          'time' => '12 min read',
          'date' => 'Feb 20, 2025',
          'image' => '/upload/machine_learning_slider.jpg',
      ],
  ];
@endphp

<section class="relative bg-[#0b1c38] text-white overflow-hidden">
  @foreach ($sliders as $index => $slider)
    <div
      class="max-w-[1440px] mx-auto flex flex-col xl:flex-row items-center justify-between px-[5%] xl:px-0 py-8 md:py-12 xl:py-32 transition-all duration-700 ease-in-out {{ $index === 0 ? '' : 'hidden' }}"
      data-slide="{{ $index }}">

      <!-- Left Content -->
      <div class="order-2 xl:order-1 xl:w-1/2 space-y-4 text-center xl:text-left ">
        <span class="px-3 py-1 bg-purple-800 rounded-full text-sm">{{ $slider['category'] }}</span>
        <h2 class="mt-4 text-2xl md:text-4xl xl:text-5xl font-bold">{{ $slider['title'] }}</h2>
        <p class="text-gray-300 text-base md:text-lg xl:text-xl">{{ $slider['desc'] }}</p>

        <div class="flex flex-wrap justify-center xl:justify-start items-center gap-4 text-sm text-gray-400">
          <span class="flex items-center gap-2"><i class="fas fa-user"></i> {{ $slider['author'] }}</span>
          <span class="flex items-center gap-2"><i class="fas fa-clock"></i> {{ $slider['time'] }}</span>
          <span class="flex items-center gap-2"><i class="fas fa-calendar"></i> {{ $slider['date'] }}</span>
        </div>

        <div class="flex flex-row justify-center xl:justify-start gap-4 pt-4">
          <button
            class="flex items-center gap-2 rounded-md px-5 py-2 bg-[var(--primary-gold)] hover:bg-white hover:text-[var(--primary-gold)] transition">
            Read Article <i class="fas fa-arrow-right"></i>
          </button>
          <button
            class="flex items-center gap-2 rounded-md px-5 py-2 text-black bg-white hover:bg-[var(--primary-gold)] hover:text-white transition">
            View All Posts <i class="fas fa-arrow-right"></i>
          </button>
        </div>
      </div>

      <!-- Right Content -->
      <div class="order-1 xl:order-2 xl:w-1/2 flex justify-center xl:justify-end">
        <img class="rounded-lg shadow-lg w-full max-w-[500px]  object-cover" src="{{ asset($slider['image']) }}"
          alt="Slider Image">
      </div>
    </div>
  @endforeach

  <!-- Navigation Buttons -->
  <button id="prevSlider"
    class="absolute top-1/2 left-3 md:left-5 transform -translate-y-1/2 bg-white text-gray-800 p-2 md:p-3 rounded-full shadow hover:bg-gray-200 transition z-20">‹</button>
  <button id="nextSlider"
    class="absolute top-1/2 right-3 md:right-5 transform -translate-y-1/2 bg-white text-gray-800 p-2 md:p-3 rounded-full shadow hover:bg-gray-200 transition z-20">›</button>

  <!-- Dots -->
  <div class="absolute bottom-2 xl:bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
    @foreach ($sliders as $index => $slider)
      <button class="dot w-3 h-3 rounded-full {{ $index === 0 ? 'bg-[var(--primary-gold)]' : 'bg-gray-400' }}"
        data-index="{{ $index }}"></button>
    @endforeach
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const sliders = document.querySelectorAll('[data-slide]');
    const dots = document.querySelectorAll('.dot');
    let current = 0;
    let interval;

    function showSlide(index) {
      sliders.forEach((slider, i) => {
        slider.classList.toggle('hidden', i !== index);
        dots[i].classList.toggle('bg-[var(--primary-gold)]', i === index);
        dots[i].classList.toggle('bg-gray-400', i !== index);
      });
      current = index;
    }

    function nextSlider() {
      showSlide((current + 1) % sliders.length);
    }

    function prevSlider() {
      showSlide((current - 1 + sliders.length) % sliders.length);
    }

    function startAutoplay() {
      interval = setInterval(nextSlider, 5000);
    }

    function stopAutoplay() {
      clearInterval(interval);
    }

    document.getElementById('prevSlider').addEventListener('click', () => {
      prevSlider();
      stopAutoplay();
      startAutoplay();
    });

    document.getElementById('nextSlider').addEventListener('click', () => {
      nextSlider();
      stopAutoplay();
      startAutoplay();
    });

    startAutoplay();

    dots.forEach((dot, index) => {
      dot.addEventListener('click', () => {
        showSlide(index);
        stopAutoplay();
        startAutoplay();
      });
    });

    document.addEventListener('keydown', (event) => {
      if (event.key === 'ArrowLeft') {
        prevSlider();
        stopAutoplay();
        startAutoplay();
      } else if (event.key === 'ArrowRight') {
        nextSlider();
        stopAutoplay();
        startAutoplay();
      }
    });

    const section = document.querySelector('section');
    section.addEventListener('mouseenter', stopAutoplay);
    section.addEventListener('mouseleave', startAutoplay);

    showSlide(current);
    startAutoplay();

  });
</script>
