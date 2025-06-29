<form action="" class=" md:w-1/2 space-y-5" wire:submit.prevent="updateVacant">
    <div>
        <x-input-label for="title" :value="__('Job Title')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" wire:model="title" :value="old('title')"
            placeholder="Enter the job title" />
        @error('title')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="salary" :value="__('Monthly Salary')" />
        <select wire:model="salary" id="salary"
            class=" w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option value="">-- Choose a monthly salary --</option>
            @foreach ($salaries as $salary)
                <option value="{{$salary->id}}">{{$salary->salary}}</option>
            @endforeach
        </select>
        @error('salary')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="category" :value="__('Category')" />
        <select wire:model="category" id="category"
            class=" w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option value="">-- Choose a category --</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->category}}</option>
            @endforeach
        </select>
        @error('category')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="company" :value="__('Company')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" wire:model="company" :value="old('company')"
            placeholder="Enter the name company (ej. Netflix, Uber, Shopify)" />
        @error('company')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="last_day" :value="__('Last Day to Apply')" />
        <x-text-input id="last_day" class="block mt-1 w-full" type="date" wire:model="last_day" :value="old('last_day')" />
        @error('last_day')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="description" :value="__('Job Description')" />
        <textarea wire:model="description" id="description" rows="9"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full resize-none"
            placeholder="Description, experience job."></textarea>

        @error('description')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="newImage" :value="__('Image')" />
        <x-text-input id="newImage" class="block mt-1 w-full" type="file" wire:model="newImage" accept="image/*" />
        <div class="my-5 w-80 ">
            <x-input-label :value="__('Current Image')" />
            <img src="{{asset('storage/' . $image)}}" alt="{{ 'Vacant image ' . $title }}" class="w-80 h-80 object-cover" />
        </div>

       <div class=" my-5 w-80">
            @if ($newImage)
                New Image:
                <img src="{{ $newImage->temporaryUrl()}}" />
            @endif
        </div>

        @error('image')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>
    <x-primary-button>Save Changes</x-primary-button>
</form>