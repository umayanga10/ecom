@extends('admin/layout')

@section('container')
    <h3 align='center'>Add Product</h3>
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
                            <h3 class="text-center title-2">Product</h3>
                        </div>
                        <hr>
                        <form action="{{url('admin/add_product')}}" method="post" onsubmit="validateForm()" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label mb-1">Name</label>
                                <input id="name" name="name" type="text" class="form-control">
                                @error('name')
                                <div class="alert alert-success">
                                {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-1">Slug</label>
                                <input id="slug" name="slug" type="text" class="form-control">
                                @error('slug')
                                <div class="alert alert-success">
                                {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-1">Image</label>
                                <input type="file" name="image" type="text" class="form-control">
                                @if ($errors->has('image'))
                                        <div class="alert alert-danger">{{$errors->first('image')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-1">Category</label>
                               <select class="form-control" name="cat_id">
                                    @foreach ($category as $item)
                                        <option value="{{$item->id}}">{{$item->category_name}}</option>
                                    @endforeach
                               </select>
                                @if ($errors->has('category'))
                                        <div class="alert alert-danger">{{$errors->first('category')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-1">Brand</label>
                                <input id="brand" name="brand" type="text" class="form-control">
                                @if ($errors->has('brand'))
                                        <div class="alert alert-danger">{{$errors->first('brand')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-1">Model</label>
                                <input id="model" name="model" type="text" class="form-control">
                                @if ($errors->has('model'))
                                        <div class="alert alert-danger">{{$errors->first('model')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-1">Short Desc</label>
                                <textarea name="short_desc" class="form-control" rows="2" cols="20"></textarea>
                                @if ($errors->has('short_desc'))
                                        <div class="alert alert-danger">{{$errors->first('short_desc')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-1">Desc</label>
                                <textarea name="desc" class="form-control" rows="3" cols="20"></textarea>
                                @if ($errors->has('desc'))
                                        <div class="alert alert-danger">{{$errors->first('desc')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-1">KeyWord</label>
                                <textarea name="key" class="form-control" rows="2" cols="20"></textarea>
                                @if ($errors->has('key'))
                                        <div class="alert alert-danger">{{$errors->first('key')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-1">Technical Specification</label>
                                <textarea name="tech" class="form-control" rows="2" cols="20"></textarea>
                                @if ($errors->has('tech'))
                                        <div class="alert alert-danger">{{$errors->first('tech')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-1">users</label>
                                <textarea name="users" class="form-control" rows="2" cols="20"></textarea>
                                @if ($errors->has('users'))
                                        <div class="alert alert-danger">{{$errors->first('users')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-1">Warranty</label>
                                <textarea name="warranty" class="form-control" rows="2" cols="20"></textarea>
                                @if ($errors->has('warranty'))
                                        <div class="alert alert-danger">{{$errors->first('warranty')}}</div>
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

<script>
    function validateForm() {
      let x = document.forms["myForm"]["fname"].value;
      if (x == "") {
        alert("Name must be filled out");
        return false;
      }
    }
    </script>

