<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Manage Users') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-darkbg text-white min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-darkbg2 relative overflow-x-auto shadow-md sm:rounded-lg mb-4">
                    <table class="w-full text-sm text-left text-gray-300">
                        <thead class="text-xs uppercase bg-[#1f1f1f] text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email Verified At
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Create At
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Updated At
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="odd:bg-darkbg2 even:bg-[#1f1f1f] border-b border-[#333]">
                                <td class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->email_verified_at }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->created_at }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->updated_at }}
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>