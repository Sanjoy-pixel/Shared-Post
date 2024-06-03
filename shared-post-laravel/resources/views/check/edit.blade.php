<x-layout>

    <x-header :links="[  
        auth()->user() !== null ? 'Welcome' .' '. auth()->user()->name   : 'Login' =>  auth()->user() !== null ? '#' : route('login') 
     
     
     ]" /> 


<x-container>
    
    <div class="add-post-form">
        <div class="cta-box">
          <h2>Update Post</h2>

        </div>

        <form method="POST" class="cta"  action={{route('checks.update', $check)}} >
            @csrf
            @method('PUT')
          

          <div>

            <label for="title">Title:</label>
            <input name="title" id="title" type="text" value="{{$check->title}}"  class="{ { @error('title') e-box-shadow  @enderror }}"/>

            @error('title')
            <span class="text-error">{{$message}}</span>    
            @enderror

          </div>


          <div>
            <label for="body">Body:</label>

            <textarea id="body" name="content" rows="4" cols="70" class="text-area { { @error('content') e-box-shadow  @enderror }} " value="">
            
                {{$check->content}}
           </textarea>

           @error('content')
           <span class="text-error">{{$message}}</span>    
           @enderror

          </div>


          <button class="submit-post-btn">Submit</button>

        </form>
      </div>

</x-container>

</x-layout>