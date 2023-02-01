@extends('layout')

@section('content')

    <div class="container">
        <form action="/store" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <!-- Text input -->

            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example3">Title:</label>
                <input name="title" type="text" id="form6Example3" class="form-control" />
            </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="form6Example3">Category:</label>
                <select name="category_id" class="form-control" aria-label="Default select example">
                    <option selected value="1">IT</option>
                    <option value="2">LifeStyle</option>
                    <option value="3">Food</option>
                    <option value="4">Travel</option>
                </select>
                </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example3">Image post:</label>
                <input name="image" type="file" id="form6Example3" class="form-control" />
            </div>

            <!-- Message input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example7">Content:</label>
                <textarea name="content" class="form-control" id="summernote" rows="20"></textarea>
            </div>

            <!-- Submit button -->
            <div class="form-outline mb-4">
            <button type="submit" class="btn btn-primary btn-block mb-4">Place order</button>
            </div>
        </form>
    </div>
    <script>
        $('#summernote').summernote({
            placeholder: 'Hello Bootstrap 5',
            tabsize: 2,
            height: 100
        });
    </script>

@endsection
