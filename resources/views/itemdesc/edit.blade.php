@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">Edit Item Master</div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('itemdesc.update', $itemdesc) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT"/>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="ItemName">Item Name</label>
                                    <input type="text" class="form-control" name="ItemName" title="ItemName" value="{{ old('ItemName', $itemdesc->ItemName) }}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="ItemDescription">Item Description</label>
                                    <input type="text" class="form-control" name="ItemDescription" title="ItemDescription" value="{{ old('ItemDescription', $itemdesc->ItemDescription) }}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="Barcode">Barcode</label>
                                    <input type="text" class="form-control" name="Barcode" title="Barcode" value="{{ old('Barcode', $itemdesc->Barcode) }}"/>
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