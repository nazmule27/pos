@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Exchange Product</h3>
    <div class="row">
        <div class="col-md-12">
                {!!Form::open(array('url'=>'sales.exchange', 'class'=>'contact-panel','onsubmit'=>'return validateForm()', 'id'=>'sales-table'))!!}
                <fieldset>
                    <legend>Basic Info:</legend>
                    <div class="row">
                        <div class="col-sm-2">
                            <label class="control-label">Date:</label>
                            <input type="text" class="form-control" name="datetimepicker" value="{{$invoice[0]->created_at}}" readonly />
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label">Invoice No:</label>
                            <input type="text" class="form-control" name="invoiceNo" id="invoiceNo" value="{{$invoice[0]->invoice_no}}" readonly />
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label" for="customerName">Customer Name: </label>
                            <input type="text" class="form-control" name="customerName" id="customerName" value="{{$invoice[0]->customer_id}}" autofocus required/>
                        </div>
                        <div class="col-sm-4">
                            <label class="control-label">Address:</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{$invoice[0]->customer_address}}"  />
                        </div>
                    </div>
                    <legend>Entry Details:</legend>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php
                            $sCategories=explode(",", $invoice[0]->categories);
                            $sProducts=explode(",", $invoice[0]->products);
                            $unit_price=explode(",", $invoice[0]->unit_price);
                            $quantity=explode(",", $invoice[0]->quantity);
                            $amount=explode(",", $invoice[0]->amount);
                            $productList='';
                            ?>
                            <table class="table table-hover" id="invoiceTable">
                                <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Product Name</th>
                                    <th>Bought Price</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Available</th>
                                    <th>Amount</th>
                                    <th>Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php for ($i = 0; $i < count($sProducts)-1; ++$i) {
                                $productList=AppHelper::getProductByCid($sCategories[$i]);
                                $boughtPrice=AppHelper::getBoughtPrice($sProducts[$i]);
                                $available=AppHelper::getAvailable($sProducts[$i]);
                                $productName=AppHelper::getProductName($sProducts[$i]);
                                ?>
                                <tr>
                                    <td>
                                        {!! Form::select('category1', (['' => 'Select Category'] + $categories), $sCategories[$i], ['class' => 'form-control', 'id' => 'category1', 'onChange'=>'getSalesProduct(this.id, this.value)', 'required']) !!}
                                    </td>
                                    <td>
                                        {!! Form::select('productName1', (['' => 'Select Product'] + $productList), $sProducts[$i], ['class' => 'form-control', 'id' => 'productName1', 'onChange'=>'getPrice(this.id, this.value)', 'required']) !!}
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="buying_price1" id="buying_price1" value="{{$boughtPrice[0]->buying_price}}" readonly>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="price1" id="price1" value="{{$unit_price[$i]}}" readonly>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="quantity1" id="quantity1" autocomplete="off" onkeyup="quantityChange(this.id);" pattern="^[0-9]+(\.\d{1,2})?" placeholder="Quantity *" value="{{$quantity[$i]}}" required>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="available1" id="available1" value="{{$available[0]->quantity}}" readonly required>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="amount1" id="amount1" value="{{$unit_price[$i]}}" readonly required>
                                    </td>
                                    <td>
                                        <input type="hidden" name="products1" id="products1" value="{{$productName[0]->p_name}}">
                                        <a href="javascript:void(0)" onclick="deleteRow(this)"><i class="glyphicon glyphicon-trash "></i></a>
                                    </td>
                                </tr>
                                <?php }?>
                                </tbody>
                            </table>
                            <input type="button" id="addMore" class="btn btn-success addMore" value="Add More" onclick="insRow()" />
                        </div>
                    </div>
                    <legend>Payment Info:</legend>
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="peraCon">Taka</p>
                            <input class="form-control width200 pull-right" type="text" name="totalAmountVat" id="totalAmountVat" value="{{$invoice[0]->total_price_vat}}" readonly>
                            <p class="peraCon">=</p>
                            <input class="form-control width120 pull-right" type="text" name="vat" id="vat" pattern="^[0-9](\.\d{1,2})?" value="{{$invoice[0]->vat}}" onkeyup="vatChange();" autocomplete="off" required>
                            <p class="peraCon">+VAT:</p>
                            <input class="form-control width200 pull-right" type="text" name="total_price" id="total_price" value="{{$invoice[0]->total_price}}" readonly>
                            <p class="peraCon">Total Taka:</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="peraCon">Taka</p>
                            <input class="form-control width200 pull-right" type="text" name="discountAmount" id="discountAmount" value="{{$invoice[0]->discount_price}}" readonly>
                            <p class="peraCon">=</p>
                            <input class="form-control width120 pull-right" type="text" name="discount" id="discount" pattern="^[0-9]+\d?" onkeyup="discountChange();" autocomplete="off" value="{{$invoice[0]->discount}}" required>
                            <p class="peraCon">Discount :</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="peraCon">Taka</p>
                            <input class="form-control width200 pull-right" type="text" name="paid" id="paid" pattern="^[0-9]+\d?" onkeyup="paidChange();" autocomplete="off" value="{{$invoice[0]->paid}}" required>
                            <p class="peraCon">Paid:</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="peraCon">Taka</p>
                            <input class="form-control width200 pull-right" type="text" name="dues" id="dues" value="{{$invoice[0]->dues}}" readonly>
                            <p class="peraCon">Dues:</p>
                        </div>
                    </div>
                    <legend></legend>
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="peraCon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                            <input type="submit" class="btn btn-success pull-right" value="Submit" />
                        </div>
                    </div>
                    <br><br>
                </fieldset>
                {!!Form::close()!!}
        </div>
    </div>

</div>
<script>

</script>
@include('common.footer')