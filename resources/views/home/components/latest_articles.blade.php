@php
  $latestArticles = [
      [
          'image' => 'upload/machine_learning_slider.jpg',
          'category' => 'Deep Learning',
          'title' => 'Advanced Neural Network Architectures for Computer Vision',
          'desc' =>
              'Explore the latest developments in convolutional neural networks and their applications in computer vision tasks.',
          'author' => 'John Doe',
          'date' => 'May 15, 2023',
          'time' => '6 min read',
          'reacts' => 30,
          'comments' => 5,
          'views' => 1000,
      ],
      [
          'image' => 'upload/system_design_slider.png',
          'category' => 'System Design',
          'title' => 'Designing Scalable Microservices Architecture',
          'desc' =>
              'Explore the principles and patterns behind building distributed systems that can handle millions of users while maintaining high availability.',
          'author' => 'Alex Rodriguez',
          'date' => 'Dec 12, 2024',
          'time' => '15 min read',
          'reacts' => 50,
          'comments' => 10,
          'views' => 2000,
      ],
      [
          'image' => 'upload/clean_code_slider.webp',
          'category' => 'Programming',
          'title' => 'Mastering Clean Code Practices',
          'desc' => 'Learn how to write clean, maintainable, and scalable code with practical examples and techniques.',
          'author' => 'Sarah Johnson',
          'date' => 'Jan 5, 2025',
          'time' => '10 min read',
          'reacts' => 40,
          'comments' => 8,
          'views' => 1500,
      ],
      [
          'image' => 'upload/machine_learning_slider.jpg',
          'category' => 'Deep Learning',
          'title' => 'Advanced Neural Network Architectures for Computer Vision',
          'desc' =>
              'Explore the latest developments in convolutional neural networks and their applications in computer vision tasks.',
          'author' => 'John Doe',
          'date' => 'May 15, 2023',
          'time' => '6 min read',
          'reacts' => 30,
          'comments' => 5,
          'views' => 1000,
],
[
    'image' => 'upload/system_design_slider.png',
    'category' => 'System Design',
    'title' => 'Designing Scalable Microservices Architecture',
    'desc' =>
        'Explore the principles and patterns behind building distributed systems that can handle millions of users while maintaining high availability.',
    'author' => 'Alex Rodriguez',
    'date' => 'Dec 12, 2024',
    'time' => '15 min read',
    'reacts' => 50,
    'comments' => 10,
    'views' => 2000,
],
[
    'image' => 'upload/clean_code_slider.webp',
    'category' => 'Programming',
    'title' => 'Mastering Clean Code Practices',
    'desc' => 'Learn how to write clean, maintainable, and scalable code with practical examples and techniques.',
    'author' => 'Sarah Johnson',
    'date' => 'Jan 5, 2025',
    'time' => '10 min read',
    'reacts' => 40,
    'comments' => 8,
    'views' => 1500,
],
[
    'image' => 'upload/machine_learning_slider.jpg',
    'category' => 'Deep Learning',
    'title' => 'Advanced Neural Network Architectures for Computer Vision',
    'desc' =>
        'Explore the latest developments in convolutional neural networks and their applications in computer vision tasks.',
    'author' => 'John Doe',
    'date' => 'May 15, 2023',
    'time' => '6 min read',
    'reacts' => 30,
    'comments' => 5,
    'views' => 1000,
],

  ];
@endphp


<section class="relative m-4 xl:m-20   overflow-hidden">
  <div class="max-w-[1440px]  mx-auto">
    <div class="flex justify-between pt-2 xl:pt-4 mt-4 md:mt-8 xl:mt-12 ">
      <div>
        <h2 class="text-2xl md:text-4xl xl:text-5xl font-bold text-[var(--primary-text)] mb-2 md:mb-3 xl:mb-4">
          <span> <i class="fas fa-newspaper"></i> </span>
          Latest Articles
        </h2>
        <p class="text-lg md:text-xl text-[var(--secondary-text)]">
          Stay updated with the newest insights and tutorials
        </p>
      </div>
      <div class="mr-2 hidden md:block">
        <a href="#"
          class="text-sm gap-2 rounded-md px-8 py-2 border border-[var(--primary-gold)] hover:bg-[var(--primary-gold)] hover:border-0   transition text-[var(--primary-text)">

          View All Posts
        </a>
      </div>
    </div>

    <div
      class="mt-2 md:mt-3 xl:mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-x-6 gap-y-3 xl:gap-x-10 xl:gap-y-5 all-latest-articles">
      @foreach ($latestArticles as $idx => $article)
        <div class="cursor-pointer curr-article rounded-2xl border">
          {{-- image part --}}
          <div class="relative">
            <img src="{{ asset($article['image']) }}" alt="{{ $article['title'] }}"
              class="w-full h-48 object-cover rounded-t-2xl">

            <!-- Category Badge -->
            <span class="absolute top-3 left-3 bg-indigo-600 text-white text-xs px-3 py-1 rounded-full">
              {{ $article['category'] }}
            </span>

            <!-- New Badge -->
            <span class="absolute top-3 right-3 bg-yellow-400 text-black text-xs px-3 py-1 rounded-full">
              New
            </span>

          </div>

          {{-- description part --}}
          <div class="p-6">
            {{-- title and desc --}}
            <div class="mb-4">
              <h3 class="mb-3 text-[var(--primary-text)] hover:text-[var(--primary-gold)] text-[20px] font-semibold">
                {{ $article['title'] }} </h3>
              <p class="text-[16px] text-[var(--secondary-text)] text-justify"> {{ $article['desc'] }} </p>
            </div>
            {{-- author, time and date --}}
            <div class="flex flex-col sm:flex-row justify-between mb-4 text-[var(--secondary-text)] ">
              <span class="flex items-center gap-4 sm:gap-2"><i class="fas fa-user"></i> {{ $article['author'] }}</span>
              <span class="flex items-center gap-4 sm:gap-2"><i class="fas fa-clock"></i> {{ $article['time'] }}</span>
              <span class="flex items-center gap-4 sm:gap-2"><i class="fas fa-calendar"></i>
                {{ $article['date'] }}</span>
            </div>
            {{-- reacts, comments and views --}}
            <div class="flex flex-row justify-between pt-4 ">
              <div class="flex flex-row text-[var(--secondary-text)]">
                <span class="flex items-center gap-1 mr-2"><i class="fas fa-thumbs-up"></i> {{ $article['reacts'] }}
                </span>
                <span class="flex items-center gap-1 mr-2"><i class="fas fa-comment"></i> {{ $article['comments'] }}
                </span>
                <span class="flex items-center gap-1 mr-2"><i class="fas fa-eye"></i> {{ $article['views'] }} </span>
              </div>
              {{-- read more --}}
              <div class="text-[var(--primary-text)]">
                <a href="#"
                  class="text-sm gap-2 rounded-md px-2 sm:px-4 md:px-6 xl:px-8 py-2 hover:bg-[var(--primary-gold)] hover:border-0   transition">
                  Read More
                  <span class="ml-2"> <i class="fas fa-arrow-right"></i> </span>
                </a>
              </div>
            </div>
          </div>

        </div>
      @endforeach

    </div>
  </div>
</section>


<script>
  function updateLatestArticles() {
    const maxRows = 2;

    document.querySelectorAll('.all-latest-articles').forEach(grid => {
      const items = grid.querySelectorAll('.curr-article');

      const computedStyle = window.getComputedStyle(grid);
      const cols = computedStyle.gridTemplateColumns.split(" ").length;

      const maxItems = cols * maxRows;

      items.forEach((item, index) => {
        if (index < maxItems) {
          item.classList.remove('hidden');
        } else {
          item.classList.add('hidden');
        }
      });
    });
  }

  updateLatestArticles();
  window.addEventListener('resize', updateLatestArticles);
</script>
