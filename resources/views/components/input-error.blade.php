@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li class=" border-l-2 border-l-red-800 bg-red-100 p-2">{{ $message }}</li>
        @endforeach
    </ul>
@endif
