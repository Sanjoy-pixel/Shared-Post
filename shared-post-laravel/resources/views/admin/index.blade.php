<x-layout>
   
    <x-header :links="[  
        auth()->user() !== null ? 'Welcome' .' '. auth()->user()->name   : 'Login' =>  auth()->user() !== null ? '#' : route('login') 
     
     
     ]" />


    <x-container>

            

        <div class="tbl-container">
           
            <div class="tbl-header">
              <div> @if (session()->has('success'))
                <p class="post-added">{{session('success')}}</p>
                @endif
            
            </div> <a href={{route('admin.create')}}><button class="openModal">Add User</button></a> 
            </div>

        <table id="data-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Update</th>
                    <th>Delete</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($admins as $admin)
                <tr>
                   
                   
                    <td> {{$admin->name}}</td>
                    <td>{{$admin->email}}</td>
                    <td>{{$admin->userType}}</td>
                    <td><a href="{{route('admin.edit', $admin)}}"><button class="openModal">Edit</button></a></td>
                    <td>  
                    <form action="{{route('admin.destroy', $admin)}}" method="POST" >
                     @csrf
                     @method('DELETE')
        
                    <button class="delete-post-btn">Delete</button> 
                     
                    </form>
                    </td>
                    
             
                </tr>

                @endforeach

            </tbody>
        </table>

    </div>

    </x-container>
</x-layout>