@extends('master.master')
@section('title', 'Whatsapp Response')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Response</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <div id="example_wrapper">
                                        <form action="#" method="Post">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <input type="text" id="searchInput" onkeyup="filterTable()"
                                                        placeholder="Search by mobile numner.." class="form-control">
                                                </div>

                                                <div class="col-sm-12 col-md-6">
                                                    <a href="{{ url('whatsapp-message') }}"
                                                        class="btn btn-primary btn-block" type="submit">Back</a>
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
                                                            <th class="select-checkbox sorting_disabled"
                                                                rowspan="1"colspan="1" aria-label="Quote#"
                                                                style="width: 71px;">S.No</th>
                                                            <th class="" tabindex="0" aria-controls="example"
                                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                                aria-label="Product: activate to sort column descending"
                                                                style="width: 81px;">Mobile</th>
                                                            <th class="" tabindex="0" aria-controls="example"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Business type: activate to sort column ascending"
                                                                style="width: 133px;">
                                                            </th>
                                                            <th class="" tabindex="0" aria-controls="example"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Business type: activate to sort column ascending"
                                                                style="width: 133px;">Status Code</th>
                                                            <th class="" tabindex="0" aria-controls="example"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Policy holder: activate to sort column ascending"
                                                                style="width: 126px;">Status </th>
                                                            <th class="" tabindex="0" aria-controls="example"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Status: activate to sort column ascending"
                                                                style="width: 69px;">Response</th>
                                                            <th class="" tabindex="0" aria-controls="example"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Updated at: activate to sort column ascending"
                                                                style="width: 110px;">Date</th>

                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach ($responses as $key => $response)
                                                            @php
                                                                $responseData = is_array($response['response_body'])
                                                                    ? $response['response_body']
                                                                    : json_decode($response['response_body'], true);
                                                                $isSuccess =
                                                                    isset($responseData['success']) &&
                                                                    $responseData['success'] === 'true';
                                                            @endphp
                                                            <tr>
                                                                <td class="py-1">{{ ++$key }}.</td>
                                                                <td class="py-1" colspan="2">
                                                                    {{ $response->contact->name ?? $response['number'] }}
                                                                </td>
                                                                <td>{{ $response['status_code'] }}</td>
                                                                <td>{{ $responseData['success'] ?? 'N/A' }}</td>
                                                                <td class="text-center">
                                                                    @if ($isSuccess)
                                                                        <label class="badge badge-success">
                                                                            <span style='font-size:18px;'>&#10004;</span>
                                                                        </label>
                                                                    @else
                                                                        <label class="badge badge-danger">
                                                                            <span style='font-size:18px;'>&#9747;</span>
                                                                        </label>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $response->created_at->format('d M, Y') }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            {{ $responses->links() }}
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
