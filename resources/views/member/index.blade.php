@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css">
@endsection

@section('title', 'Members')

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
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($members as $member)
                      <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$member->first_name}} {{$member->last_name}}</td>
                        <td>{{$member->phone}}</td>
                        <td>{{$member->email}}</td>
                        <td><button onclick="detailMember({{ $member->id }})" type="button" data-toggle="modal" class="btn btn-info btn-sm">Detail</button></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>

  <!-- Member Detail Modal -->
  <div class="modal fade" id="memberDetailModal" tabindex="-1" aria-labelledby="memberDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="row modal-header">
            <div class="col">
                <h5 class="modal-title" id="memberDetailModalLabel">Detail Member</h5>
            </div>
            <div class="col">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fa fa-times" style="font-size: 16px;"></i></span>
                </button>
                <button id="editMember" type="button" class="close" data-dismiss="modal" aria-label="Edit">
                  <span aria-hidden="true"><i class="fa fa-edit" style="font-size: 16px;"></i></span>
                </button>
                <button id="deleteMember" type="button" class="close" data-dismiss="modal" aria-label="Delete">
                  <span aria-hidden="true"><i class="fa fa-trash" style="font-size: 16px;"></i></span>
                </button>
            </div>
        </div>
        <div class="modal-body">
          <div class="row mb-3">
            <div class="col-12">
                <h3 id="detailName"></h3>
            </div>
            <div class="col-auto"><i class="fa fa-phone mr-2"></i> <span id="detailPhone"></span></div>
            <div class="col-auto"><i class="fa fa-at mr-2"></i> <span id="detailEmail"></span></div>
          </div>
          <div class="row mb-3">
            <div class="col-auto pr-0"><i class="fa fa-location"></i></div>
            <div class="col" id="detailLocation"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Member Edit Modal -->
  <div class="modal fade" id="memberEditModal" tabindex="-1" aria-labelledby="memberEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="row modal-header">
            <div class="col">
                <h5 class="modal-title" id="memberEditModalLabel">Edit Member</h5>
            </div>
            <div class="col">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fa fa-times" style="font-size: 16px;"></i></span>
                </button>
            </div>
        </div>
        <div class="modal-body">
            <form action="" method="POST" id="memberEditForm">
                @csrf @method('PUT')

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputFirstName">First Name</label>
                    <input type="text" class="form-control" id="inputFirstName" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputLastName">Last Name</label>
                    <input type="text" class="form-control" id="inputLastName">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputPhone">Phone</label>
                    <input type="text" class="form-control" id="inputPhone" placeholder="ex: 081904xxxxxx">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" required placeholder="ex: example@gmail.com">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAddress">Address</label>
                  <input type="text" class="form-control" id="inputAddress" placeholder="Jl. Kalisombo">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPostalCode">Postal Code</label>
                    <input type="text" class="form-control" id="inputPostalCode" placeholder="ex: 50773">
                  </div>
                </div>
                <button type="submit" class="btn btn-warning btn-block">Update Member</button>
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
            lengthMenu: [5, 10, 25, 50, 75, 100],
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    var detailMember = (id) => {
        $('#memberDetailModal').appendTo("body").modal('show');
        $.ajax({
            url: "/member/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#detailName').text(data.first_name +' '+ data.last_name);
                $('#detailPhone').text(data.phone);
                $('#detailEmail').text(data.email);
                $('#detailLocation').text(data.address + ', ' + data.city + ', ' + data.postal_code);
                $('#editMember').attr('onclick', 'editMember('+data.id+')');
                $('#deleteMember').attr('onclick', 'deleteMember('+data.id+')');
            }
        });
    }

    var editMember = (id) => {
        $('#memberDetailModal').appendTo("body").modal('hide');
        $('#memberEditModal').appendTo("body").modal('show');
        $.ajax({
            url: "/member/"+id+"/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#inputFirstName').val(data.first_name);
                $('#inputLastName').val(data.last_name);
                $('#inputPhone').val(data.phone);
                $('#inputEmail').val(data.email);
                $('#inputAddress').val(data.address);
                $('#inputCity').val(data.city);
                $('#inputPostalCode').val(data.postal_code);
                $('#memberEditForm').attr('action', "{{ url('/member/') }}"+"/"+id);
            }
        });
    }

    $('#memberEditForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: "PUT",
            data: {
                first_name: $('#inputFirstName').val(),
                last_name: $('#inputLastName').val(),
                phone: $('#inputPhone').val(),
                email: $('#inputEmail').val(),
                address: $('#inputAddress').val(),
                city: $('#inputCity').val(),
                postal_code: $('#inputPostalCode').val(),
            },
            success: function(data) {
                // swal
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Member has been updated.',
                    type: 'success',
                    showConfirmButton: false,
                    timer: 1500
                });
                $('#memberEditModal').appendTo("body").modal('hide');
                $('#memberDetailModal').appendTo("body").modal('show');
                $('#detailName').text(data.first_name +' '+ data.last_name);
                $('#detailPhone').text(data.phone);
                $('#detailEmail').text(data.email);
                $('#detailLocation').text(data.address + ', ' + data.city + ', ' + data.postal_code);
                $('#editMember').attr('onclick', 'editMember('+data.id+')');
                $('#memberDetailModal').on('hidden.bs.modal', function (e) {
                    location.reload();
                })
            }
        });
    });

    var deleteMember = (id) => {
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
                    url: "/member/"+id,
                    type: "DELETE",
                    success: function(data) {
                        // swalfire then reload page
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
        })
    }
</script>
@endpush
