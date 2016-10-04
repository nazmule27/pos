@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Branch Category</h3>
    <br>
    <div class="row">
        {!!Form::open(array('route' => ['branch.update', $branch->id], 'class'=>'contact-panel', 'method'=>'PUT'))!!}
            <div class="col-md-4">
                <div class="form-group">
                    <label for="branch_name">Branch</label>
                    <input type="text" name="branch_name" class="form-control custom-text" value="{{$branch->branch_name}}" placeholder="Branch Name *" required readonly autofocus>
                </div>
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