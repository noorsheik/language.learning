<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <title>Red Letters | Arabic Alphabet Game (First Half)</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .game-card {
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .game-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 20px 25px -12px rgba(220, 38, 38, 0.3);
    }
    .arabic-letter {
      font-family: 'Segoe UI', 'Tahoma', 'Amiri', 'Traditional Arabic', 'Scheherazade New', serif;
      letter-spacing: 2px;
    }
    .option-btn {
      transition: all 0.2s ease;
    }
    .option-btn:active {
      transform: scale(0.96);
    }
    @keyframes gentlePulse {
      0% { opacity: 0.7; transform: scale(0.98);}
      100% { opacity: 1; transform: scale(1);}
    }
    .feedback-pulse {
      animation: gentlePulse 0.3s ease-out;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-red-50 via-red-100 to-rose-100 min-h-screen flex items-center justify-center p-4">

  <div class="w-full max-w-2xl mx-auto">
   
    <div class="game-card bg-white rounded-3xl shadow-2xl border-2 border-red-300 overflow-hidden">
      
     
      <div class="bg-red-600 px-6 py-4 text-white flex flex-wrap justify-between items-center gap-3">
        <div>
          <h1 class="text-2xl md:text-3xl font-extrabold tracking-tight flex items-center gap-2">
            🔴 <span>Red Letters</span> 🔴
          </h1>
          <p class="text-red-100 text-sm mt-1">Match the Arabic letter to its name | first 14 letters</p>
        </div>
        <div class="bg-white/20 backdrop-blur-sm rounded-full px-4 py-2 text-center">
          <span class="text-sm font-semibold">🌟 Score</span>
          <div class="text-2xl font-black leading-tight" id="scoreDisplay">0</div>
        </div>
      </div>
      
     
      <div class="p-6 md:p-8">
        
        <div class="text-center mb-6">
          <p class="text-red-500 font-bold uppercase tracking-wider text-sm mb-2">🔍 what is the name of this letter?</p>
          <div class="bg-red-50 inline-block p-6 rounded-3xl border-2 border-red-200 shadow-inner">
            <span id="questionLetter" class="arabic-letter text-8xl md:text-9xl font-bold text-red-800 tracking-wider">ا</span>
          </div>
        </div>
        
       
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-6" id="optionsContainer">
          
        </div>
        
    
        <div id="feedbackMessage" class="mt-6 text-center min-h-[64px] text-base font-medium flex items-center justify-center gap-2 rounded-xl bg-red-50 p-3 border border-red-200">
          <span>✨</span> <span id="feedbackText">Click a name button to match the red letter!</span> <span>✨</span>
        </div>
        
        
        <div class="flex flex-col sm:flex-row gap-3 mt-6 justify-center">
          <button id="skipBtn" class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 px-6 rounded-full shadow-md transition flex items-center justify-center gap-2">
            ⏩ Skip letter
          </button>
          <button id="resetBtn" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-full shadow-md transition flex items-center justify-center gap-2">
            🔄 Reset Game
          </button>
        </div>
        
     
        <div class="mt-6 text-center text-xs text-gray-500 bg-gray-50 rounded-xl p-3 border border-red-100">
          <span class="font-bold text-red-600">📖 First half (14 letters):</span> 
          <span dir="rtl" class="inline-block text-base arabic-letter tracking-wide">ا, ب, ت, ث, ج, ح, خ, د, ذ, ر, ز, س, ش, ص</span>
          <span class="block text-gray-400 mt-1">Tap the correct English name — learn while playing!</span>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Full list: first 14 letters in standard Arabic order
    const ARABIC_LETTERS = [
      { char: "ا", name: "Alif" },
      { char: "ب", name: "Ba" },
      { char: "ت", name: "Ta" },
      { char: "ث", name: "Tha" },
      { char: "ج", name: "Jeem" },
      { char: "ح", name: "Ha" },
      { char: "خ", name: "Kha" },
      { char: "د", name: "Dal" },
      { char: "ذ", name: "Thal" },
      { char: "ر", name: "Ra" },
      { char: "ز", name: "Zay" },
      { char: "س", name: "Seen" },
      { char: "ش", name: "Sheen" },
      { char: "ص", name: "Sad" }
    ];

    // ---------- DOM elements ----------
    const questionLetterSpan = document.getElementById('questionLetter');
    const optionsContainer = document.getElementById('optionsContainer');
    const scoreDisplaySpan = document.getElementById('scoreDisplay');
    const feedbackTextSpan = document.getElementById('feedbackText');
    const skipBtn = document.getElementById('skipBtn');
    const resetBtn = document.getElementById('resetBtn');
    
    // Game state
    let currentCorrectLetter = null;       
    let currentScore = 0;
    let isLocked = false;                  
    let pendingTimeout = null;             
    
    
    function shuffleArray(arr) {
      for (let i = arr.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [arr[i], arr[j]] = [arr[j], arr[i]];
      }
      return arr;
    }
    
    // Generate 3 unique options: correct + 2 distinct random distractors (different from correct)
    function generateOptions(correctLetter, allLetters) {
      const otherLetters = allLetters.filter(letter => letter.char !== correctLetter.char);
      let shuffledOthers = shuffleArray([...otherLetters]);
      let distractors = shuffledOthers.slice(0, 2);
      while (distractors.length < 2) {
        distractors.push(otherLetters[Math.floor(Math.random() * otherLetters.length)]);
      }
      let opts = [correctLetter, distractors[0], distractors[1]];
      return shuffleArray(opts);
    }
    

    function renderOptionsButtons(optionsArray) {
  
      optionsContainer.innerHTML = '';
      // create button for each option
      optionsArray.forEach(option => {
        const btn = document.createElement('button');
        btn.className = "option-btn bg-red-50 hover:bg-red-100 border-2 border-red-300 rounded-2xl p-4 transition-all shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400 text-center flex items-center justify-center";
        btn.setAttribute('data-char', option.char);
        btn.setAttribute('data-name', option.name);
        // inner HTML: only the transliterated name, large and readable
        btn.innerHTML = `
          <span class="text-2xl md:text-3xl font-bold text-red-800 tracking-wide">${option.name}</span>
        `;
        // attach click event
        btn.addEventListener('click', (e) => {
          e.stopPropagation();
          handleAnswer(option.char);
        });
        optionsContainer.appendChild(btn);
      });
    }
    
    // update the UI: show big letter and set new options
    function updateQuestionUI(letterObj, optionsArray) {
      questionLetterSpan.textContent = letterObj.char;
      renderOptionsButtons(optionsArray);
    }
    
    // load a brand new random question (keep current score unchanged)
    function loadNewQuestion() {
      if (pendingTimeout) {
        clearTimeout(pendingTimeout);
        pendingTimeout = null;
      }
      // reset lock flag (so buttons become clickable again)
      isLocked = false;
      
      // pick random letter from our list (first half)
      const randomIndex = Math.floor(Math.random() * ARABIC_LETTERS.length);
      const newLetter = { ...ARABIC_LETTERS[randomIndex] };
      currentCorrectLetter = newLetter;
      
      const freshOptions = generateOptions(currentCorrectLetter, ARABIC_LETTERS);
      
  
      updateQuestionUI(currentCorrectLetter, freshOptions);
      
      feedbackTextSpan.textContent = "🤔 Which name matches the letter?";
      const feedbackDiv = document.getElementById('feedbackMessage');
      feedbackDiv.classList.remove('bg-green-100', 'border-green-300', 'bg-red-100', 'border-red-300');
      feedbackDiv.classList.add('bg-red-50', 'border-red-200');
    }
    
    // handle correct answer: increment score, disable temporarily, show success, load new after delay
    function handleCorrect() {
      if (isLocked) return; 
      
      isLocked = true;
      
     
      currentScore++;
      scoreDisplaySpan.textContent = currentScore;
      
      // show positive feedback with red/catchy style
      feedbackTextSpan.textContent = `✅ CORRECT! "${currentCorrectLetter.name}" is right! +1 point 🎉`;
      const feedbackDiv = document.getElementById('feedbackMessage');
      feedbackDiv.classList.remove('bg-red-50', 'border-red-200', 'bg-red-100');
      feedbackDiv.classList.add('bg-green-100', 'border-green-300');
      
      const feedbackSpan = document.getElementById('feedbackText');
      feedbackSpan.classList.add('feedback-pulse');
      setTimeout(() => feedbackSpan.classList.remove('feedback-pulse'), 300);
      
      // disable answer buttons visually + functionally (prevent extra clicks)
      const allBtns = document.querySelectorAll('.option-btn');
      allBtns.forEach(btn => {
        btn.style.pointerEvents = 'none';
        btn.classList.add('opacity-60', 'cursor-not-allowed');
      });
      
      if (pendingTimeout) clearTimeout(pendingTimeout);
      pendingTimeout = setTimeout(() => {
        const btns = document.querySelectorAll('.option-btn');
        btns.forEach(btn => {
          btn.style.pointerEvents = '';
          btn.classList.remove('opacity-60', 'cursor-not-allowed');
        });
        loadNewQuestion();
        pendingTimeout = null;
      }, 650);
    }
    
    // handle wrong answer: show message, no score change, keep question active
    function handleWrong() {
      if (isLocked) return;
      

      feedbackTextSpan.textContent = `❌ Oops! That's not "${currentCorrectLetter.name}". Try again! 🔁`;
      const feedbackDiv = document.getElementById('feedbackMessage');
      feedbackDiv.classList.remove('bg-green-100', 'border-green-300', 'bg-red-50');
      feedbackDiv.classList.add('bg-red-100', 'border-red-400');
      // add subtle shake effect on feedback
      const feedbackSpan = document.getElementById('feedbackText');
      feedbackSpan.classList.add('feedback-pulse');
      setTimeout(() => feedbackSpan.classList.remove('feedback-pulse'), 350);
      
      const mainLetterDiv = document.querySelector('.bg-red-50');
      if (mainLetterDiv) {
        mainLetterDiv.classList.add('ring-4', 'ring-red-400', 'ring-opacity-70');
        setTimeout(() => mainLetterDiv.classList.remove('ring-4', 'ring-red-400', 'ring-opacity-70'), 400);
      }
    }
    
    // main answer handler: compares selected char with current correct letter
    function handleAnswer(selectedChar) {
      if (isLocked) return;  
      if (!currentCorrectLetter) return;
      
      if (selectedChar === currentCorrectLetter.char) {
        handleCorrect();
      } else {
        handleWrong();
      }
    }
    
    // SKIP functionality: jump to next letter without penalty (score unchanged)
    function skipToNextQuestion() {
      if (isLocked) {
        if (pendingTimeout) {
          clearTimeout(pendingTimeout);
          pendingTimeout = null;
        }
        const btns = document.querySelectorAll('.option-btn');
        btns.forEach(btn => {
          btn.style.pointerEvents = '';
          btn.classList.remove('opacity-60', 'cursor-not-allowed');
        });
        isLocked = false;
      }
      const feedbackDiv = document.getElementById('feedbackMessage');
      feedbackDiv.classList.remove('bg-green-100', 'border-green-300', 'bg-red-100', 'border-red-400');
      feedbackDiv.classList.add('bg-red-50', 'border-red-200');
      feedbackTextSpan.textContent = "⏩ Skipped! New letter appears ➡️";
      loadNewQuestion();
    }
    
    // RESET game: set score to 0, load fresh random question, clear lock & timeouts
    function resetGame() {
      // kill any pending timeout to avoid state conflicts
      if (pendingTimeout) {
        clearTimeout(pendingTimeout);
        pendingTimeout = null;
      }
      // re-enable buttons if they were disabled
      const btns = document.querySelectorAll('.option-btn');
      btns.forEach(btn => {
        btn.style.pointerEvents = '';
        btn.classList.remove('opacity-60', 'cursor-not-allowed');
      });
      // reset lock flag
      isLocked = false;
      // reset score
      currentScore = 0;
      scoreDisplaySpan.textContent = currentScore;
      // reset feedback style and message
      const feedbackDiv = document.getElementById('feedbackMessage');
      feedbackDiv.classList.remove('bg-green-100', 'border-green-300', 'bg-red-100', 'border-red-400');
      feedbackDiv.classList.add('bg-red-50', 'border-red-200');
      feedbackTextSpan.textContent = "🔄 Game reset! Match the Arabic letter to its name. 🔴";
      // load brand new random question
      loadNewQuestion();
    }
    
    // ----- initialize game on page load -----
    function initGame() {
     
      const randomIndex = Math.floor(Math.random() * ARABIC_LETTERS.length);
      currentCorrectLetter = { ...ARABIC_LETTERS[randomIndex] };
      const initialOptions = generateOptions(currentCorrectLetter, ARABIC_LETTERS);
      updateQuestionUI(currentCorrectLetter, initialOptions);
      scoreDisplaySpan.textContent = "0";
      currentScore = 0;
      feedbackTextSpan.textContent = "🔴 Click the correct name for the red letter! 🔴";
      isLocked = false;
      if (pendingTimeout) clearTimeout(pendingTimeout);
    }
    
  
    skipBtn.addEventListener('click', () => {
      skipToNextQuestion();
    });
    resetBtn.addEventListener('click', () => {
      resetGame();
    });
    
  
    initGame();
  </script>
</body>
</html>