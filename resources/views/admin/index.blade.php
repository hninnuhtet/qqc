@extends('admin.layout')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('create') }}" class="btn btn-primary float-sm-right">
                        +Add
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="content">

    </section>
</div>

{{--<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021
        <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer>--}}
@endsection