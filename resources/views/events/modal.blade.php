<!-- Event Modal -->
<div class="modal fade" id="event-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="d-flex justify-content-center align-items-center bg-primary pt-1 pb-1">
                <i class="now-ui-icons ui-1_calendar-60 mr-2 text-white"></i>
                <p class="category text-white mb-0" id="commencing"></p>
            </div>
            <div class="modal-body">
                <div class="info text-center">
                    <h4 class="title mt-0" id="title"></h4>
                    <p class="category text-primary" id="category"></p>
                    <p id="description"></p>
                </div>
                <div class="container-fluid">
                    <div class="row mt-4">
                        <div class="col-12 col-sm-4 d-flex flex-column align-items-center">
                            <i class="now-ui-icons users_single-02 text-primary"></i>
                            <span class="text-primary">Event Organiser</span>
                            <span id="organiserName"></span>
                            <span id="organiserTel"></span>
                            <span id="organiserEmail"></span>
                        </div>
                        <div class="col-12 col-sm-4 d-flex flex-column align-items-center mt-3 mt-sm-0">
                            <i class="now-ui-icons location_pin text-primary"></i>
                            <span class="text-primary">Venue</span>
                            <span id="venue"></span>
                        </div>
                        <div class="col-12 col-sm-4 d-flex flex-column align-items-center mt-3 mt-sm-0">
                            <i class="now-ui-icons ui-1_simple-add text-primary"></i>
                            <span class="text-primary">Linked Event</span>
                            <span id="linkedEvent"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center flex-column">
                @if(auth()->check())
                <div class="likes" rel="tooltip" title="Register your interest, give the event a like" data-placement="top" data-dismiss="modal">
                    <button class="btn btn-primary btn-round btn-simple btn-lg" id="likeEvent">
                        <i class="now-ui-icons ui-2_like"></i> Like
                    </button>   
                </div>
                @else
                <div class="likes" rel="tooltip" title="You must be logged in to like an event" data-placement="top">
                    <button class="btn btn-primary btn-round btn-simple btn-lg" disabled>
                        <i class="now-ui-icons ui-2_like"></i> Like
                    </button>   
                </div>
                @endif
                <div class="info text-center mt-2">
                    <span class="text-muted d-block mt-2"><span id="likeCounter"></span> Likes</span>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var token = '{{ Session::token() }}';
    var urlLike = '{{ route('like') }}';
</script>
<!-- Event Modal End -->