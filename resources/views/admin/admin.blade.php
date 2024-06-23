<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mx-auto px-4 py-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-bold">User Management</h2>
                        <button
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600"
                            id="addUserButton">Add User</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 border">ID</th>
                                    <th class="px-4 py-2 border">Name</th>
                                    <th class="px-4 py-2 border">Email</th>
                                    <th class="px-4 py-2 border">Role</th>
                                    <th class="px-4 py-2 border">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="crudTableBody">
                                <!-- Rows will be dynamically inserted here -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal for Add/Edit User -->
                <div id="userModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
                    <div class="flex items-center justify-center min-h-screen px-4">
                        <div
                            class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div
                                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                    </div>
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modalTitle">Add User
                                        </h3>
                                        <div class="mt-2">
                                            <form id="userForm">
                                                <input type="hidden" id="userId">
                                                <div class="mb-4">
                                                    <label for="name" class="block text-gray-700">Name</label>
                                                    <input type="text" id="name" name="name"
                                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                                        required>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="email" class="block text-gray-700">Email</label>
                                                    <input type="email" id="email" name="email"
                                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                                        required>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="role" class="block text-gray-700">Role</label>
                                                    <select id="role" name="role"
                                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                                        required>
                                                        <option value="admin">Admin</option>
                                                        <option value="teacher">Teacher</option>
                                                        <option value="student">Student</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="button"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                                    id="saveButton">Save</button>
                                <button type="button"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:w-auto sm:text-sm"
                                    id="cancelButton">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal for Delete Confirmation -->
                <div id="deleteModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
                    <div class="flex items-center justify-center min-h-screen px-4">
                        <div
                            class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div
                                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </div>
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">Confirm Delete</h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">Are you sure you want to delete this user?
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="button"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
                                    id="confirmDeleteButton">Delete</button>
                                <button type="button"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:w-auto sm:text-sm"
                                    id="cancelDeleteButton">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Alert Container -->
                <div id="alert-container" class="fixed top-0 left-0 right-0 flex justify-center mt-4"
                    style="display: none;">
                    <div id="alert"
                        class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg shadow-lg relative max-w-4xl mx-auto fade-in">
                        <strong class="font-bold text-lg"></strong>
                        <span class="block sm:inline" id="span_id"></span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg id="close-alert" class="fill-current h-6 w-6 text-blue-500 cursor-pointer"
                                role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path
                                    d="M14.348 14.849a.5.5 0 01-.707 0L10 10.707l-3.646 3.646a.5.5 0 01-.707-.707L9.293 10 5.646 6.354a.5.5 0 11.707-.707L10 9.293l3.646-3.646a.5.5 0 11.707.707L10.707 10l3.646 3.646a.5.5 0 010 .707z" />
                            </svg>
                        </span>
                    </div>

                    <script>
                        let editingUserId = null;

                        // Show Add User Modal
                        document.getElementById('addUserButton').addEventListener('click', function() {
                            clearUserModal();
                            document.getElementById('modalTitle').textContent = 'Add User';
                            document.getElementById('userModal').classList.remove('hidden');
                        });

                        // Hide Modals
                        document.getElementById('cancelButton').addEventListener('click', function() {
                            hideUserModal();
                        });

                        document.getElementById('cancelDeleteButton').addEventListener('click', function() {
                            hideDeleteModal();
                        });

                        // Save User
                        document.getElementById('saveButton').addEventListener('click', function() {
                            const userId = editingUserId;
                            const name = document.getElementById('name').value;
                            const email = document.getElementById('email').value;
                            const role = document.getElementById('role').value;

                            const data = {
                                name,
                                email,
                                role
                            };

                            if (userId) {
                                // Update user
                                fetch(`/api/users/${userId}`, {
                                        method: 'PUT',
                                        headers: {
                                            'Content-Type': 'application/json',
                                        },
                                        body: JSON.stringify(data),
                                    })
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error('Failed to update user.');
                                        }
                                        return response.json();
                                    })
                                    .then(updatedUser => {
                                        updateTableRow(updatedUser);
                                        hideUserModal();

                                        const alertContainer = document.getElementById('alert-container');
                                        const alert = document.getElementById('alert');
                                        const spanElement = document.getElementById('span_id');
                                        alertContainer.style.display = 'flex';
                                        alert.classList.add('fade-in');

                                        spanElement.textContent = 'Updated Successfully';
                                        document.getElementById('close-alert').addEventListener('click', function() {
                                            document.getElementById('alert-container').style.display = 'none';
                                        });

                                    })
                                    .catch(error => {
                                        console.error('Error updating user:', error);
                                        alert('Failed to update user. Please try again.');
                                    });
                            } else {
                                // Add new user
                                fetch('/api/users', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                        },
                                        body: JSON.stringify(data),
                                    })
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error('Failed to add user.');
                                        }
                                        return response.json();
                                    })
                                    .then(newUser => {
                                        addTableRow(newUser);
                                        hideUserModal();

                                        const alertContainer = document.getElementById('alert-container');
                                        const alert = document.getElementById('alert');
                                        const spanElement = document.getElementById('span_id');
                                        alertContainer.style.display = 'flex';
                                        alert.classList.add('fade-in');

                                        spanElement.textContent = 'Added Successfully';
                                        document.getElementById('close-alert').addEventListener('click', function() {
                                            document.getElementById('alert-container').style.display = 'none';
                                        });

                                    })
                                    .catch(error => {
                                        console.error('Error adding user:', error);
                                        alert('Failed to add user. Please try again.');
                                    });
                            }
                        });

                        // Delete User
                        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
                            const userId = editingUserId;

                            fetch(`/api/users/${userId}`, {
                                    method: 'DELETE',
                                })
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Failed to delete user.');
                                    }
                                    removeTableRow(userId);
                                    hideDeleteModal();

                                    const alertContainer = document.getElementById('alert-container');
                                        const alert = document.getElementById('alert');
                                        const spanElement = document.getElementById('span_id');
                                        alertContainer.style.display = 'flex';
                                        alert.classList.add('fade-in');

                                        spanElement.textContent = 'Deleted Successfully';
                                        document.getElementById('close-alert').addEventListener('click', function() {
                                            document.getElementById('alert-container').style.display = 'none';
                                        });

                                })
                                .catch(error => {
                                    console.error('Error deleting user:', error);
                                    alert('Failed to delete user. Please try again.');
                                });
                        });

                        function showDeleteModal(userId) {
                            editingUserId = userId;
                            document.getElementById('deleteModal').classList.remove('hidden');
                        }

                        function hideUserModal() {
                            document.getElementById('userModal').classList.add('hidden');
                            editingUserId = null;
                        }

                        function hideDeleteModal() {
                            document.getElementById('deleteModal').classList.add('hidden');
                            editingUserId = null;
                        }

                        function clearUserModal() {
                            document.getElementById('userId').value = '';
                            document.getElementById('name').value = '';
                            document.getElementById('email').value = '';
                            document.getElementById('role').value = 'student';
                        }

                        function addTableRow(user) {
                            const row = document.createElement('tr');
                            row.setAttribute('data-user-id', user.id);
                            row.innerHTML = `
                            <td class="px-4 py-2 border">${user.id}</td>
                            <td class="px-4 py-2 border">${user.name}</td>
                            <td class="px-4 py-2 border">${user.email}</td>
                            <td class="px-4 py-2 border">${user.role}</td>
                            <td class="px-4 py-2 border">
                                <button class="text-blue-600 hover:text-blue-900 mr-2" onclick="editUser(${user.id})">Edit</button>
                                <button class="text-red-600 hover:text-red-900" onclick="showDeleteModal(${user.id})">Delete</button>
                            </td>
                        `;
                            document.getElementById('crudTableBody').appendChild(row);
                        }

                        function updateTableRow(user) {
                            const row = document.querySelector(`tr[data-user-id="${user.id}"]`);
                            if (row) {
                                row.innerHTML = `
                                <td class="px-4 py-2 border">${user.id}</td>
                                <td class="px-4 py-2 border">${user.name}</td>
                                <td class="px-4 py-2 border">${user.email}</td>
                                <td class="px-4 py-2 border">${user.role}</td>
                                <td class="px-4 py-2 border">
                                    <button class="text-blue-600 hover:text-blue-900 mr-2" onclick="editUser(${user.id})">Edit</button>
                                    <button class="text-red-600 hover:text-red-900" onclick="showDeleteModal(${user.id})">Delete</button>
                                </td>
                            `;
                            }
                        }

                        function removeTableRow(userId) {
                            const row = document.querySelector(`tr[data-user-id="${userId}"]`);
                            if (row) {
                                row.remove();
                            }
                        }

                        function editUser(userId) {
                            fetch(`/api/users/${userId}`)
                                .then(response => response.json())
                                .then(user => {
                                    document.getElementById('modalTitle').textContent = 'Edit User';
                                    document.getElementById('userId').value = user.id;
                                    document.getElementById('name').value = user.name;
                                    document.getElementById('email').value = user.email;
                                    document.getElementById('role').value = user.role;
                                    editingUserId = user.id;
                                    document.getElementById('userModal').classList.remove('hidden');
                                })
                                .catch(error => {
                                    console.error('Error fetching user:', error);
                                    alert('Failed to fetch user details. Please try again.');
                                });
                        }

                        // Load initial data
                        fetch('/api/users')
                            .then(response => response.json())
                            .then(users => {
                                users.forEach(user => addTableRow(user));
                            })
                            .catch(error => {
                                console.error('Error loading users:', error);
                                alert('Failed to load users. Please try again.');
                            });
                    </script>


                </div>
            </div>
        </div>
</x-app-layout>
