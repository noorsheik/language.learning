<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Software Developer Quiz</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="bg-red-900 text-white min-h-screen flex items-center justify-center p-4">
  <x-nav></x-nav>

  <div class="bg-white text-black rounded-2xl shadow-xl p-6 max-w-xl w-full">
    <div id="progress" class="text-right text-sm text-gray-600 mb-2">Question 1 of 15</div>

    <div id="quiz-container">
      <!-- Question content will be injected here -->
    </div>

    <div class="mt-6 flex justify-end">
      <button id="next-btn" class="bg-yellow-600 text-white px-4 py-2 rounded-xl hover:bg-yellow-700">Next</button>
    </div>
  </div>
  <form id="quiz-result-form" method="POST" action="/ATest/savequizresult">
    @csrf
    <input type="hidden" name="beginnerScore" id="beginnerScore" value="0">
    <input type="hidden" name="intermediateScore" id="intermediateScore" value="0">
    <input type="hidden" name="expertScore" id="expertScore" value="0">
    <input type="hidden" name="totalScore" id="totalScore" value="0">
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Send Results</button>
 </form>


  <script>
   const questions = [
    // Beginner Questions (1–5)
    {
        question: "Which suffix is used to form the sound masculine plural in Arabic?",
        options: ["-ون/-ين", "-ات", "-ان", "-ة"],
        answer: "-ون/-ين"
    },
    {
        question: "What is the correct translation of 'I am going' (masculine) in Modern Standard Arabic?",
        options: ["أنا ذاهب", "أنا ذهبت", "أنا سأذهب", "أذهب"],
        answer: "أنا ذاهب"
    },
    {
        question: "Which word means 'water' in Arabic?",
        options: ["ماء", "نار", "هواء", "تراب"],
        answer: "ماء"
    },
    {
        question: "How do you say 'thank you' in Arabic?",
        options: ["شكراً", "عفواً", "مرحباً", "بإذن الله"],
        answer: "شكراً"
    },
    {
        question: "Which is the correct negation of 'أَعْرِفُ' (I know) in the present tense?",
        options: ["لا أَعْرِفُ", "ما أَعْرِفُ", "لن أَعْرِفَ", "لَمْ أَعْرِفْ"],
        answer: "لا أَعْرِفُ"
    },

    // Intermediate Questions (6–10)
    {
        question: "Which case ending marks the subject (nominative) of a nominal sentence in Arabic?",
        options: ["الضمة (u)", "الفتحة (a)", "الكسرة (i)", "السكون (sukūn)"],
        answer: "الضمة (u)"
    },
    {
        question: "What does verb form II (فَعَّلَ) typically indicate?",
        options: ["Causative or intensive meaning", "Reflexive meaning", "Passive meaning", "Reciprocal meaning"],
        answer: "Causative or intensive meaning"
    },
    {
        question: "Which construction is most often used to express the English Present Perfect tense in Arabic?",
        options: ["قَد + perfect verb", "Perfect verb alone", "Present tense", "Future tense with سوف"],
        answer: "قَد + perfect verb"
    },
    {
        question: "What is the correct translation of 'If I had money, I would buy a car'?",
        options: ["لو كان عندي مال، لاشتريت سيارة", "إذا كان عندي مال، سأشتري سيارة", "إن كان عندي مال، اشتري سيارة", "لولا المال، ما اشتريت سيارة"],
        answer: "لو كان عندي مال، لاشتريت سيارة"
    },
    {
        question: "Which suffix indicates first-person singular possession in Arabic (e.g., 'my book')?",
        options: ["ـي", "ـك", "ـه", "ـنا"],
        answer: "ـي"
    },

    // Advanced Questions (11–15)
    {
        question: "What is the primary function of the particle 'إِنَّ' (inna) in Arabic?",
        options: ["Emphasizes the subject, placing it in the accusative case", "Negates the present tense", "Introduces a conditional clause", "Indicates future tense"],
        answer: "Emphasizes the subject, placing it in the accusative case"
    },
    {
        question: "Which verb pattern is used to form the passive voice in the past tense?",
        options: ["فُعِلَ", "فَعَّلَ", "اِنْفَعَلَ", "تَفَعَّلَ"],
        answer: "فُعِلَ"
    },
    {
        question: "What does the suffix '-َانِ' (or '-َيْنِ') typically indicate in Arabic?",
        options: ["The dual number", "The sound masculine plural", "The sound feminine plural", "The emphatic form"],
        answer: "The dual number"
    },
    {
        question: "Which Arabic verbal noun (مَصْدَر) form is most directly equivalent to English gerunds (-ing forms)?",
        options: ["فَعْل (e.g., شُكْر)", "فِعَال (e.g., كِتَاب)", "تَفْعِيل (e.g., تَكْرِيم)", "اِفْتِعَال (e.g., اِسْتِخْدَام)"],
        answer: "فَعْل (e.g., شُكْر)"
    },
    {
        question: "What is the correct pronunciation rule for the Arabic definite article 'ال' when followed by a 'sun letter'?",
        options: ["The 'ل' is assimilated into the following letter (gemination)", "The 'ل' is pronounced clearly", "The 'أ' is dropped", "The 'ل' becomes a kasra"],
        answer: "The 'ل' is assimilated into the following letter (gemination)"
    }
   ];
    let currentQuestion = 0;
    let userAnswers = [];

    const container = document.getElementById("quiz-container");
    const nextBtn = document.getElementById("next-btn");
    const progress = document.getElementById("progress");

    function renderQuestion() {
      const q = questions[currentQuestion];
      progress.textContent = `Question ${currentQuestion + 1} of ${questions.length}`;

      const optionsHTML = q.options.map(opt => `
        <label class="block border rounded-xl px-4 py-2 mb-2 cursor-pointer hover:bg-gray-100">
          <input type="radio" name="option" value="${opt}" class="mr-2">${opt}
        </label>
      `).join("");

      container.innerHTML = `
        <h2 class="text-xl font-semibold mb-4">${q.question}</h2>
        <form id="quiz-form">${optionsHTML}</form>
      `;

      nextBtn.textContent = (currentQuestion === questions.length - 1) ? "Finish" : "Next";
    }

    function showResult() {
      let beginnerScore = 0, intermediateScore = 0, expertScore = 0;

      userAnswers.forEach((ans, i) => {
        if (ans === questions[i].answer) {
          if (i < 5) beginnerScore++;
          else if (i < 10) intermediateScore++;
          else expertScore++;
        }
      });

      const totalScore = beginnerScore + intermediateScore + expertScore;
      let message = "";

      if (beginnerScore < 3) {
        message = `
          <p class="text-red-500 mb-2">You need to improve your fundamentals. 
          <strong>Take the Beginner Turkey course:</strong> 
          <a href="/Amain" target="_blank" class="text-blue-500 underline">Start Game Course</a></p>`;
      } else if (intermediateScore < 3) {
        message = `
          <p class="text-red-500 mb-2">You have the basics, but need more practice. 
          <strong>Take the Intermediate Turkey course:</strong> 
          <a href="/Amain" target="_blank" class="text-blue-500 underline">Start Game Course</a></p>`;
      } else if (expertScore < 3) {
        message = `
          <p class="text-red-500 mb-2">You're close! Now aim for mastery. 
          <strong>Take the Expert turkey course:</strong> 
          <a href="/Amain" target="_blank" class="text-blue-500 underline">Start Game Course</a></p>`;
      } else {
        message = `<p class="text-green-600 text-lg font-semibold mb-2">🎉 Congratulations! You passed all levels of the C++ quiz.</p>`;
      }
      document.getElementById('beginnerScore').value = beginnerScore;
      document.getElementById('intermediateScore').value = intermediateScore;
      document.getElementById('expertScore').value = expertScore;
      document.getElementById('totalScore').value = totalScore;
       document.getElementById("quiz-result-form").submit();

      container.innerHTML = `
        <h2 class="text-2xl font-bold mb-4">Quiz Completed!</h2>
        ${message}
        <p class="text-lg font-semibold mt-4">Total Score: ${totalScore} / ${questions.length}</p>
       
      `;

      progress.textContent = "Completed";
      nextBtn.style.display = "none";

      // Bind click listener
      document.getElementById("send-results-btn").addEventListener("click", () => {
        sendResults(beginnerScore, intermediateScore, expertScore, totalScore);
      });
    }

    

    nextBtn.addEventListener("click", () => {
      const selected = document.querySelector("input[name='option']:checked");
      if (!selected) {
        alert("Please select an answer.");
        return;
      }

      userAnswers[currentQuestion] = selected.value;

      if (currentQuestion < questions.length - 1) {
        currentQuestion++;
        renderQuestion();
      } else {
        showResult();
      }
    });
   document.getElementById("quiz-result-form").style.display = "none";

    renderQuestion(); // start quiz
  </script>
</body>
</html>
