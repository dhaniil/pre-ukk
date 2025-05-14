<div class="text-black w-full min-h-screen flex mx-auto justify-end bg-[url(http://127.0.0.1:8000/Tori%20GIF.gif)] bg-cover ">
<div class="bg-black/30 backdrop-blur-xs w-xl border-l-2">
    <div class="relative items-center flex justify-center flex-col gap-2 py-12">
        <div class="hidden lg:block absolute left-24 w-2 h-6 bg-gray-100"></div>
        <h2 class="text-2xl text-white font-bold">Login</h2>
    </div>
    <div class="w-full">
        <form wire:submit="login"
        class="w-full px-12 flex justify-center flex-col space-y-6">
            <flux:input
                wire:model="email"
                :label="__('Email address')"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="email@example.com"
            />

            <div class="relative">
                <flux:input
                    wire:model="password"
                    :label="__('Password')"
                    type="password"
                    required
                    autocomplete="current-password"
                    :placeholder="__('Password')"
                    viewable
                />
            </div>
            <div class="flex items-start justify-start">
                <flux:checkbox wire:model="remember" :label="__('Remember me')" />
            </div>

            <div class="flex items-center justify-end">
                <flux:button variant="primary" type="submit" class="w-full">{{ __('Log in') }}</flux:button>
            </div>
        </form>
        @if (Route::has('register'))
            <div class="space-x-1 mt-4 rtl:space-x-reverse text-center text-sm text-white ">
            {{ __('Tidak memiliki akun?') }}
                <flux:link :href="route('register')" wire:navigate>{{ __('Sign up') }}</flux:link>
            </div>
        @endif
    </div>
</div>
</div>
