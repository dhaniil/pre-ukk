<div class="min-h-screen space-y-6">

    <div id="heading" class="flex gap-4 items-center rounded-2xl border border-blue-100 hover:shadow-md p-4 transition-all duration-300">
        <div class="bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-xl p-2">
            <flux:icon.factory class="size-8 text-white" />
        </div>
        <div class="flex flex-col">
            <h2 class="text-xl md:text-2xl font-bold ">Daftar Industri</h2>
            <description class="text-gray-600 font-light">Cocominto, Yori mo anata</description>
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($industries as $industry )
        <div class="p-4 border border-blue-100 drop-shadow-xl space-y-6 rounded-2xl bg-gradient-to-tl from-cyan-600 to-cyan-700 drop-shadow-cyan-500">
            <div class="flex justify-between items-center">
                <div class="bg-white/20 backdrop-blur-lg p-2 rounded-md">
                    <flux:icon.cpu class="size-6 text-white" />
                </div>
                <h2 class="text-white font-bold text-lg md:text-xl ">{{$industry->name}}</h2>
            </div>
            <div class="flex flex-col gap-4 rounded-md bg-white/20 backdrop-blur-2xl text-white p-4">
                <div class="flex gap-2 text-white items-center">
                    <flux:icon.user class="size-4 text-white" />
                    <span class="line-clamp-1">{{$industry->teacher->name}}</span>
                </div>

                <flux:separator />

                <div class="flex flex-row gap-2 items-center">
                    <flux:icon.cable class="size-4 text-white" />
                    <span class="line-clamp-1 cursor-pointer" title="{{$industry->bidang_usaha}}">{{Str::limit($industry->bidang_usaha, 50)}}</span>
                </div>

                <flux:separator />

                <div class="grid  items-center px-auto grid-cols-1 md:grid-cols-2">
                    <div class="text-center">
                        <span class="text-center line-clapm-1 flex gap-2"><flux:icon.mail />{{$industry->email}}</span>
                    </div>
                    <div class="text-center">
                        <div class="text-center flex gap-2 items-center justify-between">
                            <div class="flex gap-2">
                            <flux:icon.phone />
                            <span>{{$industry->contact}}</span>
                            </div>
                            <div>
                            <button onclick="navigator.clipboard.writeText('{{$industry->contact}}')"
                                    class="p-1 hover:bg-white/20 rounded transition-colors"
                                    title="Copy contact">
                                <flux:icon.clipboard  />
                            </button>
                            </div>


                        </div>
                    </div>
                </div>

                <flux:separator />

                <div class="flex gap-2 text-white items-center">
                    <flux:icon.map class="size-4 text-white" />
                    <span class="line-clamp-1 " title="{{$industry->address}}">{{$industry->address}}</span>
                </div>
            </div>

        </div>
        @endforeach
    </div>
</div>
