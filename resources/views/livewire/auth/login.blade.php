<div class="min-h-screen bg-[url(http://127.0.0.1:8000/Tori%20GIF.gif)] bg-cover">
    <div class=" w-full lg:w-2xl flex justify-end h-full">
        <form action="" wire:submit="submit" class="border backdrop-blur-xs flex-col bg-black/20 w-full p-6 h-screen items-center flex justify-center gap-6">
            <div class="relative items-center">
               <h1 class="text-4xl font-bold">Login</h1>
                <p></p>
            </div>
            <div class="w-full space-y-6">
                <label for="">Email</label>
                <flux:input
                    class="bg-white/70 rounded-md text-black"
                    autocomplete
                    autofocus
                    placeholder="Masukan Email"
                    wire:model="email"
                >
                </flux:input>
            </div>
            <div class="w-full space-y-6">
                <label for="">Password</label>
                <flux:input class="bg-white/70 rounded-md" type="password" value="password" wire:model="password" placeholder="Masukan Password">
                    <x-slot name="iconTrailing">
                        <flux:button size="sm" variant="subtle" icon="eye" class="-mr-1" />
                    </x-slot>
                </flux:input>
            </div>

            <div class="flex w-1/2 bg-white/50 items-center justify-end rounded-md">
                <flux:button variant="primary" type="submit" class="w-full">{{ __('Log in') }}</flux:button>
            </div>
            @if (Route::has('register'))
                <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-white dark:text-white">
                    {{ __('Tidak punya akun?') }}
                    <flux:link :href="route('register')" wire:navigate>{{ __('Sign up') }}</flux:link>
                </div>
            @endif
        </form>

    </div>
</div>
