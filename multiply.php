
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Game for Kids</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%);
            color: #fff;
            text-align: center;
            padding: 0;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        h1 {
            font-size: 3rem;
            color: #fffc00;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.5);
        }

        #question-text {
            font-size: 2rem;
            background-color: rgba(0,0,0,0.1);
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        input[type="number"], button {
            padding: 10px;
            font-size: 1.2rem;
            border: none;
            border-radius: 10px;
            margin: 5px;
        }

        input[type="number"] {
            width: 200px;
            background-color: #fff;
            color: #333;
        }

        button {
            background-color: #00c853;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #00e676;
        }

        #game-over {
            display: none;
        }
    </style>
</head>
<body>
    <h1>Math Game for Kids</h1>
    <p>Question <span id="question-number">1</span> of 5</p>
    <p id="question-text"></p>

    <input type="number" id="answer" placeholder="Your answer" required>
    <button onclick="submitAnswer()">Submit</button>

    <div id="result-message"></div>

    <div id="game-over">
        <h2>Game Over!</h2>
        <p>Your final score is: <span id="final-score"></span></p>
        <form method="POST" id="score-form">
            <input type="hidden" name="finalScore" id="finalScoreInput">
            <button type="submit">Save Score</button>
        </form>
    </div>

    <script>
        let score = 0;
        let questionNumber = 1;
        let num1, num2, correctAnswer;

        // Initialize the first question
        generateQuestion();

        function generateQuestion() {
            num1 = Math.floor(Math.random() * 5) + 1;
            num2 = Math.floor(Math.random() * 3) + 1;
            correctAnswer = num1 * num2;

            document.getElementById('question-text').textContent = `Solve: ${num1} * ${num2} = ?`;
            document.getElementById('answer').value = ''; 
            document.getElementById('result-message').textContent = ''; 
        }

        function submitAnswer() {
            let userAnswer = parseInt(document.getElementById('answer').value);
            if (userAnswer === correctAnswer) {
                score++;
                document.getElementById('result-message').textContent = 'Correct!';
            } else {
                document.getElementById('result-message').textContent = `Incorrect! The correct answer was ${correctAnswer}.`;
            }

            questionNumber++;
            if (questionNumber > 5) {
                endGame();
            } else {
                setTimeout(() => {
                    document.getElementById('question-number').textContent = questionNumber;
                    generateQuestion();
                }, 2000);
            }
        }
        function endGame() {
    // Hide the question and show the final score
    document.getElementById('question-text').style.display = 'none';
    document.getElementById('answer').style.display = 'none';
    document.querySelector('button').style.display = 'none';
    document.getElementById('result-message').style.display = 'none';

    document.getElementById('final-score').textContent = score;
    document.getElementById('game-over').style.display = 'block';

    // Send the score to the server
    saveScore(score);
}

function saveScore(score) {
    // Create an XMLHttpRequest to send the score to the server
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "save_score.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Assuming you have a way to get the user's ID, you would replace 'user_id' here.
    var userId = 1; // Replace this with the actual user ID from your session or authentication method.

    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log('Score saved successfully: ' + xhr.responseText);
        } else {
            console.error('Error saving score: ' + xhr.status);
        }
    };

    // Send the score along with the user ID
    xhr.send("user_id=" + userId + "&score=" + score);
}

    </script>
</body>
</html>
