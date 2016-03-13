@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Net Profit Sheet: </h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table id="balanced" class="display " cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Transaction Title</th>
                        <th>Address</th>
                        <th>Dr.</th>
                        <th>Cr.</th>
                        <th width="160">Date Time</th>
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
                    @foreach($all_data as $data)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$data->transaction_title}}</td>
                        <td>{{$data->address}}</td>
                        <td>{{$data->debit}}</td>
                        <td>{{$data->credit}}</td>
                        <td>{{date('Y/m/d g:i a',strtotime($data->updated_at))}}</td>
                    </tr>
                    <?php $i++;?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('common.footer')