@extends('layouts.public')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <!--
                <div class="card-header">
                    {{ __('Current Inventory') }}
                    
                </div>
                -->
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Item name</th>
                                <th>Amount</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td>{{$item->ItemID}}</td>
                                <td>{{$item->ItemName}}</td>
                                <td>{{$item->Quantity}}</td>
                                <td>{{'N/A'}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    
                    {{ __('Required amount')}}

                    <div style="float:right;">
                        <a href="/items/create" class="btn btn-info" role="button">Insert</a>
                    </div>
                    </h1>
                </div>

                <div class="card-body">
                    
                
                    @foreach($items as $item)

                    <div style="float:left; margin-right:32%; margin-left:15%">
                        {{$item->LowStockAlert}}
                    </div>
                        

                        <div style="float:left;">
                            <a href="{{ route('item.edit', $item->ItemID)}}" class="btn btn-success">Edit</a>
                        </div>

                        <div style="float:left; margin-left:5px;">
                            <form method="post" action="/items/{{$item->ItemID}}" onsubmit="return confirm('Delete the item? Are you sure?')">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE"/>
                                <input type="submit" name="submit" value="Delete" class="btn btn-danger btm-sm"/>
                            </form>
                        </div>
                        <br />
                        <br />
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Inventory Reminder')}}
                </div>

                <div class="card-body">
                    <div class="justify-content-center">
                        @foreach($items as $item)
                            @if($item->Quantity <= $item->LowStockAlert)
                                {{'ID:' . $item->ItemID . 'Name:' . $item->ItemName . 'Current Supply:' . $item->Quantity}}
                            @endif
                        @endforeach
                    </div>
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