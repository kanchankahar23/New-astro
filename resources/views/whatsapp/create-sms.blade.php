@extends('master.master')
@section('title', 'Create SMS')
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
            font-size: 20px !important;
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
                        <h4 class="card-title">Aisensy Message Box </h4>
                    </div>
                </div>
            </div>
        </div>
        <form>
            <div class="form-content">

                <div class="col-md-12">
                    <div class="form-group">
                        <div class="form-group">
                            <div
                                style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; margin-left:10px;">
                                <div>
                                    <label class="checkbox-label">
                                        <input type="checkbox" id="select-all"> <strong>Select All</strong>
                                    </label>
                                </div>
                                <div>
                                    <select class="form-control" name="campaign" style="min-width: 200px;" id="campaign">
                                        <option value="">Select</option>
                                        <option value="astrobuddy_information">Astrobuddy Information</option>
                                        <option value="reminder_for_user_astrologer">Reminder user/astrologer</option>
                                        <option value="happy_birthday">Birthday</option>
                                        <option value="happy_new_year">New Year</option>
                                        <option value="happy diwali">Diwali</option>
                                        <option value="dushahra">Dushahra</option>
                                    </select>
                                </div>
                            </div>

                            <div class="checkbox-list">
                                {{-- @foreach ($contacts as $contact)
                                    <label class="checkbox-label" style="display: block;">
                                        <input type="checkbox" name="whatsappNumbers[]" value="{{ $contact->phone }}">
                                        {{ $contact->name }} ({{ $contact->phone }})
                                    </label>
                                @endforeach --}}
                                @foreach ($contacts as $contact)
                                    <label class="checkbox-label" style="display: block;">
                                        <input type="checkbox" name="whatsappNumbers[]"
                                            value="{{ $contact->phone }}|{{ $contact->name }}">
                                        {{ $contact->name }} ({{ $contact->phone }})
                                    </label>
                                @endforeach
                            </div>
                        </div>


                    </div>
                </div>

            </div>

            <button class="btn btn-primary" onclick="sendWhatsAppMessages()">Send Message</button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                Add New Contact
            </button>
            <a href="{{ url('whatsapp-response-list') }}" class="btn btn-primary">
                Show Response</a>
        </form>

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Conatct</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <form action="{{ url('add-contact') }}" method="POST">@csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input name="name" type="text" placeholder="Enter contact name"
                                        class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <input name="contact" type="text" class="form-control"
                                        placeholder="Enter contact number">
                                </div>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("select-all").addEventListener("change", function() {
            let checkboxes = document.querySelectorAll('input[name="whatsappNumbers[]"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    </script>
    <script>
        function sendWhatsAppMessages() {
            let selectedNumbers = [];

            document.querySelectorAll('input[name="whatsappNumbers[]"]:checked').forEach((checkbox) => {
                selectedNumbers.push(checkbox.value);
            });

            if (selectedNumbers.length === 0) {
                alert("Please select at least one number.");
                return;
            }
            let campaign = document.querySelector('select[name="campaign"]').value;
            fetch('/send-message', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        whatsappNumbers: selectedNumbers,
                        campaign: campaign
                    })
                })
                .then(response => response.json())
                .then(data => {
                    alert("Messages sent successfully!");
                    console.log(data);
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        }
    </script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>
@endsection
