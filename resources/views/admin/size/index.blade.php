@extends('admin/layout')

@section('container')
    <h3 align='center'>Size</h3>
    
    <a href="add_size">
        <button type="button" class="btn btn-success">Add Size</button>
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
                                    <th>Size</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                            @foreach ($size as $si)
                                <tr>
                                    <td>{{$si->id}}</td>
                                    <td>{{$si->size}}</td>
                                    <td>@if ($si->status == 1)
                                            {{ 'Active' }}
                                        @elseif($si->status == 0)
                                            {{ 'DeActive' }}
                                        @endif
                                </td>
                                    <td>
                                        <a href="{{url('admin/size/delete/')}}/{{$si->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                                        <a href="{{url('admin/size/edit/')}}/{{$si->id}}"><button type="button" class="btn btn-success">edit</button></a>
                                        @if ($si->status == 1)
                                        <a href="{{url('admin/size/status/0')}}/{{$si->id}}"><button type="button" class="btn btn-success">Active</button></a>
                                        @elseif($si->status==0)
                                        <a href="{{url('admin/size/status/1')}}/{{$si->id}}"><button type="button" class="btn btn-warning">Deactive</button></a>
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

