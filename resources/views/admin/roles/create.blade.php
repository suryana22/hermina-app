<x-admin-layout>
    <x-splade-modal>
        <div class="py-2">
            <h1 class="text-2xl font-semibold p-4">Create New Role</h1>    

        </div>
        <x-splade-form :action="route('admin.roles.store')" class="p-4 bg-white rounded-md space-y-2">
            <x-splade-input name="name" label="Name" />
            <x-splade-select name="permissions[]" :options="$permissions" multiple relation choices placeholder="Select your permissions..." />
            <div class="flex flex-row-reverse space-x-4 space-x-reverse">
                <div>
                    {{-- <x-splade-submit /> --}}
                    <button type="submit" class="px-4 py-2 rounded bg-indigo-400 hover:bg-indigo-500 text-white font-semibold">Submit</button>
                </div>
                <div>
                    <button type="button" class="px-4 py-2 text-gray-500 rounded bg-yellow-400 hover:bg-yellow-500 font-semibold" @click="modal.setIsOpen(false)">Cancel</button>
                </div>
            </div>
        </x-splade-form>
    </x-splade-modal>
</x-admin-layout>