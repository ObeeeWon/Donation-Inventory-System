@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">Create New Item</div>
                    <div class="card-body">

                        <form method="POST" action="/items">
                            @csrf

                            <label for="item_desc_id">Item Name</label>
                            <select class="form-control" name="item_desc_id" required>
                                <option value="">Select Item Name</option>
                                @foreach($itemDescriptions as $itemDesc)
                                    <option value="{{ $itemDesc->id }}" {{ old('item_desc_id') == $itemDesc->id ? 'selected' : '' }}>
                                        {{ $itemDesc->ItemName }}
                                    </option>
                                @endforeach
                            </select>

                            <label for="Barcode" class="mt-2">Barcode</label>
                            <input type="text" class="form-control" name="Barcode" title="Barcode" value="{{ old('Barcode') }}" required/>

                            <label for="Quantity" class="mt-2">Quantity</label>
                            <input type="number" class="form-control" name="Quantity" title="Quantity" value="{{ old('Quantity') }}" required/>

                            <label for="LowStockAlert" class="mt-2">Low Stock Threshold</label>
                            <input type="number" class="form-control" name="LowStockAlert" title="LowStockAlert" value="{{ old('LowStockAlert') }}" required step="0.01"/>

                            <label for="item_location_id" class="mt-2">Location</label>
                            <select class="form-control" name="item_location_id" required>
                                <option value="">Select Location</option>
                                @foreach($itemLocations as $itemLocation)
                                    <option value="{{ $itemLocation->id }}" {{ old('item_location_id') == $itemLocation->id ? 'selected' : '' }}>
                                        {{ $itemLocation->Location_Name }}
                                    </option>
                                @endforeach
                            </select>

                            <input type="submit" value="Add Item" class="btn btn-primary btn-lg btn-block" style="margin-top:20px"/>

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