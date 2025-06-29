<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

        @forelse ($vacancies as $vacant)
            <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class=" space-y-3">
                    <a href="{{route('vacancies.show', $vacant)}}" class=" text-xl font-bold">
                        {{$vacant->title}}
                    </a>
                    <p class=" text-sm text-gray-600 font-bold">{{$vacant->company}}</p>
                    <p class=" text-sm text-gray-500">Last day: {{$vacant->last_day->format('d/m/Y')}}</p>
                </div>
                <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                    <a href="{{route('candidates.index', $vacant)}}"
                        class=" bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center inline-flex items-center">
                        <span class=" px-1.5 inline-flex justify-center items-center py-0.5 bg-slate-500 rounded-full mr-1" >
                            {{ $vacant->candidates->count() }}
                        </span>
                        Candidates
                    </a>
                    <a href="{{route('vacancies.edit', $vacant)}}"
                        class=" bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center inline-flex items-center">
                        Edit
                    </a>
                    <button wire:click="$emit('showAlert', @json($vacant->id))"
                        class=" bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center inline-flex items-center">
                        Delete
                    </button>
                </div>
            </div>
        @empty
            <p class=" p-3 text-center text-sm text-gray-600">There are not vacancies yet.</p>
        @endforelse
    </div>

    <div class="  mt-10">
        {{$vacancies->links()}}
    </div>
</div>

@push('scripts')
    <script type="module">

        Livewire.on('showAlert', (vacantId) => {
        
            alertUtils.confirm({
                title: "Are you sure to delete this vacant?", text: "You won't be able to revert this!", onConfirm: () => {
                    Livewire.emit('deleteVacant', vacantId);
                    
                }
            })
        });
    </script>
@endpush