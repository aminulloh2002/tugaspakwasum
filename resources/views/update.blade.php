@extends('template')
@section('title','update')
@section('content')
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
            Form Elements
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index-2.html">
                    <i class="fa fa-fw ti-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#">Forms</a>
            </li>
            <li class="active">
                Form Elements
            </li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-fw ti-move"></i> General Elements
                        </h3>
                        <span class="pull-right">
                            <i class="fa fa-fw ti-angle-up clickable"></i>
                            <i class="fa fa-fw ti-close removepanel clickable"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" action="/covid/{{$covid->id}}">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="input-text" class="col-sm-2 control-label">Country</label>
                                <div class="col-sm-10">
                                    <input type="text" name="country" class="form-control" id="input-text"
                                        value="{{$covid->country}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-text" class="col-sm-2 control-label">Confirmed</label>
                                <div class="col-sm-10">
                                    <input type="number" name="confirmed" class="form-control" id="input-text"
                                        value="{{$covid->confirmed}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-number" class="col-sm-2 control-label">Recovered</label>
                                <div class="col-sm-10">
                                    <input type="number" name="recovered" class="form-control" id="input-text"
                                        value="{{$covid->recovered}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-number" class="col-sm-2 control-label">Death</label>
                                <div class="col-sm-10">
                                    <input type="number" name="death" class="form-control" id="input-text"
                                        value="{{$covid->death}}">
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="background-overlay"></div>
    </section>
    <!-- /.content -->
</aside>
<!-- /.right-side -->
@endsection