@extends ('layouts.public')

@section ('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">Item Master Table</div>
                <div class="card-body">
                    @php
                        
                    @endphp
                    
                    <h1 class="text-end">
                        <a href="/itemdesc/create" class="btn btn-info" role="button">ADD ITEM MASTER</a>
                    </h1>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Item Name</th>
                                <th>Item Description</th>
<<<<<<< HEAD
                                <th>Barcode</th>
=======
>>>>>>> Finalmeetingbranch
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($itemdesc as $itemdescs)
                                <tr>
                                    <td>{{ $itemdescs->item_desc_id }}</td>
                                    <td>{{ $itemdescs->ItemName }}</td>
                                    <td>{{ $itemdescs->ItemDescription }}
<<<<<<< HEAD
                                    <td>{{ $itemdescs->Barcode }}
=======
>>>>>>> Finalmeetingbranch
                                    <td>
                                        <div style="float:left;">
                                            <a href="{{ route('itemdesc.edit', $itemdescs->item_desc_id) }}" class="btn btn-success btn-sm">EDIT</a>
                                        </div>

                                        <div style="float:left; margin-left:5px;">
<<<<<<< HEAD
                                            <form method="post" action="/itemdesc/{{$itemdescs->item_desc_id}}" onsubmit="return confirm('Delete the item master? Are you sure?')">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE"/>
                                                <input type="submit" name="submit" value="Delete" class="btn btn-danger btm-sm"/>
=======
                                            <form method="POST" action="{{ route('itemdesc.destroy', $itemdescs->item_desc_id) }}" onsubmit="return confirm('Delete the item master? Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" name="submit" value="Delete" class="btn btn-danger btn-sm"/>
>>>>>>> Finalmeetingbranch
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section ('scripts')
@endsection

@section ('styles')
@endsection