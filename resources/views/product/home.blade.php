@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Product List: <a class="add" href="{{route('product.create')}}"><i class="glyphicon glyphicon-plus"></i>Add Product</a> </h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table id="product" class="display " cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Buying Price</th>
                        <th>Selling Price</th>
                        <th width="80">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_data as $data)
                    <tr>
                        <td>{{$data->c_name}}</td>
                        <td>{{$data->p_name}}</td>
                        <td>{{$data->buying_price}}</td>
                        <td>{{$data->selling_price}}</td>
                        <td>
                            <a class="btn btn-default btn-sm" href="{{route('product.edit', $data->pid)}}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                            {{--{!!Form::open(array('route' => ['product.destroy', $data->pid], 'class'=>'pull-right', 'method'=>'delete'))!!}
                            {!!Form::hidden('pid', $data->pid)!!}
                            {!!Form::submit('Delete', ['class'=>'btn btn-danger'])!!}
                            {!!Form::close()!!}--}}
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@include('common.footer')