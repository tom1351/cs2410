<form method="POST" action="/media/create" enctype="multipart/form-data">
    @csrf
    <div class="row d-flex align-items-center">
        <div class="col-md-6">
            <input type="file" name="file" id="file">
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">
                Upload Media
            </button>
        </div>
    </div>
</form>
                
@include('layouts.errors')