@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Add Branch</h3>
    <br>
    <div class="row">
        {!!Form::open(array('route'=>'branch.store', 'class'=>'contact-panel'))!!}
            <div class="col-md-4">
                <div class="form-group">
                    <label for="c_name">Branch</label>
                    <input type="text" name="branch_name" class="form-control custom-text" placeholder="Branch Name *" required autofocus>
                </div>
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