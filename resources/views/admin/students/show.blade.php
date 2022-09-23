@extends('admin.layout')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
        
    </div>

    <section class="content">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Question
                    <a href="{{route('admin.students.index')}}" class="float-right btn btn-success btn-sm">View All</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Full Name</th>
                            <td>{{$data->name}}</td>
                        </tr>                   
                        <tr>
                            <th>Email</th>
                            <td>{{$data->email}}</td>
                        </tr>
                        <tr>
                            <th>Mark</th>
                            <td>Mark after exam</td>
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
  

@endsection