@php
    $pageType = 'Create';
    $pageItem = 'Ticket';
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
                    <h3 class="text-center"><i class="fas fa-ticket-alt"></i> {{ $pageType .' '. $pageItem }}</h3>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'admin.ticket.store', 'method' => 'post']) !!}

                    <div class="form-group">
                        {!! Form::label('department_id', 'Department', ['class' => 'control-label']) !!}
                        {!! Form::select('department_id', ['' => '-- Select One --'] + $departments , null, ['class' => 'form-control']) !!}
                        {!! Form::hidden('medical_file_id', $medical_file_id) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit($pageType, ['class' => 'form-control btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
