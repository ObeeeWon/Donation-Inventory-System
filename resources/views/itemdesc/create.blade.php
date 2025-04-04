@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">Create New Item Master</div>
                    <div class="card-body">

                        <form method="POST" action="/itemdesc">
                            @csrf
                            <label for="ItemName">Item Name</label>
                            <input type="text" class="form-control" name="ItemName" title="ItemName"/>
                            <label for="ItemDescription">Item Description</label>
                            <input type="text" class="form-control" name="ItemDescription" title="ItemDescription"/>
                            <input type="submit" value="Add Item Master" class="btn btn-primary btn-lrg btn-block" style="margin-top:20px"/>
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