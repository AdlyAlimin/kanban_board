@extends('layouts.main')

@section('content')
    <div>
        <main class="h-full flex flex-col overflow-hidden">
            <!-- Our Kanban Vue component will go here -->
            <kanban-board :initial-data="{{ $data }}"></kanban-board>
        </main>
    </div>
@endsection