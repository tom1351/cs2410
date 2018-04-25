@if (count($errors))
    
    @foreach ($errors->all() as $error)

        <div class="alert alert-danger" role="alert">
                <div class="alert-icon">
                    <i class="now-ui-icons objects_support-17"></i>
                </div>
                <strong>Oops!</strong> {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </span>
                </button>
            </div>

    @endforeach

@endif