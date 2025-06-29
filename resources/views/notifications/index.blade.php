<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 space-y-2">
                    <h1 class=" text-2xl font-bold text-center mb-10">My Notifications</h1>
                    @forelse ($notifications as $notification)
                        <div
                            class="mb-4 p-4 {{$notification->read_at ? 'bg-slate-100' : 'bg-white'}} border border-slate-200 rounded-lg  flex flex-col gap-3 sm:flex-row sm:items-center justify-between ">
                            <div>
                                <p class="text-gray-700">
                                    You have a new notification regarding the vacant position:
                                    <strong>{{ $notification->data['vacant_title'] }}</strong>.
                                </p>
                                <span class="text-sm text-gray-500">{{ $notification->created_at->diffForHumans() }}</span>
                            </div>
                            <div>
                                <a href="{{ route('candidates.index', $notification->data['vacant_id']) }}"
                                    class=" {{$notification->read_at ? 'bg-gray-400' : 'bg-indigo-500'}}  p-3 text-xs uppercase font-bold text-white rounded-lg">
                                    View Candidates
                                </a>
                            </div>
                        </div>

                    @empty
                        <p class=" text-center text-gray-600">There are not notifications yet.</p>
                    @endforelse
                    <div>
                        {{ $notifications->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>