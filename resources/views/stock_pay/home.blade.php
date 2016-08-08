@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Stock Payable List: </h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table id="stock_pay" class="display " cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th>Bill No</th>
                        <th>Vendor Name</th>
                        <th>Vendor Address</th>
                        <th>Total Price</th>
                        <th>Discount</th>
                        <th>Net Price</th>
                        <th width="80">Paid</th>
                        <th width="80">Due</th>
                        <th>Last Added Date</th>
                        <th>Pay</th>
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
                        <td>{{$data->bill_no}}</td>
                        <td>{{$data->vendor_name}}</td>
                        <td>{{$data->vendor_address}}</td>
                        <td>{{$data->total_price}}</td>
                        <td>{{$data->discount}}</td>
                        <td>{{$data->net_price}}</td>
                        <td>{{$data->paid}}</td>
                        <td>{{$data->due}}</td>
                        <td>{{date('Y/m/d g:i a',strtotime($data->updated_at))}}</td>
                        <td><a class="btn btn-default btn-sm" href="{{route('stock_pay.edit', $data->id)}}"><i class="glyphicon glyphicon-pencil"></i> Pay</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@include('common.footer')