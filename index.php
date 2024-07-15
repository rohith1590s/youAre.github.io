<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special Message</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap');

        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('https://wallpaper.forfun.com/fetch/15/15ff5fc01b7d87df498b9cf155d23286.jpeg?w=300') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Montserrat', sans-serif;
            color: white;
            margin: 0;
            overflow: hidden;
            animation: backgroundAnimation 10s infinite alternate;
        }

        @keyframes backgroundAnimation {
            0% { filter: brightness(1); }
            50% { filter: brightness(0.8); }
            100% { filter: brightness(1); }
        }

        #message, #response, #nameInputContainer {
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            max-width: 80%;
            backdrop-filter: blur(10px);
            animation: fadeIn 1s ease-in-out;
            transition: transform 0.3s ease-in-out;
        }

        #message:hover, #response:hover, #nameInputContainer:hover {
            transform: scale(1.05);
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: #ffffff;
        }

        @keyframes textGlow {
            0% { text-shadow: 0 0 10px #ff79c6, 0 0 20px #ff79c6, 0 0 30px #ff79c6; }
            100% { text-shadow: 0 0 20px #ff92d8, 0 0 30px #ff92d8, 0 0 40px #ff92d8; }
        }

        h5 {
            font-size: 1.5em;
            margin-bottom: 20px;
            color: #ffe3e3;
            animation: fadeIn 1.5s ease-in-out;
        }

        button {
            padding: 15px 30px;
            margin: 10px;
            font-size: 1.5em;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            background: linear-gradient(135deg, #8be9fd, #50fa7b);
            color: white;
            transition: background 0.3s, transform 0.3s, box-shadow 0.3s;
        }

        button:hover {
            background: linear-gradient(135deg, #50fa7b, #8be9fd);
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(72, 209, 204, 0.5);
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-top: 20px;
            animation: float 2s infinite alternate;
        }

        @keyframes float {
            0% { transform: translateY(0); }
            100% { transform: translateY(-10px); }
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: -1;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        form {
            display: none;
        }

        #nameInputContainer {
            display: none;
            margin-top: 20px;
        }

        input[type="text"] {
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #8be9fd;
            margin-top: 20px;
            width: 80%;
            font-size: 1.2em;
            transition: border 0.3s, box-shadow 0.3s;
        }

        input[type="text"]:focus {
            border: 1px solid #50fa7b;
            box-shadow: 0 0 10px rgba(80, 250, 123, 0.5);
            outline: none;
        }

        #submitNameButton {
            padding: 15px 30px;
            margin: 20px 0;
            font-size: 1.5em;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            background: linear-gradient(135deg, #8be9fd, #50fa7b);
            color: white;
            transition: background 0.3s, transform 0.3s, box-shadow 0.3s;
        }

        #submitNameButton:hover {
            background: linear-gradient(135deg, #50fa7b, #8be9fd);
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(80, 250, 123, 0.5);
        }

        #note {
            position: fixed;
            bottom: 10px;
            font-size: 0.8em;
            color: #ffe3e3;
            text-align: center;
            width: 100%;
        }

        #response {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div id="message" style="display: none;">
        <h1>Will you love me? ❤️</h1>
        <h5>NOTE: You can only choose any one of the options only once</h5>
        <button onclick="respond('yes')">Yes 😊</button>
        <button onclick="respond('no')">No 😢</button>
        <button onclick="respond('bf')">I have a bf 😶</button>
    </div>
    <div id="response" style="display: none;"></div>
    <div id="nameInputContainer">
        <h2>Please enter your name</h2>
        <input type="text" id="nameInput" placeholder="Your Name">
        <button id="submitNameButton" onclick="submitName()">Submit</button>
    </div>

    <!-- Hidden form for sending response -->
    <form id="responseForm" action="https://formspree.io/f/meojolkr" method="post">
        <input type="hidden" name="response" id="responseInput">
        <input type="hidden" name="name" id="nameHiddenInput">
    </form>

    <div id="note">
        <p>I created this webpage for you only 😊️</p>
    </div>

    <script>
        function showMessage() {
            var currentDate = new Date();
            var targetDate = new Date("2024-07-14"); // Set your target date and time here
            if (currentDate >= targetDate) {
                document.getElementById("message").style.display = "block";
            }
        }

        function respond(answer) {
            document.getElementById("message").style.display = "none";
            var responseDiv = document.getElementById("response");
            responseDiv.style.display = "block";
            var responseInput = document.getElementById("responseInput");

            if (answer === 'yes') {
                responseInput.value = "yes, i love you too";
                responseDiv.innerHTML = "<h2>Yes! 🎉 Then write 'accepted' in the blanks of the letter and give the letter back 💌</h2>";
                responseDiv.innerHTML += "<img src='https://example.com/cute_no.png' alt='Cute No'>";
            } else if (answer === 'no') {
                responseInput.value = "no, I don't wanna love you";
                responseDiv.innerHTML = "<h2>It's ok but can you tell me why? Write it in the blanks in that letter and give it back 😞</h2>";
                responseDiv.innerHTML += "<img src='https://example.com/cute_no.png' alt='Cute No'>";
            } else if (answer === 'bf') {
                responseInput.value = "you are too late I already have bf 💔";
                responseDiv.innerHTML = "<h2>Oh, I see. I appreciate your honesty. 💔</h2>";
                responseDiv.innerHTML += "<img src='https://example.com/cute_bf.png' alt='Cute BF'>";
            }

            // Show name input container
            document.getElementById("nameInputContainer").style.display = "block";
        }

        function submitName() {
            var nameInput = document.getElementById("nameInput").value;
            if (nameInput.trim() !== "") {
                document.getElementById("nameHiddenInput").value = nameInput;

                // Submit the form after 10 seconds
                setTimeout(function() {
                    document.getElementById("responseForm").submit();
                }, 10);
            } else {
                alert("Please enter your name.");
            }
        }

        window.onload = showMessage;
    </script>
</body>
</html>
