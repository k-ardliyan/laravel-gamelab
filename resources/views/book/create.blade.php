@extends('layouts.master')

@section('title', 'Add New Book')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-2 form-group">
                            <label for="">Preview Cover</label>
                            <br>
                            <img src="{{ asset('images/cover_image_dummy.jpg') }}" alt id="previewImage" style="max-width: 100%; border: 1px solid #6777ef; padding: 8px; border-radius: 8px;">
                            <div class="form-group mt-2">
                                <label for="inputCoverImage">Find Cover Image</label>
                                <input type="file" name="cover_image" id="inputCoverImage" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-row">
                                <div class="form-group col-12">
                                  <label for="inputTitle">Title</label>
                                  <input type="text" class="form-control" id="inputTitle" name="title" required placeholder="ex: Laskar Pelangi">
                                </div>
                                <div class="form-group col-12">
                                  <label for="inputAuthor">Author</label>
                                  <input type="text" class="form-control" id="inputAuthor" name="author" placeholder="ex: Andrea Hirata">
                                </div>
                                <div class="form-group col-12">
                                  <label for="inputIsbn">ISBN</label>
                                  <input type="text" class="form-control" id="inputIsbn" placeholder="ex: ISBN 817xx" name="isbn">
                                </div>
                                <div class="form-group col-12">
                                  <label for="">Condition</label>
                                  <div class="custom-control custom-radio">
                                      <input type="radio" id="customRadio1" name="condition" class="custom-control-input" value="New" checked>
                                      <label class="custom-control-label" for="customRadio1">New</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" id="customRadio2" name="condition" class="custom-control-input" value="Second">
                                      <label class="custom-control-label" for="customRadio2">Second</label>
                                    </div>
                                </div>
                              </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Add Book</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $('#inputCoverImage').on('change', function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#previewImage').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        });
    </script>
@endpush
