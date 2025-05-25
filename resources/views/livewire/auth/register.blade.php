<div>
    <h2 class="text-2xl font-semibold text-center mb-6 text-zinc-800 dark:text-white">
        {{ __('Create an account') }}
    </h2>

    <form wire:submit="register" class="space-y-6">
        <div>
            <flux:label>{{ __('Name') }}</flux:label>
            <flux:input
                type="text"
                wire:model="name"
                placeholder="{{ __('Enter your full name') }}"
                autofocus
                autocomplete="name" />
            @error('name')
                <flux:error>{{ $message }}</flux:error>
            @enderror
        </div>

        <div>
            <flux:label>{{ __('Email') }}</flux:label>
            <flux:input
                type="email"
                wire:model="email"
                placeholder="{{ __('Enter your email') }}"
                autocomplete="email" />
            @error('email')
                <flux:error>{{ $message }}</flux:error>
            @enderror
        </div>

        <div>
            <flux:label>{{ __('Password') }}</flux:label>
            <flux:input
                type="password"
                wire:model="password"
                placeholder="{{ __('Create a password') }}"
                autocomplete="new-password">
                <x-slot name="iconTrailing">
                    <flux:button size="sm" variant="subtle" icon="eye" class="-mr-1" x-on:click="$el.previousElementSibling.type = $el.previousElementSibling.type === 'password' ? 'text' : 'password'" />
                </x-slot>
            </flux:input>
            @error('password')
                <flux:error>{{ $message }}</flux:error>
            @enderror
        </div>

        <div>
            <flux:label>{{ __('Confirm Password') }}</flux:label>
            <flux:input
                type="password"
                wire:model="password_confirmation"
                placeholder="{{ __('Confirm your password') }}"
                autocomplete="new-password">
                <x-slot name="iconTrailing">
                    <flux:button size="sm" variant="subtle" icon="eye" class="-mr-1" x-on:click="$el.previousElementSibling.type = $el.previousElementSibling.type === 'password' ? 'text' : 'password'" />
                </x-slot>
            </flux:input>
        </div>

        <div>
            <flux:button type="submit" class="w-full justify-center">
                {{ __('Create account') }}
            </flux:button>
        </div>

        <p class="text-center text-sm text-zinc-600 dark:text-zinc-400">
            {{ __('Already have an account?') }}
            <flux:link :href="route('login')" wire:navigate>
                {{ __('Log in') }}
            </flux:link>
        </p>
    </form>
</div>
