    <!-- Header -->
    <header class="ocean-gradient text-white shadow-lg sticky top-0 z-50 transition-all duration-300">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                {{-- Logo + Nama Brand jadi link --}}
                <a href="{{ route('front.index') }}" class="flex items-center space-x-4">
                    <div class="bg-white p-2 rounded-full">
                        <img src="{{ asset('img/Logo.png') }}" alt="Logo Payum Iwag" class="h-7 w-auto" />
                    </div>
                    <div>
                        <h1 class="text-xl font-bold">Payum Iwag</h1>
                        <p class="text-blue-100 text-xs">
                            Kelompok Usaha Perempuan Nelayan Pantai Payum
                        </p>
                    </div>
                </a>


                <div class="flex items-center space-x-6">
                    <!-- Search Bar -->
                    <div class="hidden md:flex space-x-6">
                        <a href="{{ route('front.index') }}#home"
                            class="text-sm hover:text-blue-200 transition-colors">Beranda</a>
                        <a href="{{ route('front.katalog') }}"
                            class="text-sm hover:text-blue-200 transition-colors">Katalog</a>
                    </div>
                    <div class="search-container hidden md:block">
                        <div class="relative">
                            <input type="text" id="searchInput" placeholder="Cari produk..."
                                class="bg-white bg-opacity-20 text-white text-sm placeholder-blue-200 px-4 py-2 pr-10 rounded-full focus:outline-none focus:ring-2 focus:ring-white focus:bg-opacity-30 transition-all w-64" />
                            <i
                                class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-blue-200"></i>
                        </div>
                        <div id="searchSuggestions" class="search-suggestions"></div>
                    </div>

                    <!-- Cart Icon -->
                    <div class="cart-icon cursor-pointer" onclick="toggleCart()">
                        <i class="fas fa-shopping-cart text-2xl"></i>
                        <span id="cartBadge" class="cart-badge">0</span>
                    </div>

                    <!-- Menu Button -->
                    <button onclick="toggleMobileMenu()" class="md:hidden">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Search -->
            <div id="hamburger-menu" class="md:hidden mt-4">
                <div class="relative">
                    <input type="text" placeholder="Cari produk..."
                        class="w-full bg-white bg-opacity-20 text-white placeholder-blue-200 px-4 py-2 pr-10 rounded-full focus:outline-none focus:ring-2 focus:ring-white" />
                    <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-blue-200"></i>
                </div>
            </div>
        </div>
    </header>
