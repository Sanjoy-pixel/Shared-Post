<x-layout>
    <x-header :links="[  
        auth()->user() !== null ? 'Welcome' .' '. auth()->user()->name   : 'Login' =>  auth()->user() !== null ? '#' : route('login') 
     
     
     ]" />


    <x-container>

 
      
        <div class="profile-v2">
         

            <div class="update-profile">
              
                <span id="notif" class=""></span>

                <form action="{{route('admin.store')}}" method="post" class="profile-form" enctype="multipart/form-data">
                    <h1 class="form-title">Add User </h1>
                   @csrf
             
                   
                    <div class="upload-pic-container">

                        <img id="profile-pic" src="{{ asset('storage/images/user.jpg')}}" class="profile-pic" />
                        <input type="file" name="img" id="image" class="file" onchange="displayImage(this)"  />
                        @error('img')
                        <p id="img_notif" class="img-notif">{{$message}}</p>   
                        @enderror
                       
                    </div>


                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="{ { @error('name') e-box-shadow  @enderror }}" value="{{old('name')}}" />
                    @error('name')
                    <span class="name-error">{{$message}}</span>
                    @enderror
                   
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="{ { @error('email') e-box-shadow  @enderror }}" value="{{old('email')}}" />
                    
                    @error('email')
                    <span class="email-error">{{$message}}</span>
                    @enderror
                    
                  
                    <label for="role">User role:</label>
                  
                    <select name="role_id" id="role">
                      @foreach ($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>

                        
                
                   

                    <label for="new-pass">New Password:</label>
                    <input type="password" name="password" id="new_password" class="{ { @error('password') e-box-shadow  @enderror }}" />
                    @error('password')
                    <span class="new-password-error">{{$message}}</span> 
                    @enderror
                  
                    <label for="confirm-pass">Confirm password:</label>
                    <input type="password" name="password_confirmation" id="confirm_password" class="" />
                    <span class="confirm-password-error"></span>
                    <input id="id" name="id" type="hidden" value="" />
                    <button class="update-profile-btn">Update</button>


                </form>

            </div>
    </x-container>
</x-layout>