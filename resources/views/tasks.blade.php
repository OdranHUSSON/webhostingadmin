@extends('layouts.admin')

@section('page-title')
    Dashboard
@endsection

@section('head')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-tabs card-header-info">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title">Tasks</span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#taskslist" data-toggle="tab">
                                        <i class="material-icons">list</i> All tasks
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#new" data-toggle="tab">
                                        <i class="material-icons">add</i> New task
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="taskslist">
                            <ul class="collection with-header">
                                <li class="collection-header">Tasks</li>
                                <li v-if="errored" class="collection-item">
                                    <p>We're sorry, we're not able to retrieve tasks</p>
                                </li>
                                <li v-if="loading" class="collection-item">Loading...</li>
                                <li v-else v-for="task in tasks" class="collection-item">@{{ task.name }}</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="new">
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
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset("js/tasks.js") }}"></script>
@endsection