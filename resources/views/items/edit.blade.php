@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">Edit Existing Item</div>
                    <div class="card-body">
                        <form method="POST" action="/items/{{ $item->id }}">
                            @csrf
                            <input type="hidden" name="_method" value="POST"/>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="ItemName">Item Name</label>
                                    <select class="form-control" name="item_desc_id">
                                        @foreach($itemDescriptions as $description)
                                            <option value="{{ $description->id }}" 
                                                {{ $description->id == old('item_desc_id', $item->item_desc_id) ? 'selected' : '' }}>
                                                {{ $description->ItemName }}
                                            </option>
                                        @endforeach
                                    </select>
                        
                                    <label for="Barcode">Barcode</label>
                                    <input type="text" class="form-control" name="Barcode" value="{{ old('Barcode', $item->Barcode) }}"/>
                        
                                    <label for="Quantity">Quantity</label>
                                    <input type="number" class="form-control" name="Quantity" value="{{ old('Quantity', $item->Quantity) }}"/>
                        
                                    <label for="LowStockAlert">Low Stock Threshold</label>
                                    <input type="number" class="form-control" name="LowStockAlert" value="{{ old('LowStockAlert', $item->LowStockAlert) }}"/>

                                    <label for="Location">Location</label>
                                    <select class="form-control" name="item_location_id">
                                        @foreach($itemLocations as $location)
                                            <option value="{{ $location->id }}" 
                                                {{ $location->id == old('item_location_id', $item->item_location_id) ? 'selected' : '' }}>
                                                {{ $location->Location_Name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" value="Save Changes" class="btn btn-success btn-lg btn-block" style="margin-top:20px"/>
                                </div>
                                <div class="col-md-6">
                                    <a href="/items" class="btn btn-lg btn-danger btn-block" style="margin-top:20px">Cancel</a>
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