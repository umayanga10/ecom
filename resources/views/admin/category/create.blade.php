@extends('admin/layout')

@section('container')
    <h3 align='center'>Add Category</h3>
    <a href="category">
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
                            <h3 class="text-center title-2">Category</h3>
                        </div>
                        <hr>
                        <form action="{{ route('category_insert') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="control-label mb-1">Category Name</label>
                                <input id="category_name" name="category_name" type="text" class="form-control" required>
                                @if ($errors->has('category_name'))
                                        <div class="alert alert-danger">{{$errors->first('category_name')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-1">Category Code</label>
                                <input id="category_slug" name="category_slug" type="text" class="form-control" required>
                                @error('category_slug')
                                <div class="alert alert-success">
                                {{ $message }}
                                </div>
                                @enderror
                            </div>
                           
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <span id="payment-button-amount">Save</span>
                                    <span id="payment-button-sending" style="display:none;">Sending???</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection

