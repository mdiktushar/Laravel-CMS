<x-admin-master>
    @section('content')
        @if (Session::has('delete-message'))
            <div class="alert alert-danger">{{ Session::get('delete-message') }}</div>
    
        @elseif (session('created'))
            <div class="alert alert-success">{{ Session::get('created') }}</div>

        @elseif (session('updated'))
            <div class="alert alert-success">{{ Session::get('updated') }}</div> 
        @endif

        <div class="row">
            <div class="col-sm-6">
                <form method="post" action={{route('roles.store')}}>
                    @csrf
                    <div class="form-group">
                        <label for="roleInput">Role</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " id="roleInput">
                            <div>
                                @error('name')
                                    <span><strong>{{$message}}</strong></span>
                                @enderror
                            </div>
                        <button type="submit" class="btn btn-primary mt-2">Create</button>
                    </div>
                </form>
            </div>


            <div class="col-sm-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{$role->id}}</td>
                                            <td><a href={{route('roles.edit', $role)}}>{{$role->name}}</a></td>
                                            <td>{{$role->slug}}</td>
                                            <td>
                                                <form action={{route('roles.destroy', $role)}} method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <Button class="btn btn-danger">Delete</Button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

    @endsection
</x-admin-master>