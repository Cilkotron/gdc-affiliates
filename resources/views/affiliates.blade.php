<x-layout>
    <x-slot:heading>
        Affiliates
    </x-slot:heading>
    <ol>
        @foreach ($affiliates as $affiliate)
            <li>
                <strong>{{ $affiliate->name }}:</strong>
            </li>
        @endforeach
    </ol>
</x-layout>
