<div class="sidebar" data-color="orange">
    <div class="logo">
        <a href="/" class="simple-text logo-normal">
            Aston Events
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li>
                <a href="/dashboard">
                    <i class="now-ui-icons design_app"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            @if(auth()->user()->isOrganiser())
            <li>
                <a href="/dashboard/events/create">
                    <i class="now-ui-icons ui-1_simple-add"></i>
                    <p>New Event</p>
                </a>
            </li>
            <li>
                <a href="/dashboard/media">
                    <i class="now-ui-icons media-1_album"></i>
                    <p>Media</p>
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>