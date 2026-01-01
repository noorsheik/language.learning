<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turkish Verbs Game</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .correct { background-color: #10b981 !important; }
        .wrong { background-color: #ef4444 !important; }
        .card-hover:hover { transform: translateY(-3px); }
    </style>
</head>
<body class="bg-gray-100 min-h-screen p-4">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-blue-800 mb-2">Learn Turkish Verbs</h1>
            <p class="text-gray-600">Match English verbs with Turkish translations</p>
        </div>

        <!-- Score & Progress -->
        <div class="flex justify-between items-center mb-8 bg-white p-4 rounded-xl shadow">
            <div>
                <div class="text-2xl font-bold text-blue-700">Score: <span id="score">0</span></div>
                <div class="text-gray-600">Correct: <span id="correct">0</span>/10</div>
            </div>
            <button id="startBtn" class="bg-green-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-green-700">
                Start Game
            </button>
        </div>

        <!-- Game Area -->
        <div class="bg-white p-6 rounded-xl shadow-lg mb-8">
            <div class="text-center mb-8">
                <div class="text-gray-600 mb-2">Translate this verb:</div>
                <div id="question" class="text-4xl font-bold text-blue-900 mb-2">---</div>
                <div id="hint" class="text-gray-500 text-sm"></div>
            </div>

            <!-- Options -->
            <div id="options" class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <!-- Options will appear here -->
            </div>

            <!-- Feedback -->
            <div id="feedback" class="text-center text-xl font-bold min-h-[40px] p-2"></div>

            <!-- Next Button -->
            <div class="text-center">
                <button id="nextBtn" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-700 hidden">
                    Next Verb
                </button>
            </div>
        </div>

      

        <!-- Footer -->
        <div class="text-center mt-8 text-gray-500 text-sm">
            Practice these 10 common Turkish verbs. Turkish present tense often ends with -r.
        </div>
    </div>

    <script>
        // Turkish verbs data
        const verbs = [
            { english: "to go", turkish: "gitmek", present: "gider" },
            { english: "to eat", turkish: "yemek", present: "yer" },
            { english: "to drink", turkish: "içmek", present: "içer" },
            { english: "to sleep", turkish: "uyumak", present: "uyur" },
            { english: "to read", turkish: "okumak", present: "okur" },
            { english: "to write", turkish: "yazmak", present: "yazar" },
            { english: "to speak", turkish: "konuşmak", present: "konuşur" },
            { english: "to learn", turkish: "öğrenmek", present: "öğrenir" },
            { english: "to work", turkish: "çalışmak", present: "çalışır" },
            { english: "to understand", turkish: "anlamak", present: "anlar" }
        ];

        // Game state
        let score = 0;
        let correctCount = 0;
        let currentQuestion = 0;
        let usedQuestions = [];

        // DOM elements
        const questionEl = document.getElementById('question');
        const optionsEl = document.getElementById('options');
        const feedbackEl = document.getElementById('feedback');
        const scoreEl = document.getElementById('score');
        const correctEl = document.getElementById('correct');
        const startBtn = document.getElementById('startBtn');
        const nextBtn = document.getElementById('nextBtn');
        const hintEl = document.getElementById('hint');

        // Start game
        startBtn.addEventListener('click', () => {
            score = 0;
            correctCount = 0;
            currentQuestion = 0;
            usedQuestions = [];
            scoreEl.textContent = score;
            correctEl.textContent = correctCount;
            startBtn.disabled = true;
            startBtn.textContent = "Game Started";
            startBtn.classList.remove('bg-green-600', 'hover:bg-green-700');
            startBtn.classList.add('bg-gray-400');
            nextBtn.classList.remove('hidden');
            loadQuestion();
        });

        // Load a new question
        function loadQuestion() {
            if (usedQuestions.length >= verbs.length) {
                endGame();
                return;
            }

            // Pick a random verb not used yet
            let index;
            do {
                index = Math.floor(Math.random() * verbs.length);
            } while (usedQuestions.includes(index));
            
            usedQuestions.push(index);
            currentQuestion = index;

            // Show question
            questionEl.textContent = verbs[index].english;
            hintEl.textContent = `Present form: ${verbs[index].present}`;

            // Clear options
            optionsEl.innerHTML = '';
            feedbackEl.textContent = '';

            // Create options (1 correct + 3 wrong)
            const options = [];
            options.push({ text: verbs[index].turkish, correct: true });
            
            // Add 3 wrong options
            let wrongCount = 0;
            while (wrongCount < 3) {
                const wrongIndex = Math.floor(Math.random() * verbs.length);
                if (wrongIndex !== index && !options.find(o => o.text === verbs[wrongIndex].turkish)) {
                    options.push({ text: verbs[wrongIndex].turkish, correct: false });
                    wrongCount++;
                }
            }

            // Shuffle options
            options.sort(() => Math.random() - 0.5);

            // Create option buttons
            options.forEach(option => {
                const button = document.createElement('button');
                button.className = 'bg-gray-100 p-4 rounded-lg card-hover transition-all hover:bg-blue-100';
                button.textContent = option.text;
                
                button.addEventListener('click', () => checkAnswer(option.correct, button));
                optionsEl.appendChild(button);
            });

            // Reset next button
            nextBtn.classList.add('hidden');
        }

        // Check answer
        function checkAnswer(isCorrect, button) {
            // Disable all options
            document.querySelectorAll('#options button').forEach(btn => {
                btn.disabled = true;
                btn.classList.remove('hover:bg-blue-100');
            });

            // Show feedback
            if (isCorrect) {
                button.classList.add('correct');
                feedbackEl.textContent = `Correct! ${verbs[currentQuestion].english} = ${verbs[currentQuestion].turkish}`;
                feedbackEl.className = 'text-green-600 font-bold';
                score += 10;
                correctCount++;
                scoreEl.textContent = score;
                correctEl.textContent = correctCount;
            } else {
                button.classList.add('wrong');
                feedbackEl.textContent = `Incorrect! The answer is: ${verbs[currentQuestion].turkish}`;
                feedbackEl.className = 'text-red-600 font-bold';
                
                // Highlight correct answer
                document.querySelectorAll('#options button').forEach(btn => {
                    if (btn.textContent === verbs[currentQuestion].turkish) {
                        btn.classList.add('correct');
                    }
                });
            }

            // Show next button
            nextBtn.classList.remove('hidden');
        }

        // Next question
        nextBtn.addEventListener('click', loadQuestion);

        // End game
        function endGame() {
            questionEl.textContent = "Game Over!";
            hintEl.textContent = "";
            optionsEl.innerHTML = '';
            feedbackEl.textContent = `Final score: ${score}. You got ${correctCount} out of 10 correct!`;
            feedbackEl.className = 'text-blue-600 font-bold';
            nextBtn.classList.add('hidden');
            
            // Reset start button
            startBtn.disabled = false;
            startBtn.textContent = "Play Again";
            startBtn.classList.remove('bg-gray-400');
            startBtn.classList.add('bg-green-600', 'hover:bg-green-700');
        }
    </script>
</body>
</html><?php /**PATH C:\Users\User\Herd\game\resources\views/Turkey/present.blade.php ENDPATH**/ ?>