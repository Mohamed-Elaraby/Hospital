@php
    $pageType = 'Edit';
    $pageItem = 'User';
    $profile_picture_path = $user -> image_name == 'default.png' ? 'storage' .DS. 'default.png' : $user -> profile_picture_path;
@endphp
@extends('admin.layouts.app')

@section('title', $pageType.' '.$pageItem)

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-primary mt-5">
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
                    <h3 class="text-center"><i class="fas fa-user"></i> {{ $pageType .' '. $pageItem }}</h3>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => ['admin.user.update', $user -> id], 'method' => 'put', 'files'=> true]) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                        {!! Form::text('name', $user -> name, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                        {!! Form::email('email', $user -> email, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('role_id', 'Role', ['class' => 'control-label']) !!}
                        {!! Form::select('role_id', [''=> '-- Select One --']+$roles , array_key_exists($user -> role_id, $roles)?$user -> role_id:'' , ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('profile_picture', 'Profile Picture', ['class' => 'control-label']) !!}
                        {!! Form::file('profile_picture', ['class' => 'form-control', 'id' => 'myImg']) !!}
                    </div>
                    <div class="form-group">
                        <img class="img-thumbnail" id="imagePreview" src="{{ asset($profile_picture_path) }}" height="100px" width="100px">
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
                                                {!! Form::checkbox('permissions[]', $permission.'_users') !!}
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
                        {!! Form::submit($pageType, ['class' => 'form-control btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    @include('admin.includes.imagePreviewJQueryCode')
@endpush
