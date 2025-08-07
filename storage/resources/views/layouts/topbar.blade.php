@php
  $x = 1;
  $tutorialCategories = [
      [
          'id' => 1,
          'name' => 'Web Development',
          'icon' => 'fas fa-code',
          'subcategories' => [
              ['id' => 1, 'name' => 'Frontend Development', 'icon' => 'fas fa-paint-brush'],
              ['id' => 2, 'name' => 'Backend Development', 'icon' => 'fas fa-database'],
          ],
      ],
      [
          'id' => 2,
          'name' => 'App Development',
          'icon' => 'fas fa-mobile-alt',
      ],
      [
          'id' => 3,
          'name' => 'Data Science',
          'icon' => 'fas fa-database',
          'subcategories' => [
              ['id' => 1, 'name' => 'Machine Learning', 'icon' => 'fas fa-robot'],
              ['id' => 2, 'name' => 'Deep Learning', 'icon' => 'fas fa-brain'],
          ],
      ],
  ];

  $learningPaths = [
      [
          'id' => 1,
          'name' => 'Data Structures and Algorithms',
          'icon' => 'fas fa-code',
          'subcategories' => [
              ['id' => 1, 'name' => 'Arrays', 'icon' => 'fas fa-code'],
              ['id' => 2, 'name' => 'Linked Lists', 'icon' => 'fas fa-code'],
              ['id' => 3, 'name' => 'Trees', 'icon' => 'fas fa-code'],
              ['id' => 4, 'name' => 'Graphs', 'icon' => 'fas fa-code'],
          ],
      ],
      [
          'id' => 2,
          'name' => 'Artificial Intelligence',
          'icon' => 'fas fa-robot',
          'subcategories' => [
              ['id' => 1, 'name' => 'Machine Learning', 'icon' => 'fas fa-robot'],
              ['id' => 2, 'name' => 'Deep Learning', 'icon' => 'fas fa-brain'],
          ],
      ],
      [
          'id' => 3,
          'name' => 'System Design',
          'icon' => 'fas fa-database',
      ],
  ];

  function renderSubmenu($categories, $isMobile = false)
  {
      $indent = $isMobile ? 'left-full' : 'top-full left-0';
      $submenuWidth = $isMobile ? 'w-44 sm:w-52 md:w-60' : 'w-56 sm:w-64 md:w-72 lg:w-80';
      $nestedSubmenuWidth = $isMobile ? 'w-40 sm:w-44 md:w-48' : 'w-48 sm:w-56 md:w-60 lg:w-64';
      $html =
          '<ul class="absolute ' .
          $indent .
          ' mt-1 ' .
          $submenuWidth .
          ' bg-white shadow-lg rounded-md opacity-0 invisible
                 group-hover:opacity-100 group-hover:visible transition duration-200 text-xs sm:text-sm md:text-base lg:text-lg">';

      foreach ($categories as $category) {
          $html .= '<li class="relative group/subitem flex items-center justify-between px-2 sm:px-3 md:px-4 py-1 sm:py-2 mb-1
                     hover:bg-[var(--primary-gold)] hover:text-white cursor-pointer transition duration-300">';
          $html .=
              '<div class="flex items-center space-x-2 transform transition-transform duration-300 group-hover/subitem:-translate-x-2">
                    <i class="' .
              $category['icon'] .
              ' text-xs sm:text-sm md:text-base lg:text-lg"></i>
                    <span>' .
              $category['name'] .
              '</span>
                  </div>';

          if (isset($category['subcategories'])) {
              $html .= '<i class="fa-solid fa-angle-right text-xs sm:text-sm md:text-base lg:text-lg"></i>';
              $html .=
                  '<ul class="absolute top-0 left-full ml-1 mt-1 ' .
                  $nestedSubmenuWidth .
                  ' bg-white text-[var(--primary-text)] shadow-lg rounded-md opacity-0 invisible
                         group-hover/subitem:opacity-100 group-hover/subitem:visible transition duration-200 text-xs sm:text-sm md:text-base lg:text-lg">';
              foreach ($category['subcategories'] as $subcategory) {
                  $html .= '<li class="flex items-center justify-between px-2 sm:px-3 md:px-4 py-1 sm:py-2 hover:bg-[var(--primary-gold)]
                             hover:text-white cursor-pointer transition duration-300">';
                  $html .=
                      '<div class="flex items-center space-x-2 transform transition-transform duration-300 hover:-translate-x-2">
                            <i class="' .
                      $subcategory['icon'] .
                      ' text-xs sm:text-sm md:text-base lg:text-lg"></i>
                            <span>' .
                      $subcategory['name'] .
                      '</span>
                          </div>';
                  $html .= '</li>';
              }
              $html .= '</ul>';
          }

          $html .= '</li>';
      }

      $html .= '</ul>';
      return $html;
  }

@endphp

<header class="fixed top-0 left-0 right-0 bg-[#fcfce2] flex justify-between items-center
px-3 sm:px-4 md:px-6 lg:px-[5%] py-2 sm:py-3 md:py-4 shadow-md font-medium
text-sm sm:text-base md:text-lg lg:text-xl h-14 sm:h-16 md:h-20">

  {{-- Mobile Left Navigation --}}
  <nav class="xl:hidden mobileLeft">
    <button id="openSidebar" class="cursor-pointer text-lg sm:text-xl md:text-2xl">
      <i class="fas fa-bars"></i>
    </button>
  </nav>

  <!-- Mobile Sidebar Menu -->
  <nav id="mobileSidebar"
    class="fixed top-0 left-0 h-full w-44 sm:w-48 md:w-56 bg-[#fcfce2] shadow-lg
         transform -translate-x-full transition-transform duration-300 z-50 xl:hidden">
    <div class="flex justify-between items-center px-3 sm:px-4 py-2 sm:py-3 border-b border-gray-300">
      <h2 class="text-base sm:text-lg md:text-xl font-bold">Menu</h2>
      <button id="closeSidebar" class="text-xl sm:text-2xl">&times;</button>
    </div>
    <ul class="flex flex-col gap-2 sm:gap-3 md:gap-4 px-4 sm:px-6 py-3 sm:py-4 text-[#132039] text-sm sm:text-base md:text-lg">
      <li class="hover:text-[var(--primary-gold)] cursor-pointer transition">Home</li>
      <li class="relative group cursor-pointer">
        <span class="flex items-center justify-between hover:text-[var(--primary-gold)] transition ">
          Tutorials
        </span>
      </li>
      <li class="relative group cursor-pointer">
        <span class="flex items-center justify-between hover:text-[var(--primary-gold)] transition ">
          Learning Paths
        </span>
      </li>
      <li class="hover:text-[var(--primary-gold)] cursor-pointer transition">About</li>
    </ul>
  </nav>

  <!-- Left Navigation -->
  <nav class="hidden xl:flex">
    <ul class="flex items-center gap-3 sm:gap-4 lg:gap-6 text-[#132039] text-sm sm:text-base md:text-lg lg:text-xl">
      <li class="hover:text-[var(--primary-gold)] cursor-pointer transition px-2 py-1">Home</li>
      <li class="relative group cursor-pointer">
        <span class="flex items-center hover:text-[var(--primary-gold)] transition px-2 py-2">
          Tutorials
          <i class="fas fa-chevron-down ml-2 text-xs sm:text-sm md:text-base"></i>
        </span>
        {!! renderSubmenu($tutorialCategories) !!}
      </li>
      <li class="relative group cursor-pointer">
        <span class="flex items-center hover:text-[var(--primary-gold)] transition px-2 py-2">
          Learning Paths
          <i class="fas fa-chevron-down ml-2 text-xs sm:text-sm md:text-base"></i>
        </span>
        {!! renderSubmenu($learningPaths) !!}
      </li>
      <li class="hover:text-[var(--primary-gold)] cursor-pointer transition hidden 2xl:block">
        <span>About</span>
      </li>
    </ul>
  </nav>

  <!-- Center Logo -->
  <figure class="flex items-center justify-center">
    <h1 class="text-[#132039] text-base sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-extrabold tracking-wide">
      Bytely
    </h1>
  </figure>

  {{-- Mobile Right Navigation --}}
  <nav class="xl:hidden mobileRight">
    <button id="openRightSidebar" class="cursor-pointer text-lg sm:text-xl md:text-2xl">
      <i class="fa fas fa-user"></i>
    </button>
  </nav>
  <nav id="mobileRight"
    class="fixed top-0 right-0 h-full w-44 sm:w-48 md:w-56 bg-[#fcfce2] shadow-lg
         transform translate-x-full transition-transform duration-300 z-50 xl:hidden">
    <div class="flex justify-between items-center px-3 sm:px-4 py-2 sm:py-3 border-b border-gray-300">
      <h2 class="text-base sm:text-lg md:text-xl font-bold">Account</h2>
      <button id="closeRightSidebar" class="text-xl sm:text-2xl">&times;</button>
    </div>
    <ul class="flex flex-col gap-2 sm:gap-3 md:gap-4 px-4 sm:px-6 py-3 sm:py-4 text-[#132039] text-sm sm:text-base md:text-lg">
      <button
        class="flex items-center bg-transparent hover:bg-[var(--primary-gold)] hover:text-white px-2 sm:px-3 md:px-4 py-1 sm:py-2 rounded-md transition shadow-sm text-xs sm:text-sm md:text-base">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 sm:h-5 w-4 sm:w-5 mr-2" fill="none" viewBox="0 0 24 24"
          stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4M10 17l5-5-5-5M15 12H3" />
        </svg>
        Sign In
      </button>
      <button
        class="flex items-center bg-transparent hover:bg-[var(--primary-gold)] hover:text-white px-2 sm:px-3 md:px-4 py-1 sm:py-2 rounded-md transition shadow-sm text-xs sm:text-sm md:text-base">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 sm:h-5 w-4 sm:w-5 mr-2" fill="none" viewBox="0 0 24 24"
          stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M12 4a4 4 0 110 8 4 4 0 010-8zM6 20v-1a5 5 0 015-5h2a5 5 0 015 5v1M19 8v6m3-3h-6" />
        </svg>
        Sign Up
      </button>
      <button
        class="flex items-center bg-[var(--primary-gold)] text-white hover:bg-white hover:text-[var(--primary-gold)] px-2 sm:px-3 md:px-4 py-1 sm:py-2 rounded-md transition shadow-sm text-xs sm:text-sm md:text-base">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 sm:h-5 w-4 sm:w-5 mr-2" fill="none" viewBox="0 0 24 24"
          stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
        Subscribe
      </button>
    </ul>
  </nav>

  <!-- Right Section -->
  <nav class="hidden xl:flex items-center space-x-2 sm:space-x-3 md:space-x-4 rightOpen">
    <div
      class="hidden 2xl:flex items-center bg-white rounded-lg px-3 sm:px-4 h-9 sm:h-10 md:h-11 w-44 sm:w-48 md:w-56 border border-gray-200 shadow-sm
             focus-within:border-[var(--primary-gold)] focus-within:ring-1 focus-within:ring-[var(--primary-gold)] transition">
      <input type="text" placeholder="Search..."
        class="bg-transparent outline-none w-full text-gray-700 placeholder-gray-400 text-xs sm:text-sm md:text-base focus:ring-0 h-full" />
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 sm:h-5 w-4 sm:w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
        stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M21 21l-4.35-4.35M16.65 11a5.65 5.65 0 11-11.3 0 5.65 5.65 0 0111.3 0z" />
      </svg>
    </div>

    <!-- Buttons -->
    <div class="flex items-center space-x-2 sm:space-x-3">
      <button
        class="flex items-center bg-transparent hover:bg-[var(--primary-gold)] hover:text-white px-2 sm:px-3 md:px-4 py-1 sm:py-2 rounded-md transition shadow-sm text-xs sm:text-sm md:text-base">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 sm:h-5 w-4 sm:w-5 mr-2" fill="none" viewBox="0 0 24 24"
          stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4M10 17l5-5-5-5M15 12H3" />
        </svg>
        Sign In
      </button>
      <button
        class="flex items-center bg-transparent hover:bg-[var(--primary-gold)] hover:text-white px-2 sm:px-3 md:px-4 py-1 sm:py-2 rounded-md transition shadow-sm text-xs sm:text-sm md:text-base">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 sm:h-5 w-4 sm:w-5 mr-2" fill="none" viewBox="0 0 24 24"
          stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M12 4a4 4 0 110 8 4 4 0 010-8zM6 20v-1a5 5 0 015-5h2a5 5 0 015 5v1M19 8v6m3-3h-6" />
        </svg>
        Sign Up
      </button>
      <button
        class="flex items-center bg-[var(--primary-gold)] text-white hover:bg-white hover:text-[var(--primary-gold)] px-2 sm:px-3 md:px-4 py-1 sm:py-2 rounded-md transition shadow-sm text-xs sm:text-sm md:text-base">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 sm:h-5 w-4 sm:w-5 mr-2" fill="none" viewBox="0 0 24 24"
          stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
        Subscribe
      </button>
    </div>
  </nav>
</header>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('mobileSidebar');
    const mobileRight = document.getElementById('mobileRight');

    const buttons = {
      openLeft: document.getElementById('openSidebar'),
      closeLeft: document.getElementById('closeSidebar'),
      openRight: document.getElementById('openRightSidebar'),
      closeRight: document.getElementById('closeRightSidebar'),
    };

    function toggleSidebar(element, action, direction = 'left') {
      if (!element) return;
      const classToToggle = direction === 'left' ? '-translate-x-full' : 'translate-x-full';
      if (action === 'open') {
        element.classList.remove(classToToggle);
        document.body.classList.add('overflow-hidden');
      } else {
        element.classList.add(classToToggle);
        document.body.classList.remove('overflow-hidden');
      }
    }

    buttons.openLeft?.addEventListener('click', (e) => {
      e.stopPropagation();
      toggleSidebar(sidebar, 'open', 'left');
    });
    buttons.closeLeft?.addEventListener('click', (e) => {
      e.stopPropagation();
      toggleSidebar(sidebar, 'close', 'left');
    });

    buttons.openRight?.addEventListener('click', (e) => {
      e.stopPropagation();
      toggleSidebar(mobileRight, 'open', 'right');
    });
    buttons.closeRight?.addEventListener('click', (e) => {
      e.stopPropagation();
      toggleSidebar(mobileRight, 'close', 'right');
    });

    document.addEventListener('click', (event) => {
      const clickedOutsideLeft = sidebar && !sidebar.contains(event.target) && !buttons.openLeft.contains(event.target);
      const clickedOutsideRight = mobileRight && !mobileRight.contains(event.target) && !buttons.openRight.contains(event.target);

      if (clickedOutsideLeft && !sidebar.classList.contains('-translate-x-full')) {
        toggleSidebar(sidebar, 'close', 'left');
      }
      if (clickedOutsideRight && !mobileRight.classList.contains('translate-x-full')) {
        toggleSidebar(mobileRight, 'close', 'right');
      }
    });
  });
</script>

