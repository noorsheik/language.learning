<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turkish Alphabet - Simple Learner</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .letter-card {
            transition: all 0.2s;
        }
        .letter-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .sound-btn {
            transition: all 0.2s;
        }
        .sound-btn:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-50 min-h-screen p-4">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <header class="text-center mb-8 md:mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Turkish Alphabet Learner</h1>
            <p class="text-gray-600">Simple guide to Turkish letters and their English sounds</p>
            
            <!-- Key Info -->
            <div class="mt-6 bg-white rounded-xl shadow-sm p-4 max-w-2xl mx-auto">
                <p class="text-gray-700">
                    Turkish has 29 letters. It's a phonetic language - each letter always makes the same sound.
                    <span class="font-semibold text-blue-600">Unique Turkish letters: Ç, Ğ, I, İ, Ö, Ş, Ü</span>
                </p>
            </div>
        </header>

        <!-- Main Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Alphabet Grid -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="bg-blue-100 text-blue-800 p-2 rounded-lg mr-3">
                        A - Z
                    </span>
                    Turkish Alphabet
                </h2>
                
                <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <!-- Letters will be populated by JavaScript -->
                </div>
                
                <!-- Pronunciation Guide -->
                <div class="mt-8 p-4 bg-blue-50 rounded-xl border border-blue-100">
                    <h3 class="font-bold text-blue-800 mb-2">Pronunciation Guide</h3>
                    <ul class="text-sm text-blue-700 space-y-1">
                        <li>• <span class="font-semibold">C</span> always sounds like English "J" (jam)</li>
                        <li>• <span class="font-semibold">Ç</span> sounds like "CH" (chat)</li>
                        <li>• <span class="font-semibold">Ğ</span> is silent or lengthens the previous vowel</li>
                        <li>• <span class="font-semibold">Ş</span> sounds like "SH" (shoe)</li>
                    </ul>
                </div>
            </div>
            
            <!-- Focus Letter & Sounds -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="bg-green-100 text-green-800 p-2 rounded-lg mr-3">
                        <i class="fas fa-volume-up"></i>
                    </span>
                    Letter Sounds
                </h2>
                
                <!-- Selected Letter Display -->
                <div class="text-center mb-8">
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl p-8 md:p-10 shadow-lg inline-block">
                        <p id="focus-letter" class="text-8xl md:text-9xl font-bold text-white">A</p>
                    </div>
                    <p class="text-gray-600 mt-4">Click any letter to hear its sound</p>
                </div>
                
                <!-- Sound Details -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">English Sound</h3>
                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-200">
                        <p id="focus-sound" class="text-2xl font-bold text-gray-800 mb-2">"a" as in "car"</p>
                        <p id="focus-details" class="text-gray-600">The Turkish A always sounds like the "a" in "car" or "father"</p>
                    </div>
                </div>
                
                <!-- Example Words -->
                <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Example Words</h3>
                    <div id="examples" class="space-y-3">
                        <!-- Examples will be populated by JavaScript -->
                    </div>
                </div>
                
                <!-- Practice Button -->
                <div class="mt-8 text-center">
                    <button id="practice-btn" class="bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-3 rounded-xl font-bold text-lg hover:from-green-600 hover:to-emerald-700 transition shadow-lg">
                        <i class="fas fa-play mr-2"></i> Practice This Letter
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Simple Quiz Section -->
        <div class="mt-8 bg-white rounded-2xl shadow-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Quick Practice</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Quiz Question -->
                <div>
                    <p class="text-gray-700 mb-4">What's the English sound for this Turkish letter?</p>
                    
                    <div class="bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl p-8 shadow-lg inline-block mb-6">
                        <p id="quiz-letter" class="text-7xl md:text-8xl font-bold text-white">Ç</p>
                    </div>
                    
                    <div class="space-y-3" id="quiz-options">
                        <!-- Options will be populated by JavaScript -->
                    </div>
                    
                    <div class="mt-6">
                        <button id="next-quiz-btn" class="bg-blue-600 text-white px-5 py-2 rounded-lg font-medium hover:bg-blue-700 transition">
                            Next Letter <i class="fas fa-arrow-right ml-1"></i>
                        </button>
                        <span id="quiz-feedback" class="ml-4 font-medium"></span>
                    </div>
                </div>
                
                <!-- Special Turkish Letters -->
                <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Unique Turkish Letters</h3>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-red-50 border border-red-200 rounded-xl p-4 text-center">
                            <p class="text-3xl font-bold text-red-700 mb-1">Ç</p>
                            <p class="text-sm text-red-600">"ch" as in chat</p>
                        </div>
                        <div class="bg-red-50 border border-red-200 rounded-xl p-4 text-center">
                            <p class="text-3xl font-bold text-red-700 mb-1">Ğ</p>
                            <p class="text-sm text-red-600">silent or lengthens vowel</p>
                        </div>
                        <div class="bg-red-50 border border-red-200 rounded-xl p-4 text-center">
                            <p class="text-3xl font-bold text-red-700 mb-1">I</p>
                            <p class="text-sm text-red-600">"ı" like "cousin"</p>
                        </div>
                        <div class="bg-red-50 border border-red-200 rounded-xl p-4 text-center">
                            <p class="text-3xl font-bold text-red-700 mb-1">İ</p>
                            <p class="text-sm text-red-600">"ee" as in see</p>
                        </div>
                        <div class="bg-red-50 border border-red-200 rounded-xl p-4 text-center">
                            <p class="text-3xl font-bold text-red-700 mb-1">Ö</p>
                            <p class="text-sm text-red-600">"eu" as in French</p>
                        </div>
                        <div class="bg-red-50 border border-red-200 rounded-xl p-4 text-center">
                            <p class="text-3xl font-bold text-red-700 mb-1">Ş</p>
                            <p class="text-sm text-red-600">"sh" as in shoe</p>
                        </div>
                        <div class="bg-red-50 border border-red-200 rounded-xl p-4 text-center">
                            <p class="text-3xl font-bold text-red-700 mb-1">Ü</p>
                            <p class="text-sm text-red-600">"ue" as in French</p>
                        </div>
                    </div>
                    
                    <div class="mt-6 p-4 bg-yellow-50 rounded-xl border border-yellow-200">
                        <p class="text-yellow-800 text-sm">
                            <span class="font-bold">Note:</span> Turkish doesn't have the letters Q, W, or X.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <footer class="mt-8 text-center text-gray-600 text-sm">
            <p>Turkish Alphabet Learner - Simple tool for learning Turkish letter sounds</p>
        </footer>
    </div>

    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script>
        // Turkish alphabet data - simplified
        const turkishAlphabet = [
            { letter: "A", sound: "\"a\" as in \"car\"", details: "Always sounds like the 'a' in 'car' or 'father'" },
            { letter: "B", sound: "\"b\" as in \"boy\"", details: "Same as English 'b'" },
            { letter: "C", sound: "\"j\" as in \"jam\"", details: "Always like English 'j', never like 'c' in 'cat'" },
            { letter: "Ç", sound: "\"ch\" as in \"chat\"", details: "Like English 'ch'" },
            { letter: "D", sound: "\"d\" as in \"dog\"", details: "Same as English 'd'" },
            { letter: "E", sound: "\"e\" as in \"bed\"", details: "Like the 'e' in 'bed' or 'red'" },
            { letter: "F", sound: "\"f\" as in \"far\"", details: "Same as English 'f'" },
            { letter: "G", sound: "\"g\" as in \"go\"", details: "Always hard 'g' like in 'go'" },
            { letter: "Ğ", sound: "silent or lengthens vowel", details: "Called 'soft g'. It lengthens the previous vowel or is silent" },
            { letter: "H", sound: "\"h\" as in \"hot\"", details: "Same as English 'h', always pronounced" },
            { letter: "I", sound: "\"e\" as in \"open\" or \"ı\"", details: "Like 'e' in 'open' or 'i' in 'cousin'. No exact English equivalent" },
            { letter: "İ", sound: "\"ee\" as in \"see\"", details: "Like English long 'e' in 'see' or 'me'" },
            { letter: "J", sound: "\"zh\" as in \"pleasure\"", details: "Like the 's' in 'pleasure' or 'measure'" },
            { letter: "K", sound: "\"k\" as in \"kite\"", details: "Same as English 'k'" },
            { letter: "L", sound: "\"l\" as in \"love\"", details: "Same as English 'l'" },
            { letter: "M", sound: "\"m\" as in \"mother\"", details: "Same as English 'm'" },
            { letter: "N", sound: "\"n\" as in \"nice\"", details: "Same as English 'n'" },
            { letter: "O", sound: "\"o\" as in \"more\"", details: "Like 'o' in 'more' or 'door'" },
            { letter: "Ö", sound: "\"eu\" as in French \"feu\"", details: "Similar to German 'ö'. No exact English equivalent" },
            { letter: "P", sound: "\"p\" as in \"paper\"", details: "Same as English 'p'" },
            { letter: "R", sound: "\"r\" as in \"red\" (rolled)", details: "Like Spanish 'r', slightly rolled or tapped" },
            { letter: "S", sound: "\"s\" as in \"sun\"", details: "Always like 's' in 'sun', never like 'z'" },
            { letter: "Ş", sound: "\"sh\" as in \"shoe\"", details: "Like English 'sh'" },
            { letter: "T", sound: "\"t\" as in \"tea\"", details: "Same as English 't'" },
            { letter: "U", sound: "\"oo\" as in \"boot\"", details: "Like 'oo' in 'boot' or 'food'" },
            { letter: "Ü", sound: "\"u\" as in French \"tu\"", details: "Similar to German 'ü'. No exact English equivalent" },
            { letter: "V", sound: "\"v\" as in \"very\"", details: "Same as English 'v'" },
            { letter: "Y", sound: "\"y\" as in \"yes\"", details: "Same as English 'y' in 'yes'" },
            { letter: "Z", sound: "\"z\" as in \"zoo\"", details: "Same as English 'z'" }
        ];

        // Example words for each letter
        const examples = {
            "A": ["Araba (car)", "Anne (mother)", "Akıl (mind)"],
            "B": ["Balık (fish)", "Baba (father)", "Bardak (glass)"],
            "C": ["Cami (mosque)", "Cep (pocket)", "Cevap (answer)"],
            "Ç": ["Çay (tea)", "Çiçek (flower)", "Çocuk (child)"],
            "D": ["Deniz (sea)", "Dünya (world)", "Dost (friend)"],
            "E": ["Ev (house)", "Ekmek (bread)", "Elma (apple)"],
            "F": ["Fil (elephant)", "Fırtına (storm)", "Fener (lantern)"],
            "G": ["Gül (rose)", "Gökyüzü (sky)", "Gazete (newspaper)"],
            "Ğ": ["Dağ (mountain)", "Ağaç (tree)", "Eğitim (education)"],
            "H": ["Hava (air)", "Hayat (life)", "Hız (speed)"],
            "I": ["Irmak (river)", "Ilık (warm)", "Isı (heat)"],
            "İ": ["İstanbul (Istanbul)", "İnsan (human)", "İsim (name)"],
            "J": ["Jale (dew)", "Jandarma (gendarmerie)", "Jeton (token)"],
            "K": ["Kalem (pencil)", "Kedi (cat)", "Kitap (book)"],
            "L": ["Limon (lemon)", "Lale (tulip)", "Lokanta (restaurant)"],
            "M": ["Masa (table)", "Meyve (fruit)", "Müzik (music)"],
            "N": ["Nar (pomegranate)", "Neden (reason)", "Nakit (cash)"],
            "O": ["Orman (forest)", "Otobüs (bus)", "Oda (room)"],
            "Ö": ["Ördek (duck)", "Öğrenci (student)", "Ödev (homework)"],
            "P": ["Pencere (window)", "Para (money)", "Pazar (Sunday/market)"],
            "R": ["Renk (color)", "Rüya (dream)", "Resim (picture)"],
            "S": ["Saat (clock/hour)", "Sokak (street)", "Süt (milk)"],
            "Ş": ["Şeker (sugar)", "Şehir (city)", "Şapka (hat)"],
            "T": ["Tatlı (dessert)", "Türk (Turk)", "Tarih (date/history)"],
            "U": ["Uçak (airplane)", "Uzun (long/tall)", "Umut (hope)"],
            "Ü": ["Üzüm (grape)", "Ülke (country)", "Üç (three)"],
            "V": ["Vazo (vase)", "Vapur (ferry)", "Vücut (body)"],
            "Y": ["Yıldız (star)", "Yol (road)", "Yemek (food)"],
            "Z": ["Zil (bell)", "Zaman (time)", "Zeytin (olive)"]
        };

        // Current focus letter
        let currentLetter = "A";
        let currentQuizLetter = null;
        let currentQuizCorrect = null;

        // DOM elements
        const focusLetterEl = document.getElementById('focus-letter');
        const focusSoundEl = document.getElementById('focus-sound');
        const focusDetailsEl = document.getElementById('focus-details');
        const examplesEl = document.getElementById('examples');
        const quizLetterEl = document.getElementById('quiz-letter');
        const quizOptionsEl = document.getElementById('quiz-options');
        const quizFeedbackEl = document.getElementById('quiz-feedback');
        const practiceBtn = document.getElementById('practice-btn');
        const nextQuizBtn = document.getElementById('next-quiz-btn');

        // Initialize the page
        function init() {
            renderAlphabetGrid();
            updateFocusLetter("A");
            setupQuiz();
            
            // Add event listeners
            practiceBtn.addEventListener('click', practiceLetter);
            nextQuizBtn.addEventListener('click', setupQuiz);
        }

        // Render the alphabet grid
        function renderAlphabetGrid() {
            const gridContainer = document.querySelector('.grid.gap-4');
            gridContainer.innerHTML = '';
            
            turkishAlphabet.forEach(letterData => {
                const card = document.createElement('div');
                card.className = `letter-card bg-white border border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-blue-300`;
                card.innerHTML = `
                    <div class="text-3xl font-bold text-gray-800 mb-2">${letterData.letter}</div>
                    <div class="text-sm text-gray-600">${letterData.sound}</div>
                `;
                
                card.addEventListener('click', () => {
                    updateFocusLetter(letterData.letter);
                    
                    // Add visual feedback
                    document.querySelectorAll('.letter-card').forEach(c => {
                        c.classList.remove('ring-2', 'ring-blue-500', 'bg-blue-50');
                    });
                    card.classList.add('ring-2', 'ring-blue-500', 'bg-blue-50');
                });
                
                gridContainer.appendChild(card);
            });
            
            // Highlight the first letter initially
            if (gridContainer.firstChild) {
                gridContainer.firstChild.classList.add('ring-2', 'ring-blue-500', 'bg-blue-50');
            }
        }

        // Update the focus letter section
        function updateFocusLetter(letter) {
            currentLetter = letter;
            const letterData = turkishAlphabet.find(l => l.letter === letter);
            
            if (!letterData) return;
            
            // Update the focus letter display
            focusLetterEl.textContent = letterData.letter;
            focusSoundEl.textContent = letterData.sound;
            focusDetailsEl.textContent = letterData.details;
            
            // Update examples
            examplesEl.innerHTML = '';
            const letterExamples = examples[letter] || ["Example 1", "Example 2", "Example 3"];
            
            letterExamples.forEach(example => {
                const exampleDiv = document.createElement('div');
                exampleDiv.className = 'bg-gray-50 rounded-lg p-3 border border-gray-200';
                exampleDiv.textContent = example;
                examplesEl.appendChild(exampleDiv);
            });
        }

        // Practice the current letter
        function practiceLetter() {
            const letterData = turkishAlphabet.find(l => l.letter === currentLetter);
            if (!letterData) return;
            
            // In a real app, we would play audio here
            // For this demo, we'll show an alert and log to console
            alert(`Practicing: ${currentLetter} - ${letterData.sound}\n\nSay it out loud: "${letterData.sound}"`);
            console.log(`Practicing ${currentLetter}: ${letterData.sound}`);
            
            // Visual feedback
            practiceBtn.innerHTML = '<i class="fas fa-check mr-2"></i> Practiced!';
            practiceBtn.classList.remove('from-green-500', 'to-emerald-600');
            practiceBtn.classList.add('from-blue-500', 'to-indigo-600');
            
            setTimeout(() => {
                practiceBtn.innerHTML = '<i class="fas fa-play mr-2"></i> Practice This Letter';
                practiceBtn.classList.remove('from-blue-500', 'to-indigo-600');
                practiceBtn.classList.add('from-green-500', 'to-emerald-600');
            }, 1500);
        }

        // Setup a new quiz question
        function setupQuiz() {
            // Reset feedback
            quizFeedbackEl.textContent = '';
            quizFeedbackEl.className = 'ml-4 font-medium';
            
            // Select a random letter for the quiz
            const randomIndex = Math.floor(Math.random() * turkishAlphabet.length);
            const quizLetterData = turkishAlphabet[randomIndex];
            currentQuizLetter = quizLetterData.letter;
            currentQuizCorrect = quizLetterData.sound;
            
            // Update the quiz letter display
            quizLetterEl.textContent = currentQuizLetter;
            
            // Create options (1 correct + 3 random wrong)
            const options = [quizLetterData.sound];
            
            // Add 3 random wrong options
            while (options.length < 4) {
                const randomOptionIndex = Math.floor(Math.random() * turkishAlphabet.length);
                const randomOption = turkishAlphabet[randomOptionIndex].sound;
                
                if (!options.includes(randomOption)) {
                    options.push(randomOption);
                }
            }
            
            // Shuffle options
            shuffleArray(options);
            
            // Render options
            quizOptionsEl.innerHTML = '';
            options.forEach(option => {
                const optionBtn = document.createElement('button');
                optionBtn.className = 'sound-btn w-full bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-3 px-4 rounded-lg text-left';
                optionBtn.textContent = option;
                
                optionBtn.addEventListener('click', () => {
                    checkQuizAnswer(option, optionBtn);
                });
                
                quizOptionsEl.appendChild(optionBtn);
            });
        }

        // Check quiz answer
        function checkQuizAnswer(selectedOption, button) {
            // Disable all buttons
            document.querySelectorAll('#quiz-options button').forEach(btn => {
                btn.disabled = true;
            });
            
            if (selectedOption === currentQuizCorrect) {
                // Correct answer
                button.classList.remove('bg-gray-100', 'hover:bg-gray-200');
                button.classList.add('bg-green-100', 'border', 'border-green-400');
                quizFeedbackEl.textContent = 'Correct! ✓';
                quizFeedbackEl.className = 'ml-4 font-medium text-green-600';
            } else {
                // Wrong answer
                button.classList.remove('bg-gray-100', 'hover:bg-gray-200');
                button.classList.add('bg-red-100', 'border', 'border-red-400');
                quizFeedbackEl.textContent = `Incorrect. The answer is: ${currentQuizCorrect}`;
                quizFeedbackEl.className = 'ml-4 font-medium text-red-600';
                
                // Highlight the correct answer
                document.querySelectorAll('#quiz-options button').forEach(btn => {
                    if (btn.textContent === currentQuizCorrect) {
                        btn.classList.remove('bg-gray-100', 'hover:bg-gray-200');
                        btn.classList.add('bg-green-100', 'border', 'border-green-400');
                    }
                });
            }
        }

        // Utility function to shuffle array
        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        }

        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', init);
    </script>
</body>
</html><?php /**PATH C:\Users\User\Herd\game\resources\views/Turkey/letters.blade.php ENDPATH**/ ?>