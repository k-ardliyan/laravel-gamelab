@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css">
@endsection

@section('title', 'Books')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="table" class="table table-striped table-responsive-sm">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Condition</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($books as $book)
                      <tr>
                        <th scope="row" class="align-middle">{{ $loop->iteration }}</th>
                        <td><img src="{{ asset('storage/images/'.$book->cover_image) }}" alt="{{ $book->title }}" style="max-width: 100px;"></td>
                        <td class="align-middle">{{ $book->title }}</td>
                        <td class="align-middle">{{ $book->author }}</td>
                        <td class="align-middle">{{ $book->isbn }}</td>
                        <td class="align-middle">
                            @if ($book->condition == 'New')
                                <span class="badge badge-primary">{{ $book->condition }}</span>
                            @else
                                <span class="badge badge-light">{{ $book->condition }}</span>
                            @endif
                        </td>
                        <td class="align-middle">
                            <button onclick="editBook({{ $book->id }})" type="button" data-toggle="modal" class="btn btn-warning btn-sm">Edit</button>
                            <button onclick="deleteBook({{ $book->id }})" type="button" data-toggle="modal" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>

  <!-- Member Edit Modal -->
  <div class="modal fade" id="bookEditModal" tabindex="-1" aria-labelledby="bookEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="row modal-header">
            <div class="col">
                <h5 class="modal-title" id="bookEditModalLabel">Edit Member</h5>
            </div>
            <div class="col">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fa fa-times" style="font-size: 16px;"></i></span>
                </button>
            </div>
        </div>
        <div class="modal-body">
            <form action="" method="POST" id="bookEditForm" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="row">
                    <div class="col-md-4 form-group">
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
                                  <input type="radio" id="customRadio1" name="condition" class="custom-control-input" value="New">
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
                <button type="submit" class="btn btn-warning btn-block">Update Book</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100],
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        // previewImage == browse file

        $('#inputCoverImage').on('change', function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#previewImage').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        });

        var editBook = (id) => {
            $('#bookEditModal').appendTo("body").modal('show');
            $.ajax({
                url: "{{ url('/') }}/book/" + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    $('#bookEditForm').attr('action', "{{ url('/') }}/book/" + id);
                    if (data.condition == 'New') {
                        $('#customRadio1').prop('checked', true);
                    } else {
                        $('#customRadio2').prop('checked', true);
                    }
                    $('#inputTitle').val(data.title);
                    $('#inputAuthor').val(data.author);
                    $('#inputIsbn').val(data.isbn);
                    $('#previewImage').attr('src', "{{ asset('storage/images/') }}/" + data.cover_image);
                    $('#inputCoverImage').val(data.cover_image);
                }
            });
        }

        $('#bookEditForm').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var formData = new FormData(form[0]);
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Book has been updated.',
                        type: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            $('#bookEditModal').modal('hide');
                            location.reload();
                        }
                    });
                }
            });
        });

        var deleteBook = (id) => {
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{ url('/') }}/book/" + id,
                        type: "DELETE",
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Book has been deleted.',
                                type: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.value) {
                                    location.reload();
                                }
                            });
                        }
                    });
                }
            });
        }
    </script>
@endpush
