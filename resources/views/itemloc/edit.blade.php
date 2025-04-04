@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">Edit Location</div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('itemloc.update', $itemloc) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT"/>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="Location_Name">Location Name</label>
                                    <input type="text" class="form-control" name="Location_Name" title="Location_Name" value="{{ old('Location_Name', $itemloc->Location_Name) }}"/>
                                </div>
                                <div class="col-md-6">
                                    <label for="location_desc">Location Description</label>
                                    <input type="text" class="form-control" name="location_desc" title="location_desc" value="{{ old('location_desc', $itemloc->location_desc) }}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" value="Save Changes" class="btn btn-success btn-lg btn-block" style="margin-top:20px"/>
                                </div>
                                <div class="col-md-6">
                                    <a href="/itemloc" class="btn btn-lg btn-danger btn-block" style="margin-top:20px">Cancel</a>
                                </div>
                            </div>                        
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