
<form class="container-sm" action="{{ $action }}" method="POST">
    @csrf
    @isset($edit)
        @method('PATCH')
    @endisset
    
    <div class="row g-3">
        <div class="col">
            <x-textfield name="firstname" label="First Name" :value="old('firstname', $user->firstname ?? '')" type="text" placeholder="Enter First Name" />
        </div>
        <div class="col">
            <x-textfield name="lastname" label="Last Name" :value="old('lastname', $user->lastname ?? '')" type="text" placeholder="Enter Last Name" />
        </div>
        <div class="col">
            <x-textfield name="username" label="Username" :value="old('username', $user->username ?? '')" type="text" placeholder="Enter Username" />
        </div>
    </div>

    <div class="col">
        <x-textfield name="email" label="User Email" :value="old('email', $user->email ?? '')" type="email" placeholder="Enter User Email" />
    </div>

    @php
        $roles = [
            ['value'=>'admin', 'label'=>'Admin'],
            ['value'=>'super_admin', 'label'=>'Super Admin'],
        ];
    @endphp

    <x-selectfield :options="$roles" name="role" :value="old('role', $user->role ?? '')" label="Select Role" />
    
    <div class="col">
        <x-textfield name="password" label="Password (Leave blank to keep current)" type="password" placeholder="Enter Password" />
    </div>
    <div class="col">
        <x-textfield name="password_confirmation" label="Confirm Password" type="password" placeholder="Confirm Password" />
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
