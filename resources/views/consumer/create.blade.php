@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Add New Loan</h3>
    <br>
    <div class="row">
        {!!Form::open(array('route'=>'consumer.store', 'class'=>'contact-panel'))!!}
        <div class="form-group col-md-4">
            <label for="loan_title">Consumer Name</label>
            <input type="text" name="name" class="form-control custom-text" placeholder="Consumer Name *" required autofocus>
        </div>
        <div class="form-group col-md-4">
            <label for="taken_amount">Consumer Address</label>
            <input type="text" name="address" class="form-control custom-text" placeholder="Consumer Address *" required>
        </div>
        <div class="form-group col-md-4">
            <label for="duration_in_month" name="type">Type</label>
            <select class="form-control custom-text" name="type">
                <option value="client">Client</option>
                <option value="vendor">Vendor</option>
            </select>
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