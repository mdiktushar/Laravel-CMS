<x-admin-master>
    @section('content')
        <h1>Create</h1>

        <form method="post" action={{route('post.store')}} enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="inputEmail4">
            </div>

            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">File</label>
                <input type="file" name="post_image" class="form-control-file">
            </div>


            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
            </div>

            <div class="col-12 mt-2">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </form>
    @endsection
</x-admin-master>
