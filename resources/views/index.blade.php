@extends('template')
@section('title','read')
@section('content')
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            
           <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-5 col-xs-8">
                <div class="header-element">
                    <h3>Clear /
                        <small>data tables / read</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-4 col-lg-offset-2 col-md-6 col-sm-7 col-xs-4">
                <form action="/covid/search" method="post">
                    @csrf
                <div class="header-object">
                    <span class="option-search pull-right hidden-xs">
                        <span class="search-wrapper">
                            <input type="text" name="search" placeholder="Search here"><i style="cursor:pointer" onclick="document.getElementById('searchbtn').click()" class="ti-search"></i>
                        </span>
                    </span>
                </div>
                <button type="submit" style="display: none" id="searchbtn"></button>
                </form>
            </div>
        </div>
        </section>
        <!-- Main content -->
        <section class="content">
           
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel ">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="ti-list"></i> Data Table with Action buttons
                            </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw ti-angle-up clickable"></i>
                                <i class="fa fa-fw ti-close removepanel clickable"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="mytable" class="table table-bordred table-striped">
                                    <thead>
                                        <tr class="col-lg-10 ">
                                            <th>Country</th>
                                            <th>info</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($covids as $covid)
                                        <tr>
                                            <td class="col-lg-10 ">{{$covid->country}}</td>
                                            <td>
                                                <a href="/covid/{{$covid->id}}">
                                                    <button class="btn btn-primary btn-xs" data-placement="top"><span
                                                            class="glyphicon glyphicon-info-sign"></span></button>
                                                </a>
                                            </td>
                                            <td>
                                            <a href="/covid/{{$covid->id}}/edit">
                                                    <button class="btn btn-primary btn-xs" data-placement="top"><span
                                                            class="fa fa-fw ti-pencil"></span></button>
                                                <a>
                                            </td>
                                            <td>
                                                <p>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal"
                                                        onclick="dataid({{$covid->id}})"
                                                        data-target="#delete" data-placement="top"><span
                                                            class="fa fa-fw ti-trash"></span></button>
                                                </p>
                                            </td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
          
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true"
                style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title custom_align" id="Heading5">Delete this entry</h4>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-info">
                                <span class="glyphicon glyphicon-info-sign"></span>&nbsp; Are you sure you want to
                                delete this record ?
                            </div>
                        </div>
                        <div class="modal-footer ">
                            <form id="formdel" method="post">
                              @method('delete')
                              @csrf
                            <button type="submit" class="btn btn-danger">
                                <span class="glyphicon glyphicon-ok-sign"></span> Yes
                            </button>
                            <button type="button" class="btn btn-success" data-dismiss="modal">
                                <span class="glyphicon glyphicon-remove"></span> No
                            </button>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <div class="background-overlay"></div>
        </section>
        <!-- /.content -->
    </aside>
    <script>
      
        function dataid(id) { 
            return document.getElementById('formdel').action = "/covid/"+id
         }
    </script>
   <script type="text/javascript" src="{{asset('clear/vendors/datatables/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('clear/js/custom_js/simple-table.js')}}"></script>
@endsection