@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <div class="row">
        <div class="col-md-12">
            <h3>Return List</h3>
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
                        <th>Return By</th>
                        <th>Return Date</th>
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
                        <td>{{$data->invoice_no}}</td>
                        <td>{{$data->customer_id}}</td>
                        {{--<td>{{$data->products}}</td>--}}
                        <td>{{$data->total_price}}</td>
                        {{--<td>{{$data->total_price_vat}}</td>--}}
                        <td>{{$data->discount}}</td>
                        <td>{{$data->discount_price}}</td>
                        <td>{{$data->paid}}</td>
                        <td>{{$data->dues}}</td>
                        <td>{{$data->return_by}}</td>
                        <td>{{date('d/m/Y g:i a',strtotime($data->updated_at))}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@include('common.footer')