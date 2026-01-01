<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Developer Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --dark-gradient: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #830101;
        }
        
        .code-font {
            font-family: 'JetBrains Mono', monospace;
        }
        
        .hero-section {
            background: linear-gradient(135deg, #a21313 0%, #6a0000 50%, #520000 100%);
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="%23333" stroke-width="0.5" opacity="0.3"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            pointer-events: none;
        }
        
        .floating-code {
            position: absolute;
            color: #f4f4f4;
            opacity: 0.1;
            font-family: 'JetBrains Mono', monospace;
            font-size: 14px;
            animation: float 8s ease-in-out infinite;
            pointer-events: none;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(5deg); }
        }
        
        .skill-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .skill-card:hover {
            transform: translateY(-10px) scale(1.02);
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        
        .course-card {
            background: linear-gradient(145deg, #000000, #334155);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }
        
        .course-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }
        
        .course-card:hover::before {
            left: 100%;
        }
        
        .course-card:hover {
            transform: translateY(-8px) rotateY(5deg);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
        }
        
        .project-card {
            background: rgba(17, 24, 39, 0.8);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(59, 130, 246, 0.2);
            transition: all 0.3s ease;
        }
        
        .project-card:hover {
            border-color: rgba(59, 130, 246, 0.5);
            transform: scale(1.02);
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.1);
        }
        
        .typing-animation {
            border-right: 2px solid #4ade80;
            animation: blink 1s infinite;
        }
        
        @keyframes blink {
            0%, 50% { border-color: #4ade80; }
            51%, 100% { border-color: transparent; }
        }
        
        .progress-bar {
            background: linear-gradient(90deg, #4ade80, #3b82f6, #8b5cf6);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }
        
        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }
        
        .neon-glow {
            text-shadow: 0 0 20px rgba(74, 222, 128, 0.5);
        }
        
        .tech-icon {
            transition: all 0.3s ease;
        }
        
        .tech-icon:hover {
            transform: scale(1.2) rotate(5deg);
            filter: drop-shadow(0 0 10px currentColor);
        }
        
        .section-divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, #fbfffd, transparent);
            margin: 4rem 0;
        }
        
        .contact-form {
            background: rgba(17, 24, 39, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(59, 130, 246, 0.2);
        }
        
        .status-indicator {
            width: 12px;
            height: 12px;
            background: #d9de4a;
            border-radius: 50%;
            animation: pulse 2s infinite;
            box-shadow: 0 0 10px #deb24a;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(1.1); }
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #e2dd3f, #e71515, #c1bb12);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>

<body class="text-white">
    <x-nav></x-nav>

    <!-- Hero Section -->
    <!-- Hero Section -->
<section id="home" class="hero-section min-h-screen flex items-center justify-center relative mt-14">
    <!-- Floating Code Elements -->
    <div class="floating-code top-20 left-10" style="animation-delay: -1s;">const skills = ['JavaScript', 'Python', 'React'];</div>
    <div class="floating-code top-40 right-20" style="animation-delay: -3s;">function buildFuture() { return 'innovation'; }</div>
    <div class="floating-code bottom-32 left-20" style="animation-delay: -2s;">&lt;div className="developer-mindset"&gt;</div>
    <div class="floating-code bottom-20 right-10" style="animation-delay: -4s;">git commit -m "Level up complete"</div>

    <div class="text-left z-10 max-w-4xl mx-auto px-6">
       

        <h1 class=" mt-10 text-6xl md:text-8xl font-bold mb-6 flex flex-col md:flex-row items-start gap-4">
              <div>
                <img src="{{ asset('img/char2.png') }}" alt="Profile" class="w-[300px] h-[500px]" />
            </div>
            @if(empty(Session::get('TLevel')))
            <div>
                <span class="gradient-text">Turkey</span><br>
                <span class="neon-glow">Learner Test </span>
                <span class="text-xl sm:flex-row"><br>Games tp develop your skills in Turkey......
              
               Are you ready?
               </span>
            </div>
            @else
              <div>
                <span class="gradient-text">Turkey</span><br>
                <span class="neon-glow">Learner {{Session::get('TLevel')}} Games</span>
                <span class="text-xl sm:flex-row"><br>Games tp develop your skills in Turkey
               </span>
            </div>
            @endif
          
        </h1>
        <!-- Buttons aligned to the left -->
         @if(empty(Session::get('TLevel')))
        <div class=" flex flex-col sm:flex-row gap-4 justify-start mb-6">
           
               
                <a href="/TTest" class="bg-gradient-to-r from-yellow-500 to-red-500 px-8 py-4 rounded-full font-semibold hover:scale-105 transform transition-all duration-300 shadow-lg hover:shadow-yellow-500/25">
                    Geting  Started
                </a>
         
            <a href="/" class="border-2 border-yellow-500 px-8 py-4 rounded-full font-semibold hover:bg-yellow-400/10 transition-all duration-300">
                Back
            </a>
        </div>
         @else
          <div class="flex flex-col sm:flex-row gap-4 justify-start mb-6">
           
               
                <a href="/Tmain" class="bg-gradient-to-r from-yellow-500 to-red-500 px-8 py-4 rounded-full font-semibold hover:scale-105 transform transition-all duration-300 shadow-lg hover:shadow-yellow-500/25">
                    Geting  Started
                </a>
         
            <a href="/" class="border-2 border-yellow-400 px-8 py-4 rounded-full font-semibold hover:bg-yellow-400/10 transition-all duration-300">
                Back
            </a>
        </div>
        @endif

      
    </div>
</section>

</body>
</html>
