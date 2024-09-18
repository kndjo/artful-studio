<form class="container-sm" action="{{$action}}" method="POST" enctype="multipart/form-data">




<div class="row g-3">
        <div class="col">
        <x-textfield name="firstname" label="Firstname" type="text" :value="$client->firstname" placeholder="Enter client firstname" />
</div>



<div class="col">
        <x-textfield name="lastname" :value="$client->lastname" label="Lastname" type="text" placeholder="Enter client lastname" />
        </div>

</div>

<div class="row g-3">
        
        <div class="col">
            <x-textfield name="email" :value="$client->email" label="Client Email" type="email" placeholder="Enter client email" />
        </div>
    </div>

   

        

    
    @php
        $gender = [
            ['value'=>'male', 'label'=>'Male'],
            ['value'=>'female','label'=>'Female'],
        ];     
    @endphp
    
    <x-selectfield :options="$gender" name="gender" label="Select Gender" :value="$client->gender" />

    <x-textfield name="phonenumber" :value="$client->phonenumber" label="Client Phonenumber" type="tel" placeholder="Enter client phonenumber" />


    @csrf

    @isset($edit)
        @method('PATCH')
    @endisset
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>