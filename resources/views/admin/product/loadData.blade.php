@if (count($products )>0)
<div class="card">
    <div class="card-body">
        <div class="table-responsive" style="margin-top: 25px">
            <table class="table table-striped table-bordered first" id="product_table">
                <thead class="thead-custom">
                    <tr>
                        <th class="headcol" style="color: #fff; background-color: black;text-align: center">ID</th>
                        <th class="headcol" style="color: #fff; background-color: black;text-align: center">Product Name</th>
                        <th class="headcol" style="color: #fff; background-color: black;text-align: center">Category Name</th>
                        <th class="headcol" style="color: #fff; background-color: black;text-align: center">Slug</th>
                        <th class="headcol" style="color: #fff; background-color: black;text-align: center">Brand</th>
                        <th class="headcol" style="color: #fff; background-color: black;text-align: center">Model</th>
                        <th class="headcol" style="color: #fff; background-color: black;text-align: center">KeyWord</th>
                        <th class="headcol" style="color: #fff; background-color: black;text-align: center">User</th>
                        <th class="headcol" style="color: #fff; background-color: black;text-align: center">Warranty</th>
                        <th class="headcol" style="color: #fff; background-color: black;text-align: center">Status</th>
                        <th class="headcol" style="color: #fff; background-color: black;text-align: center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $pro)
                        <tr>
                            <td style="text-align: center">{{ $pro->id }}</td>
                            <td style="text-align: center">{{ $pro->name }}</td>
                            <td style="text-align: center">{{ $pro->category_name }}</td>
                            <td style="text-align: center">{{ $pro->slug }}</td>
                            <td style="text-align: center">{{ $pro->brand }}</td>
                            <td style="text-align: center">{{ $pro->model }}</td>
                            <td style="text-align: center">{{ $pro->keywords }}</td>
                            <td style="text-align: center">{{ $pro->uses }}</td>
                            <td style="text-align: center">{{ $pro->warranty }}</td>
                            <td style="text-align: center">
                                @if ($pro->status == 1)
                                 {{ 'Active' }}
                                @elseif($pro->status == 0)
                                    
                                @endif
                                {{ 'Deactive' }}
                            </td>
                            <td>
                                <a href=""><button type="button" class="btn btn-warning">edit</button></a>
                                <a href=""><button type="button" class="btn btn-success">Active</button></a>
                                <a href=""><button type="button" class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>  
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@else
<div class="card">
    <div class="card-body">
        <div style="text-align:center"><label class="col-form-label" style="text-align:center;color:red">No Record Found</label></div>
    </div>
</div>
@endif


