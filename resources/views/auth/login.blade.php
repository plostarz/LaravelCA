<x-guest-layout>
    <!-- Include custom CSS for this page only -->
    <link href="{{ asset('css/auth-custom.css') }}" rel="stylesheet">
    
    <div class="auth-container">
        <div class="auth-form-side">
            <h2 class="text-3xl font-bold dark-text mb-1">Log In</h2>
            <p class="dark-text-secondary mb-6">Welcome back! Please enter your details</p>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium dark-text-secondary mb-1">Email</label>
                    <input id="email" 
                           class="w-full px-4 py-2 border rounded-md dark-input" 
                           type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus 
                           autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                
                <!-- Password -->
                <div class="mb-6">
                    <div class="flex justify-between mb-1">
                        <label for="password" class="block text-sm font-medium dark-text-secondary">Password</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-red-400 hover:text-red-300">
                                Forgot password?
                            </a>
                        @endif
                    </div>
                    <input id="password" 
                           class="w-full px-4 py-2 border rounded-md dark-input" 
                           type="password" 
                           name="password" 
                           required 
                           autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                
                <!-- Remember Me -->
                <div class="mb-6">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-700 text-red-600 bg-gray-800" name="remember">
                        <span class="ml-2 text-sm dark-text-secondary">Remember me</span>
                    </label>
                </div>
                
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md transition duration-300 mb-6">
                    Log in
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
                    <p class="text-sm dark-text-secondary">Don't have an account? 
                        <a href="{{ route('register') }}" class="text-red-400 hover:text-red-300 font-medium">Sign up</a>
                    </p>
                </div>
            </form>
        </div>
        
        <div class="auth-image-side">
            <img src="{{ asset('images/formula1.png') }}" alt="Formula 1">
        </div>
    </div>
</x-guest-layout>