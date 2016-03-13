@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Loan List: <a class="add" href="{{route('loan.create')}}"><i class="glyphicon glyphicon-plus"></i>Add New Loan</a> </h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table id="loan" class="display " cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th width="120">Loan Title</th>
                        <th>Amount Taken</th>
                        <th>Duration in Month</th>
                        <th>Installment Count</th>
                        <th>Installment Remaining</th>
                        <th>Installment Taka</th>
                        <th>Owing</th>
                        <th width="120">Creation Date</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Total: </th>
                    <th colspan="2"></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th colspan="2"></th>
                    <th></th>
                </tr>
                </tfoot>
                <tbody>
                    @foreach($all_data as $data)
                    <tr>
                        <td>{{$data->loan_title}}</td>
                        <td>{{$data->taken_amount}}</td>
                        <td>{{$data->duration_in_month}}</td>
                        <td>{{$data->installment_count}}</td>
                        <td>{{$data->installment_remain}}</td>
                        <td>{{$data->installment_taka}}</td>
                        <td>{{($data->installment_count)*($data->installment_taka)}}</td>
                        <td>{{date('Y/m/d g:i a',strtotime($data->created_at))}}</td>
                        <td><a class="btn btn-default" href="{{route('loan.edit', $data->lid)}}"><i class="glyphicon glyphicon-pencil"></i> Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@include('common.footer')