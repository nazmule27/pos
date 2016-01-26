@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Payment Type List: <a class="add" href="{{route('payment_type.create')}}"><i class="glyphicon glyphicon-plus"></i>Add Payment Type</a> </h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table id="category" class="display " cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th>Payment Title</th>
                        <th width="80">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_data as $data)
                    <tr>
                        <td>{{$data->payment_title}}</td>
                        <td>
                            <a class="btn btn-default" href="{{route('payment_type.edit', $data->ptid)}}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@include('common.footer')