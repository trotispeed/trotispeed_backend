@include('css')
<body>
<div class="main-wrapper">

    @include('sidebar')

    <div class="page-wrapper">

        @include('nav-admin')
        <div class="page-content">

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Reservations</h6>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Scooter</th>
                                        <th>Timeout</th>
                                        <th>Client</th>
                                        <th>Start date</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($reservation as $res)
                                        <tr>
                                            <td>{{$res->id}}</td>
                                            <td>{{$res->scooter->model}}</td>
                                            <td>
                                                <div class="progress">
                                                    <div
                                                        class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                                        role="progressbar" style="width: {{100 - $res->percentage}}%" aria-valuenow="25"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>{{$res->user->name}}</td>
                                            <td>{{$res->updated_at}}</td>
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
