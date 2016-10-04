@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Stock Transfer</h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table id="stock_transfer" class="display " cellspacing="0" width="100%" >
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
                        <th>Transfer</th>
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
                        <td>{{date('Y/m/d g:i a',strtotime($data->updated_at))}}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{route('stock_transfer.edit', $data->id)}}">Transfer</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@include('common.footer')