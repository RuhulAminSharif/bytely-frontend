@php
  $categories = [
      [
          'category_name' => 'System Design',
          'category_desc' => 'Scalable architecture patterns, distributed systems, and infrastructure design.',
          'icon' => 'fas fa-desktop',
          'post_count' => 10,
      ],
      [
          'category_name' => 'Web Development',
          'category_desc' => 'Frontend development, backend development, and full-stack development.',
          'icon' => 'fas fa-code',
          'post_count' => 15,
      ],
      [
          'category_name' => 'Database Management',
          'category_desc' => 'Database design, query optimization, and data modeling.',
          'icon' => 'fas fa-database',
          'post_count' => 8,
      ],
      [
          'category_name' => 'Mobile Development',
          'category_desc' => 'Android development, iOS development, and cross-platform development.',
          'icon' => 'fas fa-mobile-alt',
          'post_count' => 12,
      ],
      [
          'category_name' => 'Artificial Intelligence',
          'category_desc' => 'Machine learning, deep learning, and natural language processing.',
          'icon' => 'fas fa-robot',
          'post_count' => 5,
      ],
      [
          'category_name' => 'Cloud Computing',
          'category_desc' => 'AWS, Azure, and Google Cloud Platform, and serverless computing.',
          'icon' => 'fas fa-cloud',
          'post_count' => 3,
      ],
  ];

@endphp

<section class="relative m-4 xl:m-20   overflow-hidden">
  <div class="max-w-[1440px] bg-[var(--section-background)] mx-auto">
    <div class="flex flex-col items-center justify-center space-y-4 text-center">
      <h2 class="text=4xl md:text-5xl font-bold text-[var(--primary-text)]">
        <span> <i class="fas fa-thin fa-book-open"></i> </span>
        Explore Categories
      </h2>
      <p class="xl:w-3/4 text-lg md:text-xl text-[var(--secondary-text)]">Discover comprehensive guides and tutorials across
        various domains of technology and computer science</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 xl:gap-12 mt-12">

      @foreach ($categories as $idx => $category)
        @php
          $bgVar = '--item-bg' . (($idx % 6) + 1);
          $itemBorder = '--item-border' . (($idx % 6) + 1);
        @endphp
        <div class="cursor-pointer group">

          <div
            class="rounded-2xl p-8 border transition-all duration-300 transform group-hover:-translate-y-2 hover:shadow-lg"
            style="background-color: var({{ $bgVar }}); border-color: var({{ $itemBorder }});">

            <div class="flex items-center space-x-2 justify-between">
              <span class="h-14 w-14 bg-[var(--icon-background)] flex items-center justify-center rounded-full">
                <i class="{{ $category['icon'] }} text-2xl"></i>
              </span>
              <p class="py-0.5 px-2.5 bg-[var(--text-bg)] rounded-xl">{{ $category['post_count'] }} posts</p>
            </div>

            <div class="mt-4 space-y-2 text-[var(--primary-text)]">
              <h3 class="text-lg font-semibold transition-colors duration-300 group-hover:text-[var(--primary-gold)]">
                {{ $category['category_name'] }}
              </h3>
              <p class="text-[var(--secondary-text)] mt-2">{{ $category['category_desc'] }}</p>
            </div>

          </div>
        </div>
      @endforeach

    </div>

    <div class="flex items-center justify-center mt-4 xl:mt-12">
      <button
        class="flex items-center justify-center text-sm gap-2 rounded-md px-8 py-2   transition text-[var(--white-text)] bg-black">
        View All Categories <i class="fas fa-arrow-right"></i>
      </button>
    </div>
  </div>
</section>
