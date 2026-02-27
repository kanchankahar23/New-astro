@extends('master.master')
@section('title', 'Enquiry List')
@section('content')
    <style>
        .note {
            text-align: center;
            height: 80px;
            {{--  background: -webkit-linear-gradient(left, #0072ff, #8811c5);  --}}
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
            height: 250px;
            overflow-y: auto;
            border: 1px solid #ccc;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            background-color: #f9f9f9;
            font-size: 22px;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            font-size: 18px !important;
            padding: 8px 0;
        }

        .checkbox-label input[type="checkbox"] {
            width: 25px;
            height: 25px;
            margin-right: 10px;
        }
    </style>

    <style>
        :root {
            /* --body-bg: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); */
            --msger-bg: #fff;
            --border: 2px solid #ddd;
            --left-msg-bg: #ececec;
            --right-msg-bg: #f3deee;
        }

        html {
            box-sizing: border-box;
        }

        *,
        *:before,
        *:after {
            margin: 0;
            padding: 0;
            box-sizing: inherit;
        }

        .msger {
            display: flex;
            flex-flow: column wrap;
            justify-content: space-between;
            width: 100%;
            max-width: 867px;
            margin: 25px 10px;
            height: calc(100% - 50px);
            border: var(--border);
            border-radius: 5px;
            background: var(--msger-bg);
            box-shadow: 0 15px 15px -5px rgba(0, 0, 0, 0.2);
        }

        .msg {
            display: flex;
            align-items: flex-end;
            margin-bottom: 10px;
        }

        .msg:last-of-type {
            margin: 0;
        }

        .msg-img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
            background: #ddd;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-radius: 50%;
        }

        .msg-bubble {
            max-width: 450px;
            width: 84%;
            padding: 15px;
            border-radius: 15px;
            background: var(--left-msg-bg);
        }

        .msg-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .msg-info-name {
            margin-right: 10px;
            font-weight: bold;
            color: #000;
        }

        .msg-info-time {
            font-size: 0.85em;
            color: #000;
        }

        .left-msg .msg-bubble {
            border-bottom-left-radius: 0;
        }

        .right-msg {
            flex-direction: row-reverse;
        }

        .right-msg .msg-bubble {
            background: var(--right-msg-bg);
            color: #0c0c0c;
            border-bottom-right-radius: 0;
        }

        .right-msg .msg-img {
            margin: 0 0 0 10px;
        }

        .select2-hidden-accessible:focus {
            outline: 0 !important;
        }

        .msg-bubble {
            padding: 0px 15px !important;
            padding-top: 10px !important;
        }

        .msg-img {
            display: flex;
            align-items: center;
            border-radius: 50%;
            overflow: hidden !important;
        }

        .avatar-lg {
            font-size: .875rem;
            height: 50px !important;
            width: 100% !important;
        }

        .image-input {
            text-align: center;
            width: 140px;
            position: absolute;
            right: 24px;
            bottom: 12px;
        }

        .image-input input {
            display: none;
        }

        .image-input label {
            display: block;
            color: #FFF;
            background: #cb0c9f;
            padding: 0.3rem 0.6rem;
            font-size: 0.84rem;
            cursor: pointer;
            border-radius: 7px;
        }

        .image-input label i {
            font-size: 0.92rem;
            margin-right: 0.3rem;
        }

        .image-input label:hover i {
            animation: shake 0.35s;
        }

        .image-input img {
            max-width: 175px;
            display: none;
        }

        .image-input span {
            display: none;
            text-align: center;
            cursor: pointer;
        }

        @keyframes shake {
            0% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(10deg);
            }

            50% {
                transform: rotate(0deg);
            }

            75% {
                transform: rotate(-10deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }

        .col-sm-5 {
            flex: 0 0 auto;
            width: 46.666667%;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <div class="content-wrapper">

        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                    <span class="alert-text text-black">{{ $errors->first() }}</span>
                    <button type="button" class="close" data-dismiss="alert" style="float: right;">&times;</button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-warning alert-dismissible fade show w-100" role="alert">
                    <span class="alert-text text-black">{{ session('success') }}</span>
                    <button type="button" class="close" data-dismiss="alert" style="float: right;">&times;</button>
                </div>
            @endif
        </div>

        <div class="row ">
            <div class="mb-3 card col-xl-12 note ">
                <div class="mt-3 col-xl-4">
                    <div class="card-body ">
                        <h4 class="card-title">list of sent messages</h4>
                    </div>
                </div>
            </div>
        </div>

        <form action="#" method="Post" name="filter">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <input type="text" id="searchInput" onkeyup="filterTable()"
                        placeholder="Search by Name, Mobile numner.." class="form-control">
                </div>

                <div class="col-sm-12 col-md-6">
                    <a href="{{ url('rejected-candidate') }}" class="btn btn-primary btn-block"
                       >List of Candidate</a>
                </div>

                <div class="col-sm-12 col-md-6"></div>
            </div>
        </form>

        <div class="table-responsive mt-3">
            <table class="table table-bordered" id="example1">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($candidatesSendedSms as $index => $candidate)
                        <tr>
                            <td>{{ $candidatesSendedSms->firstItem() + $index }}</td>
                            <td>{{ $candidate->name ?? '-' }}</td>
                            <td>{{ $candidate->number ?? '-' }}</td>
                            <td>
                                <span class="badge bg-success">{{ $candidate->status ?? '-' }}</span>

                                {{-- <a href="javascript:"
                                    onclick="Remark('{{ url('sms-remark' . '?id=' . $candidate->candidate_id) }}')"
                                    class="btn btn-primary btn-sm" href="javascript:;">Remarks</a> --}}
                                <a href="javascript:void(0);"
                                    onclick="Remark('{{ url('sms-remark') }}', '{{ $candidate->candidate_id }}')"
                                    class="btn btn-primary btn-sm">Remarks</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- Pagination links --}}
            <div class="d-flex justify-content-center">
                {{ $candidatesSendedSms->links() }}
            </div>
        </div>
    </div>



    <div class="modal" id="myModal"></div>

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

        // function Remark(url, id) {
        //     $.get(url, id, function(rs) {
        //         $('#myModal').html(rs);
        //         $('#myModal').modal('show');
        //         scrollBottom()
        //     });
        // }



        function Remark(url, candidateId) {
            $.get(url + '?id=' + candidateId, function(response) {
                $('#myModal').html(response);
                $('#myModal').modal('show');

                // Set the candidate ID after modal is loaded
                setTimeout(function() {
                    $('#candidate_id').val(candidateId);
                    scrollBottom();
                }, 100); // small delay to ensure modal content is loaded
            });
        }

        function scrollBottom() {
            const container = $('#response');
            if (container.length) {
                container.scrollTop(container[0].scrollHeight);
            }
        }
    </script>

@endsection
