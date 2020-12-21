@php
    $pageType = 'Edit';
    $pageItem = 'Medical File';
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
                    <h3 class="text-center"><i class="fas fa-file-medical-alt"></i> {{ $pageType .' '. $pageItem }}</h3>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => ['admin.medicalFile.update', $medicalFile -> id], 'method' => 'put']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                        {!! Form::text('name', $medicalFile -> name, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('patient_id', 'Patient', ['class' => 'control-label']) !!}
                        {!! Form::select('patient_id', $patients , array_key_exists($medicalFile -> patient_id, $patients)?$medicalFile -> patient_id:'' , ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('doctor_id', 'Doctor', ['class' => 'control-label']) !!}
                        {!! Form::select('doctor_id', $doctors , array_key_exists($medicalFile -> doctor_id, $doctors)?$medicalFile -> doctor_id:'' , ['class' => 'form-control']) !!}
                    </div>

{{--                    <div class="form-group">--}}
{{--                        {!! Form::label('patientReport', 'Patient Report', ['class' => 'control-label']) !!}--}}
{{--                        {!! Form::textarea('patientReport', $medicalFile -> patientReport, ['class' => 'form-control read-only']) !!}--}}
{{--                    </div>--}}

                    <div class="form-group">
                        {!! Form::submit($pageType, ['class' => 'form-control btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

