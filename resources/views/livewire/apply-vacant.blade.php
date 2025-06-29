@if ($isApplied)
    <div class="text-center bg-indigo-500 text-white p-5 rounded-lg shadow-lg mt-10">
        <h2 class="text-2xl font-bold mb-4">You have already applied for this position.</h2>
        <p class="text-gray-100">Thank you for your interest in this vacancy!</p>
    </div>
@else
    <div class=" bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
        <h3 class=" font-bold text-2xl my-4 text-center">
            Apply for this vacant position
        </h3>
        <form wire:submit.prevent='applyToVacant' class=" w-96 mt-5">
            <div class=" mb-4">
                <x-input-label for="cv">{{__('Curriculum Vitae (PDF)')}}</x-input-label>
                <x-text-input type="file" wire:model="cv" id="cv" class="w-full block mt-1" accept=".pdf" />
            </div>
            @error('cv')
                <livewire:show-alert :message="$message" />
            @enderror
            <x-primary-button class="w-full my-5 justify-center" wire:loading.attr="disabled">
                <span wire:loading.remove>{{__('Submit Application')}}</span>
                <span wire:loading>
                    <svg class="animate-spin h-5 w-5 text-white inline-block mr-2" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2.93 6.364A8.003 8.003 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3.93-1.574zM12 20a8.003 8.003 0 01-6.364-2.93l-3.93 1.574A11.95 11.95 0 0012 24c3.042 0 5.824-1.135 7.938-3l-1.574-3.93A8.003 8.003 0 0112 20zM20 12a8.003 8.003 0 01-2.93 6.364l1.574 3.93A11.95 11.95 0 0024 12h-4zM12 .001V4c3.042-.001 5.824 1.135 7.938 3l1.574-3.93A11.95 11.95 0 0012 .001z">
                        </path>
                    </svg>
                    {{ __('Submitting...') }}
                </span>
            </x-primary-button>
        </form>
    </div>
@endif