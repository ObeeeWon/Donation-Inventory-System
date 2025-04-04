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
                        <a href="/itemloc/create" class="btn btn-info" role="button">ADD LOCATION</a>
                    </h1>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Location Name</th>
                                <th>Location Description</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($itemloc as $location)
                                <tr>
                                    <td>{{ $location->location_id }}</td>
                                    <td>{{ $location->Location_Name }}</td>
                                    <td>{{ $location->location_desc }}
                                    <td>
                                        <div style="float:left;">
                                            <a href="{{ route('itemloc.edit', $location->location_id) }}" class="btn btn-success btn-sm">EDIT</a>
                                        </div>

                                        <div style="float:left; margin-left:5px;">
                                            <form method="post" action="/itemloc/{{$location->location_id}}" onsubmit="return confirm('Delete the location? Are you sure?')">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE"/>
                                                <input type="submit" name="submit" value="Delete" class="btn btn-danger btm-sm"/>
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