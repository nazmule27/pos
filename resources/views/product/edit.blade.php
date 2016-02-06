@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Edit Product</h3>
    <br>
    <div class="row">
        {!!Form::open(array('route' => ['product.update', $product->pid], 'class'=>'contact-panel', 'onsubmit'=>'return validateFormProduct()', 'method'=>'PUT'))!!}
        <div class="form-group col-md-4">
            <label for="cid">Category</label>
            {!! Form::select('cid', (['' => 'Select Category'] + $categories), $selected=$product->cid, ['class' => 'form-control custom-text', 'required', 'disabled']) !!}
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="p_name">Product</label>
                <input type="text" name="p_name" class="form-control custom-text"  value="{{$product->p_name}}" placeholder="Product Name *" required>
            </div>
        </div>
        <div class="form-group col-md-4">
            <label for="buying_price">Buying Price</label>
            <input type="text" id="edit_buying_price" name="buying_price" class="form-control custom-text" value="{{$product->buying_price}}" placeholder="Buying price *" required>
        </div>
        <div class="form-group col-md-4">
            <label for="selling_price">Selling Price</label>
            <input type="text" id="edit_selling_price" name="selling_price" class="form-control custom-text" value="{{$product->selling_price}}" placeholder="Selling price *" required autofocus>
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