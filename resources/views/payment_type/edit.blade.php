@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Edit Expense Type</h3>
    <br>
    <div class="row">
        {!!Form::open(array('route' => ['payment_type.update', $payment_type->ptid], 'class'=>'contact-panel', 'method'=>'PUT'))!!}
            <div class="col-md-4">
                <div class="form-group">
                    <label for="payment_title">Payment Type</label>
                    <input type="text" name="payment_title" class="form-control custom-text" value="{{$payment_type->payment_title}}" placeholder="Payment Title *" required>
                </div>
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