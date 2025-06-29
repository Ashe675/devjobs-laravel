<div class=" p-10">
    <div class=" mb-5">
        <h3 class=" font-bold text-3xl text-gray-800 my-3">
            {{ $vacant->title }}
        </h3>
        <div class=" md:grid md:grid-cols-2 gap-4  bg-gray-100 p-4 my-10">
            <p class=" font-bold text-sm uppercase text-gray-800 my-3">Company:
                <span class=" normal-case font-normal">{{$vacant->company}}</span>
            </p>
            <p class=" font-bold text-sm uppercase text-gray-800 my-3">Last day to apply:
                <span class=" normal-case font-normal">{{$vacant->last_day->toFormattedDateString()}}</span>
            </p>
            <p class=" font-bold text-sm uppercase text-gray-800 my-3">Category:
                <span class=" normal-case font-normal">{{$vacant->category->category}}</span>
            </p>
            <p class=" font-bold text-sm uppercase text-gray-800 my-3">Salary:
                <span class=" normal-case font-normal">{{$vacant->salary->salary}}</span>
            </p>
        </div>
    </div>
    <div class=" md:grid md:grid-cols-6 gap-4">
        <div class=" md:col-span-2">
            <img src="{{asset('storage/' . $vacant->image)}}" alt="{{'Vacant Image ' . $vacant->title}}">
        </div>
        <div class=" md:col-span-4">
            <h2 class=" text-2xl font-bold mb-5">Job Description</h2>
            <p>
                {{ $vacant->description }}
            </p>
        </div>
    </div>
    @guest
        <div class="mt-5 bg-gray-100 border border-dashed p-5 text-center">
            <p>
                Do you want to apply for this job?
                <a href="{{ route('register', $vacant) }}" class=" text-indigo-600 font-bold">
                    Get an account and apply to this job and many more!</a>
            </p>
        </div>
    @endguest

    @auth
        @cannot('create', App\Models\Vacant::class)
        <livewire:apply-vacant :vacant="$vacant" />
        @endcannot
    @endauth

</div>