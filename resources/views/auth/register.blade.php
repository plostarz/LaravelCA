<x-guest-layout>
    <!-- Include custom CSS for this page only -->
    <link href="{{ asset('css/auth-custom.css') }}" rel="stylesheet">
    
    <div class="auth-container">
        <div class="auth-form-side">
            <h2 class="text-3xl font-bold dark-text mb-1">Sign Up</h2>
            <p class="dark-text-secondary mb-6">Create your account to get started</p>
            
            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium dark-text-secondary mb-1">Name</label>
                    <input id="name" 
                           class="w-full px-4 py-2 border rounded-md dark-input" 
                           type="text" 
                           name="name" 
                           value="{{ old('name') }}" 
                           required 
                           autofocus 
                           autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                
                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium dark-text-secondary mb-1">Email</label>
                    <input id="email" 
                           class="w-full px-4 py-2 border rounded-md dark-input" 
                           type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                
                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium dark-text-secondary mb-1">Password</label>
                    <input id="password" 
                           class="w-full px-4 py-2 border rounded-md dark-input" 
                           type="password" 
                           name="password" 
                           required 
                           autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                
                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium dark-text-secondary mb-1">Confirm Password</label>
                    <input id="password_confirmation" 
                           class="w-full px-4 py-2 border rounded-md dark-input" 
                           type="password" 
                           name="password_confirmation" 
                           required 
                           autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md transition duration-300 mb-6">
                    Register
                </button>
                
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-700"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <a href="#" class="flex items-center justify-center py-2 px-4 border border-gray-700 rounded-md hover:bg-gray-800 transition duration-150 dark-text">
                        <span class="mr-2">G</span> Google
                    </a>
                    <a href="#" class="flex items-center justify-center py-2 px-4 border border-gray-700 rounded-md hover:bg-gray-800 transition duration-150 dark-text">
                        <span class="mr-2">f</span> Facebook
                    </a>
                </div>
                
                <div class="text-center">
                    <p class="text-sm dark-text-secondary">Already have an account? 
                        <a href="{{ route('login') }}" class="text-red-400 hover:text-red-300 font-medium">Log in</a>
                    </p>
                </div>
            </form>
        </div>
        
        <div class="auth-image-side">
            <img src="{{ asset('images/formula1.png') }}" alt="Formula 1">
        </div>
    </div>
</x-guest-layout>