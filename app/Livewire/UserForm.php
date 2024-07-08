<?php

// app/Http/Livewire/UserForm.php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserForm extends Component
{
    public $userId;
    public $name;
    public $email;
    public $role;
    public $password;
    public $isEdit;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email',
        'role' => 'required|in:student,teacher,admin',
        'password' => 'nullable|string|min:8'
    ];

    public function mount($userId = null, $isEdit = false)
    {
        $this->isEdit = $isEdit;

        if ($isEdit && $userId) {
            $user = User::find($userId);
            $this->userId = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->role = $user->role;
        }
    }

    public function save()
    {
        $this->validate();

        if ($this->isEdit) {
            $user = User::find($this->userId);
            $user->name = $this->name;
            $user->email = $this->email;
            $user->role = $this->role;
            if ($this->password) {
                $user->password = Hash::make($this->password);
            }
            $user->save();
        } else {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'role' => $this->role,
                'password' => Hash::make($this->password)
            ]);
        }

        $this->emit('userUpdated');
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->emit('closeModal');
    }

    public function render()
    {
        return view('livewire.user-form');
    }
}
