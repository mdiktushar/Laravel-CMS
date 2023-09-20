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
                                        <th scope="col">Attach</th>
                                        <th scope="col">Detach</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="" id=""
                                                    @foreach ($role->permissions as $role_permission)
                                                        @if ($role_permission->slug == $permission->slug)
                                                            checked
                                                        @endif
                                                    @endforeach
                                                >
                                            </td>
                                            <td>{{$permission->id}}</td>
                                            <td>{{$permission->name}}</td>
                                            <td>{{$permission->slug}}</td>
                                            <td>
                                                <form method="POST" action={{route('role.permisssion.attach', $role)}}>
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="permission" value={{$permission->id}}>

                                                    <button 
                                                        type="submit" 
                                                        class="btn btn-primary"
                                                        @if ($role->permissions->contains($permission))
                                                                disabled
                                                        @endif
                                                        >Attach</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form method="POST" action={{route('role.permisssion.detach', $role)}}>
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="permission" value={{$permission->id}}>

                                                    <button 
                                                        type="submit" 
                                                        class="btn btn-danger"
                                                        @if (!$role->permissions->contains($permission))
                                                                disabled
                                                        @endif
                                                        >Detach</button>
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
                                        <th scope="col">Attach</th>
                                        <th scope="col">Detach</th>
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