<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="{{route("add_scooter")}}">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="form-label">Model:</label>
                        <input type="text" class="form-control" name="model" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="form-label">Battery:</label>
                        <input class="form-control" name="battery" type="number">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="form-label">Weight (Kg):</label>
                        <input class="form-control" name="w" type="number">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="form-label">Max Weight:</label>
                        <input class="form-control" name="max_wieght" type="number">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="form-label">Max Speed:</label>
                        <input class="form-control" name="max_speed" type="number">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="form-label">Range (Km):</label>
                        <input class="form-control" name="range" type="number">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="form-label">Base Price:</label>
                        <input class="form-control" name="base_price" type="number" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="form-label">Picture:</label>
                        <input class="form-control" name="picture" type="file" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>
