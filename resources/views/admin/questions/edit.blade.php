@extends('admin.layout')
@section('content')


<div class="content-wrapper">
    <div class="content-header">
        
    </div>

    <section class="content">
        <div class="container-fluid">
            <form action="{{route('admin.questions.update', ['id' => $sheet->id ])}}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-header">
                            Question Info
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div> <br>
                            @endif
                            @if(Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{session('success')}}
                                </div> <br>
                            @endif
                            {{-- <div class="form-group">
                                <label>Question Sheet Code</label>
                                <input type="text" disabled readonly name="code" value="QW123yte" class="form-control">
                            </div> --}}
                            <div class="form-group">
                                <label>Question Sheet Title</label>
                                <input type="text" class="form-control" name="qs_title" value="{{$sheet->title}}">
                                <small>e.g. Physics</small>
                            </div>
                            <div class="form-group">
                                <label>Question sheet description</label>
                                <input type="text" class="form-control" name="qs_description" value="{{$sheet->description}}">
                                <small>e.g. 2nd Semester Test</small>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="qs_status" id="" class="form-control" >
                                    <option value="1">ON</option>
                                    <option value="0">OFF</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Created By</label>
                                <input type="text" class="form-control" name="qs_created_by" value="{{$sheet->created_by}}">
                                <small>e.g. Tr.Hnin</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{route('admin.questions.index')}}" class="btn btn-danger m-3">Cancel</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Questions</h3>
                            <div class="card-tools">
                                <!-- Buttons, labels, and many other things can be placed here! -->
                                    <!-- Here is a label for example -->
                                    <a type="button" class="btn btn-sm btn-primary" id="add_btn"><i class="fa fa-plus" style="font-size: 10px;"></i></a>
                            </div>
                        </div>
                        <div class="card-body question-body">
                            @foreach ($question as $key=>$value)
                            <div id="question">
                                <label>Question</label>
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <a type="button" class="delete_btn btn btn-sm btn-danger float-right" 
                                data-id="{{$question[$key]->id}}">
                                <i class="fa fa-minus" style="font-size: 10px;"></i></a>

                                <textarea class="form-control" name="questions[]" cols="50" rows="2">{{$question[$key]->question}}</textarea>
                                <input type="hidden" name="q_id[]" value="{{$question[$key]->id}}">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label>Choice A</label>
                                                <input type="text" class="form-control" name="a_choice[]" value="{{$a[$key][0]->text}}">
                                            </td>
                                            <td>
                                                <label>Choice B</label>
                                                <input type="text" class="form-control" name="b_choice[]" value="{{$b[$key][0]->text}}">
                                            </td>
                                            <td>
                                                <label>Choice C</label>
                                                <input type="text" class="form-control" name="c_choice[]" value="{{$c[$key][0]->text}}">
                                            </td>
                                            <td>
                                                <label>Choice D</label>
                                                <input type="text" class="form-control" name="d_choice[]" value="{{$d[$key][0]->text}}">
                                            </td>
                                            <td>
                                                <label>Answer</label>
                                                <select name="answer[]" class="form-control">
                                                    <option value="A" @if($answer[$key][0]->answer == 'A') selected @endif>A</option>
                                                    <option value="B" @if($answer[$key][0]->answer == 'B') selected @endif>B</option>
                                                    <option value="C" @if($answer[$key][0]->answer == 'C') selected @endif>C</option>
                                                    <option value="D" @if($answer[$key][0]->answer == 'D') selected @endif>D</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            </form>  
        </div>
    </section>
</div>
  
<script>
    $(document).ready(function () {
        $('#add_btn').on('click', function () {
           var html = `
           <div id="question">
            <label>Question</label> <a type="button" class="btn btn-sm btn-danger float-right" id="remove_btn"><i class="fa fa-minus" style="font-size: 10px;"></i></a>
                <textarea class="form-control" name="questions[]" cols="50" rows="2"></textarea>
                <input type="hidden" name="q_id[]">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <label>Choice A</label>
                                <input type="text" class="form-control" name="a_choice[]">
                            </td>
                            <td>
                                <label>Choice B</label>
                                <input type="text" class="form-control" name="b_choice[]">
                            </td>
                            <td>
                                <label>Choice C</label>
                                <input type="text" class="form-control" name="c_choice[]">
                            </td>
                            <td>
                                <label>Choice D</label>
                                <input type="text" class="form-control" name="d_choice[]">
                            </td>
                            <td>
                                <label>Answer</label>
                                <select name="answer[]" class="form-control">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>
        `
        $('.question-body').append(html)
        });
    });
    
    $(document).on('click', '#remove_btn', function () {
        $(this).closest('#question').remove()
    });

    $(document).on('click', '.delete_btn', function () {
        $(this).closest('#question').remove()
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
   
    $.ajax(
    {
        url: id+"/deletequestion",
        type: 'DELETE',              
        data: {"id": id,"_token": token,},
        success: function (response){
            console.log(response);
        }
    });
   
    });

</script>
@endsection