<h1> julian is een furry</h1>


<div>


    {{-- @if(count($tasks) ) --}}
    @forelse($tasks as $task )

<a href="{{route('task.show', ['id' => $task->id])}}">{{$task->title}}</a>
<br>
    @empty
    <p> no tasks</p>
    @endforelse

    {{-- @endif --}}
</div>
