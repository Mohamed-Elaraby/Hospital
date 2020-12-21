@php
    $pageType = 'Edit';
    $pageItem = 'Patient';
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
                    <h3 class="text-center"><i class="fas fa-user-injured"></i> {{ $pageType .' '. $pageItem }}</h3>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => ['admin.patient.update', $patient -> id], 'method' => 'put']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                        {!! Form::text('name', $patient -> name, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
                        {!! Form::select('status', [0 => 'In', 1 => 'Out'] , $patient -> status == 'In'?0:1 , ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('hospital_id', 'Hospital', ['class' => 'control-label']) !!}
                        {!! Form::select('hospital_id', $hospitals , array_key_exists($patient -> hospital_id,$hospitals)?$patient -> hospital_id:null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('doctor_id', 'Doctor', ['class' => 'control-label']) !!}
                        {!! Form::select('doctor_id',$doctors , array_key_exists($patient -> doctor_id,$doctors)?$patient -> doctor_id:null , ['class' => 'form-control']) !!}
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

