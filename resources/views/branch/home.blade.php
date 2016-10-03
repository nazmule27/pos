@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Branch List: <a class="add" href="{{route('branch.create')}}"><i class="glyphicon glyphicon-plus"></i>Add Branch</a> </h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table id="branch" class="display " cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th>Name</th>
                        <th width="80">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_data as $data)
                    <tr>
                        <td>{{$data->branch_name}}</td>
                        <td>
                            <a class="btn btn-default btn-sm" href="{{route('branch.edit', $data->id)}}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
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