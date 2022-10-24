@extends('admin/layout')

@section('container')
    <h3 align='center'>Add Cupon</h3>
    <a href="cupon">
        <button type="button" class="btn btn-success">Back</button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Cupon</h3>
                        </div>
                        <hr>
                        <form action="{{ route('cupon.insert') }}" method="post" novalidate="novalidate">
                            @csrf
                            <div class="form-group">
                                <label class="control-label mb-1">Title</label>
                                <input id="title" name="title" type="text" class="form-control">
                                @if ($errors->has('title'))
                                        <div class="alert alert-danger">{{$errors->first('title')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-1">Code</label>
                                <input id="code" name="code" type="text" class="form-control">
                                @if ($errors->has('code'))
                                    <div class="alert alert-danger">{{$errors->first('code')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-1">Value</label>
                                <input id="value" name="value" type="text" class="form-control">
                                @if ($errors->has('value'))
                                        <div class="alert alert-danger">{{$errors->first('value')}}</div>
                                @endif
                            </div>
                           
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <span id="payment-button-amount">Save</span>
                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection

