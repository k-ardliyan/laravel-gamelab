@extends('layouts.master')

@section('title', 'Booking Book')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="table" class="table table-striped table-responsive-sm">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Book</th>
                        <th scope="col">Return Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($issues as $issue)
                      <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{ $issue->member->first_name . ' ' . $issue->member->last_name }}</td>
                        <td>{{ $issue->book->title }}</td>
                        {{-- format dd mmm yyyy --}}
                        <td>{{ date('d M Y', strtotime($issue->return_date)) }}</td>
                        @if ($issue->is_booked == 1)
                          <td><span class="badge badge-light">Booked</span></td>
                        @else
                          <td><span class="badge badge-success">Returned</span></td>
                        @endif
                        <td><button onclick="detailIssue({{ $issue->id }})" type="button" data-toggle="modal" class="btn btn-info btn-sm">Detail</button></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>

<!-- Issue Detail Modal -->
<div class="modal fade" id="issueDetailModal" tabindex="-1" aria-labelledby="issueDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="row modal-header">
            <div class="col">
                <h5 class="modal-title" id="issueDetailModalLabel">Detail Issue</h5>
            </div>
            <div class="col">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fa fa-times" style="font-size: 16px;"></i></span>
                </button>
                <button id="editIssue" type="button" class="close" data-dismiss="modal" aria-label="Edit">
                  <span aria-hidden="true"><i class="fa fa-edit" style="font-size: 16px;"></i></span>
                </button>
                <button id="deleteIssue" type="button" class="close" data-dismiss="modal" aria-label="Delete">
                  <span aria-hidden="true"><i class="fa fa-trash" style="font-size: 16px;"></i></span>
                </button>
            </div>
        </div>
        <div class="modal-body">
            <div class="row mb-3">
                <div class="col-3 align-self-center">
                    <img id="detailBookCover" src="{{ asset('images/cover_image_dummy.jpg') }}" alt="" class="w-100">
                </div>
                <div class="col">
                    <div class="badge badge-light mb-2" id="detailIsBooked"></div>
                    <h4 class="mb-0" id="detailBookTitle"></h4>
                    <div id="detailBookAuthor"></div>
                    <div class="mt-3">Member:</div>
                    <div><i class="fa fa-user"></i>
                        <span id="detailMemberName"></span>
                    </div>
                </div>
            </div>
            <div id="containerProgress" class="d-none">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <div id="detailIssueDate"></div>
                    </div>
                    <div class="col-auto">
                        <div id="detailReturnDate"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="progress mb-2">
                            <div id="detailProgress" class="progress-bar progress-bar-striped progress-bar-animated"
                                role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                style="width: 75%">
                            </div>
                        </div>
                    </div>
                    <div class="col text-right">
                        <span id="detailDueDate"></span>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

<!-- Issue Edit Modal -->
<div class="modal fade" id="issueEditModal" tabindex="-1" aria-labelledby="issueEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="row modal-header">
            <div class="col">
                <h5 class="modal-title" id="issueEditModalLabel">Edit Issue</h5>
            </div>
            <div class="col">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fa fa-times" style="font-size: 16px;"></i></span>
                </button>
            </div>
        </div>
        <div class="modal-body">
        {{-- Content --}}
        <form action="" method="POST" enctype="multipart/form-data" id="issueEditForm">
            @csrf @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="form-row">
                        <div class="form-group col-12">
                          <label for="inputBook">Find Book &mdash; <i class="fa fa-info text-danger" data-toggle="tooltip" data-placement="top" title="Changing the book can't go back to the previous book"></i></label>
                          <select name="book_id" id="inputBook" class="form-control p-0 select-live" title="Find the books..." required>
                            {{-- cek books is booked on issues or not --}}
                            @foreach ($books as $book)
                                @if ($book->issues->where('is_booked', 1)->count() == 0)
                                    <option data-icon="fa fa-book" value="{{ $book->id }}" data-subtext="{{ $book->author }}">{{ $book->title }}</option>
                                @else
                                    <option data-icon="fa fa-book" value="{{ $book->id }}" data-subtext="{{ $book->author }}" disabled>{{ $book->title }}</option>
                                @endif
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-12">
                          <label for="inputMember">Find Member</label>
                          <select name="member_id" id="inputMember" class="form-control p-0 select-live"title="Find the members..." required>
                            @foreach ($members as $member)
                              <option data-icon="fa fa-user" value="{{ $member->id }}">{{ $member->first_name . ' ' . $member->last_name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-row w-100">
                            <div class="form-group col-md-6">
                                <label for="inputIssueDate">Issue Date</label>
                                <input type="date" class="form-control" id="inputIssueDate" name="issue_date" value="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputReturnDate">Return Date</label>
                                <input type="date" class="form-control" id="inputReturnDate" name="return_date" value="" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputDueDate">Duration</label>
                                <input type="number" class="form-control" id="inputDueDate" name="due_date" readonly required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputIsBooked">Status</label>
                                <select name="is_booked" id="inputIsBooked" class="form-control" required>
                                    <option value="0">Returned</option>
                                    <option value="1">Booked</option>
                                </select>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
            <button type="submit" class="btn btn-warning btn-block">Update Booking</button>
        </form>
        </div>
      </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script>
    $(document).ready(function() {
        $('#table').DataTable({
            pageLength: 5,
            lengthMenu: [5, 10, 20, 50, 100],
        });
        $('.select-live').selectpicker({
            style: 'btn-default',
            showTick: true,
            liveSearch: true,
            styleBase: 'form-control',
            showSubtext: true,
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $('#inputReturnDate').on('change', function() {
        var issueDate = new Date($('#inputIssueDate').val());
        var returnDate = new Date($('#inputReturnDate').val());
        var diff = returnDate.getTime() - issueDate.getTime();
        var days = Math.floor(diff / (1000 * 60 * 60 * 24));
        $('#inputDueDate').val(days);
    });

    $('#inputBook').on('change', function() {
        var bookId = $(this).val();
        $.ajax({
            url: '{{ url('/book/get-cover-image') }}'+'/'+bookId,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#previewImage').attr('src', '{{ url("/") }}'+'/storage/images/'+data);
            }
        });
    })

    var detailIssue = function(id) {
        $('#issueDetailModal').appendTo("body").modal('show');
        // Button
        $('#editIssue').attr('onclick', 'editIssue('+id+')');
        $('#deleteIssue').attr('onclick', 'deleteIssue('+id+')');
        $.ajax({
            url: '{{ url('/issue/') }}'+'/'+id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#detailBookCover').attr('src','{{ url("/") }}'+'/storage/images/'+data.book.cover_image);
                $('#detailBookTitle').text(data.book.title);
                $('#detailBookAuthor').text(data.book.author);
                $('#detailMemberName').text(data.member.first_name + ' ' + data.member.last_name);
                // booked color badge not same
                if (data.is_booked == 1) {
                    $('#detailIsBooked').text('Booked');
                    $('#detailIsBooked').removeClass('badge-success');
                    $('#detailIsBooked').addClass('badge-light');
                } else {
                    $('#detailIsBooked').text('Returned');
                    $('#detailIsBooked').removeClass('badge-light');
                    $('#detailIsBooked').addClass('badge-success');
                }
                // for progress
                if (data.is_booked == 1) {
                    $('#containerProgress').removeClass('d-none');
                    // convert issue and return date to DD mmm YYYY
                    var issueDate = new Date(data.issue_date);
                    var returnDate = new Date(data.return_date);
                    var issueDateString = issueDate.getDate() + ' ' + issueDate.toLocaleString('default', { month: 'long' }) + ' ' + issueDate.getFullYear();
                    var returnDateString = returnDate.getDate() + ' ' + returnDate.toLocaleString('default', { month: 'long' }) + ' ' + returnDate.getFullYear();
                    $('#detailIssueDate').text(issueDateString);
                    $('#detailReturnDate').text(returnDateString);
                    // calculate progress bar
                    var today = new Date();
                    var total = returnDate - issueDate;
                    var progress = (today - issueDate) / total * 100;
                    $('#detailProgress').css('width', progress+'%');
                    // calculate due date
                    var dueDate = returnDate - today;
                    var dueDateString = Math.floor(dueDate / (1000 * 60 * 60 * 24) + 1);
                    // condition 0 and < 0 for due date
                    if (dueDateString < 0) {
                        $('#detailDueDate').text('Overdue');
                        $('#detailDueDate').addClass('text-danger');
                        $('#detailProgress').addClass('bg-danger');
                    } else if (dueDateString == 0) {
                        $('#detailDueDate').text('Today');
                        $('#detailDueDate').addClass('text-warning');
                        $('#detailProgress').addClass('bg-warning');
                    } else {
                        $('#detailDueDate').text(dueDateString + ' days left');
                        $('#detailDueDate').addClass('text-success');
                        $('#detailProgress').addClass('bg-success');
                    }
                } else {
                    $('#containerProgress').addClass('d-none');
                }
            }
        });
    }

    var deleteIssue = (id) => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '{{ url('/issue/') }}'+'/'+id,
                    type: 'DELETE',
                    success: function(data) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        ).then(function() {
                            location.reload();
                        });
                    }
                });
            }
        });
    }

    var editIssue = (id) => {
        $('#issueEditModal').appendTo("body").modal('show');
        $.ajax({
            url: '{{ url('/issue/') }}'+'/'+id+'/edit',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#issueEditForm').attr('action', '{{ url('/issue') }}'+'/'+id);
                $('#inputBook').val(data.book_id);
                $('#inputBook').selectpicker('refresh');
                $('#inputBook option[value="'+data.book_id+'"]').attr('selected', 'selected');
                $('#inputBook option[selected="selected"]').removeAttr('disabled');
                $('#inputMember').val(data.member_id);
                $('#inputMember').selectpicker('refresh');
                $('#inputIssueDate').val(data.issue_date);
                $('#inputReturnDate').val(data.return_date);
                $('#inputDueDate').val(data.due_date);
                $('#inputIsBooked').val(data.is_booked);
            }
        });
    }

    $('#issueEditForm').on('submit', function(e) {
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
                Swal.fire(
                    'Updated!',
                    'Your file has been updated.',
                    'success'
                ).then(function() {
                    location.reload();
                });
            }
        });
    })
</script>

@endpush
