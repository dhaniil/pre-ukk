<div class="text-black w-full min-h-screen flex mx-auto justify-end bg-[url(http://127.0.0.1:8000/Tori%20GIF.gif)] bg-cover ">
    <div class="bg-black/30 backdrop-blur-xs w-xl border-l-2">
        <div class="relative items-center flex justify-center flex-col gap-2 py-12">
            <div class="hidden lg:block absolute left-24 w-2 h-6 bg-gray-100"></div>
            <h2 class="text-2xl text-white font-bold">Register</h2>
        </div>
        <div class="w-full px-12">
            <form wire:submit="register" class="flex flex-col gap-6">
                <!-- Name -->
                <flux:input
                    wire:model="name"
                    :label="__('Name')"
                    type="text"
                    required
                    autofocus
                    autocomplete="name"
                    :placeholder="__('Full name')"
                />

                <!-- Email Address -->
                <flux:input
                    wire:model="email"
                    :label="__('Email address')"
                    type="email"
                    required
                    autocomplete="email"
                    placeholder="email@example.com"
                />

                <!-- Password -->
                <flux:input
                    wire:model="password"
                    :label="__('Password')"
                    type="password"
                    required
                    autocomplete="new-password"
                    :placeholder="__('Password')"
                    viewable
                />

                <!-- Confirm Password -->
                <flux:input
                    wire:model="password_confirmation"
                    :label="__('Confirm password')"
                    type="password"
                    required
                    autocomplete="new-password"
                    :placeholder="__('Confirm password')"
                    viewable
                />

                <div class="flex items-center justify-end">
                    <flux:button type="submit" variant="primary" class="w-full">
                        {{ __('Create account') }}
                    </flux:button>
                </div>
            </form>
            @if (Route::has('login'))
                <div class="space-x-1 mt-4 rtl:space-x-reverse text-center text-sm text-white ">
                    {{ __('Sudah memiliki akun?') }}
                    <flux:link :href="route('login')" wire:navigate>{{ __('Login') }}</flux:link>
                </div>
            @endif
        </div>
    </div>
</div>
