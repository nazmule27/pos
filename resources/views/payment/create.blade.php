@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Payment Entry</h3>
    <br>
    <div class="row">
        {!!Form::open(array('route'=>'payment.store', 'class'=>'contact-panel'))!!}
        <div class="col-md-4">
            <div class="form-group">
                <label for="eid">Payment Title</label>
                {!! Form::select('ptid', (['' => 'Select Expense'] + $paymentCategories), null, ['class' => 'form-control custom-text', 'id' => 'ptid', 'required']) !!}
                <input type="hidden" name="payment_title" id="payment_title" >
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="purpose">Payment Purpose/Address</label>
                <input type="text" name="purpose" class="form-control custom-text" maxlength="50" placeholder="Address/Purpose *" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="amount">Payment Amount</label>
                <input type="text" name="amount" class="form-control custom-text" pattern="^(0|[1-9][0-9]*)$" placeholder="Amount Taka *" required>
            </div>
        </div>
        <div class="col-md-12">
            <div>
                <input type="submit" class="btn btn-default custom-text" value="Submit" />
            </div>
        </div>
        {!!Form::close()!!}
    </div>

</div>

@include('common.footer')