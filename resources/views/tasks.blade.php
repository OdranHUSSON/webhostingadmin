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
                <div class="card-body" id="tasks">
                    <div class="tab-content">
                        <div class="tab-pane active" id="taskslist">
                            <ul class="collection with-header">
                                <li v-if="errored" class="collection-item">
                                    <p>We're sorry, we're not able to retrieve tasks</p>
                                </li>
                                <li v-if="loading" class="collection-item">Loading...</li>
                                <li v-else v-for="task in tasks" class="collection-item">@{{ task.name }}</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="new">
                            @{{log}}
                            <form class="col s12" id="newtask" v-on:submit="submitTask">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="bmd-label-floating" for="name">Name</label>
                                        <input class="form-control" type="text" v-model="name" name="name" value="" pattern="[A-Za-z0-9\-\/]+">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="bmd-label-floating" for="description">Description</label>
                                        <textarea class="form-control" v-model="description"  name="description"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info pull-right">Enregistrer</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset("js/tasks.js") }}"></script>
@endsection