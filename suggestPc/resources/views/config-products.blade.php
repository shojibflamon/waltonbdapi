@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Suggest My Pc</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Grade</th>
                                <th scope="col">Products</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $index = 1;
                            @endphp
                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{$index}}</th>
                                    <td>{{ $product->grade }}</td>
                                    <td>{{ $product->products }}</td>
                                    <td><a href="{{ route('config-product-show',$product->id)}}">{{__('Edit')}}</a></td>
                                </tr>
                                @php
                                    $index++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
