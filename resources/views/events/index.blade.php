@extends('layouts.main.master') 

@section('header')

@include('layouts.main.header') 

@endsection

@section('content')

<div class="section">
    <div class="events-list mt-5">
        <div class="container">
            <div class="row bg-light p-4 mb-5">
                <div class="col-12 col-sm-3">
                    <h6>Filters</h6>
                </div>
                <div class="col-12 col-sm-9">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-4">
                            <div class="dropdown">
                                <a href="#" class="btn btn-primary btn-simple btn-block btn-round dropdown-toggle" data-toggle="dropdown" id="monthFilter">Month</a>
                                <ul class="dropdown-menu" aria-labelledby="monthFilter">
                                    @foreach($byMonth as $month)
                                        <a class="dropdown-item" href="/?month={{ $month['month'] }}">{{ $month['month'] }}</a>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="dropdown">
                                <a href="#" class="btn btn-primary btn-simple btn-block btn-round dropdown-toggle" data-toggle="dropdown" id="categoryFilter">Category</a>
                                <ul class="dropdown-menu" aria-labelledby="categoryFilter">
                                    @foreach($byCategory as $category)
                                        <a class="dropdown-item" href="/?category={{ $category['category'] }}">{{ ucwords($category['category']) }}</a>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="dropdown">
                                <a href="#" class="btn btn-primary btn-simple btn-block btn-round dropdown-toggle" data-toggle="dropdown" id="popularityFilter">Popularity</a>
                                <ul class="dropdown-menu" aria-labelledby="popularityFilter">
                                    <a class="dropdown-item" href="/?popularity=most">Most Likes</a>
                                    <a class="dropdown-item" href="/?popularity=least">Least Likes</a>
                                </ul>
                            </div>
                        </div>
                        @if(auth()->check() && auth()->user()->isOrganiser())
                        <div class="col-12">
                            <a href="/?showMyEvents=true" class="btn btn-primary btn-block btn-round btn-simple">Events by me</a>
                        </div>
                        @endif()
                        <div class="col-12">
                            <a href="/" class="btn btn-primary btn-block btn-round">Clear filters</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <h2 class="title">Upcoming Events</h2>
            <div class="row">
                @foreach ($events as $event)
                    @include ('events.event') 
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('events.modal')

@endsection

@section('custom-scripts')

<script src="/js/modules/eventAjax.js" type="text/javascript"></script>
@endsection