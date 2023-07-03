<div>
    <button wire:click="pushUsers"
        class="absolute top-0 right-0 flex items-center justify-center w-10 h-10 -mt-5 -mr-2 text-white bg-green-400 rounded-full focus:outline-none hover:shadow-lg">
        <i data-feather="arrow-right"></i>
    </button>
    <div class="pb-2 mx-1">
        <input wire:model.debounce.300ms="search" type="text"
            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"placeholder="Search users...">
    </div>
    <div class="flex w-full pb-10">
        <div class="relative mx-1">
            <select wire:model="sortField"
                class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-state">
                <option value="id">ID</option>
                <option value="name">Name</option>
                <option value="email">Email</option>
                <option value="created_at">Sign Up Date</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
        </div>
        <div class="relative mx-1">
            <select wire:model="sortAsc"
                class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-state">
                <option value="1">Asc</option>
                <option value="0">Desc</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
        </div>
        <div class="relative w-1/6 mx-1">
            <select wire:model="perPage"
                class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-state">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
            {{-- <button wire:click="deleteUsers"
                class=button"block w-full px-4 py-3 pr-8 leading-tight text-white bg-red-500 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">Delete</button> --}}
        </div>
    </div>
    @if ($users->isNotEmpty())
        <div class="overflow-x-auto">
            <table class="w-full mb-6 text-xs table-auto">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2"><input wire:model="selectAll" class="cursor-pointer" type="checkbox">
                        </th>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Remember Token</th>
                        <th class="px-4 py-2">Created At</th>
                        <th class="px-4 py-2">Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="px-4 py-2 text-center border-b">
                                <input wire:model="selected" class="cursor-pointer" value="{{ $user->id }}"
                                    type="checkbox">
                            </td>
                            <td class="px-4 py-2 border-b">{{ $user->id }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->name }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->email }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->remember_token }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->created_at->diffForHumans() }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->updated_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {!! $users->links() !!}
    @else
        <p class="text-center">Whoops! No users were found 🙁</p>
    @endif
</div>
