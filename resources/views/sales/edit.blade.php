@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Take Sales Arrears</h3>
    <br>
    <div class="row">
        {!!Form::open(array('route' => ['sales.update', $sales->id], 'class'=>'contact-panel', 'onsubmit'=>'return validateFormArrears()', 'method'=>'PUT'))!!}
        <div class="col-md-12">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="invoice_no">Invoice No</label>
                    <input type="text" name="invoice_no" class="form-control custom-text"  value="{{$sales->invoice_no}}" placeholder="Customer Invoice No *" required readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="customer_id">Customer Name</label>
                    <input type="text" name="customer_id" class="form-control custom-text"  value="{{$sales->customer_id}}" placeholder="Customer Name *" required readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="discount_price">Net Price</label>
                    <input type="text" name="discount_price" id="pay_discount_price" class="form-control custom-text" value="{{$sales->discount_price}}" placeholder="Selling price *" readonly required>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="form-group col-md-8">
                    <label for="old_paid" class="stock_label">(-)Paid:</label>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" name="old_paid" id="pay_old_paid" class="form-control custom-text" value="{{$sales->paid}}" placeholder="Paid *" readonly required>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" name="paid" id="pay_paid" class="form-control custom-text" placeholder="Pay remaining amount *" onkeyup="arrearsDuePaidChange()" pattern="[0-9]{1,9}" required>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="form-group col-md-8">
                    <label for="due" class="stock_label">Due:</label>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="due" id="pay_due" class="form-control custom-text" value="{{$sales->dues}}" readonly required>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div>
                <input type="submit" class="btn btn-default custom-text pull-right" value="Update" />
            </div>
        </div>
        {!!Form::close()!!}
    </div>

</div>

@include('common.footer')