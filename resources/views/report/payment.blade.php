@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Payment List: </h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table id="payment" class="display " cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Payment Title</th>
                        <th>Address/Purpose</th>
                        <th>Amount</th>
                        <th>Date and Time</th>
                        <th>Status</th>
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
                </tr>
                </tfoot>
                <tbody>
                    <?php $i=1;?>
                    @foreach($payments as $data)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$data->payment_title}}</td>
                        <td>{{$data->purpose}}</td>
                        <td>{{$data->amount}}</td>
                        <td>{{date('Y/m/d g:i a',strtotime($data->updated_at))}}</td>
                        <td>{{$data->status}}</td>
                    </tr>
                    <?php $i++;?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@include('common.footer')