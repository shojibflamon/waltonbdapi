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

                    @if(!is_array($results))
                        <h1 class="text-danger">{{ $results }}</h1>
                    @else
                        <ul>
                            @foreach ($results as $result)
                                <li>
                                    <h2>
                                        {{ $result }}
                                    </h2>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
