@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Stock List Detail: <a class="add" href="{{route('stock.create')}}"><i class="glyphicon glyphicon-plus"></i>Add Stock</a> </h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table id="stock" class="display " cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th>Buying Price</th>
                        <th>Selling Price</th>
                        <th>Quantity</th>
                        <th>Net Buying Price</th>
                        <th>Net Selling Price</th>
                        <th width="120">Last Added Date</th>
                    </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Total: </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                </tr>
                </tfoot>
                <tbody>
                    @foreach($all_data as $data)
                    <tr>
                        <td>{{$data->c_name}}</td>
                        <td>{{$data->p_name}}</td>
                        <td>{{$data->buying_price}}</td>
                        <td>{{$data->selling_price}}</td>
                        <td>{{$data->quantity}}</td>
                        <td>{{($data->quantity)*($data->buying_price)}}</td>
                        <td>{{($data->quantity)*($data->selling_price)}}</td>
                        <td>{{$data->updated_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@include('common.footer')