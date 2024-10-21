<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Roles / Create
            </h2>
            <a href="{{ route('permissions.index') }}" class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('roles.store') }}" method="post">
                        @csrf
                        <div>
                            <label for="" class="text-lg font-medium">Name</label>
                            <div class="my-3">
                                <input value="{{ old('name') }}" name="name" placeholder="Enter Name" type="text" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('name')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-wrap gap-4 justify-center sm:justify-start">
                                @if ($permissions->isNotEmpty())
                                    @foreach ($permissions as $permission)
                                    <div class="mt-3 w-full sm:w-auto">
                                        <input id="permission-{{ $permission->id }}" type="checkbox" class="rounded" name="permission[]" value="{{ $permission->name }}">
                                        <label>{{ $permission->name }}</label>
                                    </div>
                                    @endforeach
                                @endif
                            </div>

                            <button class="bg-slate-700 text-sm rounded-md px-5 py-3 text-white mt-4">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
