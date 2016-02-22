@include('common.header')
@include('common.navbar')

<div class="container padT60">

    <h3>Installment List: <a class="add" href="{{route('installment.create')}}"><i class="glyphicon glyphicon-plus"></i>Loan Install Payment</a> </h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table id="installment" class="display " cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th>Loan Title</th>
                        <th>Installment Taka Amount</th>
                        <th>Installment Count</th>
                        <th>Dr./Cr.</th>
                        <th width="110">Creation Date</th>
                    </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Total: </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                </tr>
                </tfoot>
                <tbody>
                    @foreach($all_data as $data)
                    <tr>
                        <td>{{$data->loan_title}}</td>
                        <td>{{$data->installment_amount}}</td>
                        <td>{{$data->installment_count}}</td>
                        <td>{{$data->drcr}}</td>
                        <td>{{date('d/m/Y g:i a',strtotime($data->created_at))}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('common.footer')