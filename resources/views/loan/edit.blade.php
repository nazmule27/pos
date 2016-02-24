@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Edit Loan</h3>
    <br>
    <div class="row">
        {!!Form::open(array('route' => ['loan.update', $loan->lid], 'class'=>'contact-panel', 'method'=>'PUT'))!!}
        <div class="form-group col-md-4">
            <label for="loan_title">Loan Title</label>
            <input type="text" name="loan_title" class="form-control custom-text" placeholder="Loan Title *" value="{{$loan->loan_title}}" required autofocus>
        </div>
        <div class="form-group col-md-4">
            <label for="taken_amount">Loan Amount Taken</label>
            <input type="text" name="taken_amount" class="form-control custom-text" pattern="^(0|[1-9][0-9]*)$" placeholder="Taken Amount *" value="{{$loan->taken_amount}}" required>
        </div>
        <div class="form-group col-md-4">
            <label for="duration_in_month">Duration in Month</label>
            <input type="text" name="duration_in_month" class="form-control custom-text" pattern="^(0|[1-9][0-9]*)$" placeholder="Duration in Month *" value="{{$loan->duration_in_month}}" required>
        </div>
        <div class="form-group col-md-4">
            <label for="installment_count">Installment Count</label>
            <input type="text" name="installment_count" class="form-control custom-text" pattern="^(0|[1-9][0-9]*)$" placeholder="Installment Amount *" value="{{$loan->installment_count}}" required>
        </div>
        <div class="form-group col-md-4">
            <label for="installment_taka">Installment Amount Taka</label>
            <input type="text" name="installment_taka" class="form-control custom-text" pattern="^(0|[1-9][0-9]*)$" placeholder="Installment Amount *" value="{{$loan->installment_taka}}" required>
        </div>
        <div class="form-group col-md-4">
            <label for="status">Status</label>
            <select class="form-control custom-text" name="status">
                <option <?php if ($loan->status=='active') echo 'selected="selected"';?> value="active">active</option>
                <option <?php if ($loan->status=='inactive') echo 'selected="selected"';?> value="inactive">inactive</option>
            </select>
        </div>
        <div class="col-md-12">
            <div>
                <input type="submit" class="btn btn-default custom-text" value="Update" />
            </div>
        </div>
        {!!Form::close()!!}
    </div>

</div>

@include('common.footer')