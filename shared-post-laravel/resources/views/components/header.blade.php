<header {{$attributes}}>
    <nav class="main-nav">
        <div class="icon"><a href="#">SharePosts</a></div>
        <ul class="main-nav-list">
          <li><a class="main-nav-link" href="/">Home</a></li> 
         
           @foreach ($links as $label => $link)
           <li><a class="main-nav-link" href="{{$link}}">{{$label}}</a></li> 
           @endforeach

         <li>
            <form action="{{route('auth.destroy')}}" method="POST">
                @csrf
                @method('DELETE') 
                <button class=" logout-btn {{ auth()->user() !== null ? '' : 'hide'}}">Logout</button>
               </form>
          </li>



                {{-- <span class="user"> <a href="#">Welcome</a></span>
                <li><a class="main-nav-link " href="#">Logout</a></li> --}}
        </ul>
    </nav>
</header>
