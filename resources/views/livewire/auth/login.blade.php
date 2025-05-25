<div>
    <h2 class="text-2xl font-semibold text-center mb-6 text-zinc-800 dark:text-white">
        {{ __('Log in to your account') }}
    </h2>

    <form wire:submit="login" class="space-y-6">
        <div>
            <flux:label>{{ __('Email') }}</flux:label>
            <flux:input
                type="email"
                wire:model="email"
                placeholder="{{ __('Enter your email') }}"
                autofocus
                autocomplete="email" />
            @error('email')
                <flux:error>{{ $message }}</flux:error>
            @enderror
        </div>

        <div>
            <div class="flex items-center justify-between">
                <flux:label>{{ __('Password') }}</flux:label>
                @if (Route::has('password.request'))
                    <flux:link :href="route('password.request')" wire:navigate class="text-sm">
                        {{ __('Forgot your password?') }}
                    </flux:link>
                @endif
            </div>
            <flux:input
                type="password"
                wire:model="password"
                placeholder="{{ __('Enter your password') }}"
                autocomplete="current-password">
                <x-slot name="iconTrailing">
                    <flux:button size="sm" variant="subtle" icon="eye" class="-mr-1" x-on:click="$el.previousElementSibling.type = $el.previousElementSibling.type === 'password' ? 'text' : 'password'" />
                </x-slot>
            </flux:input>
            @error('password')
                <flux:error>{{ $message }}</flux:error>
            @enderror
        </div>

        <div class="flex items-center">
            <flux:checkbox wire:model="remember" id="remember">
                {{ __('Remember me') }}
            </flux:checkbox>
        </div>

        <div>
            <flux:button type="submit" class="w-full justify-center">
                {{ __('Log in') }}
            </flux:button>
        </div>

        @if (Route::has('register'))
            <p class="text-center text-sm text-zinc-600 dark:text-zinc-400">
                {{ __('Don\'t have an account?') }}
                <flux:link :href="route('register')" wire:navigate>
                    {{ __('Sign up') }}
                </flux:link>
            </p>
        @endif
    </form>
</div>
