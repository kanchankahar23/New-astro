@extends('master.master') @section('title', 'User Register') @section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-xl-12 grid-margin ">
            <div class="card">
                <div class="card-body">
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show"
                        role="alert">
                        <button type="button" class="close" data-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('success') }}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show"
                        role="alert">
                        <button type="button" class="close" data-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <h4 class="card-title">Upload Premium Kundli</h4>
                    <form method="POST" action="{{ url('store-premium-kundli') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group d-flex">
                            <!-- File Input -->
                            <input type="file" name="file" class="file-upload-default"
                                id="kundli-pdf" onchange="updateFileName(this)">

                            <div class="input-group col-xl-7">
                                <!-- Display the file name after selecting -->
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Kundli PDF" name="file" id="file">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button"
                                        onclick="handleClick()">Upload</button>
                                </span>
                            </div>
                            <input type="hidden" name="premiumUser" value="{{ $premiumUser }}">
                            <div class="input-group col-xl-2">
                                <button class="file-upload-browse btn btn-info m-auto btn-block"
                                    type="submit">Submit</button>
                            </div>
                        </div>
                        <div id="pdf-preview" style="display:none;overflow: auto; height: 464px;">
                            <h5 style="font-size: 18px;font-weight: 600;">Kundli PDF Preview:</h5>
                            <div id="pdf-container">
                            </div>
                        </div>
                    </form>
                    {{--  <form class="forms-sample"
                        action="{{ url('store-premium-kundli') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputprice">Select PDF</label>
                                <input type="file" class="form-control"
                                    name="premium_kundli_pdf" required>
                            </div>
                            <input type="hidden" name="premiumUser" value="{{ $premiumUser }}">
                        </div>
                        <button type="submit"
                            class="btn btn-primary btn-block">Submit</button>
                    </form>  --}}
                </div>
            </div>
        </div>
    </div>
</div>

{{--  <script>
    function calculateTotal() {
        let price = parseFloat(document.getElementById('price').value) || 0;
        let gstPercent = parseFloat(document.getElementById('gst').value) || 0;
        let gstAmount = (price * gstPercent) / 100;
        let total = price + gstAmount;
        document.getElementById('total').value = total.toFixed(2);
    }
</script>
<script>
    async function getParent(e) {
        var role = e.value;
        var url = "{{ url('users/get-parent') }}";

        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    role: role
                })
            });

            const data = await response.json();
            var parent = data.parent;
            var selectElement = document.getElementById('manager');
            selectElement.innerHTML = '';
            for (p of parent) {
                var option = document.createElement('option');
                option.value = p.id;
                option.innerHTML = p.name;
                document.querySelector('#manager').appendChild(option);
            }
        } catch (error) {
            alert("Something went Wrong Refreash the page");
            console.error('Error fetching data:', error);
        }
    }
</script>  --}}
<script>
    function handleClick() {
        document.querySelector('#kundli-pdf').click();
    }
    function updateFileName(input) {
        var fileNameElement = document.getElementById('fileName');
        if (input.files.length > 0) {
            fileNameElement.value = input.files[0].name;
        } else {
            fileNameElement.value = ''; // Clear the value if no file is selected
        }
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
</script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.313/pdf.min.js">
</script>

<script>
    // Update the input text with the selected file name
    function updateFileName(input) {
        var fileName = input.files[0].name;
        document.getElementById("file").value = fileName;

        // Show the preview section if the file is a PDF
        if (fileName.endsWith('.pdf')) {
            displayPdfPreview(input.files[0]);
        } else {
            document.getElementById("pdf-preview").style.display = "none";
        }
    }

    // Function to display all pages of the PDF
    function displayPdfPreview(file) {
        var reader = new FileReader();

        reader.onload = function(e) {
            var pdfData = new Uint8Array(e.target.result);

            // Use PDF.js to render the PDF
            pdfjsLib.getDocument(pdfData).promise.then(function(pdf) {
                // Get the total number of pages
                var totalPages = pdf.numPages;

                // Clear previous previews
                var container = document.getElementById("pdf-container");
                container.innerHTML = '';

                // Loop through all the pages and render each one
                for (var pageNum = 1; pageNum <= totalPages; pageNum++) {
                    pdf.getPage(pageNum).then(function(page) {
                        var scale = 1.5;
                        var viewport = page.getViewport({ scale: scale });

                        // Create a new canvas element for each page
                        var canvas = document.createElement('canvas');
                        var context = canvas.getContext('2d');

                        // Set the canvas size to match the page size
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        // Render the page on the canvas
                        page.render({
                            canvasContext: context,
                            viewport: viewport
                        });

                        // Append the canvas to the container
                        container.appendChild(canvas);
                    });
                }
            });

            // Show the preview section
            document.getElementById("pdf-preview").style.display = "block";
        };

        reader.readAsArrayBuffer(file);
    }
</script>
@endsection
