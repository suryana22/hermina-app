<x-admin-layout>
    <x-splade-modal>
        <div class="py-2">
            <h1 class="text-2xl font-semibold p-4">Create User</h1>    

        </div>
        <x-splade-form :action="route('admin.users.store')" class="p-4 bg-white rounded-md space-y-2">
            <x-splade-input name="username" label="Username" />
            <x-splade-input name="firstname" label="First Name" />
            <x-splade-input name="lastname" label="Last name" />
            <x-splade-input name="email" label="Email address" />
            <x-splade-input type="password" name="password" label="Password" />
            <x-splade-input type="password" name="password_confirmation" label="Re-Type Password" />
            @role(['admin','IT Support'])
            <x-splade-select name="roles[]" :options="$roles" multiple relation choices placeholder="Select your Role..." />
            <x-splade-select name="permissions[]" :options="$permissions" multiple relation choices placeholder="Select your permissions..." />
            @endrole
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