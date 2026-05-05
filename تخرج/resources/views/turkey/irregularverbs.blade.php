<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turkish Irregular Verbs Game</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen p-4">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <header class="text-center mb-8">
            <h1 class="text-4xl font-bold text-red-700 mb-2">Turkish Irregular Verbs</h1>
            <p class="text-gray-600">Learn verbs that don't follow regular patterns</p>
        </header>

        <!-- Game Stats -->
        <div class="bg-white rounded-xl shadow p-4 mb-6">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Score: <span id="score">0</span></h2>
                    <p class="text-gray-600">Question: <span id="questionNum">1</span>/10</p>
                </div>
                <button id="startBtn" class="bg-red-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-red-700">
                    Start Game
                </button>
            </div>
        </div>

        <!-- Main Game -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <!-- Question -->
            <div class="mb-8 text-center">
                <div id="question" class="text-2xl font-bold text-gray-800 mb-4">Click Start to begin</div>
                <div id="hint" class="text-gray-500 italic hidden">Hint will appear here</div>
            </div>

            <!-- Options -->
            <div id="options" class="space-y-4 mb-8">
                <!-- Options will appear here -->
            </div>

            <!-- Feedback -->
            <div id="feedback" class="text-center text-lg font-bold p-4 rounded-lg hidden"></div>

            <!-- Controls -->
            <div class="text-center">
                <button id="nextBtn" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-700 hidden">
                    Next Question
                </button>
            </div>
        </div>

        <!-- Instructions & Verb List -->
        <div class="grid md:grid-cols-2 gap-6">
            <!-- Instructions -->
            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="text-xl font-bold text-gray-800 mb-4">How to Play</h3>
                <ul class="space-y-3 text-gray-700">
                    <li>• Match English verbs with Turkish irregular forms</li>
                    <li>• Each correct answer = 10 points</li>
                    <li>• Complete all 10 questions</li>
                    <li>• Pay attention to vowel harmony changes</li>
                </ul>
            </div>

            <!-- Verb Examples -->
            <div class="bg-red-50 p-6 rounded-xl shadow border border-red-200">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Irregular Examples</h3>
                <div class="space-y-2 text-gray-700">
                    <div><span class="font-bold">gelmek</span> → gelir (to come)</div>
                    <div><span class="font-bold">gitmek</span> → gider (to go)</div>
                    <div><span class="font-bold">demek</span> → der (to say)</div>
                    <div><span class="font-bold">yemek</span> → yer (to eat)</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Irregular verbs data
        const verbs = [
            { english: "to come", turkish: "gelmek", form: "gelir", type: "irregular" },
            { english: "to go", turkish: "gitmek", form: "gider", type: "irregular" },
            { english: "to say", turkish: "demek", form: "der", type: "irregular" },
            { english: "to eat", turkish: "yemek", form: "yer", type: "irregular" },
            { english: "to know", turkish: "bilmek", form: "bilir", type: "regular" },
            { english: "to want", turkish: "istemek", form: "ister", type: "irregular" },
            { english: "to have", turkish: "sahip olmak", form: "sahip olur", type: "irregular" },
            { english: "to do", turkish: "yapmak", form: "yapar", type: "regular" },
            { english: "to take", turkish: "almak", form: "alır", type: "regular" },
            { english: "to give", turkish: "vermek", form: "verir", type: "regular" }
        ];

        // Game variables
        let score = 0;
        let currentQuestion = 0;
        let gameActive = false;

        // DOM elements
        const questionEl = document.getElementById('question');
        const optionsEl = document.getElementById('options');
        const feedbackEl = document.getElementById('feedback');
        const scoreEl = document.getElementById('score');
        const questionNumEl = document.getElementById('questionNum');
        const startBtn = document.getElementById('startBtn');
        const nextBtn = document.getElementById('nextBtn');
        const hintEl = document.getElementById('hint');

        // Start game
        startBtn.addEventListener('click', startGame);

        function startGame() {
            score = 0;
            currentQuestion = 0;
            gameActive = true;
            
            scoreEl.textContent = score;
            startBtn.textContent = "Restart Game";
            nextBtn.classList.add('hidden');
            
            loadQuestion();
        }

        // Load question
        function loadQuestion() {
            if (currentQuestion >= 10) {
                endGame();
                return;
            }
            
            const verb = verbs[currentQuestion];
            questionEl.textContent = `What is the Turkish present form of "${verb.english}"?`;
            questionNumEl.textContent = currentQuestion + 1;
            hintEl.classList.add('hidden');
            feedbackEl.classList.add('hidden');
            
            // Clear options
            optionsEl.innerHTML = '';
            
            // Create options (correct + 3 wrong)
            const options = [verb.form];
            
            // Add wrong options
            while (options.length < 4) {
                const randomVerb = verbs[Math.floor(Math.random() * verbs.length)];
                if (!options.includes(randomVerb.form)) {
                    options.push(randomVerb.form);
                }
            }
            
            // Shuffle options
            options.sort(() => Math.random() - 0.5);
            
            // Create buttons
            options.forEach(option => {
                const button = document.createElement('button');
                button.className = 'w-full p-4 bg-gray-100 rounded-lg hover:bg-gray-200 text-left';
                button.textContent = option;
                
                button.addEventListener('click', () => checkAnswer(option === verb.form, button, verb));
                optionsEl.appendChild(button);
            });
        }

        // Check answer
        function checkAnswer(correct, button, verb) {
            if (!gameActive) return;
            
            // Disable all buttons
            document.querySelectorAll('#options button').forEach(btn => {
                btn.disabled = true;
                btn.classList.remove('hover:bg-gray-200');
            });
            
            // Show feedback
            feedbackEl.classList.remove('hidden');
            
            if (correct) {
                button.className = 'w-full p-4 bg-green-500 text-white rounded-lg';
                feedbackEl.textContent = `Correct! ${verb.english} = ${verb.turkish} (${verb.form})`;
                feedbackEl.className = 'text-center text-lg font-bold p-4 rounded-lg bg-green-100 text-green-700';
                score += 10;
                scoreEl.textContent = score;
            } else {
                button.className = 'w-full p-4 bg-red-500 text-white rounded-lg';
                feedbackEl.textContent = `Wrong! The correct answer is ${verb.form} (${verb.turkish})`;
                feedbackEl.className = 'text-center text-lg font-bold p-4 rounded-lg bg-red-100 text-red-700';
                
                // Highlight correct answer
                document.querySelectorAll('#options button').forEach(btn => {
                    if (btn.textContent === verb.form) {
                        btn.className = 'w-full p-4 bg-green-500 text-white rounded-lg';
                    }
                });
            }
            
            // Show next button
            nextBtn.classList.remove('hidden');
        }

        // Next question
        nextBtn.addEventListener('click', () => {
            currentQuestion++;
            nextBtn.classList.add('hidden');
            loadQuestion();
        });

        // End game
        function endGame() {
            questionEl.textContent = `Game Over! Final Score: ${score}`;
            optionsEl.innerHTML = '';
            feedbackEl.classList.remove('hidden');
            feedbackEl.textContent = `You got ${score / 10} out of 10 correct!`;
            feedbackEl.className = 'text-center text-lg font-bold p-4 rounded-lg bg-blue-100 text-blue-700';
            nextBtn.classList.add('hidden');
            gameActive = false;
        }
    </script>
</body>
</html>