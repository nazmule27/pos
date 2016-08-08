@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Add New Loan</h3>
    <br>
    <div class="row">
        {!!Form::open(array('route'=>'loan.store', 'class'=>'contact-panel'))!!}
        <div class="form-group col-md-4">
            <label for="loan_title">Loan Title</label>
            <input type="text" name="loan_title" class="form-control custom-text" placeholder="Loan Title *" required autofocus>
        </div>
        <div class="form-group col-md-4">
            <label for="taken_amount">Loan Amount Taken</label>
            <input type="text" name="taken_amount" class="form-control custom-text" pattern="^(0|[1-9][0-9]*)$" placeholder="Taken Amount *" required>
        </div>
        <div class="form-group col-md-4">
            <label for="duration_in_month">Duration in Month</label>
            <input type="text" name="duration_in_month" class="form-control custom-text" pattern="^(0|[1-9][0-9]*)$" placeholder="Duration in Month *" required>
        </div>
        <div class="form-group col-md-4">
            <label for="installment_count">Installment Count</label>
            <input type="text" name="installment_count" class="form-control custom-text" pattern="^(0|[1-9][0-9]*)$" placeholder="Installment Amount *" required>
        </div>
        <div class="form-group col-md-4">
            <label for="installment_taka">Installment Amount Taka</label>
            <input type="text" name="installment_taka" class="form-control custom-text" pattern="^(0|[1-9][0-9]*)$" placeholder="Installment Amount *" required>
        </div>
        <div class="col-md-12">
            <div>
                <input type="submit" class="btn btn-primary custom-text" value="Submit" />
            </div>
        </div>
        {!!Form::close()!!}
    </div>

</div>

@include('common.footer')