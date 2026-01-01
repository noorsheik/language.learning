<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <title>Software Developer Quiz</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="bg-red-900 text-white min-h-screen flex items-center justify-center p-4">
  <?php if (isset($component)) { $__componentOriginalff09156f73c896030ee75284e9b2c466 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalff09156f73c896030ee75284e9b2c466 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalff09156f73c896030ee75284e9b2c466)): ?>
<?php $attributes = $__attributesOriginalff09156f73c896030ee75284e9b2c466; ?>
<?php unset($__attributesOriginalff09156f73c896030ee75284e9b2c466); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalff09156f73c896030ee75284e9b2c466)): ?>
<?php $component = $__componentOriginalff09156f73c896030ee75284e9b2c466; ?>
<?php unset($__componentOriginalff09156f73c896030ee75284e9b2c466); ?>
<?php endif; ?>

  <div class="bg-white text-black rounded-2xl shadow-xl p-6 max-w-xl w-full">
    <div id="progress" class="text-right text-sm text-gray-600 mb-2">Question 1 of 15</div>

    <div id="quiz-container">
      <!-- Question content will be injected here -->
    </div>

    <div class="mt-6 flex justify-end">
      <button id="next-btn" class="bg-yellow-600 text-white px-4 py-2 rounded-xl hover:bg-yellow-700">Next</button>
    </div>
  </div>
  <form id="quiz-result-form" method="POST" action="/TTest/savequizresult">
    <?php echo csrf_field(); ?>
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
            question: "Which suffix makes a noun plural in Turkish?", 
            options: ["-ler/-lar", "-lik/-lık", "-ci/-cı", "-siz/-sız"], 
            answer: "-ler/-lar" 
        },
        { 
            question: "What is the correct translation of 'I am going'?", 
            options: ["Ben gidiyorum", "Ben gittim", "Ben gideceğim", "Ben giderim"], 
            answer: "Ben gidiyorum" 
        },
        { 
            question: "Which word means 'water' in Turkish?", 
            options: ["su", "çay", "kahve", "süt"], 
            answer: "su" 
        },
        { 
            question: "How do you say 'thank you' in Turkish?", 
            options: ["teşekkür ederim", "lütfen", "affedersiniz", "merhaba"], 
            answer: "teşekkür ederim" 
        },
        { 
            question: "Which is the correct negation of 'biliyorum' (I know)?", 
            options: ["bilmiyorum", "bilmiyor", "bilmeyorum", "bilmedim"], 
            answer: "bilmiyorum" 
        },

        // Intermediate Questions (6–10)
        { 
            question: "Which case suffix indicates motion toward something?", 
            options: ["-e/-a (dative)", "-de/-da (locative)", "-den/-dan (ablative)", "-i/-ı (accusative)"], 
            answer: "-e/-a (dative)" 
        },
        { 
            question: "What does the verb conjugation '-(y)abil' indicate?", 
            options: ["Ability or possibility", "Past tense", "Future tense", "Obligation"], 
            answer: "Ability or possibility" 
        },
        { 
            question: "Which Turkish tense is equivalent to English Present Perfect?", 
            options: ["-miş'li geçmiş zaman", "-di'li geçmiş zaman", "Şimdiki zaman", "Gelecek zaman"], 
            answer: "-miş'li geçmiş zaman" 
        },
        { 
            question: "What is the correct translation of 'If I had money, I would buy a car'?", 
            options: ["Param olsa, araba alırım", "Param olursa, araba alacağım", "Param oldu, araba aldım", "Param oluyor, araba alıyorum"], 
            answer: "Param olsa, araba alırım" 
        },
        { 
            question: "Which suffix indicates belonging/possession in Turkish?", 
            options: ["-im/-ın/-i (possessive)", "-ler/-lar (plural)", "-de/-da (locative)", "-ci/-cı (occupation)"], 
            answer: "-im/-ın/-i (possessive)" 
        },

        // Advanced Questions (11–15)
        { 
            question: "What is the function of the suffix '-ki' in Turkish?", 
            options: ["Forms relative pronouns like 'the one that'", "Indicates past tense", "Creates adverbs", "Forms interrogatives"], 
            answer: "Forms relative pronouns like 'the one that'" 
        },
        { 
            question: "Which construction represents the passive voice in Turkish?", 
            options: ["Verb + -il/-ıl", "Verb + -erek", "Verb + -ince", "Verb + -meli"], 
            answer: "Verb + -il/-ıl" 
        },
        { 
            question: "What does the suffix '-leyin' typically indicate?", 
            options: ["Time expressions (at night = geceleyin)", "Location", "Manner", "Reason"], 
            answer: "Time expressions (at night = geceleyin)" 
        },
        { 
            question: "Which Turkish verb form corresponds to English gerunds (-ing forms)?", 
            options: ["Verb + -me/-ma", "Verb + -dik", "Verb + -ecek", "Verb + -miş"], 
            answer: "Verb + -me/-ma" 
        },
        { 
            question: "What is the correct vowel harmony rule for Turkish?", 
            options: ["Front vowels follow front vowels, back vowels follow back vowels", "All vowels can mix freely", "Only a, ı, o, u can be together", "Only e, i, ö, ü can be together"], 
            answer: "Front vowels follow front vowels, back vowels follow back vowels" 
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
          <a href="/Tmain" target="_blank" class="text-blue-500 underline">Start Game Course</a></p>`;
      } else if (intermediateScore < 3) {
        message = `
          <p class="text-red-500 mb-2">You have the basics, but need more practice. 
          <strong>Take the Intermediate Turkey course:</strong> 
          <a href="/Tmain" target="_blank" class="text-blue-500 underline">Start Game Course</a></p>`;
      } else if (expertScore < 3) {
        message = `
          <p class="text-red-500 mb-2">You're close! Now aim for mastery. 
          <strong>Take the Expert turkey course:</strong> 
          <a href="/Tmain" target="_blank" class="text-blue-500 underline">Start Game Course</a></p>`;
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
<?php /**PATH C:\Users\User\Herd\game\resources\views/turkey/ttest.blade.php ENDPATH**/ ?>