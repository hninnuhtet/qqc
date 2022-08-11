@extends('admin.layout')
@section('content')


<div class="content-wrapper">
    <div class="content-header">
        
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="card col-sm-6">
                    <div class="card-header">
                        Add Question
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div> <br>
                        @endif
                        <form action="#" method="post">
                            <div class="form-group">
                                @csrf
                                <label>Show Name :</label>
                                <input type="text" class="form-control" name="show_name">
                            </div>
                            <div class="form-group">
                                <label>Series :</label>
                                <input type="text" class="form-control" name="series">
                            </div>
                            <div class="form-group">
                                <label>Show Lead Actor/Actress :</label>
                                <input type="text" class="form-control" name="lead_actor">
                            </div>
                            <button type="submit" class="btn btn-primary">Create Show</button>
                            <a href="{{ route('index') }}" class="btn btn-danger m-3">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
    
@endsection