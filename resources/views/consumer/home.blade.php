@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Consumer List: <a class="add" href="{{route('consumer.create')}}"><i class="glyphicon glyphicon-plus"></i>Add New Client/Vendor</a> </h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table id="consumer" class="display " cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th width="120">Name</th>
                        <th>Address</th>
                        <th>Type</th>
                        <th width="150">Creation Date</th>
                        <th width="100">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_data as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->address}}</td>
                        <td>{{$data->type}}</td>
                        <td>{{date('Y/m/d g:i a',strtotime($data->created_at))}}</td>
                        <td><a class="btn btn-default" href="{{route('consumer.edit', $data->id)}}"><i class="glyphicon glyphicon-pencil"></i> Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@include('common.footer')