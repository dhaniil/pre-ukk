<div>
    <!-- Header -->
    <div class="text-center mb-6">
        <h2 class="text-xl font-medium text-gray-900 dark:text-white">
            {{ __('Login') }}
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            {{ __('Masuk ke akun PKL') }}
        </p>
    </div>

    <form wire:submit="login" class="space-y-4">
        <!-- Email Field -->
        <div>
            <flux:label class="text-gray-700 dark:text-gray-300 text-sm">{{ __('Email') }}</flux:label>
            <div class="mt-1">
                <flux:input
                    type="email"
                    wire:model="email"
                    placeholder="{{ __('Masukkan email') }}"
                    autofocus
                    autocomplete="email"
                    class="w-full  focus:border-blue-500 focus:ring-1 focus:ring-blue-500" />
            </div>
            @error('email')
                <div class="text-red-600 text-xs mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Password Field -->
        <div>
            <div class="flex items-center justify-between">
                <flux:label class="text-gray-700 dark:text-gray-300 text-sm">{{ __('Password') }}</flux:label>
                @if (Route::has('password.request'))
                    <flux:link :href="route('password.request')" wire:navigate class="text-xs text-blue-600 hover:text-blue-700 dark:text-blue-400">
                        {{ __('Lupa password?') }}
                    </flux:link>
                @endif
            </div>
            <div class="mt-1 relative">
                <flux:input
                    type="password"
                    wire:model="password"
                    placeholder="{{ __('Masukkan password') }}"
                    class="w-full focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                    viewable>

                </flux:input>
            </div>
            @error('password')
                <div class="text-red-600 text-xs mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <flux:checkbox wire:model="remember" id="remember" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 focus:ring-offset-0" />
            <flux:label for="remember" class="ml-2 text-gray-600 dark:text-gray-400 text-sm cursor-pointer">
                {{ __('Ingat saya') }}
            </flux:label>
        </div>


        <div class="mt-4">
            <flux:button icon="log-in" type="submit" variant="primary" class="w-full justify-center bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">
                {{ __('Masuk') }}
            </flux:button>
        </div>

        @if (Route::has('register'))
            <div class="text-center mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                <p class="text-gray-600 dark:text-gray-400 text-sm">
                    {{ __('Belum punya akun?') }}
                    <flux:link :href="route('register')" wire:navigate class="text-blue-600 hover:text-blue-700 dark:text-blue-400 font-medium">
                        {{ __('Daftar') }}
                    </flux:link>
                </p>
            </div>
        @endif
    </form>
</div>
