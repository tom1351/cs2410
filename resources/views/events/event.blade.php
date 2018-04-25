<div class="col-12 col-md-6 col-lg-4">
    <div class="event-card bg-white img-raised pb-4">
        @if($event->featured == true)
        <div class="ribbon-wrapper">
            <div class="ribbon bg-primary">
                <h6 class="mb-0 text-white">Featured</h6>
            </div>
        </div>
        @endif
        <img src="{{ $event->getEventThumbnailUri() }}" alt="Event Card" class="img-fluid">
        <div class="d-flex justify-content-center align-items-center bg-primary pt-1 pb-1">
            <i class="now-ui-icons ui-1_calendar-60 mr-2 text-white"></i>
            <p class="category text-white mb-0">{{ $event->getHumanDateTime()}}</p>
        </div>
        <div class="info text-center pl-4 pr-4">
            <h4 class="title">{{ $event->title }}</h4>
            <p class="category text-primary">{{ $event->category }}</p>
            <p class="description">{{ $event->description }}</p>
            <button class="btn btn-primary btn-round modal-toggle" data-toggle="modal" data-target="#event-modal" data-id="{{ $event->id }}">More info</button>
        </div>
        @if(auth()->check() && auth()->user()->isOrganiser())
        <div class="admin-actions d-flex flex-row justify-content-center mt-2">
            <form method="POST" action="/events/{{ $event->id }}">
                {{method_field('DELETE')}}
                @csrf
                <button type="submit" class="btn btn-danger btn-round">Delete</button>
            </form>
            <a href="/dashboard/events/{{ $event->id }}/edit" class="btn btn-primary btn-round btn-simple">Edit</a>
        </div>
        @endif
    </div>
</div>