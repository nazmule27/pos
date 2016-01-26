@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Add Product</h3>
    <br>
    <div class="row">
        {!!Form::open(array('route'=>'product.store', 'class'=>'contact-panel', 'onsubmit'=>'return validateFormProduct()'))!!}

        <div class="form-group col-md-4">
            <label for="cid">Category</label>
            {!! Form::select('cid', (['' => 'Select Category'] + $categories), null, ['class' => 'form-control custom-text', 'required']) !!}
        </div>
        <div class="form-group col-md-4">
            <label for="p_name">Product</label>
            <input type="text" name="p_name" class="form-control custom-text" placeholder="Product name *" required>
        </div>
        <div class="form-group col-md-4">
            <label for="buying_price">Buying Price</label>
            <input type="text" id="edit_buying_price" name="buying_price" class="form-control custom-text" placeholder="Buying price *" required>
        </div>
        <div class="form-group col-md-4">
            <label for="selling_price">Selling Price</label>
            <input type="text" id="edit_selling_price" name="selling_price" class="form-control custom-text" placeholder="Selling price *" required>
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