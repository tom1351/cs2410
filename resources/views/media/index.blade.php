@extends('layouts.dashboard.master') 

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Upload Media</h5>
            </div>
            <div class="card-body">
                @include('media.create')
                
                <div class="row mt-5">
                
                    @foreach($media as $item)
                    
                        @include('media.thumbnail')
                    
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection