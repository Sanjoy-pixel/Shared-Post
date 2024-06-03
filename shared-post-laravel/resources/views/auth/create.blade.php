<x-layout>

  <x-header :links="[  
      auth()->user() !== null ? 'Welcome' .' '. auth()->user()->name   : 'Login' =>  auth()->user() !== null ? '#' : route('login') , 
      auth()->user() !== null ?  'Logout' : 'Register' =>  auth()->user() !== null ? '#' : route('signup') , 
   
   ]" /> 



    <x-container>

     

      <div class="signup-form">
       
       
        <div class="cta-box">
         
          <h2>Login</h2>
          <p>Please fill out your credentials to login</p>
        </div>

        @if (session()->has('success'))
        <p class="post-added">{{session('success')}}</p>
        @endif

        @if (session()->has('error'))
        <span class="errors">{{session('error')}}</span>
        @endif


        <form method="POST" action="{{route('auth.store')}}" class="cta">
          @csrf
          
          <div>
            <label for="email">Email:</label>
            <input id="email" type="email" placeholder="John@mail.com" name="email" class="{ { @error('email') e-box-shadow  @enderror }}"  value="{{old('email')}}" />
            @error('email')
            <span class="text-error">{{$message}}</span>    
            @enderror
          </div>

          <div>
            <label for="password">Password:</label>
            <input name="password" id="password" type="password"class="{ { @error('password') e-box-shadow  @enderror }}"  />
            @error('password')
            <span class="text-error">{{$message}}</span>    
            @enderror
          </div>

          <div>
            <label for="remember">Remember me</label>
            <input type="checkbox" name="remember" class="check-box" id="remember" onclick="myFunction()" />
          </div>
          <div class="form-footer">
            <button type="submit">Login</button>
            <p>No account? <a href="#">Register</a></p>
          </div>
        </form>
      </div> 










        {{-- <div class="signup-form">
            <div class="cta-box">
              <h2>Create an account</h2>
              <p>Please fill out this form to register with us</p>
            </div>
     
    {{$errors}}
            <form method="post"  action="{{route('auth.store')}}" class="cta">
                @csrf       
    
              <div>
    
                <label for="name">Name:</label>
                <input name="name" id="name" type="text" placeholder="John" class="" />
                <span class="text-error"></span>
    
              </div>
    
              <div>
                <label for="email">Email:</label>
    
                <input id="email" type="email" placeholder="John@mail.com" name="email"  />
                <span class="text-error"></span>
              </div>
    
              <div>
                <label for="password">Password:</label>
                <input name="password" id="password" type="password" class="" />
                <span class="text-error"></span>
              </div>
    
              <div>
                <label for="confirm">Confirm password:</label>
                <input name="password_confirmation" id="confirm" type="password" class="" />
                <span class="text-error"></span>
            
              </div>
    
              <div class="s-box-container">
                <label for="show">show password</label>
                <input type="checkbox" class="check-box" id="show" onclick="" />
              </div>
              <div class="form-footer">
                <button type="submit">Signup</button>
                <p>Have an account? <a href="#">Login</a></p>
              </div>
            </form>
          </div> --}}


    </x-container>

</x-layout>