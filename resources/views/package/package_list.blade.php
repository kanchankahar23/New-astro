@extends('master.master') @section('title', 'User List') @section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Package List</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <div id="example_wrapper">
                                    <form action="#" method="Post">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Search for price.." class="form-control">
                                            </div>

                                            <div class="col-sm-12 col-md-6">
                                                <a href="{{ url('package-create') }}" class="btn btn-primary btn-block" type="submit">Add New</a>
                                            </div>
                                            <div class="col-sm-12 col-md-6"></div>
                                        </div>
                                    </form>
                                    <div class="row mt-3">
                                        <div class="col-xl-12">
                                            <table id="example1"
                                                class="display expandable-table dataTable no-footer table-responsive table-striped table-hover"
                                                style="width: 100%" role="grid">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="select-checkbox sorting_disabled" rowspan="1"colspan="1" aria-label="Quote#"
                                                            style="width: 71px;">S.No</th>
                                                        <th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending"
                                                            aria-label="Product: activate to sort column descending" style="width: 81px;">Parice</th>
                                                        <th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                                            aria-label="Business type: activate to sort column ascending" style="width: 133px;">
                                                        </th>
                                                        <th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                                            aria-label="Business type: activate to sort column ascending" style="width: 133px;">Bonus</th>
                                                        <th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Policy holder: activate to sort column ascending"
                                                            style="width: 126px;">GST</th>
                                                        <th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                                            aria-label="Status: activate to sort column ascending" style="width: 69px;">Total</th>
                                                        <th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Updated at: activate to sort column ascending"
                                                            style="width: 110px;">Date</th>
                                                        <th class="" rowspan="1" colspan="1" aria-label="" style="width: 7px;">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($packages as $key => $package)
                                                        <tr>
                                                            <td class="py-1">{{ ++$key }}.</td>
                                                            <td class="py-1" colspan="2"> {{ number_format($package->price) ?? '-' }} </td>
                                                            <td>{{ $package['extra'] ?? '' }}</td>
                                                            <td>{{ $package['gst'] ?? '' }}</td>

                                                            <td class="text-center">
                                                                <label class="badge badge-success">
                                                                {{ number_format($package['total'] ?? '--/--') }}</label>
                                                            </td>
                                                            <td> {{ $package->created_at->format('d M, Y') }}</td>
                                                            <td class="d-flex">
                                                                <a style="height: 40px;" class="btn btn-primary" href="{{ url('edit-package', $package->id) }}">Edit</a> &nbsp;
                                                                <a style="height: 40px;" class="btn btn-danger" href="{{ url('delete-package', $package->id) }}">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-7"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function filterTable() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("searchInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("example1");
      tr = table.getElementsByTagName("tr");
      for (i = 1; i < tr.length; i++) { // Start from 1 to skip the header row
        tr[i].style.display = "none"; // Hide all rows initially
        td = tr[i].getElementsByTagName("td");
        for (var j = 0; j < td.length; j++) {
          if (td[j]) {
            txtValue = td[j].textContent || td[j].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = ""; // Show row if any cell matches the filter
              break; // No need to check other cells in the row
            }
          }
        }
      }
    }
</script>

@endsection
