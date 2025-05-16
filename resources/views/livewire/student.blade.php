<div class="container mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($students as $student)
            @dd($students)
            <div class="border shadow-md rounded-md p-4">
                <div class="flex justify-between items-center">
                    <h1 class="text-xl font-bold">{{$student->name}}</h1>
                    <span class="px-2 py-1 bg-zinc-900 rounded-md">{{$student->nis}}</span>
                </div>
                <div class="">
                    <p>Informasi PKL: </p>
                    <div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
