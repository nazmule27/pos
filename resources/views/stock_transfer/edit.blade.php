@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Edit Product</h3>
    <br>
    <div class="row">
        {!!Form::open(array('route' => ['stock_transfer.update', $stock->id], 'class'=>'contact-panel', 'onsubmit'=>'return validateFormStockTransfer()', 'method'=>'PUT'))!!}
        <div class="col-md-4">
            <div class="form-group">
                <label for="c_name">Category</label>
                <input type="text" name="c_name" class="form-control custom-text"  value="{{$product_detail[0]->c_name}}" placeholder="Product Name *" required readonly>
                <input type="hidden" name="cid" value="{{$product_detail[0]->cid}}">
                <input type="hidden" name="pid" value="{{$product_detail[0]->pid}}">
                {{--<input type="hidden" name="branch" value="{{$product_detail[0]->branch}}">--}}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="p_name">Product</label>
                <input type="text" name="p_name" class="form-control custom-text"  value="{{$product_detail[0]->p_name}}" placeholder="Product Name *" required readonly>
            </div>
        </div>
        <div class="form-group col-md-2">
            <label for="buying_price">Buying Price</label>
            <input type="text" id="edit_buying_price" name="buying_price" class="form-control custom-text" value="{{$product_detail[0]->buying_price}}" placeholder="Buying price *" required readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="selling_price">Selling Price</label>
            <input type="text" id="edit_selling_price" name="selling_price" class="form-control custom-text" value="{{$product_detail[0]->selling_price}}" placeholder="Selling price *" required readonly>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="available">Available</label>
                <input type="text" id="transfer_available" name="available" class="form-control custom-text"  value="{{$product_detail[0]->quantity}}" placeholder="Available *" required readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="text" id="transfer_quantity" name="quantity" class="form-control custom-text"  value="{{$product_detail[0]->quantity}}" placeholder="Transfer quantity *" required autofocus>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="new_branch">Transfer Branch</label>
                {!! Form::select('new_branch', (['' => 'Select Branch'] + $branch), null, ['class' => 'form-control custom-text', 'required']) !!}
            </div>
        </div>


        <div class="col-md-12">
            <div>
                <input type="submit" class="btn btn-primary custom-text" value="Transfer" />
            </div>
        </div>
        {!!Form::close()!!}
    </div>

</div>

@include('common.footer')