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


                    <form method="POST" action="{{ route('suggest-my-pc-result') }}">
                        @csrf

                        @foreach($form as $key=>$values)
                            @if($key == 'age')
                                <p>Please select your Age:</p>
                                @foreach($values as $vKey=>$value)
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio" name="{{$key}}" value="{{$vKey}}" id="{{$vKey}}">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" value="{{$value}}">
                                        </div>
                                    </div>
                                @endforeach
                            @elseif($key == 'regular_usage')
                                <br>
                                <br>
                                <p>Regular Usage:</p>

                                @foreach($values as $vKey=>$value)
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="checkbox" name="{{$key}}[]" value="{{$vKey}}" id="{{$vKey}}">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" value="{{$value}}">
                                        </div>
                                    </div>
                                @endforeach
                            @elseif($key == 'performance')
                                <br>
                                <br>
                                <p>Performance:</p>
                                @foreach($values as $vKey=>$value)
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio" name="{{$key}}" value="{{$vKey}}" id="{{$vKey}}">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" value="{{$value}}">
                                        </div>
                                    </div>
                                @endforeach
                            @elseif($key == 'gaming_performance')
                                <br>
                                <br>
                                <p>Gaming Performance:</p>
                                @foreach($values as $vKey=>$value)
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio" name="{{$key}}" value="{{$vKey}}" id="{{$vKey}}">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" value="{{$value}}">
                                        </div>
                                    </div>
                                @endforeach
                            @elseif($key == 'applications')
                                <br>
                                <br>
                                <p>Application Software:</p>
                                @foreach($values as $vKey=>$value)
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="checkbox" name="{{$key}}[]" value="{{$vKey}}" id="{{$vKey}}">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" value="{{$value}}">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach

                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
