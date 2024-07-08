<?php

// app/Http/Livewire/UserManagement.php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserManagement extends Component
{
    public $users;
    public $userId;
    public $showModal = false;
    public $isEdit = false;

    protected $listeners = [
        'userUpdated' => 'refreshUsers'
    ];

    public function mount()
    {
        $this->refreshUsers();
    }

    public function refreshUsers()
    {
        $this->users = User::all(['id', 'name', 'email', 'role']);
    }

    public function openModal($userId = null)
    {
        $this->userId = $userId;
        $this->isEdit = !is_null($userId);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function deleteUser($userId)
    {
        User::find($userId)->delete();
        $this->refreshUsers();
    }

    public function render()
    {
        return view('livewire.user-management');
    }
}
