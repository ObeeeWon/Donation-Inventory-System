@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">Edit Item Master</div>
                    <div class="card-body">

                        <form method="POST" action="/itemdesc/{{ $itemdesc->item_desc_id }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT"/>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="ItemName">Item Name</label>
                                    <input type="text" class="form-control" name="ItemName" title="ItemName" value="{{ old('itemdesc', $ItemName->ItemName) }}"/>
                                </div>
                                <div class="col-md-6">
                                    <label for="ItemDescription">Item Description</label>
                                    <input type="text" class="form-control" name="ItemDescription" title="ItemDescription" value="{{ old('itemdesc', $ItemDescription->ItemDescription) }}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" value="Save Changes" class="btn btn-success btn-lg btn-block" style="margin-top:20px"/>
                                </div>
                                <div class="col-md-6">
                                    <a href="/itemdesc" class="btn btn-lg btn-danger btn-block" style="margin-top:20px">Cancel</a>
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