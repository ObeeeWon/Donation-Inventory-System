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
                            <label for="ItemName">Item Name</label>
                            <input type="text" class="form-control" name="ItemName" title="ItemName"/>
                            <label for="Barcode">Barcode</label>
                            <input type="text" class="form-control" name="Barcode" title="Barcode"/>
                            <label for="Quantity">Quantity</label>
                            <input type="number" class="form-control" name="Quantity" title="Quantity"/>
                            <label for="LowStockAlert">Low Stock Threshold</label>
                            <input type="number" step="0.01" class="form-control" name="LowStockAlert" title="LowStockAlert"/>
                            <label for="Location">Location</label>
                            <input type="text" class="form-control" name="Location" title="Location"/>
                            <input type="submit" value="Add Item" class="btn btn-primary btn-lrg btn-block" style="margin-top:20px"/>
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