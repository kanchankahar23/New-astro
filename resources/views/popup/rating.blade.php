{{--  <html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Star rating using pure CSS</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
            text-align: center; /* Center-aligning the rating stars */
            margin:auto;
        }

        .rate:not(:checked)>input {
            position: absolute;
            top: -9999px;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        /* Center-align the text in the offcanvas header */
        .offcanvas-header h5 {
            text-align: center;
            width: 100%;
        }

        /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
    </style>
</head>

<body>
    <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel" style="width:50%;height:50%;margin:auto;z-index:1111;">
        <div class="offcanvas-header">
            <h5 class="text-center offcanvas-title" id="offcanvasBottomLabel">How was your Experience with Us Please Rate Us .</h5>

            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" onclick="window.location.href = '/user-dashboard';"></button>
        </div>
        <div class="offcanvas-body small">
            <div class="row">
                <div class="text-center col-4 offset-4">
                    <div class="text-center rate">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>
                </div>
                <div class="text-center col-6 offset-3">
                    <small for="thought" title="text"  >Share Your Thoughts and Suggestions</small>
                <textarea name="" id="thought" class="mt-2 form-control"></textarea>
                <div class="col-6 offset-3">
                    <button class="mt-2 btn btn-warning btn-xs btn-block" onclick="setRating('{{ $meeting_id }}')">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
   function setRating(id = null){
     const checkedInput = document.querySelector('input[name="rate"]:checked');
            if (!checkedInput) {
                alert('Please select a rating');
                return;
            }
    const rating = checkedInput.value;
    const feedback = document.querySelector('textarea').value;
    // console.log(rating,feedback);
    const url = "{{ $url }}";
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    rating:rating,
                    feedback:feedback,
                    id:id,
                }),
            })
            .then(response => response.json())
            .then(data => {
                // console.log(data);
                window.location.reload();
              return;
            })
            .catch(error => console.log('Error saving time:', error));
   }
    const rateInputs = document.querySelectorAll('input[name="rate"]');

    rateInputs.forEach(input => {
        input.addEventListener('change', function () {
            console.log(`${this.value}`);
        });
    });
</script>

</html>
  --}}
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Rate Us Popup</title>
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap"
            rel="stylesheet" />
        <style>
            button {
                padding: 0.8rem 1.5rem;
                background-color: #4572b8;
                ;
                color: white;
                border: none;
                border-radius: 6px;
                cursor: pointer;
                font-size: 1rem;
            }

            .popup-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                display: none;
                align-items: center;
                justify-content: center;
                z-index: 999;
            }

            .popup {
                background: #fff;
                padding: 2rem;
                border-radius: 12px;
                text-align: center;
                width: 90%;
                max-width: 500px;
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            }

            .popup h2 {
                margin-bottom: 1rem;
                color: black;
                font-size: 1rem;
            }

            .stars {
                display: flex;
                justify-content: center;
                gap: 10px;
                font-size: 2.5rem;
                color: #ccc;
                cursor: pointer;
                margin-bottom: 1.5rem;
            }

            .stars i.active {
                color: gold;
            }

            textarea {
                width: 100%;
                height: 100px;
                padding: 0.75rem;
                margin-bottom: 1rem;
                font-size: 1rem;
                border-radius: 8px;
                border: 1px solid #ccc;
                resize: vertical;
            }

            .popup .actions {
                display: flex;
                justify-content: space-between;
                gap: 10px;
            }

            .popup .actions button {
                flex: 1;
            }

            @media (max-width: 500px) {
                .popup {
                    padding: 1.2rem;
                }

                .stars {
                    font-size: 2rem;
                }

                textarea {
                    font-size: 0.95rem;
                }
            }
        </style>
    </head>
    <body>

        {{--  <button id="OpenModal">Click Me</button>  --}}

        <div class="popup-overlay" id="popup">
            <div class="popup">
                <h2>How Was Your Experience With Us ? Please Rate Us</h2>
                <small for="thought" title="text">Share Your Thoughts and Suggestions</small>
                <div class="stars" id="stars">
                    <i class="star" data-value="1">★</i>
                    <i class="star" data-value="2">★</i>
                    <i class="star" data-value="3">★</i>
                    <i class="star" data-value="4">★</i>
                    <i class="star" data-value="5">★</i>
                </div>
                <textarea id="feedback"
                    placeholder="Leave a comment..."></textarea>
                <div class="actions">
                    <button id="submitBtn" data-id="{{ $meeting_id }}">Submit</button>
                    {{--  <button class="close-btn">Close</button>  --}}
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                        let rating = 0;
                        const stars = document.querySelectorAll('.star');
                        const submitBtn = document.getElementById('submitBtn');
                        const popup = document.getElementById('popup');
                        //const closeBtn = document.querySelector('.close-btn');

                        // Star click
                        stars.forEach(star => {
                            star.addEventListener('click', () => {
                                rating = parseInt(star.getAttribute('data-value'));
                                updateStars(rating);
                                console.log("Selected rating:", rating);
                            });
                        });

                        function updateStars(value) {
                            stars.forEach(star => {
                                const starValue = parseInt(star.getAttribute('data-value'));
                                star.classList.toggle('active', starValue <= value);
                            });
                        }

                        // Close popup
                        {{--  closeBtn.addEventListener('click', () => {
                            popup.style.display = 'none';
                            resetForm();
                        });  --}}

                        function resetForm() {
                            rating = 0;
                            updateStars(0);
                            document.getElementById('feedback').value = '';
                        }

                        // Submit feedback
                        submitBtn.addEventListener('click', () => {
                            const comment = document.getElementById('feedback').value.trim();
                            const meetingId = submitBtn.getAttribute('data-id');
                            const url = "{{ url('store-video-rating') }}"; // Replace with your Laravel endpoint

                            if (!rating) {
                                alert("Please select a star rating.");
                                return;
                            }

                            fetch(url, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                },
                                body: JSON.stringify({
                                    rating: rating,
                                    feedback: comment,
                                    id: meetingId
                                }),
                            })
                            .then(response => response.json())
                            .then(data => {
                                alert("Thank you for connecting with us!");
                                popup.style.display = 'none';
                                resetForm();
                              window.location.href = "{{ url('/dashboard') }}";
                            })
                            .catch(error => {
                                console.error('Error saving feedback:', error);
                            });
                        });
                    });
        </script>
    </body>
    </html>
