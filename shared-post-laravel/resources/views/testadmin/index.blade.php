<x-layout>
    @foreach ($testadmins as $testadmin)

      <div><a href="{{route('testadmins.show', $testadmin)}}">{{$testadmin->name}}</a></div>
        
    @endforeach

</x-layout>