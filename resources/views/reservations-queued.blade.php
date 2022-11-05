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
                                        <th>#</th>
                                        <th>Scooter</th>
                                        <th>Client</th>
                                    </tr>
                                    </thead>
                                    <tbody>



                                    <tr>
                                        <td>1</td>
                                        <td>Cedric Kelly</td>
                                        <td>Adnane bensouda</td>
                                        <td>
                                            <button type="button" class="btn btn-primary">Confirm <i data-feather="book-open" style="width: 0.9rem"  ></i> </button>
                                            <button type="button" class="btn btn-warning">Cancel <i data-feather="x-circle" style="width: 0.9rem" ></i> </button>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>1</td>
                                        <td>Cedric Kelly</td>
                                        <td>Adnane bensouda</td>
                                        <td>
                                            <button type="button" class="btn btn-primary">Confirm <i data-feather="book-open" style="width: 0.9rem"  ></i> </button>
                                            <button type="button" class="btn btn-warning">Cancel <i data-feather="x-circle" style="width: 0.9rem" ></i> </button>

                                        </td>
                                    </tr>


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