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
  <form id="quiz-result-form" method="POST" action="/eTest/savequizresult">
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
      { question: "Which word completes this sentence: I ___ to the store yesterday.", options: ["go", "went", "gone", "going"], answer: "went" },
      { question: "What is the plural of 'child'?", options: ["childs", "children", "childes", "child"], answer: "children" },
      { question: "Which sentence is correct?", options: ["She don't like apples", "She doesn't likes apples", "She doesn't like apples", "She not like apples"], answer: "She doesn't like apples" },
      { question: "Choose the correct article: I saw ___ elephant at the zoo.", options: ["a", "an", "the", "no article"], answer: "an" },
      { question: "What is the opposite of 'expensive'?", options: ["cheap", "costly", "valuable", "rich"], answer: "cheap" },

      // Intermediate (6–10)
      { question: "Which tense is used in: 'I will have finished by tomorrow.'?", options: ["Future Simple", "Future Perfect", "Future Continuous", "Present Perfect"], answer: "Future Perfect" },
      { question: "Identify the conditional sentence: 'If I had known, I would have helped.'", options: ["Zero Conditional", "First Conditional", "Second Conditional", "Third Conditional"], answer: "Third Conditional" },
      { question: "Which is a phrasal verb meaning 'to cancel'?", options: ["call off", "call in", "call out", "call up"], answer: "call off" },
      { question: "What does 'bittersweet' mean?", options: ["Very sweet", "Both happy and sad", "Extremely bitter", "Not sweet"], answer: "Both happy and sad" },
      { question: "Which sentence uses the subjunctive mood?", options: ["I suggest he leave now", "He leaves now", "He left now", "He will leave now"], answer: "I suggest he leave now" },

      // Advanced (11–15)
      { question: "What literary device is: 'The stars danced playfully in the moonlit sky.'?", options: ["Simile", "Metaphor", "Personification", "Hyperbole"], answer: "Personification" },
      { question: "Which word describes language that is overly academic or pretentious?", options: ["Colloquial", "Vernacular", "Pedantic", "Idiomatic"], answer: "Pedantic" },
      { question: "What is the term for words that are spelled the same but have different meanings?", options: ["Homophones", "Homographs", "Synonyms", "Antonyms"], answer: "Homographs" },
      { question: "Identify the syntactic function of 'swiftly' in: 'The runner moved swiftly.'", options: ["Subject", "Object", "Adverbial", "Complement"], answer: "Adverbial" },
      { question: "Which construction shows the passive voice?", options: ["The committee approved the proposal", "The proposal was approved by the committee", "They approved the proposal", "The proposal got approved"], answer: "The proposal was approved by the committee" }
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
          <strong>Take the Beginner English course:</strong> 
          <a href="/main" target="_blank" class="text-blue-500 underline">Start Game Course</a></p>`;
      } else if (intermediateScore < 3) {
        message = `
          <p class="text-red-500 mb-2">You have the basics, but need more practice. 
          <strong>Take the Intermediate English course:</strong> 
          <a href="/main" target="_blank" class="text-blue-500 underline">Start Game Course</a></p>`;
      } else if (expertScore < 3) {
        message = `
          <p class="text-red-500 mb-2">You're close! Now aim for mastery. 
          <strong>Take the Expert English course:</strong> 
          <a href="/main" target="_blank" class="text-blue-500 underline">Start Game Course</a></p>`;
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
