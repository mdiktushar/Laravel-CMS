<x-admin-master>
    @section('content')
        <h1>User Profile for : {{ $user->name }}</h1>

        <div class="row">
            <div class="col-sm-6">
                <form method="post" action={{route('user.profile.update', $user)}} enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <img width="50px" class="img-profile rounded-circle" src={{$user->avatar}}>
                    </div>
                    <div class="form-group">    
                        <input type="file" name="avatar" id="">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value={{ $user->username }}>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value={{ $user->name }}>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value={{ $user->email }}>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Option</th>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Attach</th>
                                        <th scope="col">Detach</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="" id=""
                                                    @foreach ($user->roles as $user_role)
                                                        @if ($user_role->slug == $role->slug)
                                                            checked
                                                        @endif
                                                    @endforeach
                                                >
                                            </td>
                                            <th>{{$role->id}}</th>
                                            <td>{{$role->name}}</td>
                                            <td>{{$role->slug}}</td>
                                            <td><button class="btn btn-primary">Attach</button></td>
                                            <td><button class="btn btn-danger">Detach</button></td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Option</th>
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


            </div>
        </div>
    @endsection
</x-admin-master>
