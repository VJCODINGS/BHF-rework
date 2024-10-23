<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-lg text-gray-800 leading-tight">
                Create Boarding House
            </h2>
            <a href="{{ route('boardinghouses.index') }}" class="bg-blue-600 hover:bg-blue-500 text-sm rounded-md px-4 py-2 text-white">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <form action="{{ route('boardinghouses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-6 text-center">
                        <label class="block text-base font-medium">House Picture</label>
                        <div class="w-24 h-24 mx-auto rounded-full overflow-hidden bg-gray-100 mt-2 relative border border-dashed border-gray-400" id="profile-picture-dropzone" style="max-width: 80px; max-height: 80px;">
                            <img id="profile-picture-preview" class="w-full h-full object-cover" src="https://via.placeholder.com/150" alt="House Picture" style="max-width: 100%; max-height: 100%;">
                            <input name="profile_picture" type="file" class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewImage(event)">
                        </div>

                        <p class="text-xs text-gray-500 mt-2">Drag & drop or click to upload</p>
                        @error('profile_picture')
                            <p class="text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-base font-medium">Name</label>
                        <input name="name" type="text" value="{{ old('name') }}" placeholder="Enter house name" class="w-full mt-1 border-gray-300 shadow-sm rounded-lg focus:ring focus:ring-blue-500">
                        @error('name')
                            <p class="text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-base font-medium">Address</label>
                        <textarea name="address" placeholder="Enter address" class="w-full mt-1 border-gray-300 shadow-sm rounded-lg focus:ring focus:ring-blue-500">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-base font-medium">Gender</label>
                        <select name="gender" class="w-full mt-1 border-gray-300 shadow-sm rounded-lg focus:ring focus:ring-blue-500">
                            <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Select gender</option>
                            <option value="male only" {{ old('gender') == 'male only' ? 'selected' : '' }}>Male only</option>
                            <option value="female only" {{ old('gender') == 'female only' ? 'selected' : '' }}>Female only</option>
                            <option value="male and female" {{ old('gender') == 'male and female' ? 'selected' : '' }}>Male and Female</option>
                        </select>
                        @error('gender')
                            <p class="text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-base font-medium">Boarding House Photos</label>
                        <div class="w-full h-32 border border-dashed border-gray-400 rounded-lg p-2 bg-gray-100 relative" id="photos-dropzone">
                            <input name="photos[]" type="file" multiple class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewMultipleImages(event)">
                            <p class="text-center text-xs text-gray-500 mt-10">Drag & drop or click to upload photos</p>
                        </div>
                        <div id="photos-preview" class="flex mt-2 flex-wrap gap-2"></div>
                        @error('photos.*')
                            <p class="text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <button class="bg-slate-700 text-sm rounded-md px-5 py-2 text-white">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            var output = document.getElementById('profile-picture-preview');
            output.src = URL.createObjectURL(event.target.files[0]);
        }

        function previewMultipleImages(event) {
            var files = event.target.files;
            var photosPreview = document.getElementById('photos-preview');

            photosPreview.innerHTML = '';
            for (let i = 0; i < files.length; i++) {
                let img = document.createElement('img');
                img.src = URL.createObjectURL(files[i]);
                img.classList.add('w-20', 'h-20', 'rounded-lg', 'object-cover', 'mt-2');
                photosPreview.appendChild(img);
            }
        }
    </script>
</x-app-layout>
