<?php

namespace App\Http\Livewire\User;

use App\Models\CountriesList;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileForm extends Component
{
    use WithFileUploads;

    public string $username = '';
    public string $email = '';
    public string $country = '';
    public $avatar;

    public bool $hasAvatar = false;
    public string $avatarPath = '';
    public array $countries;

    protected $listeners = ['saved', 'removed'];

    protected function rules()
    {
        return [
            'username' => 'required|min:3|max:15|regex:/^[A-Za-z0-9_]+$/|unique:users,username,' . auth()->id(),
            'email' => 'required|email:filter|unique:users,email,' . auth()->id(),
            'country' => 'required|max:2',
            'avatar' => 'nullable|image|max:2048',
        ];
    }

    public function mount()
    {
        if (auth()->guest()) {
            return back()->withErrors(['auth' => __('You must be logged in.')]);
        }

        /** @var User $user */
        $user = auth()->user();

        $this->username = $user->username;
        $this->email = $user->email;
        $this->country = $user->country;

        $this->hasAvatar = $user->hasAvatar();
        $this->avatarPath = Storage::url($user->avatar);
        $this->countries = CountriesList::all(app()->getLocale());
    }

    public function updatedUsername()
    {
        $this->validateOnly('username');
    }

    public function updatedEmail()
    {
        $this->validateOnly('email');
    }

    public function submitForm()
    {
        /** @var User $user */
        $user = auth()->user();

        $formData = $this->validate();

        if ($this->avatar) {
            $filePath = $this->avatar->store('avatars', 'public');


            $formData['avatar'] = $filePath;
            $this->hasAvatar = true;
            $this->avatarPath = $filePath;
            $user->removeAvatarFile(); // remove previous
        } else {
            unset($formData['avatar']); // prevent to remove old avatar when the new one is not set
        }

        $user->update($formData);

        $this->emit('saved');
        $this->emitTo('user.avatar', 'avatarChanged');
    }

    public function removeAvatar()
    {
        /** @var User $user */
        $user = auth()->user();

        $user->removeAvatarFile();
        $user->update([
            'avatar' => null,
        ]);

        $this->avatarPath = '';
        $this->hasAvatar = false;
        $this->avatar = null;

        $this->emit('removed');
        $this->emitTo('user.avatar', 'avatarChanged');
    }

    public function saved()
    {
        session()->flash('status', [
            'type' => 'success',
            'message' => __('Saved'),
        ]);
    }

    public function removed()
    {
        session()->flash('status', [
            'type' => 'info',
            'message' => __('There is no avatar in your profile now.'),
        ]);
    }

    public function render()
    {
        return view('livewire.user.profile-form', [
            'locale' => app()->getLocale(),
        ])
            ->layout('components.layouts.user-settings', [
                'title' => __('Profile'),
                'username' => auth()->user()->username,
            ]);
    }
}
