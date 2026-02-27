@extends('master.master')
@section('title', 'Rejected-Candidate')
@section('content')
<style>
    .note {
        text-align: center;
        height: 80px;
        background: -webkit-linear-gradient(left, #0072ff, #8811c5);
        color: #fff;
        font-weight: bold;
        line-height: 80px;
    }

    .form-content {
        padding: 2%;
        border: 1px solid #ced4da;
        margin-bottom: 2%;
    }

    .checkbox-list {
        height: 30px;
        overflow-y: auto;
        border: 1px solid #ccc;
        padding: 10px;
        width: 100%;
        border-radius: 5px;
        background-color: #f9f9f9;
        font-size: 18px;
    }

    .checkbox-label {
        display: flex;
        align-items: center;
        font-size: 15px !important;
        padding: 8px 0;
    }

    .checkbox-label input[type="checkbox"] {
        width: 25px;
        height: 25px;
        margin-right: 10px;
    }
</style>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Candidate List</p>
                    @if (session('success'))
                    <div class="m-3  alert alert-success alert-dismissible fade show"
                        id="alert-success" role="alert">
                        <span class="alert-text text-black">
                            {{ session('success') }}</span>
                        <button type="button" class="btn-close"
                            data-dismiss="alert" aria-label="Close"
                            style="font-size: small;font-weight: 600;border: none;float: right;">
                            x
                        </button>
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="m-3  alert alert-danger alert-dismissible fade show"
                        id="alert-success" role="alert">
                        <span class="alert-text text-black">
                            {{ session('success') }}</span>
                        <button type="button" class="btn-close"
                            data-dismiss="alert" aria-label="Close"
                            style="float: right;">
                            x
                        </button>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <div id="example_wrapper">
                                    <form action="#" method="Post"
                                        name="filter">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <input type="text"
                                                    id="searchInput"
                                                    onkeyup="filterTable()"
                                                    placeholder="Search by mobile numner.."
                                                    class="form-control">
                                            </div>

                                            <div class="col-sm-12 col-md-6">
                                                <a href="{{ url('whatsapp-message') }}"
                                                    class="btn btn-primary btn-block"
                                                    type="submit">List of Sent
                                                    Messages</a>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                            </div>
                                        </div>
                                    </form>
                                    <form
                                        action="{{ url('rejected-candidate-message') }}"
                                        method="Post" name="message">@csrf
                                        <div class="">
                                            <div class="col-xl-12">
                                                <div class="row">
                                                    <div class=" col-md-6">
                                                       <div>
                                                            <label class="checkbox-label">
                                                                <input type="checkbox" id="select-all">
                                                                <strong>Select
                                                                    All</strong>
                                                            </label>  </div>
                                                    </div>
                                                    <div class=" col-md-6" style="float: right;">
                                                        <center><button class="btn btn-primary" type="submit">Send
                                                                Message</button>
                                                        </center>
                                                    </div>
                                                </div>

                                                <div
                                                    style="overflow-x: auto; overflow-y: auto; height: 300px;">
                                                    <table id="example1"
                                                        class="table display expandable-table dataTable no-footer table-responsive table-striped table-hover"
                                                        style="width: 100%; display: table !important;"
                                                        role="grid">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="select-checkbox sorting_disabled"
                                                                    rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Quote#"
                                                                    style="width: 10px;">
                                                                    S.No</th>

                                                                <th class=""
                                                                    tabindex="0"
                                                                    aria-controls="example"
                                                                    rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Policy holder: activate to sort column ascending"
                                                                    style="width: 300px;">
                                                                    Name </th>
                                                                <th class=""
                                                                    tabindex="0"
                                                                    aria-controls="example"
                                                                    rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Status: activate to sort column ascending"
                                                                    style="width: 60px;">
                                                                    Mobile No
                                                                </th>
                                                                {{-- <th
                                                                    class=""
                                                                    tabindex="0"
                                                                    aria-controls="example"
                                                                    rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Updated at: activate to sort column ascending"
                                                                    style="width: 10px;">
                                                                    Response
                                                                </th> --}}

                                                            </tr>
                                                        </thead>
                                                        @isset($pagination)
                                                        @php
                                                        $perPage =
                                                        request()->get('per_page',
                                                        25);
                                                        $currentPage =
                                                        $pagination['current_page'];
                                                        $start = ($currentPage -
                                                        1) * $perPage;
                                                        @endphp
                                                        @endisset
                                                        <tbody>
                                                            @foreach($candidates as $index => $candidatess)
                                                            <tr
                                                                class="checkbox-list">
                                                                <td>{{ $start +
                                                                    $index + 1
                                                                    }}</td>
                                                                <td>
                                                                    <label
                                                                        class="checkbox-label">
                                                                        <input
                                                                            type="checkbox"
                                                                            name="whatsappNumbers[]"
                                                                            value="{{ $candidatess['get_smscandidate']['mobile'] ?? '-' }}|{{ $candidatess['get_smscandidate']['name'] ?? '-' }}|{{ $candidatess['id'] }}">
                                                                        {{
                                                                        $candidatess['get_smscandidate']['name']
                                                                        ?? '-'
                                                                        }}
                                                                        ({{
                                                                        $candidatess['get_smscandidate']['mobile']
                                                                        ?? '-'
                                                                        }})
                                                                    </label>

                                                                </td>

                                                                <td>{{
                                                                    $candidatess['get_smscandidate']['mobile']
                                                                    ?? '-' }}
                                                                </td>

                                                                {{-- <td
                                                                    class="text-center">
                                                                    @if($resultStatus
                                                                    == 'Yes')
                                                                    <label
                                                                        class="badge badge-success">
                                                                        <span
                                                                            style='font-size:18px;'>{{
                                                                            $resultStatus
                                                                            ??
                                                                            '-'
                                                                            }}</span>
                                                                    </label>
                                                                    @else
                                                                    <label
                                                                        class="badge badge-danger">
                                                                        <span
                                                                            style='font-size:18px;'>{{
                                                                            $resultStatus
                                                                            ??
                                                                            '-'
                                                                            }}</span>
                                                                    </label>
                                                                    @endif
                                                                </td> --}}
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="pagination mt-3">
                                                @if($pagination['prev_page_url'])
                                                <a href="{{ url()->current() }}?page={{ $pagination['current_page'] - 1 }}"
                                                    class="btn btn-primary">Previous</a>
                                                @endif

                                                <span class="mx-2">Page {{
                                                    $pagination['current_page']
                                                    }} of
                                                    {{ $pagination['last_page']
                                                    }}</span>

                                                @if ($pagination['current_page']
                                                < $pagination['last_page']) <a
                                                    href="{{ url()->current() }}?page={{ $pagination['current_page'] + 1 }}"
                                                    class="btn btn-primary">
                                                    Next</a>
                                                    @endif

                                            </div>
                                        </div>

                                    </form>
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

<script>
    document.getElementById("select-all").addEventListener("change", function() {
            let checkboxes = document.querySelectorAll('input[name="whatsappNumbers[]"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
</script>



@endsection
