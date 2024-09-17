<form class="container-sm" action="{{$action}}" method="POST">
    @csrf 
    <div class="mb g-3">
        <div class="col">
            <x-textfield name="firstname" label="fullname" :value="old('firstname')" type="text" placeholder="Enter user Full name" />
        </div>
        <div class="col">
            <x-textfield name="email" label="User Email" :value="old('email')" type="email" placeholder="Enter user email" />
        </div>
    </div>

    <div class="col">
        <x-textfield name="username" label="Username" :value="old('username')" type="password" placeholder="Enter Username" />
    </div>

    @php
        $role = [
            ['value'=>'admin', 'label'=>'Admin'],
            ['value'=>'super_admin','label'=>'Super Admin'],
        ];     
    @endphp


    @isset($edit)
        @method('PATCH')
    @endisset
    <x-selectfield :options="$role" name="role" :value="old('role')" label="Select Role"  />
    <div class="col">
        <x-textfield name="password" label="User Password" :value="old('password')" type="password" placeholder="Enter pasword" />
    </div>
    <div class="col">
        <x-textfield name="password_confirmation" label="Confirm Password" :value="old('password_confirmation')" type="password" placeholder="Confirm Password" />
    </div>

    
   

    <button type="submit" class="btn btn-primary">Save</button>
</form>
