<nav x-data="{ open: false }" class="bg-gray-900 text-gray-300 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        {{-- Logo + Brand --}}
        <div class="flex items-center space-x-2">
          <a href="{{ route('dashboard') }}">
            <x-application-logo class="h-8 w-auto text-white" />
          </a>
          <span class="text-xl font-semibold text-white">{{ config('app.name', 'Laravel') }}</span>
        </div>
  
        {{-- Desktop Links --}}
        <div class="hidden md:flex md:items-center md:space-x-6">
          <a href="{{ route('dashboard') }}"
             class="px-3 py-2 rounded-md hover:bg-gray-800 transition">
            Dashboard
          </a>
          <a href="{{ route('drivers.index') }}"
             class="px-3 py-2 rounded-md hover:bg-gray-800 transition">
            Drivers
          </a>
          <a href="{{ route('races.index') }}"
             class="px-3 py-2 rounded-md hover:bg-gray-800 transition">
            Races
          </a>
          <a href="{{ route('teams.index') }}"
             class="px-3 py-2 rounded-md hover:bg-gray-800 transition">
            Teams
          </a>
          <a href="{{ route('circuits.index') }}"
             class="px-3 py-2 rounded-md hover:bg-gray-800 transition">
            Circuits
          </a>
          <a href="{{ route('simulations.index') }}"
             class="px-3 py-2 rounded-md hover:bg-gray-800 transition">
            Simulations
          </a>
          <a href="{{ route('about') }}"
             class="px-3 py-2 rounded-md hover:bg-gray-800 transition">
            About Us
          </a>
        </div>
  
        {{-- User / Auth Links --}}
        <div class="hidden md:flex md:items-center md:space-x-4">
          @guest
            <a href="{{ route('login') }}" class="px-3 py-2 hover:text-white">Login</a>
            <a href="{{ route('register') }}" class="px-3 py-2 hover:text-white">Register</a>
          @else
            <x-dropdown align="right" width="48">
              <x-slot name="trigger">
                <button class="flex items-center px-3 py-2 rounded-md hover:bg-gray-800 transition">
                  {{ Auth::user()->name }}
                  <svg class="h-4 w-4 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                       viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 9l-7 7-7-7" />
                  </svg>
                </button>
              </x-slot>
              <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <x-dropdown-link :href="route('logout')"
                                   onclick="event.preventDefault(); this.closest('form').submit();">
                    Log Out
                  </x-dropdown-link>
                </form>
              </x-slot>
            </x-dropdown>
          @endguest
        </div>
  
        {{-- Mobile Hamburger --}}
        <div class="md:hidden flex items-center">
          <button @click="open = !open" class="p-2 rounded-md hover:bg-gray-800 transition">
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>
      </div>
    </div>
  
    {{-- Mobile Menu --}}
    <div x-show="open" class="md:hidden bg-gray-800 text-gray-200">
      <div class="px-2 pt-2 pb-3 space-y-1">
        <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md hover:bg-gray-700">
          Dashboard
        </a>
        <a href="{{ route('drivers.index') }}" class="block px-3 py-2 rounded-md hover:bg-gray-700">
          Drivers
        </a>
        <a href="{{ route('races.index') }}" class="block px-3 py-2 rounded-md hover:bg-gray-700">
          Races
        </a>
        <a href="{{ route('teams.index') }}" class="block px-3 py-2 rounded-md hover:bg-gray-700">
          Teams
        </a>
        <a href="{{ route('circuits.index') }}" class="block px-3 py-2 rounded-md hover:bg-gray-700">
          Circuits
        </a>
        <a href="{{ route('simulations.index') }}" class="block px-3 py-2 rounded-md hover:bg-gray-700">
          Simulations
        </a>
        <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md hover:bg-gray-700">
          About Us
        </a>
      </div>
      <div class="pt-4 pb-3 border-t border-gray-700">
        @guest
          <a href="{{ route('login') }}" class="block px-3 py-2 hover:bg-gray-700">Login</a>
          <a href="{{ route('register') }}" class="block px-3 py-2 hover:bg-gray-700">Register</a>
        @else
          <div class="px-3 mb-2">
            <div class="font-medium">{{ Auth::user()->name }}</div>
            <div class="text-sm text-gray-400">{{ Auth::user()->email }}</div>
          </div>
          <a href="{{ route('profile.edit') }}" class="block px-3 py-2 hover:bg-gray-700">Profile</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-3 py-2 hover:bg-gray-700">Log Out</button>
          </form>
        @endguest
      </div>
    </div>
  </nav>
  