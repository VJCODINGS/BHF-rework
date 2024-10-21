<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Boarding Houses
            </h2>
            <a href="{{ route('boardinghouses.create') }}" class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Create</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <div class="mt-6 mb-6">
                {{ $boardinghouses->links() }}
            </div>
            @if ($boardinghouses->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($boardinghouses as $boardinghouse)
                        <a href="{{ route('boardinghouses.show', $boardinghouse->id) }}" class="block bg-white shadow-md rounded-lg p-6 hover:bg-gray-100 transition">
                            @if ($boardinghouse->profile_picture)
                                <img src="{{ Storage::url($boardinghouse->profile_picture) }}" alt="{{ $boardinghouse->name }}" class="w-full h-48 object-cover rounded-t-lg mb-4">
                            @else
                                <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile" class="w-full h-48 object-cover rounded-t-lg mb-4">
                            @endif
                            <h3 class="text-lg font-semibold">{{ $boardinghouse->name }}</h3>
                            <p class="text-gray-600">{{ $boardinghouse->address }}</p>
                            <p class="text-gray-500 mt-2">Gender: {{ ucfirst($boardinghouse->gender) }}</p>
                        </a>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $boardinghouses->links() }}
                </div>
            @else
                <p class="text-center">No boarding houses available.</p>
            @endif
        </div>
    </div>
</x-app-layout>
