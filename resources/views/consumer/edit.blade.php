@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Edit Loan</h3>
    <br>
    <div class="row">
        {!!Form::open(array('route' => ['consumer.update', $consumer->id], 'class'=>'contact-panel', 'method'=>'PUT'))!!}
        <div class="form-group col-md-4">
            <label for="loan_title">Consumer Name</label>
            <input type="text" name="name" class="form-control custom-text" placeholder="Consumer Name *" value="{{$consumer->name}}" required autofocus>
        </div>
        <div class="form-group col-md-4">
            <label for="taken_amount">Consumer Address</label>
            <input type="text" name="address" class="form-control custom-text" placeholder="Consumer Address *" value="{{$consumer->address}}" required>
        </div>
        <div class="form-group col-md-4">
            <label for="duration_in_month" name="type">Type</label>
            <select class="form-control custom-text" name="type">
                <option <?php if ($consumer->type=='client') echo 'selected="selected"';?> value="client">Client</option>
                <option <?php if ($consumer->type=='vendor') echo 'selected="selected"';?> value="vendor">Vendor</option>
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