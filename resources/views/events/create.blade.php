@extends('layouts.dashboard.master') 

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Create Event</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="/events/create">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Event Title</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Event Title" required maxlength="80">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label for="venue">Venue</label>
                                <div class="form-group">
                                    <input type="text" id="venue" name="venue" class="form-control" placeholder="Venue">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label for="linked_event">Linked Resource (URL)</label>
                                <div class="form-group">
                                    <input type="text" id="linked_event" name="linked_event" class="form-control" placeholder="Event Link">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label for="category">Category:</label>
                                <select class="form-control" id="category" name="category">
                                    <option value="sport">Sport</option>
                                    <option value="culture">Culture</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label for="category">Thumbnail ID:</label>
                                <input type="number" id="thumbnail_id" name="thumbnail_id" class="form-control" placeholder="Thumbnail ID">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="commencing">Date Commencing</label><br>
                                <input type="datetime-local" name="commencing" id="commencing" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" rows="4" cols="80" class="form-control" placeholder="Enter your description for the event here" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <div class="checkbox">
                                    <input type="hidden" name="featured" value="0">
                                    <input name="featured" id="featured" type="checkbox" value="1">
                                    <label for="featured">
                                        Featured Event
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">
                                Create Event
                            </button>
                        </div>
                    </div>
                </form>
                
                @include('layouts.errors')
            </div>
        </div>
    </div>
</div>
@endsection