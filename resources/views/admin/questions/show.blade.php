@extends('admin.layout')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
        
    </div>

    <section class="content">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Question
                    <a href="{{route('admin.questions.index')}}" class="float-right btn btn-success btn-sm">View All</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td>{{$sheet->title}}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{$sheet->description}}</td>
                        </tr>
                        <tr>
                            <th>Created By</th>
                            <td>{{$sheet->created_by}}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{$sheet->created_at}}</td>
                        </tr>
                    </table> --}}
                    
                    <ul class="quiz">
                        @if($question)
                            @foreach($question as $key=>$value)                            
                            <li>
                                <h4>{{$question[$key]->question}}</h4>
                                <ul class="choices">
                                  <li>
                                    <label>
                                        <span>&#8226; {{$a[$key][0]->text}}</span>
                                    </label>
                                  </li>
                                  <li>
                                    <label>
                                        <span>&#8226; {{$b[$key][0]->text}}</span>
                                    </label>
                                  </li>
                                  <li>
                                    <label>
                                        <span>&#8226; {{$c[$key][0]->text}}</span>
                                    </label>
                                  </li>
                                  <li>
                                    <label>
                                        <span>&#8226; {{$d[$key][0]->text}}</span>
                                    </label>
                                  </li>
                                </ul>
                                <h5>Answer: {{$answer[$key][0]->answer}}</h5>
                              </li>
                              <hr>
                            @endforeach
                        @endif
                      </ul>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection