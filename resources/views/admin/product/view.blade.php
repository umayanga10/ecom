@extends('admin/layout')

@section('container')
    <h3 align='center'>Product View</h3>
    
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group row">
                        <label class="col-sm-4 col-form-label">CATEGORY</label>
                            <div class="col-sm-8">
                                <select style="height: 33px;" name="pro_id" id="pro_id" class="form-control">
                                    <option >SELECT PRODUCT</option>
                                    @foreach ($product as $pro)
                                    <option value="{{$pro->id}}">{{$pro->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>    
                    </div>

                    <div class="col-md-4">
                        <div class="form-group row">
                        <label class="col-sm-4 col-form-label">CATEGORY</label>
                            <div class="col-sm-8">
                                <select style="height: 33px;" name="cat_id" id="cat_id" class="form-control">
                                    <option >SELECT CATEGORY</option>
                                    @foreach ($category as $cat)
                                    <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>    
                    </div>

                    <div class="col-md-4">
                        <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Brand</label>
                            <div class="col-sm-8">
                                <input id="brand" name="brand" type="text" class="form-control form-control-sm js-example-basic-single">
                            </div>
                        </div>    
                    </div>

                    <div class="col-md-4">
                        <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Model</label>
                            <div class="col-sm-8">
                                <input id="model" name="model" type="text" class="form-control form-control-sm js-example-basic-single">
                            </div>
                        </div>    
                    </div>

                    <div class="col-md-4">
                        <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Key KeyWord</label>
                            <div class="col-sm-8">
                                <input id="key" name="key" type="text" class="form-control form-control-sm js-example-basic-single">
                            </div>
                        </div>    
                    </div>

                    <div class="col-md-4">
                        <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Users</label>
                            <div class="col-sm-8">
                                <input id="user" name="user" type="text" class="form-control form-control-sm js-example-basic-single">
                            </div>
                        </div>    
                    </div>

                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-4 col-form-label">DATE FROM</label>
                            <div class="col-8">
                                <input type="date" name="date_from" id="date_from" class="form-control form-control-sm js-example-basic-single">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-4 col-form-label">DATE TO</label>
                            <div class="col-8">
                                <input type="date" name="date_to" id="date_to" class="form-control form-control-sm js-example-basic-single">
                            </div>
                        </div>
                    </div>
                </div>
              
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row"><div class="col-sm-9"></div></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"></label>
                                <div class="col-sm-2">
                                    <button class="btn btn-success btn-sm" type="button" onclick="search();">Search</button>
                                </div>
                                <div class="col-sm-3">
                                    <button class="btn btn-success btn-sm" type="button"
                                        onclick="export_product();">Export</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div id="product_table">
               
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">

    function search(){
        
        if ($('#date_from').val()=="" && $('#date_to').val()=="") {
            alert("Please Enter Date Range");
        } else {
            $.ajax({
                type: "POST",
                url: "/admin/search", 
                data: {
                        "_token": "{{ csrf_token() }}",
                        'cat_id': $('#cat_id').val(),
                        'pro_id': $('#pro_id').val(),
                        'key': $('#key').val(),
                        'date_from': $('#date_from').val(),
                        'to_date': $('#date_to').val(),

                    },
                    cache: false,
                    success: function (html) {
                        console.log(html);
                            $("#product_table").html('');
                            $("#product_table").html(html).show('slow');
                        },
                    complete: function (data) {
                        // $("#attendance_details").html('');
                        // $("#attendance_details").html(html).show('slow');
                        }
            }); 
        }  
    }  
    
    function export_product(){
        window.location.replace(APP_URL+'/admin/export?rg_id='+ $('#rg_id').val()+'&ar_id='+ $('#ar_id').val()+'&dis_id='+ $('#dis_id').val());
    }
</script>

