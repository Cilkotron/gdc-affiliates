<x-layout>
    <x-slot:heading>
        Affiliates
    </x-slot:heading>
    <ul role="list" class="divide-y divide-gray-100">
        <li class="flex justify-between gap-x-6 py-5">
            <div class="flex min-w-0 gap-x-4">
                <div class="min-w-0 flex-auto">
                    <p class="text-sm font-semibold leading-6 text-gray-900">NAME</p>
                </div>
            </div>
            <div class="hidden shrink-0 sm:flex sm:flex-col">
                <p class="text-sm font-semibold leading-6 text-gray-900">ID</p>
            </div>
        </li>
    </ul>
    <ul role="list" class="divide-y divide-gray-100">
        @foreach ($affiliates as $affiliate)
            <li class="flex justify-between py-5">
                <div class="flex min-w-0 gap-x-4">
                    <i class="fa fa-user"></i>
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ $affiliate->name }}</p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">{{ $affiliate->affiliate_id }}</p>

                </div>
            </li>
        @endforeach
    </ul>
</x-layout>
