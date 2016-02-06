@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Edit Category</h3>
    <br>
    <div class="row">
        {!!Form::open(array('route' => ['category.update', $category->cid], 'class'=>'contact-panel', 'method'=>'PUT'))!!}
            <div class="col-md-4">
                <div class="form-group">
                    <label for="c_name">Category</label>
                    <input type="text" name="c_name" class="form-control custom-text" value="{{$category->c_name}}" placeholder="Category Name *" required autofocus>
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