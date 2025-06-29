<div class="px-4">
    <livewire:vacants-filter />
    <div class=" py-12">
        <div class=" max-w-7xl mx-auto ">
            <h3 class=" font-extrabold text-4xl text-gray-800 mb-12">
                Available Vacancies
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($vacancies as $vacancy)
                    <div
                        class="bg-white shadow-md rounded-lg p-6 hover:shadow-lg transition-all duration-300 hover:scale-105 flex flex-col">
                        <h4 class="text-xl font-semibold mb-2">{{ $vacancy->title }}</h4>
                        <p>
                            {{ $vacancy->company}}
                        </p>

                        <p class="text-sm text-gray-600">
                            {{ $vacancy->created_at->diffForHumans() }}
                        </p>

                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">{{ $vacancy->category->category }}</span>
                        </div>

                        <p class="text-sm text-gray-600">
                            {{ $vacancy->salary->salary }}
                        </p>
                        <p class="text-sm font-semibold">
                            Last date to apply: {{ $vacancy->last_day->format('d M, Y') }}
                        </p>
                        <a href="{{ route('vacancies.show', $vacancy->id) }}"
                            class="mt-4 inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 justify-center">
                            View Details
                        </a>
                    </div>
                @empty
                    <div class="col-span-1 sm:col-span-2 md:col-span-3 lg:col-span-4 p-6 text-center text-gray-600">
                        <p class="text-lg font-semibold">No vacancies available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>