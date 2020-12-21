@php
    $pageType = 'Edit';
    $pageItem = 'Ticket';
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
                    <h3 class="text-center"><i class="fas fa-ticket-alt"></i> {{ $pageType .' '. $pageItem }}</h3>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => ['admin.ticket.update', $ticket -> id], 'method' => 'put']) !!}
                    <div class="form-group">
                        {!! Form::label('department_id', 'Department', ['class' => 'control-label']) !!}
                        {!! Form::select('department_id', $departments , array_key_exists($ticket -> department_id, $departments)?$ticket -> department_id:'' , ['class' => 'form-control']) !!}
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

