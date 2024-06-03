<x-layout>

    <x-header :links="[  
       auth()->user() !== null ? 'Welcome' .' '. auth()->user()->name   : 'Login' =>  auth()->user() !== null ? '#' : route('login') 
    
    
    ]" /> 
  
    <x-container>
      
     
        <span class="back-btn"><a href="{{route('checks.index')}}">⏪ Back</a></span>
        <div class="add-post-form">
          <div class="cta-box">
            <h2>Add Post</h2>
            <p>Create a post with this form</p>
          </div>
  
          <form action="{{route('checks.store')}}" method="post"  class="cta">
           
            @csrf

            <div>
  
              <label for="title">Title:</label>
              <input name="title" id="title" type="text"  class="{ { @error('title') e-box-shadow  @enderror }}" value="{{old('title')}}" />
              @error('title')
              <span class="text-error">{{$message}}</span>    
              @enderror

  
            </div>
  
  
            <div>
              <label for="body">Body:</label>
  
              <textarea id="body" name="content" rows="4" cols="70" class="text-area { { @error('content') e-box-shadow  @enderror }}" value="{{old('content')}}">
  
             </textarea>

             @error('content')
             <span class="text-error">{{$message}}</span>    
             @enderror

  
            </div>
  
            <span class="text-error"></span>
  
            <input name="author" type="hidden" value="{{ auth()->user() !== null ?  auth()->user()->name : ''}}" />
            <input name="user_id" type="hidden" value="{{ auth()->user() !== null ?  auth()->user()->id : ''}}" />
  
            <button class="submit-post-btn">Submit</button>
  
          </form>
        </div>
  
  
   
  
    </x-container>
  
  
  </x-layout>