@extends('admin.layouts.app')

@section('title', 'Departments')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="card-title"> <i class="fa fa-list"></i> All Departments List</h3>
                    @if (Auth::user()->hasPermission('delete-department'))
                        <a href="{{ route('admin.department.create') }}" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> {{ __('trans.create') }}</a>
                    @else
                        <button class="btn btn-success btn-sm float-right disabled"> <i class="fas fa-plus"></i> {{ __('trans.create') }}</button>
                    @endif
                </div>
            @if(isset($departments) && $departments -> count() > 0)
                <div class="error_messages text-center">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('delete'))
                        <div class="alert alert-danger">
                            {{ session('delete') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="departmentsTable">

                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($departments as $index => $department)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $department -> name}}</td>
                                <td>
                                    @if(Auth::user()->hasPermission('update-department'))
                                        <a href="{{ route('admin.department.edit', $department -> id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                    @else
                                        <button class="btn btn-sm btn-primary disabled"> <i class="fas fa-edit"></i></button>
                                    @endif

                                    @if (Auth::user()->hasPermission('delete-department'))
                                        {!! Form::open(['route' => ['admin.department.destroy' , $department -> id], 'method' => 'DELETE', 'style' => 'display:inline']) !!}
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Delete This?')"> <i class="fas fa-trash"></i></button>
                                        {!! Form::close() !!}
                                    @else
                                        <button class="btn btn-sm btn-danger disabled"> <i class="fas fa-trash"></i></button>
                                    @endif

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center alert alert-danger mb-0">No Data Available To view</div>
            @endif
            </div>

        </div>
    </div>
@endsection
@push('links')
    <!-- Datatable Bootstrap -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
{{--    <link rel="stylesheet" href="{{ asset('assets/dist/css/datatableButtonsCssFiles/jquery.dataTables.min.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('assets/dist/css/datatableButtonsCssFiles/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/datatableButtonsCssFiles/bootstrap.css') }}">

@endpush

@push('scripts')
    <!-- Datatable Bootstrap -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

    <script>
        <!-- Datatable Bootstrap -->
        $('#departmentsTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            dom: 'lBfrtip',
            buttons: [
                // 'copy', 'csv', 'excel', 'pdf', 'print'
                {
                    extend: 'copy',
                    text: 'Copy',
                },
                {
                    extend: 'excel',
                    text: 'Excel',
                },{
                    extend: 'pdf',
                    text: 'PDF',
                },
                {
                    extend: 'print',
                    text: 'Print',
                },
            ]
        });
    </script>
@endpush
