@include('css')
<body>
<div class="main-wrapper">

    @include('sidebar')

    <div class="page-wrapper">

        @include('nav-admin')
        <div class="page-content">

            <div class="d-flex flex-row-reverse">
                <button type="button" class="btn btn-success" style="margin: 0 2rem 1rem 0">
                    Add new User
                    <i style="width: 0.8rem" data-feather="user-plus" ></i>
                </button>
            </div>
            <div class="row">


                <div class="col-md-12 grid-margin stretch-card">


                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Users</h6>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>User name</th>
                                        <th>email</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <th>{{$user->id}}</th>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary">Edit</button>
                                                <button type="button" class="btn btn-danger"> <i style="width: 0.8rem;" data-feather="trash-2"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @include('footer-admin')

    </div>
</div>

@include('js')
@include('general-js')
</body>
</html>
