<x-admin-layout>
    <div class="py-2 max-w-12xl mx-auto lg:px-2">
        <div class="flex justify-between bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h1 class="text-2xl font-semibold p-4">Roles Index</h1>
            <div class="p-4">
                {{-- <Link href="{{ route('admin.roles.create')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">New User</Link> --}}
                <Link modal href="/admin/roles/create" class="p-3 bg-sky-400 hover:bg-sky-600 text-white rounded w-full font-semibold">New Role</Link>
            </div>    
        </div>
        <div class="py-2">
            
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <x-splade-table :for="$roles">
                    @cell('actions', $role)
                    <style>
                        .clip-bottom {
                            clip-path: polygon(100% 50%, 0 0, 100% 0, 50% 100%, 0 0)
                        }
                    </style>
                        <Link 
                            modal
                            href="{{ route('admin.roles.edit', $role) }}" 
                            class="px-2 py-2 group max-w-max relative mx-1 flex flex-col items-center justify-center  p-1 text-gray-500 hover:bg-gray-200 hover:text-gray-600">
                            <div class="[transform:perspective(50px)_translateZ(0)_rotateX(10deg)] group-hover:[transform:perspective(0px)_translateZ(0)_rotateX(0deg)] absolute bottom-0 mb-6 origin-bottom transform rounded text-white opacity-0 transition-all duration-300 group-hover:opacity-100">
                                <div class="flex max-w-xs flex-col items-center">
                                    <div class="rounded bg-gray-900 p-2 text-xs text-center shadow-lg">Modify User</div>
                                    <div class="clip-bottom h-2 w-4 bg-gray-900"></div>
                                </div>
                            </div>
                            <svg 
                                xmlns="http://www.w3.org/2000/svg" fill="none" 
                                viewBox="0 0 24 24" 
                                stroke-width="1.5" 
                                stroke="currentColor" 
                                class="w-5 h-5 stroke-green-400 hover:stroke-green-700">
                                    <path 
                                    stroke-linecap="round" stroke-linejoin="round" 
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                              </svg>
                        </Link>

                        <Link 
                            href="{{ route('admin.roles.destroy', $role) }}" 
                            method="DELETE"
                            class="px-2 py-2 group max-w-max relative mx-1 flex flex-col items-center justify-center  p-1 text-gray-500 hover:bg-gray-200 hover:text-gray-600" 
                            confirm="Delete This Role"
                            confirm-text="Are you sure?"
                            confirm-button="Yes, I want delete this Role!"
                            cancel-button="No, keep me save!">
                            <div class="[transform:perspective(50px)_translateZ(0)_rotateX(10deg)] group-hover:[transform:perspective(0px)_translateZ(0)_rotateX(0deg)] absolute bottom-0 mb-6 origin-bottom transform rounded text-white opacity-0 transition-all duration-300 group-hover:opacity-100">
                                <div class="flex max-w-xs flex-col items-center">
                                    <div class="rounded bg-gray-900 p-2 text-xs text-center shadow-lg">Delete The Role</div>
                                    <div class="clip-bottom h-2 w-4 bg-gray-900"></div>
                                </div>
                            </div>
                            <svg 
                                xmlns="http://www.w3.org/2000/svg" fill="none" 
                                viewBox="0 0 24 24" 
                                stroke-width="1.5" 
                                stroke="currentColor" 
                                class="w-5 h-5 stroke-red-500">
                                    <path 
                                    stroke-linecap="round" stroke-linejoin="round"
                                     d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                              </svg>
                              
                        </Link>
                    @endcell
                </x-splade-table>
            </div>
        </div>
    </div>
</x-admin-layout>