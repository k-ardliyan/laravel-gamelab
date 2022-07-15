@extends('layouts.master')

@section('title', 'Add Booking')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('issues.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-2 form-group">
                            <label for="">Preview Cover</label>
                            <br>
                            <img src="{{ asset('images/cover_image_dummy.jpg') }}" alt id="previewImage" style="max-width: 100%; border: 1px solid #6777ef; padding: 8px; border-radius: 8px;">
                        </div>
                        <div class="col">
                            <div class="form-row">
                                <div class="form-group col-12">
                                  <label for="inputBook">Find Book</label>
                                  <select name="book_id" id="inputBook" class="form-control p-0" title="Find the books...">
                                    {{-- cek books is booked on issues or not --}}
                                    @foreach ($books as $book)
                                    <option data-icon="fa fa-book" value="{{ $book->id }}" data-subtext="{{ $book->author }}">{{ $book->title }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="form-group col-12">
                                  <label for="inputMember">Find Member</label>
                                  <select name="member_id" id="inputMember" class="form-control p-0"title="Find the members...">
                                    @foreach ($members as $member)
                                      <option data-icon="fa fa-user" value="{{ $member->id }}">{{ $member->first_name . ' ' . $member->last_name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="form-row w-100">
                                    <div class="form-group col-md-4">
                                        <label for="inputIssueDate">Issue Date</label>
                                        <input type="date" class="form-control" id="inputIssueDate" name="issue_date" value="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputReturnDate">Return Date</label>
                                        <input type="date" class="form-control" id="inputReturnDate" name="return_date" value="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputDueDate">Due Date</label>
                                        <input type="number" class="form-control" id="inputDueDate" name="due_date" readonly>
                                        <input type="hidden" name="is_booked" value="1">
                                    </div>
                                </div>
                              </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Add Booking</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script>
    $(document).ready(function() {
        $('select').selectpicker({
            style: 'btn-default',
            showTick: true,
            liveSearch: true,
            styleBase: 'form-control',
            showSubtext: true,
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
</script>
@endpush
