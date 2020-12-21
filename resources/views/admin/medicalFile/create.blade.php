@php
    $pageType = 'Create';
    $pageItem = 'Medical File';
@endphp
@extends('admin.layouts.app')

@section('title', $pageType.' '.$pageItem)

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-success mt-5">
                <div class="error_messages">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="card-header">
                    <h3 class="text-center"><i class="fas fa-file-medical-alt"></i> {{ $pageType .' '. $pageItem }}</h3>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'admin.medicalFile.store', 'method' => 'post']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    {{--<div class="form-group">
                        {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    </div>--}}<!-- Email Field -->
                    {{--<div class="form-group">
                        {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>--}}<!-- Password Field -->
                    {{--<div class="form-group">
                        <p><strong>Permissions</strong></p>
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-four-user-tab" data-toggle="pill" href="#custom-tabs-four-user" role="tab" aria-controls="custom-tabs-four-user" aria-selected="true">User</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-image-tab" data-toggle="pill" href="#custom-tabs-four-image" role="tab" aria-controls="custom-tabs-four-image" aria-selected="false">Image</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Messages</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Settings</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-four-user" role="tabpanel" aria-labelledby="custom-tabs-four-user-tab">
                                        @php
                                            $permissions = ['read', 'create', 'update', 'delete'];
                                        @endphp
                                        @foreach ($permissions as $permission)
                                            <label>
                                                {!! Form::checkbox('permissions[]', $permission.'_doctors') !!}
                                                {{ ucfirst($permission) }}
                                            </label>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-four-image" role="tabpanel" aria-labelledby="custom-tabs-four-image-tab">
                                        @php
                                            $permissions = ['read', 'create', 'update', 'delete'];
                                        @endphp
                                        @foreach ($permissions as $permission)
                                            <label>
                                                {!! Form::checkbox('permissions[]', $permission.'_images') !!}
                                                {{ ucfirst($permission) }}
                                            </label>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                                        TEXT3
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                                        TEXT4
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>--}}<!-- Permissions Field -->
                    <div class="form-group">
                        {!! Form::submit($pageType, ['class' => 'form-control btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
