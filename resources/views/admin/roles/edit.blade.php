<x-admin-master>
    @section('content')
    <div class="row">
        <div class="col-sm-6">
            <form method="post" action={{route('roles.update', $role)}}>
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="roleInput">Edit Role: {{$role->name}}</label>
                    <input type="text" name="name" value={{$role->name}} class="form-control @error('name') is-invalid @enderror " id="roleInput">
                        <div>
                            @error('name')
                                <span><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    <button type="submit" class="btn btn-primary mt-2">Update</button>
                </div>
            </form>
        </div>

        <div class="col-sm-9">
            @if ($permissions->isNotEmpty())
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">Option</th>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td>{{$permission->id}}</td>
                                            <td>{{$permission->name}}</td>
                                            <td>{{$permission->slug}}</td>
                                            <td>
                                                <form action='' method="post">
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
                                        <th scope="col">Option</th>
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
            @endif
        </div>
    </div>
    @endsection
</x-admin-master>