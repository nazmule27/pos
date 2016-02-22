@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3> Payment List <a class="add" href="{{route('payment.create')}}"><i class="glyphicon glyphicon-plus"></i>Add Payment</a> </h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table id="expense" class="display " cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th>Payment Title</th>
                        <th>Address</th>
                        <th>Amount</th>
                        <th width="110">Payment Date</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Total: </th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($all_data as $data)
                    <tr>
                        <td>{{$data->payment_title}}</td>
                        <td>{{$data->purpose}}</td>
                        <td>{{$data->amount}}</td>
                        <td>{{date('d/m/Y g:i a',strtotime($data->created_at))}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('common.footer')