@include('css')
<body>
<div class="main-wrapper">

    @include('sidebar')

    <div class="page-wrapper">

        @include('nav-admin')
        <div class="page-content">
            <div class="container">
                <form method="post" enctype="multipart/form-data" action="{{route("update_scooter")}}">
                    @csrf
                    <input type="number" readonly value="{{$scooter->id}}" name="id" hidden>
{{--                    <div class="mb-3">--}}
{{--                        <label for="recipient-name" class="form-label">Model:</label>--}}
{{--                        <input type="text" class="form-control" name="model" required value="{{$scooter->model}}">--}}
{{--                    </div>--}}
                    <div class="mb-3">
                        <label for="message-text" class="form-label">Battery:</label>
                        <input class="form-control" name="battery" type="number" value="{{$scooter->battery}}">
                    </div>
{{--                    <div class="mb-3">--}}
{{--                        <label for="message-text" class="form-label">Weight:</label>--}}
{{--                        <input class="form-control" name="wieght" type="number" value="{{$scooter->weight}} ">--}}
{{--                    </div>--}}
{{--                    <div class="mb-3">--}}
{{--                        <label for="message-text" class="form-label">Max Weight:</label>--}}
{{--                        <input class="form-control" name="max_wieght" type="number" value="{{$scooter->max_weight}} ">--}}
{{--                    </div>--}}
                    <div class="mb-3">
                        <label for="message-text" class="form-label">Max Speed:</label>
                        <input class="form-control" name="max_speed" type="number" value="{{$scooter->max_speed}}">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="form-label">Range (Km):</label>
                        <input class="form-control" name="range" type="number" value="{{$scooter->range}}">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="form-label">Base Price:</label>
                        <input class="form-control" name="base_price" type="number" required
                               value="{{$scooter->base_price}}">
                    </div>

                    <div class="mb-3">
                        <label for="message-text" class="form-label">Picture:</label>
                        <input class="form-control" name="picture" type="file">
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>

        @include('footer-admin')

    </div>
</div>

@include('js')
@include('general-js')
</body>
</html>
