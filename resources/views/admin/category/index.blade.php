@extends('admin/layout')

@section('container')
    <h3 align='center'>Manage Category</h3>
    
    <a href="manage_category">
        <button type="button" class="btn btn-success">Add Catgeory</button>
    </a>
    <div class="row m-t-30">
        @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
        <div class="col-md-12">
                <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>Category ID</th>
                                    <th>Category Name</th>
                                    <th>Category Code</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                            @foreach ($category as $ct)
                                <tr>
                                    <td>{{$ct->id}}</td>
                                    <td>{{$ct->category_name}}</td>
                                    <td>{{$ct->category_slug}}</td>
                                    <td>
                                        <a href="{{url('admin/category/delete/')}}/{{$ct->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                                        <a href="{{url('admin/category/edit/')}}/{{$ct->id}}"><button type="button" class="btn btn-success">edit</button></a>
                                    @if ($ct->status == 1)
                                    <a href="{{url('admin/category/status/0')}}/{{$ct->id}}"><button type="button" class="btn btn-success">Active</button></a>
                                    @elseif($ct->status==0)
                                    <a href="{{url('admin/category/status/1')}}/{{$ct->id}}"><button type="button" class="btn btn-warning">Deactive</button></a>
                                    @endif
                                    </td>
                                </tr>
                            @endforeach                         
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
@endsection

