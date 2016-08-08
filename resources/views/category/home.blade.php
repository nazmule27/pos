@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Category List: <a class="add" href="{{route('category.create')}}"><i class="glyphicon glyphicon-plus"></i>Add Category</a> </h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table id="category" class="display " cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th>Name</th>
                        <th width="80">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_data as $data)
                    <tr>
                        <td>{{$data->c_name}}</td>
                        <td>
                            <a class="btn btn-default btn-sm" href="{{route('category.edit', $data->cid)}}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                            {{--{!!Form::open(array('route' => ['category.destroy', $data->cid], 'class'=>'pull-right', 'method'=>'delete'))!!}
                            {!!Form::hidden('cid', $data->cid)!!}
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