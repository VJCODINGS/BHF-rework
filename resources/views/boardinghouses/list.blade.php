<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-lg text-gray-800 leading-tight">
                Boarding Houses
            </h2>
            @can('create boardinghouses')
                <a href="{{ route('boardinghouses.create') }}" class="bg-slate-700 text-xs rounded-md px-3 py-2 text-white">Create</a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <div class="mt-6 mb-6">
                {{ $boardinghouses->links() }}
            </div>
            @if ($boardinghouses->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($boardinghouses as $boardinghouse)
                        <a href="{{ route('boardinghouses.show', $boardinghouse->id) }}" class="block bg-white shadow-md p-2 hover:bg-gray-100 transition">
                            <div class="overflow-hidden rounded-t-lg">
                                @if ($boardinghouse->profile_picture)
                                    <img src="{{ Storage::url($boardinghouse->profile_picture) }}" alt="{{ $boardinghouse->name }}" class="w-full h-48 object-cover mb-2 transition-transform duration-300 transform hover:scale-105 hover:opacity-90">
                                @else
                                    <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile" class="w-full h-48 object-cover rounded-t-lg mb-4">
                                @endif
                            </div>
                            <h3 class="text-md font-semibold mb-1">{{ $boardinghouse->name }}</h3>
                            <p class="text-gray-600 text-sm mb-1">{{ $boardinghouse->address }}</p>
                            <p class="text-gray-500 text-sm">{{ ucfirst($boardinghouse->gender) }}</p>

                            <div class="flex justify-between items-center mt-4">
                                <div class="flex">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-4 h-4 {{ $i <= $boardinghouse->averageRating() ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927C9.432 1.926 10.568 1.926 10.951 2.927l1.34 3.68a1 1 0 00.95.69h3.862c1.042 0 1.471 1.335.632 1.974l-3.124 2.277a1 1 0 00-.364 1.118l1.34 3.68c.383 1.001-.756 1.833-1.633 1.274l-3.124-2.277a1 1 0 00-1.176 0L5.18 17.65c-.878.559-2.016-.273-1.633-1.274l1.34-3.68a1 1 0 00-.364-1.118L1.399 8.27c-.839-.639-.41-1.974.632-1.974h3.861a1 1 0 00.951-.69l1.34-3.68z" />
                                        </svg>
                                    @endfor
                                </div>
                                <span class="text-sm text-gray-700 font-semibold">
                                    {{ number_format($boardinghouse->averageRating() ?? 0, 1) }} / 5
                                </span>
                                <span class="text-xs text-gray-500">({{ $boardinghouse->reviews()->count() }} reviews)</span>
                            </div>
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
