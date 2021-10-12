@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm">
            <div class="card">
                <div class="card-header">Suggest My Pc</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('config-product-update',$single_row->id) }}">

                        <div class="row">
                            <div class="col-sm">
                                <div class="input-group">
                                    <label class="col-sm-3 control-label"><h4>Grade</h4></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="grade" value="{{$single_row->grade}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-sm">
                                <div class="input-group">
                                    <label class="col-sm-3 control-label"><h4>Products</h4></label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            @foreach($products as $product)
                                                <div class="col-6">
                                                    <div class="input-group mb-3">
                                                        @if(in_array($product,json_decode($single_row->products)))
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="products[]" value="{{$product}}" id="{{$product}}" checked>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" value="{{$product}}">
                                                        @else
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="products[]" value="{{$product}}" id="{{$product}}">
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" value="{{$product}}">
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-sm">
                                <div class="input-group">
                                    <label class="col-sm-3 control-label"><h4>Options</h4></label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            @foreach($options as $option=>$value)
                                                <div class="col-6">
                                                    <div class="input-group mb-3">
                                                        @if(in_array($option,json_decode($single_row->options)))
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="options[]" value="{{$option}}" id="{{$option}}" checked>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" value="{{$value}}">
                                                        @else
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="options[]" value="{{$option}}" id="{{$option}}">
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" value="{{$value}}">
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group default-padding">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>



                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
