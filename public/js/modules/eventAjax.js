$(document).ready(function(){
    var eventModal = $('#event-modal');
    var eventId;
    $('.modal-toggle').on('click', function(){
        eventId = $(this).data('id');
        $.ajax({
            type: "GET",
            url: '/events/'+$(this).data('id'),
            dataType: 'json',
            success: function(data){
                $("#commencing").text(data.commencing);
                $("#title").text(data.title);
                $("#category").text(data.category);
                $("#description").text(data.description);
                $("#organiserName").text(data.author);
                $("#organiserTel").text(data.author_tel);
                $("#organiserEmail").text(data.author_email);
                $("#venue").text(data.venue);
                $("#linkedEvent").text(data.linkedEvent);
                $("#likeCounter").text(data.likeCount);
            }
        });
    });
    $('#likeEvent').on('click', function(event){
        event.preventDefault();
        $('button#likeEvent').attr("disabled", true);
        $.ajax({
            method: 'POST',
            url: urlLike,
            data: {eventId: eventId, _token: token},
            success: function(){
                $('button#likeEvent').attr("disabled", false);
            }
        })
    });
});