<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Present Simple Game | Learn English</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .game-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .game-card:hover {
            transform: translateY(-5px);
        }
        
        .option-btn {
            transition: all 0.2s ease;
        }
        
        .option-btn:hover:not(.correct):not(.incorrect) {
            transform: scale(1.05);
        }
        
        .correct {
            background-color: #22c55e !important;
            color: white;
        }
        
        .incorrect {
            background-color: #ef4444 !important;
            color: white;
        }
        
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body class="bg-red-50 min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-red-700 text-white py-4 shadow-lg">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <i class="fas fa-gamepad text-yellow-400 text-2xl"></i>
                <h1 class="text-2xl font-bold">Present Simple Game</h1>
            </div>
            <div class="flex space-x-4">
                <button id="instructionsBtn" class="bg-yellow-500 hover:bg-yellow-600 text-red-900 font-bold py-2 px-4 rounded-lg transition">
                    <i class="fas fa-info-circle mr-2"></i>Instructions
                </button>
                <button id="resetBtn" class="bg-red-800 hover:bg-red-900 text-white font-bold py-2 px-4 rounded-lg transition">
                    <i class="fas fa-redo mr-2"></i>Reset Game
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-8">
        <!-- Welcome Section -->
        <section id="welcomeSection" class="text-center mb-12">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-4xl font-bold text-red-800 mb-4">Learn Present Simple Tense</h2>
                <p class="text-xl text-red-700 mb-8">Practice forming sentences in the present simple tense with this interactive game!</p>
                <div class="bg-yellow-100 border-l-4 border-yellow-500 p-6 text-red-800 rounded-lg mb-8">
                    <p class="font-bold text-lg mb-2">What is Present Simple?</p>
                    <p class="mb-2">We use the Present Simple tense for:</p>
                    <ul class="list-disc list-inside text-left">
                        <li>Habits and routines (I <span class="font-bold">drink</span> coffee every morning)</li>
                        <li>Facts and general truths (The sun <span class="font-bold">rises</span> in the east)</li>
                        <li>Fixed arrangements (The train <span class="font-bold">leaves</span> at 8 PM)</li>
                    </ul>
                </div>
                <button id="startGameBtn" class="bg-red-700 hover:bg-red-800 text-white font-bold py-3 px-8 rounded-full text-xl pulse-animation">
                    <i class="fas fa-play mr-2"></i>Start Game
                </button>
            </div>
        </section>

        <!-- Game Section -->
        <section id="gameSection" class="hidden">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Score and Progress -->
                <div class="md:col-span-3 bg-white rounded-xl shadow-lg p-6 mb-6">
                    <div class="flex justify-between items-center">
                        <div class="text-center">
                            <p class="text-red-700 font-bold">Score</p>
                            <p id="score" class="text-3xl font-bold text-yellow-500">0</p>
                        </div>
                        <div class="text-center">
                            <p class="text-red-700 font-bold">Progress</p>
                            <p id="progress" class="text-3xl font-bold text-red-700">1/10</p>
                        </div>
                        <div class="text-center">
                            <p class="text-red-700 font-bold">Time</p>
                            <p id="timer" class="text-3xl font-bold text-red-700">60s</p>
                        </div>
                    </div>
                    <div class="w-full bg-red-200 rounded-full h-4 mt-4">
                        <div id="progressBar" class="bg-red-600 h-4 rounded-full" style="width: 10%"></div>
                    </div>
                </div>

                <!-- Question Card -->
                <div class="md:col-span-2 bg-white rounded-xl shadow-lg p-6 game-card">
                    <h3 class="text-2xl font-bold text-red-800 mb-6">Complete the Sentence</h3>
                    <div class="bg-red-50 p-6 rounded-lg mb-6">
                        <p id="questionText" class="text-xl text-red-800"></p>
                    </div>
                    <div id="optionsContainer" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Options will be inserted here by JavaScript -->
                    </div>
                </div>

                <!-- Rules and Tips -->
                <div class="bg-white rounded-xl shadow-lg p-6 game-card">
                    <h3 class="text-2xl font-bold text-red-800 mb-4">Present Simple Rules</h3>
                    <div class="space-y-4">
                        <div class="bg-yellow-50 p-4 rounded-lg">
                            <p class="font-bold text-red-700 mb-1">For I/You/We/They:</p>
                            <p class="text-red-800">Use the base form of the verb</p>
                            <p class="text-red-600 italic">Example: They <span class="font-bold">play</span> soccer.</p>
                        </div>
                        <div class="bg-yellow-50 p-4 rounded-lg">
                            <p class="font-bold text-red-700 mb-1">For He/She/It:</p>
                            <p class="text-red-800">Add -s or -es to the verb</p>
                            <p class="text-red-600 italic">Example: He <span class="font-bold">plays</span> soccer.</p>
                        </div>
                        <div class="bg-red-50 p-4 rounded-lg">
                            <p class="font-bold text-red-700 mb-1">Negative Form:</p>
                            <p class="text-red-800">Use "do not" (don't) or "does not" (doesn't)</p>
                            <p class="text-red-600 italic">Example: She <span class="font-bold">doesn't play</span> soccer.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Results Section -->
        <section id="resultsSection" class="hidden text-center">
            <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg p-8">
                <div class="mb-6">
                    <i class="fas fa-trophy text-yellow-500 text-6xl mb-4"></i>
                    <h2 class="text-4xl font-bold text-red-800 mb-2">Game Complete!</h2>
                    <p class="text-xl text-red-700">Your final score:</p>
                    <p id="finalScore" class="text-5xl font-bold text-yellow-500 my-4">0</p>
                </div>
                <div class="bg-red-50 p-6 rounded-lg mb-6">
                    <h3 class="text-2xl font-bold text-red-800 mb-4">Performance Summary</h3>
                    <div class="grid grid-cols-2 gap-4 text-left">
                        <div class="text-center">
                            <p class="text-red-700 font-bold">Correct Answers</p>
                            <p id="correctCount" class="text-3xl font-bold text-green-600">0</p>
                        </div>
                        <div class="text-center">
                            <p class="text-red-700 font-bold">Incorrect Answers</p>
                            <p id="incorrectCount" class="text-3xl font-bold text-red-600">0</p>
                        </div>
                    </div>
                </div>
                <button id="playAgainBtn" class="bg-red-700 hover:bg-red-800 text-white font-bold py-3 px-8 rounded-full text-xl">
                    <i class="fas fa-redo mr-2"></i>Play Again
                </button>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-red-800 text-white py-6 mt-8">
        <div class="container mx-auto px-4 text-center">
            <p class="mb-2">Present Simple English Learning Game</p>
            <p>Practice makes perfect! Keep learning English grammar.</p>
        </div>
    </footer>

    <!-- Instructions Modal -->
    <div id="instructionsModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-xl shadow-2xl p-8 max-w-2xl mx-4">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-red-800">How to Play</h3>
                <button id="closeModalBtn" class="text-red-700 hover:text-red-900">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>
            <div class="space-y-4 text-red-800">
                <div class="flex items-start">
                    <div class="bg-yellow-500 text-red-800 rounded-full w-8 h-8 flex items-center justify-center mr-3 flex-shrink-0">
                        <span class="font-bold">1</span>
                    </div>
                    <p>Read the incomplete sentence carefully and identify the subject.</p>
                </div>
                <div class="flex items-start">
                    <div class="bg-yellow-500 text-red-800 rounded-full w-8 h-8 flex items-center justify-center mr-3 flex-shrink-0">
                        <span class="font-bold">2</span>
                    </div>
                    <p>Choose the correct verb form based on the subject (I/you/we/they use base form, he/she/it adds -s or -es).</p>
                </div>
                <div class="flex items-start">
                    <div class="bg-yellow-500 text-red-800 rounded-full w-8 h-8 flex items-center justify-center mr-3 flex-shrink-0">
                        <span class="font-bold">3</span>
                    </div>
                    <p>Click on the option you think is correct. You'll get immediate feedback.</p>
                </div>
                <div class="flex items-start">
                    <div class="bg-yellow-500 text-red-800 rounded-full w-8 h-8 flex items-center justify-center mr-3 flex-shrink-0">
                        <span class="font-bold">4</span>
                    </div>
                    <p>Answer as many questions as you can before time runs out!</p>
                </div>
                <div class="bg-yellow-100 p-4 rounded-lg mt-6">
                    <p class="font-bold text-red-700">Tip:</p>
                    <p>Pay attention to time expressions like "every day", "always", "usually" - they often indicate present simple tense.</p>
                </div>
            </div>
            <div class="mt-8 text-center">
                <button id="startFromModalBtn" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-6 rounded-lg">
                    Start Game
                </button>
            </div>
        </div>
    </div>

    <script>
        // Game variables
        let currentQuestion = 0;
        let score = 0;
        let correctAnswers = 0;
        let incorrectAnswers = 0;
        let timeLeft = 60;
        let timerInterval;
        
        // Questions database
        const questions = [
            {
                question: "She ___ to school every day.",
                options: ["go", "goes", "going", "went"],
                correct: 1
            },
            {
                question: "They ___ football on weekends.",
                options: ["play", "plays", "playing", "played"],
                correct: 0
            },
            {
                question: "He ___ his teeth twice a day.",
                options: ["brush", "brushes", "brushing", "brushed"],
                correct: 1
            },
            {
                question: "I ___ coffee in the morning.",
                options: ["drink", "drinks", "drinking", "drank"],
                correct: 0
            },
            {
                question: "We ___ television in the evening.",
                options: ["watch", "watches", "watching", "watched"],
                correct: 0
            },
            {
                question: "My brother ___ in a hospital.",
                options: ["work", "works", "working", "worked"],
                correct: 1
            },
            {
                question: "The sun ___ in the east.",
                options: ["rise", "rises", "rising", "rose"],
                correct: 1
            },
            {
                question: "You ___ very fast.",
                options: ["run", "runs", "running", "ran"],
                correct: 0
            },
            {
                question: "Cats ___ milk.",
                options: ["like", "likes", "liking", "liked"],
                correct: 0
            },
            {
                question: "He ___ not like vegetables.",
                options: ["do", "does", "doing", "did"],
                correct: 1
            }
        ];
        
        // DOM Elements
        const welcomeSection = document.getElementById('welcomeSection');
        const gameSection = document.getElementById('gameSection');
        const resultsSection = document.getElementById('resultsSection');
        const instructionsModal = document.getElementById('instructionsModal');
        const startGameBtn = document.getElementById('startGameBtn');
        const startFromModalBtn = document.getElementById('startFromModalBtn');
        const instructionsBtn = document.getElementById('instructionsBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const resetBtn = document.getElementById('resetBtn');
        const playAgainBtn = document.getElementById('playAgainBtn');
        const questionText = document.getElementById('questionText');
        const optionsContainer = document.getElementById('optionsContainer');
        const scoreElement = document.getElementById('score');
        const progressElement = document.getElementById('progress');
        const progressBar = document.getElementById('progressBar');
        const timerElement = document.getElementById('timer');
        const finalScore = document.getElementById('finalScore');
        const correctCount = document.getElementById('correctCount');
        const incorrectCount = document.getElementById('incorrectCount');
        
        // Event Listeners
        startGameBtn.addEventListener('click', startGame);
        startFromModalBtn.addEventListener('click', startGame);
        instructionsBtn.addEventListener('click', () => {
            instructionsModal.classList.remove('hidden');
        });
        closeModalBtn.addEventListener('click', () => {
            instructionsModal.classList.add('hidden');
        });
        resetBtn.addEventListener('click', resetGame);
        playAgainBtn.addEventListener('click', resetGame);
        
        // Start the game
        function startGame() {
            welcomeSection.classList.add('hidden');
            gameSection.classList.remove('hidden');
            instructionsModal.classList.add('hidden');
            
            // Reset game state
            currentQuestion = 0;
            score = 0;
            correctAnswers = 0;
            incorrectAnswers = 0;
            timeLeft = 60;
            
            updateScore();
            startTimer();
            showQuestion();
        }
        
        // Reset the game
        function resetGame() {
            resultsSection.classList.add('hidden');
            welcomeSection.classList.remove('hidden');
            clearInterval(timerInterval);
        }
        
        // Start the timer
        function startTimer() {
            clearInterval(timerInterval);
            timerElement.textContent = `${timeLeft}s`;
            
            timerInterval = setInterval(() => {
                timeLeft--;
                timerElement.textContent = `${timeLeft}s`;
                
                if (timeLeft <= 0) {
                    endGame();
                }
            }, 1000);
        }
        
        // Show current question
        function showQuestion() {
            const question = questions[currentQuestion];
            questionText.textContent = question.question;
            
            // Update progress
            progressElement.textContent = `${currentQuestion + 1}/${questions.length}`;
            progressBar.style.width = `${((currentQuestion + 1) / questions.length) * 100}%`;
            
            // Clear previous options
            optionsContainer.innerHTML = '';
            
            // Add new options
            question.options.forEach((option, index) => {
                const button = document.createElement('button');
                button.className = 'option-btn bg-red-100 hover:bg-red-200 text-red-800 font-bold py-4 px-4 rounded-lg text-lg';
                button.textContent = option;
                button.addEventListener('click', () => checkAnswer(index));
                optionsContainer.appendChild(button);
            });
        }
        
        // Check if the selected answer is correct
        function checkAnswer(selectedIndex) {
            const question = questions[currentQuestion];
            const options = document.querySelectorAll('.option-btn');
            
            // Disable all buttons
            options.forEach(button => {
                button.disabled = true;
            });
            
            // Mark correct and incorrect answers
            if (selectedIndex === question.correct) {
                options[selectedIndex].classList.add('correct');
                score += 10;
                correctAnswers++;
            } else {
                options[selectedIndex].classList.add('incorrect');
                options[question.correct].classList.add('correct');
                incorrectAnswers++;
            }
            
            updateScore();
            
            // Move to next question after a delay
            setTimeout(() => {
                currentQuestion++;
                
                if (currentQuestion < questions.length) {
                    showQuestion();
                } else {
                    endGame();
                }
            }, 1500);
        }
        
        // Update score display
        function updateScore() {
            scoreElement.textContent = score;
        }
        
        // End the game
        function endGame() {
            clearInterval(timerInterval);
            gameSection.classList.add('hidden');
            resultsSection.classList.remove('hidden');
            
            finalScore.textContent = score;
            correctCount.textContent = correctAnswers;
            incorrectCount.textContent = incorrectAnswers;
        }
    </script>
</body>
</html>