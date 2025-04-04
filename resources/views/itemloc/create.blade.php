@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">Create New Location</div>
                    <div class="card-body">

                        <form method="POST" action="/itemloc">
                            @csrf
                            <label for="Location_Name">Location Name</label>
                            <input type="text" class="form-control" name="Location_Name" title="Location_Name"/>
                            <label for="location_desc">Location Description</label>
                            <input type="text" class="form-control" name="location_desc" title="location_desc"/>
                            <input type="submit" value="Add New Location" class="btn btn-primary btn-lrg btn-block" style="margin-top:20px"/>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
@endsection

@section('scripts')
@endsection