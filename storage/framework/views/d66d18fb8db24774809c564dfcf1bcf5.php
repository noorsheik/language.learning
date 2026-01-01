<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Past Tense Game</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .verb-card {
            transition: all 0.3s ease;
        }
        .verb-card:hover {
            transform: translateY(-5px);
        }
        .match-area {
            min-height: 100px;
            transition: all 0.3s ease;
        }
        .correct {
            background-color: #d1fae5;
            border-color: #10b981;
        }
        .incorrect {
            background-color: #fee2e2;
            border-color: #ef4444;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-red-50 to-yellow-50 min-h-screen p-4">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <header class="text-center mb-8">
            <h1 class="text-4xl font-bold text-red-600 mb-2">Past Simple Match</h1>
            <p class="text-lg text-gray-700">Drag the base verbs to their correct past simple forms</p>
        </header>

        <!-- Game Stats -->
        <div class="flex justify-between items-center bg-white rounded-xl shadow p-4 mb-6">
            <div class="text-center">
                <p class="text-sm text-gray-600">Score</p>
                <p class="text-2xl font-bold text-yellow-500" id="score">0</p>
            </div>
            <div class="text-center">
                <p class="text-sm text-gray-600">Remaining</p>
                <p class="text-2xl font-bold text-red-600" id="remaining">8</p>
            </div>
        </div>

        <!-- Game Area -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Match the verbs</h2>
            
            <!-- Base Verbs -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-red-600 mb-2">Base Verbs</h3>
                <div id="base-verbs" class="flex flex-wrap gap-3">
                    <!-- Base verbs will be added here -->
                </div>
            </div>
            
            <!-- Past Simple Verbs -->
            <div>
                <h3 class="text-lg font-semibold text-yellow-500 mb-2">Past Simple Forms</h3>
                <div id="past-verbs" class="grid grid-cols-2 gap-4">
                    <!-- Past verbs will be added here -->
                </div>
            </div>
        </div>

        <!-- Message Area -->
        <div id="message" class="text-center mb-6">
            <p class="text-lg font-semibold text-gray-700">Drag a base verb to its past simple form!</p>
        </div>

        <!-- Controls -->
        <div class="flex justify-center gap-4">
            <button id="reset-btn" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg shadow transition">
                Reset Game
            </button>
            <button id="next-btn" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded-lg shadow transition hidden">
                Next Level
            </button>
        </div>

        <!-- Instructions -->
        <div class="mt-8 bg-yellow-50 border-l-4 border-yellow-500 p-4 rounded">
            <h3 class="font-bold text-lg text-gray-800 mb-2">How to Play</h3>
            <p class="text-gray-700">Drag the base verbs (like "go") to their correct past simple forms (like "went").</p>
        </div>
    </div>

    <script>
        // Game data - base verbs and their past simple forms
        const verbs = [
            { base: "go", past: "went" },
            { base: "eat", past: "ate" },
            { base: "see", past: "saw" },
            { base: "take", past: "took" },
            { base: "make", past: "made" },
            { base: "come", past: "came" },
            { base: "know", past: "knew" },
            { base: "get", past: "got" }
        ];

        // Game state
        let score = 0;
        let remaining = verbs.length;
        let currentDraggedElement = null;

        // DOM elements
        const baseVerbsContainer = document.getElementById('base-verbs');
        const pastVerbsContainer = document.getElementById('past-verbs');
        const scoreDisplay = document.getElementById('score');
        const remainingDisplay = document.getElementById('remaining');
        const messageDisplay = document.getElementById('message');
        const resetBtn = document.getElementById('reset-btn');
        const nextBtn = document.getElementById('next-btn');

        // Initialize the game
        function initGame() {
            score = 0;
            remaining = verbs.length;
            scoreDisplay.textContent = score;
            remainingDisplay.textContent = remaining;
            messageDisplay.innerHTML = '<p class="text-lg font-semibold text-gray-700">Drag a base verb to its past simple form!</p>';
            nextBtn.classList.add('hidden');
            
            // Clear containers
            baseVerbsContainer.innerHTML = '';
            pastVerbsContainer.innerHTML = '';
            
            // Create base verb cards
            verbs.forEach(verb => {
                const baseCard = document.createElement('div');
                baseCard.className = 'verb-card bg-red-100 border-2 border-red-300 text-red-700 font-bold py-3 px-4 rounded-lg shadow cursor-move';
                baseCard.textContent = verb.base;
                baseCard.draggable = true;
                baseCard.dataset.base = verb.base;
                baseCard.dataset.past = verb.past;
                
                baseCard.addEventListener('dragstart', dragStart);
                
                baseVerbsContainer.appendChild(baseCard);
            });
            
            // Create past verb areas
            // Shuffle the verbs for past forms
            const shuffledVerbs = [...verbs].sort(() => Math.random() - 0.5);
            
            shuffledVerbs.forEach(verb => {
                const pastArea = document.createElement('div');
                pastArea.className = 'match-area bg-yellow-50 border-2 border-dashed border-yellow-300 rounded-lg p-4 text-center';
                pastArea.dataset.past = verb.past;
                
                const pastText = document.createElement('p');
                pastText.className = 'text-lg font-bold text-yellow-700';
                pastText.textContent = verb.past;
                pastArea.appendChild(pastText);
                
                pastArea.addEventListener('dragover', dragOver);
                pastArea.addEventListener('drop', drop);
                
                pastVerbsContainer.appendChild(pastArea);
            });
        }

        // Drag and drop functions
        function dragStart(e) {
            currentDraggedElement = e.target;
            e.dataTransfer.setData('text/plain', e.target.dataset.base);
        }

        function dragOver(e) {
            e.preventDefault();
        }

        function drop(e) {
            e.preventDefault();
            const baseVerb = currentDraggedElement.dataset.base;
            const correctPast = currentDraggedElement.dataset.past;
            const targetPast = e.currentTarget.dataset.past;
            
            if (correctPast === targetPast) {
                // Correct match
                e.currentTarget.classList.add('correct');
                e.currentTarget.innerHTML = `
                    <p class="text-lg font-bold text-green-700">${targetPast}</p>
                    <p class="text-sm text-green-600">✓ ${baseVerb}</p>
                `;
                
                // Disable the base verb card
                currentDraggedElement.style.opacity = '0.5';
                currentDraggedElement.style.cursor = 'default';
                currentDraggedElement.draggable = false;
                
                // Update score
                score += 10;
                remaining--;
                scoreDisplay.textContent = score;
                remainingDisplay.textContent = remaining;
                
                // Show success message
                messageDisplay.innerHTML = `
                    <p class="text-lg font-semibold text-green-600">Correct! ${baseVerb} → ${targetPast}</p>
                `;
                
                // Check if game is complete
                if (remaining === 0) {
                    messageDisplay.innerHTML = `
                        <p class="text-2xl font-bold text-green-600">Congratulations! You've matched all verbs!</p>
                        <p class="text-lg text-gray-700 mt-2">Your score: ${score}</p>
                    `;
                    nextBtn.classList.remove('hidden');
                }
            } else {
                // Incorrect match
                e.currentTarget.classList.add('incorrect');
                
                // Show error message
                messageDisplay.innerHTML = `
                    <p class="text-lg font-semibold text-red-600">Try again! ${baseVerb} is not ${targetPast}</p>
                `;
                
                // Reset the style after a short delay
                setTimeout(() => {
                    e.currentTarget.classList.remove('incorrect');
                }, 1000);
            }
        }

        // Event listeners
        resetBtn.addEventListener('click', initGame);
        nextBtn.addEventListener('click', initGame);

        // Initialize the game when page loads
        window.addEventListener('DOMContentLoaded', initGame);
    </script>
</body>
</html><?php /**PATH C:\Users\User\Herd\game\resources\views/english/past_simple.blade.php ENDPATH**/ ?>