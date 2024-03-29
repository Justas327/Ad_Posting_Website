@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h3 class="card-text">Skelbimai</h3>
                    </div>
                    <div class="col text-right">
                        @if (isset(Auth::user()->id) && Auth::user()->create_ad == true)
                            <a href="/ads/create" class="btn btn-outline-success">
                                <img src="/storage/images/add.png" style="width: 16px">Įdėti Skelbimą
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                @isset($ads)
                    @if (count($ads) > 0)
                        <div class="row">
                            @foreach ($ads as $key=>$ad)
                                <div class="col-sm-4">
                                    @include('inc.ads_list_item', ['ad' => $ad])
                                    @if (($key + 1) % 3 == 0)
                                        <hr>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endisset
            </div>
            <div class="card-footer">
                {{$ads->links()}}
            </div>
        </div>
    </div>
@stop
