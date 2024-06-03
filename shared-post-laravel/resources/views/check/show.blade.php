<x-layout>

  <x-header :links="[  
     auth()->user() !== null ? 'Welcome' .' '. auth()->user()->name   : 'Login' =>  auth()->user() !== null ? '#' : route('login') 
  
  
  ]" /> 

  <x-container>
    
   
      <div class="post-container">
          <h3 class="post-added hide">Post added</h3>
          <span class="back-btn"><a href="{{route('checks.index')}}">⏪ Back</a></span>
  
          <div class="post-body">
            <h3 class="post-author">{{$check->user->name}} Post</h3>
  
            <p class="post-content">{{$check->content}}</p>
  
          </div>
  
  
          <div class="post-header {{$check->user_id ==  auth()->user()->id ? '' : "hide"}}"><button class="update-post-btn"><a href="{{route('checks.edit', $check)}}">Update</a></button>
            

             <form action="{{route('checks.destroy', $check)}}" method="POST" >
                @csrf
                @method('DELETE')

              <button class="delete-post-btn">Delete</button> 
             
            </form>


          
          
          
          
          </div>
  
  
        </div>



 

  </x-container>


</x-layout>