<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vacant Candidates') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class=" text-2xl font-bold text-center mb-10">Candidates from: {{ $vacant->title }}</h1>
                    <div class=" md:flex md:justify-center p-5">
                        <ul class=" divide-y divide-gray-200 w-full">
                            @forelse ($candidates as $candidate)
                                <li class="p-3 text-gray-600">
                                    <div class="flex flex-wrap justify-between items-center gap-x-8 gap-y-2">
                                        <div>
                                            <p class="text-lg font-bold">{{ $candidate->user->name }}</p>
                                            <p class="text-sm text-gray-600">{{ $candidate->user->email }}</p>
                                            <p class="text-sm text-gray-500 font-bold">
                                                Applied:
                                                <span class=" font-normal">
                                                    {{$candidate->created_at->diffForHumans()}}
                                                </span>
                                            </p>
                                        </div>
                                        <div>
                                            <a href="{{ asset('storage/' . $candidate->cv) }}" target="_blank"
                                                rel="noopener noreferrer"
                                                class=" inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                View CV
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="py-3 text-center text-sm text-gray-600">No candidates found for this vacant.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>