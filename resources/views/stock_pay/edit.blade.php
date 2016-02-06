@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Edit Stock Pay</h3>
    <br>
    <div class="row">
        {!!Form::open(array('route' => ['stock_pay.update', $stock_pay->id], 'class'=>'contact-panel', 'onsubmit'=>'return validateFormStockPay()', 'method'=>'PUT'))!!}
        <div class="col-md-12">
            <div class="row">
                <div class="form-group col-md-2">
                    <label for="p_name">Vendor Name</label>
                    <input type="text" name="p_name" class="form-control custom-text" value="{{$stock_pay->vendor_name}}" placeholder="Buying price *" readonly required>
                </div>
                <div class="form-group col-md-2">
                    <label for="total_price">Total Price</label>
                    <input type="text" name="total_price" class="form-control custom-text" value="{{$stock_pay->total_price}}" placeholder="Buying price *" readonly required>
                </div>
                <div class="form-group col-md-4">
                    <label for="selling_price">Discount</label>
                    <input type="text" name="discount" class="form-control custom-text" value="{{$stock_pay->discount}}" placeholder="Selling price *" readonly required>
                </div>
                <div class="form-group col-md-4">
                    <label for="selling_price">Net Price</label>
                    <input type="text" name="net_price" id="pay_net_price" class="form-control custom-text" value="{{$stock_pay->net_price}}" placeholder="Selling price *" readonly required>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="form-group col-md-8">
                    <label for="selling_price" class="stock_label">(-)Paid:</label>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" name="pay_paid" id="pay_old_paid" class="form-control custom-text" value="{{$stock_pay->paid}}" placeholder="Selling price *" readonly required>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" name="paid" id="pay_paid" class="form-control custom-text" placeholder="Pay remaining amount *" onkeyup="stockDuePaidChange()" pattern="[0-9]{1,9}" autofocus required>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="form-group col-md-8">
                    <label for="selling_price" class="stock_label">Due:</label>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="due" id="pay_due" class="form-control custom-text" value="{{$stock_pay->due}}" readonly required>
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