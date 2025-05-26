<div class="min-h-screen space-y-6">
    <div id="heading" class="border border-blue-100 rounded-2xl p-4 sticky top-0">
        <div class="flex gap-4 items-center">
            <div class="bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-xl p-2 border border-blue-100 ">
                <flux:icon.graduation-cap class="text-white size-8" />
            </div>
            <div>
                <h2 class="font-bold text-xl lg:text-3xl">My Internship</h2>
                <p class="text-gray-600 font-light">Dashboard PKL Siswa</p>
            </div>
        </div>
    </div>

    <div id="studnet-info" class="flex flex-col gap-6 border border-blue-100 rounded-2xl p-4">
        <div class="flex gap-4 items-center">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-2 border border-blue-100">
                <flux:icon.user class="text-white size-8" />
            </div>
            <h3 class="font-semibold text-xl md:text-3xl">Student Information</h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 divide-x-1 divide-solid divide-zinc-300 ">
            <div class="flex flex-col">
                <flux:label class="text-lg font-light">Nama Siswa</flux:label>
                <span class=" font-bold">{{auth()->user()->name}}</span>
            </div>
            <div class="flex flex-col">
                <flux:label class="text-lg font-light">Email</flux:label>
                <span class="font-bold">{{auth()->user()->email}}</span>
            </div>
            <div class="flex flex-col">
                <flux:label class="text-lg font-light">NIS</flux:label>
                <span class="font-bold">{{$student->nis}}</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 ">
    @if ($internships)
        <div id="internship-info" class="flex flex-col gap-6 border border-blue-100 rounded-2xl p-4">
            <div class="flex gap-4 items-center justify-center">
                <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-2 border border-blue-100">
                    <flux:icon.building-office class="text-white size-8" />
                </div>
                <h3 class="font-semibold text-xl md:text-3xl">Internship Information</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-6 rounded-2xl border-blue-100 border p-4 items-center">
            <div class="flex gap-4 items-center justify-center">
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-2 border-blue-100">
                    <flux:icon.timer-reset class="text-white size-8" />
                </div>
                <h3 class="font-semibold text-xl md:text-3xl">Internship Duration</h3>
            </div>
        </div>
    @else
            
    @endif
    </div>

</div>