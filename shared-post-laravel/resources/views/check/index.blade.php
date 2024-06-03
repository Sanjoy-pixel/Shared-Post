<x-layout>

  <x-header :links="[  
     auth()->user() !== null ? 'Welcome' .' '. auth()->user()->name   : 'Login' =>  auth()->user() !== null ? '#' : route('login') 
  
  
  ]" /> 

  <x-container>
    
   
     <div class="post-container">

      @if (session()->has('success'))
      <p class="post-added">{{session('success')}}</p>
      @endif
         

     
        <div class="post-header">
          <h2>Posts</h2> <button class="add-post-btn"><a href="{{route('checks.create')}}">Add Post</a></button>
        </div>

        


          @foreach ($checks as $check )
              
          

          <div class="post-body">

            <h3 class="post-author">{{$check->user->name}} Post</h3>
            <p class="post-title">{{$check->title}}</p>
            <p class="post-info">Written by {{$check->user->name}}  on {{$check->created_at}} </p>
            <p class="post-content">{{$check->content}}</p>
            <a href="{{route('checks.show', $check)}}"><button class="more-info-btn">More info</button></a>
          </div>

          @endforeach



      </div>





 

  </x-container>


</x-layout>