@php
  $categories = [
      [
          'name' => 'DSA',

          'subcategories' => [
              ['name' => 'Arrays'],
              ['name' => 'Linked Lists'],
              ['name' => 'Trees'],
              ['name' => 'Graphs'],
              ['name' => 'Sorting'],
              ['name' => 'Searching'],
              ['name' => 'Stacks'],
              ['name' => 'Queues'],
              ['name' => 'Heaps'],
              ['name' => 'Hashing'],
              ['name' => 'Matrices'],
              ['name' => 'Dynamic Programming'],
              ['name' => 'Backtracking'],
              ['name' => 'Greedy'],
          ],
      ],
      [
          'name' => 'AI ML & Data Science',
          'subcategories' => [
              ['name' => 'Machine Learning'],
              ['name' => 'Deep Learning'],
              ['name' => 'Data Visualization'],
              ['name' => 'Data Analysis'],
              ['name' => 'Statistics'],
          ],
      ],
      [
          'name' => 'Web Development',
          'subcategories' => [
              ['name' => 'Frontend Development'],
              ['name' => 'Backend Development'],
              ['name' => 'Full-Stack Development'],
          ],
      ],
      [
          'name' => 'App Development',
          'subcategories' => [
              ['name' => 'Android Development'],
              ['name' => 'iOS Development'],
              ['name' => 'Cross-Platform Development'],
              ['name' => 'Flutter Development'],
              ['name' => 'React Native Development'],
          ],
      ]
  ];
@endphp


<section class="relative m-4 xl:m-20   overflow-hidden">
  <div class="max-w-[1440px]  mx-auto">

    @foreach ($categories as $idx => $category)
      <div class="flex items-center justify-between pt-2 xl:pt-4 mt-4 md:mt-8 xl:mt-12">
        <div>
          <h2 class="text-xl md:text-2xl xl:text-3xl font-bold text-[var(--primary-text)]">{{ $category['name'] }}</h2>
        </div>
        <div class="mr-2">
          <a
            class=" text-sm gap-2 rounded-md px-8 py-2 border border-[var(--primary-gold)] hover:bg-[var(--primary-gold)] hover:border-0   transition text-[var(--primary-text)">
            View All
          </a>
        </div>
      </div>
      @php
        $bgVar = '--subcategory-bg' . (($idx % 6) + 1);
        $itemBorder = '--item-border' . (($idx % 6) + 1);
      @endphp
      <div
        class="mt-2 md:mt-3 xl:mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-3 xl:gap-x-10 xl:gap-y-5 category-items">
        @foreach ($category['subcategories'] as $subIdx => $subcategory)
          <div class="cursor-pointer item ">
            <div class="rounded-2xl p-5 border"
              style="background-color: var({{ $bgVar }}); border-color: var({{ $itemBorder }});">
              <div class="text-white">
                <h3 class="text-lg font-semibold ">
                  {{ $subcategory['name'] }}
                </h3>
              </div>
              <div class="flex items-center justify-end ">
                <div
                  class="w-8 h-8 flex items-center justify-center text-white rounded-full hover:bg-white hover:text-[var(--primary-gold)]">
                  <i class="fa fa-arrow-right"></i>
                </div>
              </div>

            </div>
          </div>
        @endforeach
      </div>
    @endforeach

  </div>
</section>

<script>
  function updateGridItems() {
    const breakPoints = {
      xl: 4,
      lg: 3,
      md: 2,
      sm: 1
    };
    const maxRows = 2;

    document.querySelectorAll('.category-items').forEach(grid => {
      const items = grid.querySelectorAll('.item');
      let cols = breakPoints.sm;

      if (window.innerWidth >= 1280) cols = breakPoints.xl;
      else if (window.innerWidth >= 1024) cols = breakPoints.lg;
      else if (window.innerWidth >= 768) cols = breakPoints.md;

      const maxItems = cols * maxRows;

      items.forEach((item, index) => {
        if (index < maxItems) item.style.display = 'block';
        else item.style.display = 'none';
      });
    });

  }
  updateGridItems();
  window.addEventListener('resize', updateGridItems);
</script>
