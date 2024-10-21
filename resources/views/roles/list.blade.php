<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Roles') }}
            </h2>
            @can('create roles')
                <a href="{{ route('roles.create') }}" class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white">Create</a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>

            <div class="overflow-x-auto">
                {{ $roles->links() }}
                <table class="min-w-full divide-y divide-gray-200 mb-3">
                    <thead class="bg-gray-50 hidden md:table-header-group">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" width='60'>
                          #
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Permissions
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
                      @if ($roles->isNotEmpty())
                      @foreach ($roles as $role)
                      <tr class="block md:table-row">
                        <td class="px-6 py-4 whitespace-nowrap text-left block md:table-cell" data-label="#">
                          <span class="md:hidden font-semibold">#:</span> {{ $role->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-left block md:table-cell" data-label="Name">
                          <span class="md:hidden font-semibold">Name:</span> {{ $role->name }}
                        </td>
                        <td class="px-6 py-4 text-left block md:table-cell" data-label="Permissions">
                            <span class="md:hidden font-semibold">Permissions:</span>
                            <div class="whitespace-normal break-words">
                                {{ $role->permissions->pluck('name')->implode(' | ') }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-left block md:table-cell" data-label="Created">
                          <span class="md:hidden font-semibold">Created:</span> {{ $role->created_at }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-left block md:table-cell" data-label="Action">
                          <span class="md:hidden font-semibold">Action:</span>
                          @can('edit roles')
                                <a href="{{ route("roles.edit", $role->id) }}" class="bg-slate-700 text-sm rounded-md px-3 py-2 text-white hover:bg-slate-600">Edit</a>
                          @endcan

                          @can('delete roles')
                                <a href="javascript:void(0)" onclick="deleteRole({{ $role->id }})" class="bg-red-700 text-sm rounded-md px-3 py-2 text-white hover:bg-red-600">Delete</a>
                          @endcan
                        </td>
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                {{ $roles->links() }}
            </div>

        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript">
            function deleteRole(id) {
                if (confirm("Are you sure you want to delete?")) {
                    $.ajax({
                        url: '{{ route("roles.destroy") }}',
                        type: 'delete',
                        data: {id:id},
                        dataType: 'json',
                        headers: {
                            'x-csrf-token' : '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            window.location.href = '{{ route("roles.index") }}';
                        }
                    })
                }
            }
        </script>
    </x-slot>
</x-app-layout>
