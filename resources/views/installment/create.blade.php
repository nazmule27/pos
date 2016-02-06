@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Loan Installment Payment</h3>
    <br>
    <div class="row">
        {!!Form::open(array('route'=>'installment.store', 'class'=>'contact-panel'))!!}

        <div class="form-group col-md-4">
            <label for="lid">Loan Name</label>
            {!! Form::select('lid', (['' => 'Select Loan'] + $loans), null, ['class' => 'form-control custom-text', 'id' => 'lid', 'required' ,'autofocus']) !!}
            <input type="hidden" name="loan_title_name" id="loan_title_name" />
        </div>
        <div class="form-group col-md-4">
            <label for="installment_amount">Installment Amount</label>
            <input type="text" name="installment_amount" id="installment_amount" class="form-control custom-text" pattern="^(0|[1-9][0-9]*)$" placeholder="Installment Amount in Taka *" required>
        </div>
        <div class="form-group col-md-4">
            <label for="installment_count">Installment Count</label>
            <input type="text" name="installment_count" class="form-control custom-text" pattern="^(0|[1-9][0-9]*)$" placeholder="Number of Installment *" value="1" required>
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