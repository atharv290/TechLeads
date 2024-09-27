
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Learning Hub</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            text-align: center;
            padding: 50px;
        }
        h1 {
            font-size: 3rem;
            color: #333;
            margin-bottom: 30px;
        }
        .section-container {
            display: flex;
            justify-content: center;
            gap: 20px; /* Space between sections */
            flex-wrap: wrap; /* Wrap sections if the screen is too small */
        }
        .section {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            width: 250px;
            box-shadow: 0px 5px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .section h2 {
            color: #555;
        }
        button {
            padding: 12px 25px;
            font-size: 1.2rem;
            background-color: #00c853;
            color: #fff;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            margin: 10px;
            display: block;
            width: 80%;
            margin: 20px auto;
        }
        button:hover {
            background-color: #00e676;
        }
        #back-button {
            background-color: #ff5252;
        }
        #back-button:hover {
            background-color: #ff1744;
        }
        .learn-content {
            text-align: left;
            padding: 20px;
            background-color: #e0f7fa;
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>
    
</head>
<body>

    <h1>Math Learning Hub</h1>

    <!-- Sections for Addition, Subtraction, Multiplication, Division -->
    <div class="section-container">
        <div class="section">
            <h2>Addition</h2>
            <button onclick="showOptions('addition')">Learn or Play</button>
        </div>
    
        <div class="section">
            <h2>Subtraction</h2>
            <button onclick="showOptions('subtraction')">Learn or Play</button>
        </div>
    
        <div class="section">
            <h2>Multiplication</h2>
            <button onclick="showOptions('multiplication')">Learn or Play</button>
        </div>
    
        <div class="section">
            <h2>Division</h2>
            <button onclick="showOptions('division')">Learn or Play</button>
        </div>
    </div>
    

    <!-- Options Overlay -->
    <div id="options-overlay" style="display:none;">
        <h2 id="operation-title"></h2>
        <button id="learn-button" onclick="">Learn</button>
        <button id="play-button" onclick="">Play Game</button>
        <button id="back-button" onclick="goBack()">Back to Menu</button>
    </div>
    
    <!-- Learn Content Section -->
    <div id="learn-section"></div>

    <script>
        function showOptions(operation) {
            // Show the options overlay
            document.getElementById('options-overlay').style.display = 'block';
            let title = '';

            // Set the options and redirection based on the operation
            switch(operation) {
                case 'addition':
                    title = 'Addition';
                    document.getElementById('learn-button').onclick = function() {
                        teachAddition();
                    };
                    document.getElementById('play-button').onclick = function() {
                        window.location.href = 'addition.html';
                    };
                    break;
                case 'subtraction':
                    title = 'Subtraction';
                    document.getElementById('learn-button').onclick = function() {
                        teachSubtraction();
                    };
                    document.getElementById('play-button').onclick = function() {
                        window.location.href = 'subtract.html';
                    };
                    break;
                case 'multiplication':
                    title = 'Multiplication';
                    document.getElementById('learn-button').onclick = function() {
                        teachMultiplication();
                    };
                    document.getElementById('play-button').onclick = function() {
                        window.location.href = 'multiply.php';
                    };
                    break;
                case 'division':
                    title = 'Division';
                    document.getElementById('learn-button').onclick = function() {
                        teachDivision();
                    };
                    document.getElementById('play-button').onclick = function() {
                        window.location.href = 'divide.html';
                    };
                    break;
            }

            // Set the title dynamically based on the operation
            document.getElementById('operation-title').textContent = title;
        }

        function goBack() {
            // Hide the options overlay and go back to the main menu
            document.getElementById('options-overlay').style.display = 'none';
        }

        // Function to teach addition directly on the page
        function teachAddition() {
            let learnSection = document.getElementById('learn-section');
            learnSection.innerHTML = `
                <div class="learn-content">
                    <h3>Learning Addition</h3>
                    <p>Addition is the process of finding the total, or sum, by combining two or more numbers.</p>
                    <p>For example:</p>
                    <ul>
                        <li>2 + 3 = 5</li>
                        <li>5 + 7 = 12</li>
                        <li>8 + 6 = 14</li>
                    </ul>
                    <p>Practice adding small numbers together to get comfortable with the process.</p>
                    <a href="https://youtu.be/Q9sLfMrH8_w?si=p0xbIhJ5Nr8sgHJB" target="_blank">Watch this video on YouTube to understand more clearly</a>

                </div>
            `;
        }

        // You can add similar functions for Subtraction, Multiplication, and Division
        function teachSubtraction() {
            let learnSection = document.getElementById('learn-section');
            learnSection.innerHTML = `
                <div class="learn-content">
                    <h3>Learning Subtraction</h3>
                    <p>Subtraction is the process of finding the difference between two numbers.</p>
                    <p>For example:</p>
                    <ul>
                        <li>5 - 3 = 2</li>
                        <li>10 - 4 = 6</li>
                        <li>8 - 2 = 6</li>
                    </ul>
                    <p>Practice subtracting smaller numbers from larger ones to understand how subtraction works.</p>
                    <a href="https://youtu.be/qKxQ33KcRWQ?si=130r-B5MQRG_Ww5A" target="_blank">Watch this video on YouTube to understand more clearly</a>
                </div>
            `;
        }

        function teachMultiplication() {
            let learnSection = document.getElementById('learn-section');
            learnSection.innerHTML = `
                <div class="learn-content">
                    <h3>Learning Multiplication</h3>
                    <p>Multiplication is the process of finding the total when one number is taken a certain number of times.</p>
                    <p>For example:</p>
                    <ul>
                        <li>2 × 3 = 6</li>
                        <li>5 × 4 = 20</li>
                        <li>7 × 2 = 14</li>
                    </ul>
                    <p>Practice multiplying small numbers to understand how multiplication works.</p>
                    <a href="https://youtu.be/eW2dRLyoyds?si=T1uTPMZJRCJwjVTb" target="_blank">Watch this video on YouTube to understand more clearly</a>
                </div>
            `;
        }

        function teachDivision() {
            let learnSection = document.getElementById('learn-section');
            learnSection.innerHTML = `
                <div class="learn-content">
                    <h3>Learning Division</h3>
                    <p>Division is the process of splitting a number into equal parts.</p>
                    <p>For example:</p>
                    <ul>
                        <li>6 ÷ 2 = 3</li>
                        <li>12 ÷ 4 = 3</li>
                        <li>15 ÷ 5 = 3</li>
                    </ul>
                    <p>Practice dividing numbers to understand how division works.</p>
                    <a href="https://youtu.be/rGMecZ_aERo?si=PRmum_2RpJNgQXnC" target="_blank">Watch this video on YouTube to understand more clearly</a>
                </div>
            `;
        }
    </script>


</body>
</html>
