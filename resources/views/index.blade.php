@extends('layouts.app')

@section('title', 'My Tasks:')

@section('content')
    <div class="index-box">
        <nav class="mb-4">
            <a href="{{ route('tasks.create') }}" 
                class="btn">Add Task</a>
        </nav>
        
        @forelse($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                    class=" {{ $task->completed ? 'line-through text-gray-400 dark:text-zinc-700' : 'dark:text-zinc-300' }}">{{ $task->completed ? '✓' : '▢'}} {{ $task->title }}
                </a>
            </div>
        @empty
           <div>There are no tasks</div>
        @endforelse
    
        @if ($tasks->count())
            <nav class="mt-4">
                {{ $tasks->links() }}
            </nav>
        @endif
    </div>
    
    
@endsection