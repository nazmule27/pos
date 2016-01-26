@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Add Payment Type</h3>
    <br>
    <div class="row">
        {!!Form::open(array('route'=>'payment_type.store', 'class'=>'contact-panel'))!!}
            <div class="col-md-4">
                <div class="form-group">
                    <label for="payment_title">Payment Title</label>
                    <input type="text" name="payment_title" class="form-control custom-text" placeholder="Payment Title *" required>
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