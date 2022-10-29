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
                    <h1 class="m-0">Questions</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('admin.questions.create') }}" class="btn btn-primary float-sm-right">
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
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Action</th>
                        <th>Status</th>
                        <th>Question Link</th>
                        <th>Result</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Action</th>
                        <th>Status</th>
                        <th>Question Link</th>
                        <th>Result</th>
                    </tr>
                </tfoot>
                <tbody>
                    @if($data)
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>                                    
                                <td>{{$item->title}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->created_by}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>
                                    <a href="{{route('admin.questions.show', ['id' => $item->id])}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('admin.questions.edit', ['id' => $item->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Are you sure to delete this data?')" href="{{route('admin.questions.delete', ['id' => $item->id])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                                <td>
                                    <input data-id="{{$item->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $item->status ? 'checked' : '' }}>
                                </td>                                
                                <td>
                                    <input type="text" id="questionSheetLink{{$item->id}}" hidden value="{{url('http://127.0.0.1:8000/question/'.$item->id)}}" >
                                    <button class="btn btn-info btn-sm" onclick="copyToClipboard('{{$item->id}}')">Copy</button>
                                </td>
                                <td>
                                    <a href="{{route('admin.questions.result', ['id' => $item->id])}}" class="btn btn-primary btn-sm">View Result</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>
</div>

<script>
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0; 
          var qs_id = $(this).data('id'); 
          $.ajax({
              type: "GET",
              dataType: "json",
              url: 'questions/changeStatus',
              data: {'status': status, 'qs_id': qs_id},
              success: function(data){
                console.log(data.success)
              }
          });
      })
    })

        // set options for toastr
        toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                
    function copyToClipboard(id) {
        let linkText = document.getElementById('questionSheetLink'+id)
    
        linkText.select();
        linkText.setSelectionRange(0, 99999);
    
        navigator.clipboard.writeText(linkText.value).then(function () {
            // alert('clipboard successfully set')
            toastr.info('Copied the question link!') // show toastr as info
        })
    }
    
</script>
@endsection