<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Permissions') }}
            </h2>
            @can('create permissions')
                <a href="{{ route('permissions.create') }}" class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Create</a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>

            <div class="overflow-x-auto">
                {{ $permissions->links() }}
                <table class="min-w-full divide-y divide-gray-200 mb-3 mt-3">
                  <thead class="bg-gray-50 hidden md:table-header-group">
                    <tr>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" width='60'>
                        #
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" width='120'>
                        Created
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" width='180'>
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    @if ($permissions->isNotEmpty())
                    @foreach ($permissions as $permission)
                    <tr class="block md:table-row">
                      <td class="px-6 py-4 whitespace-nowrap text-left block md:table-cell" data-label="#">
                        <span class="md:hidden font-semibold">#:</span> {{ $permission->id }}
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-left block md:table-cell" data-label="Name">
                        <span class="md:hidden font-semibold">Name:</span> {{ $permission->name }}
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-left block md:table-cell" data-label="Created">
                        <span class="md:hidden font-semibold">Created:</span> {{ $permission->created_at }}
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-left block md:table-cell" data-label="Action">
                        <span class="md:hidden font-semibold">Action:</span>
                        @can('edit permissions')
                            <a href="{{ route("permissions.edit", $permission->id) }}" class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white hover:bg-slate-600">Edit</a>
                        @endcan

                        @can('delete permissions')
                            <a href="javascript:void(0)" onclick="deletePermission({{ $permission->id }})" class="bg-red-700 text-sm rounded-md px-3 py-2 text-white hover:bg-red-600">Delete</a>
                        @endcan
                      </td>
                    </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
                {{ $permissions->links() }}
              </div>

        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript">
            function deletePermission(id) {
                if (confirm("Are you sure you want to delete?")) {
                    $.ajax({
                        url: '{{ route("permissions.destroy") }}',
                        type: 'delete',
                        data: {id:id},
                        dataType: 'json',
                        headers: {
                            'x-csrf-token' : '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            window.location.href = '{{ route("permissions.index") }}';
                        }
                    })
                }
            }
        </script>
    </x-slot>
</x-app-layout>
