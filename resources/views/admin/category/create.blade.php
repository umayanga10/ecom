@extends('admin/layout')

@section('container')
    <h3 align='center'>Manage Category</h3>
    <a href="manage_category">
        <button type="button" class="btn btn-success">Back</button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Category</h3>
                        </div>
                        <hr>
                        <form action="" method="post" novalidate="novalidate">
                            <div class="form-group">
                                <label class="control-label mb-1">Category Name</label>
                                <input id="cat_name" name="cat_name" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-1">Category Code</label>
                                <input id="cat_code" name="cat_code" type="text" class="form-control">
                            </div>
                            <div class="form-group has-success">
                                <label for="cc-name" class="control-label mb-1">Name on card</label>
                                <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
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

