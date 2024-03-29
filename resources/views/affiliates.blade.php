<x-layout>
    <x-slot:heading>
        Affiliates
        <div class="inline float-right">
            <span
                class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20 font-semibold mr-1">Total:
                {{ count($affiliates) }}</span>
        </div>
    </x-slot:heading>
    @if (count($affiliates) > 0)
        <ul role="list" class="divide-y divide-gray-100">
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">NAME</p>
                    </div>
                </div>
                <div>
                    <p class="text-sm font-semibold leading-6 text-gray-900">ID</p>
                </div>
            </li>
            @foreach ($affiliates as $affiliate)
                <li class="flex justify-between py-5">
                    <div class="flex min-w-0 gap-x-4">
                        <i class="fa fa-user"></i>
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900">{{ $affiliate->name }}</p>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $affiliate->distance }} km</p>
                        </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        <p class="text-sm leading-6 text-gray-900">{{ $affiliate->affiliate_id }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <h3>
            There are no affiliates located within a 100km radius.
        </h3>
    @endif
</x-layout>
