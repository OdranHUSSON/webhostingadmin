@extends('layouts.application')

@section('content')
    <!-- Banner -->
    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <br><br>
            <h1 class="header center orange-text">Tasks</h1>
            <div class="row center">
                <h5 class="header col s12 light">Create and automate bash tasks</h5>
            </div>
            <br><br>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col s12">
                <ul class="collection with-header blue-grey">
                    <li class="collection-header">Tasks</li>
                    @foreach($tasks as $task)
                        <li class="collection-item">{{ $task->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Placeholder" id="task_name" type="text" class="validate">
                        <label for="task_name">Description</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="task_description" class="materialize-textarea"></textarea>
                        <label for="task_description">Description</label>
                    </div>
                </div>
                <button class="btn btn-large right waves-effect waves-light" type="submit">Save</button>
            </form>
        </div>
    </div>
@endsection


<!--
@foreach($tasks as $task)
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
        <li>{{ $parameter->name }}</li>
                                <li>{{ $parameter->value() }}</li>
                            @endforeach
            </ul></li>
@endforeach
        </ul></li>
        @endforeach
        -->