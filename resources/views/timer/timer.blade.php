<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        .timer-container {
            display: none;
            align-items: center;
            background-color: #ffffff;
            padding: 10px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .timer-icon {
            width: 40px;
            height: 40px;
            font-size: larger;

        }

        #timer {
            font-size: 24px;
            font-weight: bold;
            color: #333333;
        }
    </style>
    <link href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css" rel="stylesheet">

</head>
<body>
    <div class="timer-container">
        <div  onclick="stopTimer()">
            <i class="mdi mdi-clock-outline timer-icon"></i>
        </div>
        <div id="timer">15:00</div>
    </div>

    <script>
        let timer;
        let seconds = 0;

        // Function to start the timer
        function startTimer() {
            document.querySelector('.timer-container').style.display="flex";
            timer = setInterval(() => {
                seconds++;
                displayTime();
            }, 1000);
        }

        // Function to stop the timer
        function stopTimer() {
            clearInterval(timer);
            var time = document.getElementById('timer').innerHTML;
            console.log(time);
        }

        // Function to display the time
        function displayTime() {
            const minutes = Math.floor(seconds / 60);
            const remainingSeconds = seconds % 60;

            // Change the timer color to red after one minute
            if (seconds >= 60) {
                document.getElementById('timer').style.color = 'red';
            }

            document.getElementById('timer').innerText = `${minutes}:${remainingSeconds.toString().padStart(2, '0')}`;
        }

        startTimer();


    </script>
</body>
</html>
