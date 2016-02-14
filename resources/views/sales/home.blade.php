@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <div class="row">
        <div class="col-md-12">
            <h3>Sales List</h3>
            <table id="sales" class="display " cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th>Invoice No</th>
                        <th>Customer Name</th>
                        {{--<th>Products</th>--}}
                        <th>Total</th>
                        {{--<th>Total wVAT</th>--}}
                        <th>Disc.</th>
                        <th>Net Price</th>
                        <th>Paid</th>
                        <th>Dues</th>
                        <th>Soled By</th>
                        <th>Selling Date</th>
                        <th width="160">Action</th>
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
                    <th> </th>
                </tr>
                </tfoot>
                <tbody>
                    @foreach($all_data as $data)
                    <tr>
                        <td>{{$data->invoice_no}}</td>
                        <td>{{$data->customer_id}}</td>
                        {{--<td>{{$data->products}}</td>--}}
                        <td>{{$data->total_price}}</td>
                        {{--<td>{{$data->total_price_vat}}</td>--}}
                        <td>{{$data->discount}}</td>
                        <td>{{$data->discount_price}}</td>
                        <td>{{$data->paid}}</td>
                        <td>{{$data->dues}}</td>
                        <td>{{$data->sold_by}}</td>
                        <td>{{$data->created_at}}</td>
                        <td>
                            {!!Form::open(array('route' => ['sales.destroy', $data->id], 'class'=>'pull-left padding-right-3', 'method'=>'delete', 'onclick'=>'return confirm("Are you sure you want to delete this item?");'))!!}
                            {!!Form::hidden('invoice_no', $data->invoice_no)!!}
                            {!!Form::hidden('products', $data->products)!!}
                            {!!Form::hidden('quantity', $data->quantity)!!}
                            {!!Form::submit('Return', ['class'=>'btn btn-danger'])!!}
                            {!!Form::close()!!}
                            <a class="btn btn-warning" href="{{route('sales.show', $data->id)}}">Exch.</a>
                            <a class="btn btn-success" href="{{route('sales.edit', $data->id)}}">Due</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@include('common.footer')