@extends('admin/layout')

@section('container')
    <h3 align='center'>Cupon</h3>
    
    <a href="add_cupon">
        <button type="button" class="btn btn-success">Add Cupon</button>
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
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Code</th>
                                    <th>Value</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                            @foreach ($cupon as $ct)
                                <tr>
                                    <td>{{$ct->id}}</td>
                                    <td>{{$ct->title}}</td>
                                    <td>{{$ct->code}}</td>
                                    <td>{{$ct->value}}</td>
                                    <td>
                                        <a href="{{url('admin/cupon/delete/')}}/{{$ct->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                                        <a href="{{url('admin/cupon/edit/')}}/{{$ct->id}}"><button type="button" class="btn btn-success">edit</button></a>
                                    </td>
                                </tr>
                            @endforeach                         
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
@endsection

