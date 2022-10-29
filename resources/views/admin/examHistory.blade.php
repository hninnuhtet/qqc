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
                    <h1 class="m-0">Exam History</h1>
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
                        <th>Student Name</th>
                        <th>Question Sheet</th>
                        <th>Full Mark</th>
                        <th>Score</th>
                        <th>Submitted Time</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <tr>
                            <th>#</th>
                            <th>Student Name</th>
                            <th>Question Sheet</th>
                            <th>Full Mark</th>
                            <th>Score</th>
                            <th>Submitted Time</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </tr>
                </tfoot>
                <tbody>
                    @if($data)
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>                                    
                                <td>{{$item->student->name}}</td>
                                <td>{{$item->question_sheet->title.' - '.$item->question_sheet->description}}</td>
                                <td>{{$item->full_mark}}</td>
                                <td>{{$item->score}}</td>
                                <td>{{$item->created_at}}</td>
                                {{-- <td>
                                    <a href="{{route('admin.students.show', ['id' => $item->id])}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('admin.students.edit', ['id' => $item->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Are you sure to delete this data?')" href="{{route('admin.students.delete', ['id' => $item->id])}}" 
                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td> --}}
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>
</div>

@endsection