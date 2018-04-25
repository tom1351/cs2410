@extends('layouts.dashboard.master') 

@section('content')

<div class="row">
    <div class="col-md-4">
        <div class="card card-user">
            <div class="card-body">
                <div class="user text-center">
                    <img class="avatar border-gray" src="/img/default-avatar.png" alt="...">
                    <h5 class="title text-primary">{{ auth()->user()->name }}</h5>
                    <h6 class="text-muted">{{ auth()->user()->getAccountTypeAsStr() . ' ' . 'Account' }}</h6>
                    <p class="description">
                        {{ auth()->user()->email }}
                    </p>
                </div>
                <p class="description text-center">
                    Member since: <br>
                    {{ Carbon\Carbon::parse(auth()->user()->created_at)->format('m/d/Y') }}
                </p>
            </div>
        </div>
    </div>
    @if(! auth()->user()->isOrganiser())
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Upgrade Account</h5>
                <p>You can upgrade your account to become an <b>Event Organiser</b>. This will allow you to manage events.</p>
            </div>
            <div class="card-body">
                <form method="POST" action="/account/upgrade">
                    {{method_field('PATCH')}}
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Telephone Number</label>
                                <input type="text" id="telephone_num" name="telephone_num" class="form-control" placeholder="Telephone Number" required maxlength="20">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-round btn-lg btn-block btn-simple">
                                Upgrade
                            </button>
                        </div>
                    </div>
                </form>
                
                @include('layouts.errors')
            </div>
        </div>
    </div>
    @endif
</div>

@endsection