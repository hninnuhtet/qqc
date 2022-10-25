@extends('admin.layout')
@section('content')

@if (Session::has('success'))
<div class="alert alert-success text-center">
    <p>{{ Session::get('success') }}</p>
</div>
@endif

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Students</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('admin.students.create') }}" class="btn btn-primary float-sm-right">
                        +Add
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>AccessCode</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>AccessCode</th>
                            <th>Action</th>
                        </tr>
                    </tr>
                </tfoot>
                <tbody>
                    @if($data)
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>                                    
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->password}}</td>
                                <td>
                                    <a href="{{route('admin.students.show', ['id' => $item->id])}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('admin.students.edit', ['id' => $item->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Are you sure to delete this data?')" href="{{route('admin.students.delete', ['id' => $item->id])}}" 
                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>
</div>

@endsection