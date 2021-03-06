@php
    $pageType = 'Edit';
    $pageItem = 'Hospital';
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
                    <h3 class="text-center"><i class="fas fa-hospital"></i> {{ $pageType .' '. $pageItem }}</h3>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => ['admin.hospital.update', $hospital -> id], 'method' => 'put']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                        {!! Form::text('name', $hospital -> name, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
                        {!! Form::text('address', $hospital -> address, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <p><strong>Departments</strong></p>
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-body">
                            @forelse ($departments as $department)
                                <label>
                                    {!! Form::checkbox('departments[]', $department -> id , array_key_exists($department -> id,$departmentsOfHospital)?$department -> id:'') !!}
                                    {{ $department -> name }}
                            @empty
                                <div class="text-center alert alert-danger mb-0">Please Insert an <a href="{{ route('admin.department.create') }}"><strong class="text-decoration-none">department</strong></a></div>
                                </label>
                            @endforelse
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::submit($pageType, ['class' => 'form-control btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

