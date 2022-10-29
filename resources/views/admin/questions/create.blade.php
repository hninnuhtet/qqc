@extends('admin.layout')
@section('content')


<div class="content-wrapper">
    <div class="content-header">
        
    </div>

    <section class="content">
        <div class="container-fluid">
            <form action="{{route('admin.questions.store')}}" method="post">
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
                                <input type="text" class="form-control" name="qs_title">
                                <small>e.g. Physics</small>
                            </div>
                            <div class="form-group">
                                <label>Question sheet description</label>
                                <input type="text" class="form-control" name="qs_description">
                                <small>e.g. 2nd Semester Test</small>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="qs_status" id="" class="form-control">
                                    <option value="1">ON</option>
                                    <option value="0">OFF</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Allowed Time (Minute)</label>
                                <input type="digit" class="form-control" style="display: inline; width: 70px" name="qs_min" placeholder="Min" Required>
                                <input type="digit" class="form-control" style="display: inline; width: 70px" name="qs_sec" placeholder="Sec" Required>
                            </div>
                            <div class="form-group">
                                <label>Created By</label>
                                <input type="text" class="form-control" name="qs_created_by">
                                <small>e.g. Tr.Hnin</small>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            <a href="{{route('admin.questions.index')}}" class="btn btn-danger m-3 btn-sm">Cancel</a>

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
                            <div id="question">
                                <label>Question</label>
                                <textarea class="form-control" name="questions[]" cols="50" rows="2"></textarea>
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
                                <hr>
                            </div>
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
            <hr>
        </div>
        `
        $('.question-body').append(html)
        });
    });
    
    $(document).on('click', '#remove_btn', function () {
        $(this).closest('#question').remove()
    });
</script>
@endsection