@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Add Category</h3>
    <br>
    <div class="row">
        {!!Form::open(array('route'=>'category.store', 'class'=>'contact-panel'))!!}
            <div class="col-md-4">
                <div class="form-group">
                    <label for="c_name">Category</label>
                    <input type="text" name="c_name" class="form-control custom-text" placeholder="Category Name *" required>
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