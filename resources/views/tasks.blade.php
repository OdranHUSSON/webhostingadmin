@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tasks</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1>Tasks</h1>
                        <ul>
                        @foreach($tasks as $task)
                            <li>{{ $task->name }}</li>
                            <li>Variables</li>
                            <li><ul>
                            @foreach($task->variables as $variable)
                                <li>{{ $variable->name }}</li>
                            @endforeach
                            </ul></li>
                            <li>Commands</li>
                            <li><ul>
                            @foreach($task->commands as $command)
                                <li>{{ $command->name }}</li>
                                <li>{{ $command->command }}</li>
                                <li><ul>
                                    @foreach($command->parameters as $parameter)
                                        <li>{{ $parameter->name }}</li>)
                                    @endforeach
                                </ul></li>
                            @endforeach
                            </ul></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
