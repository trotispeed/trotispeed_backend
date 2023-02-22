@include('css')
<body>
<div class="main-wrapper">

    @include('sidebar')

    <div class="page-wrapper">

        @include('nav-admin')

        <div style="margin-top:20%"></div>
        <form method="post" enctype="multipart/form-data" action="{{route("post_cin")}}">
            @csrf
            <input class="form-control" name="id" type="number" value="{{$id}}" hidden="">

            <div class="mb-3">
                <label for="message-text" class="form-label">CIN FRONT:</label>
                <input class="form-control" name="picture" type="file" required>
            </div>
            <div class="mb-3">
                <label for="message-text" class="form-label">CIN BACK:</label>
                <input class="form-control" name="cin_back" type="file" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>

        @include('footer-admin')

    </div>
</div>

@include('js')
@include('general-js')
</body>
</html>
