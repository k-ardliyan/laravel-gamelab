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
                      <tr>
                        <th scope="row">1</th>
                        <td>Ka</td>
                        <td>081904898065</td>
                        <td>k.ardliyan@gmail.com</td>
                        <td><button onclick="detailMember()" type="button" data-toggle="modal" class="btn btn-info btn-sm">Detail</button></td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="row modal-header">
            <div class="col">
                <h5 class="modal-title" id="memberModalLabel">Detail Member</h5>
            </div>
            <div class="col">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fa fa-times" style="font-size: 16px;"></i></span>
                </button>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fa fa-edit" style="font-size: 16px;"></i></span>
                </button>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fa fa-trash" style="font-size: 16px;"></i></span>
                </button>
            </div>
        </div>
        <div class="modal-body">
          <div class="row mb-3">
            <div class="col-auto"><i class="fa fa-user"></i></div>
            <div class="col">Kholifatul Ardliyan</div>
          </div>
          <div class="row mb-3">
            <div class="col-auto"><i class="fa fa-phone"></i></div>
            <div class="col">081904898065</div>
          </div>
          <div class="row mb-3">
            <div class="col-auto"><i class="fa fa-at"></i></div>
            <div class="col">k.ardliyan@gmail.com</div>
          </div>
          <div class="row mb-3">
            <div class="col-auto"><i class="fa fa-at"></i></div>
            <div class="col">k.ardliyan@gmail.com</div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            pageLength: 5,
            lengthMenu: [5, 10, 25, 50, 75, 100],
        });
    });
    var detailMember = function() {
        $('#memberModal').appendTo("body").modal('show');
    }
</script>
@endpush
