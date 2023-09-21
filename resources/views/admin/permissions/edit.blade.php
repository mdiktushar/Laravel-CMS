<x-admin-master>
    @section('content')
    <div class="row">
        <div class="col-sm-6">
            <form method="post" action={{route('permissions.update', $permission)}}>
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="roleInput">Edit Role: {{$permission->name}}</label>
                    <input type="text" name="name" value={{$permission->name}} class="form-control @error('name') is-invalid @enderror " id="roleInput">
                        <div>
                            @error('name')
                                <span><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    <button type="submit" class="btn btn-primary mt-2">Update</button>
                </div>
            </form>
        </div>
    </div>
    @endsection
</x-admin-master>