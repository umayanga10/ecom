@extends('admin/layout')

@section('container')
    <h3 align='center'>Add Size</h3>
    <a href="size">
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
                            <h3 class="text-center title-2">Size</h3>
                        </div>
                        <hr>
                        <form action="{{ route('size.insert') }}" method="post" novalidate="novalidate">
                            @csrf
                            <div class="form-group">
                                <label class="control-label mb-1">Add Size</label>
                                <input id="size" name="size" type="text" class="form-control">
                                @if ($errors->has('size'))
                                        <div class="alert alert-danger">{{$errors->first('size')}}</div>
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

