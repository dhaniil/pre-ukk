<div>
    <!-- Header -->
    <div class="text-center mb-6">
        <h2 class="text-xl font-medium text-gray-900 dark:text-white">
            {{ __('Daftar Akun') }}
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            {{ __('Bergabung dengan sistem PKL') }}
        </p>
    </div>

    <form wire:submit="register" class="space-y-4">
        <div>
            <flux:label class="text-gray-700 dark:text-gray-300 text-sm">{{ __('Email') }}</flux:label>
            <div class="mt-1">
                <flux:input
                    type="email"
                    wire:model="email"
                    placeholder="{{ __('Masukkan email') }}"
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
            <flux:label class="text-gray-700 dark:text-gray-300 text-sm">{{ __('Password') }}</flux:label>
            <div class="mt-1 relative">
                <flux:input
                    type="password"
                    wire:model="password"
                    placeholder="{{ __('Buat password') }}"
                    autocomplete="new-password"
                    class="w-full  focus:border-blue-500 focus:ring-1 focus:ring-blue-500" viewable>
                </flux:input>
            </div>
            @error('password')
                <div class="text-red-600 text-xs mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Confirm Password Field -->
        <div>
            <flux:label class="text-gray-700 dark:text-gray-300 text-sm">{{ __('Konfirmasi Password') }}</flux:label>
            <div class="mt-1 relative">
                <flux:input
                    type="password"
                    wire:model="password_confirmation"
                    placeholder="{{ __('Konfirmasi password') }}"
                    autocomplete="new-password"
                    class="w-full  focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                    viewable>
                </flux:input>
            </div>
            @error('password_confirmation')
                <div class="text-red-600 text-xs mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Terms Notice -->
        <div class="text-xs text-gray-600 dark:text-gray-400 bg-cyan-50 dark:bg-cyan-800 p-3 rounded border border-cyan-200 dark:border-cyan-700">
            <p>
            Dengan mendaftar, Anda menyetujui penggunaan data untuk keperluan sistem PKL dan akan mengikuti aturan yang berlaku.
            </p>
        </div>

        <!-- Register Button -->
        <div class="mt-4">
            <flux:button variant="primary" icon="send" type="submit" class="w-full justify-center bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">
                {{ __('Daftar') }}
            </flux:button>
        </div>

        <!-- Login Link -->
        <div class="text-center mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
            <p class="text-gray-600 dark:text-gray-400 text-sm">
                {{ __('Sudah punya akun?') }}
                <flux:link :href="route('login')" wire:navigate class="text-blue-600 hover:text-blue-700 dark:text-blue-400 font-medium">
                    {{ __('Masuk') }}
                </flux:link>
            </p>
        </div>
    </form>
</div>
