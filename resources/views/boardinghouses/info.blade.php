<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('House Info') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-8">

                <div class="flex flex-col md:flex-row justify-between md:space-x-2 space-y-6 md:space-y-0 mb-2">
                    <x-profile-picture :boardinghouse="$boardinghouse" />
                    <x-basic-info :boardinghouse="$boardinghouse" />
                </div>

                <x-photos-section :boardinghouse="$boardinghouse" />

                <x-extra-info :boardinghouse="$boardinghouse" />

                <x-house-details :boardinghouse="$boardinghouse" />

                <x-reviews-section :boardinghouse="$boardinghouse" />

                <x-comment-form />

            </div>
        </div>
    </div>

</x-app-layout>
