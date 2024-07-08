<!-- resources/views/livewire/user-form.blade.php -->

<div class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <form wire:submit.prevent="save">
            <div>
                <label>Name</label>
                <input type="text" wire:model="name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" />
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div>
                <label>Email</label>
                <input type="email" wire:model="email" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" />
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div>
                <label>Role</label>
                <select wire:model="role" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                    <option value="">Select Role</option>
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                    <option value="admin">Admin</option>
                </select>
                @error('role') <span class="error">{{ $message }}</span> @enderror
            </div>
            @if (!$isEdit)
                <div>
                    <label>Password</label>
                    <input type="password" wire:model="password" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" />
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                </div>
            @endif
            <div class="mt-4">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Save</button>
                <button type="button" wire:click="closeModal" class="px-4 py-2 bg-gray-600 text-white rounded-md">Cancel</button>
            </div>
        </form>
    </div>
</div>
