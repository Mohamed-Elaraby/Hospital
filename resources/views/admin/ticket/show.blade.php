@php
    $pageType = 'Show';
    $pageItem = 'Case Report';
@endphp
@extends('admin.layouts.app')

@section('title', $pageType.' '.$pageItem)

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-primary mt-5">
                <div class="card-header">
                    <a class="float-left" href="{{ url()->previous() }}"><i class="fa fa-arrow-circle-left"></i> </a>
                    <h3 class="text-center"><i class="fas fa-file-medical-alt"></i> {{ $pageType .' '. $pageItem }}</h3>
                </div>
                <div class="card-body">
                    {{ $ticket -> case_report }}
                </div>
            </div>
        </div>
    </div>
@endsection

