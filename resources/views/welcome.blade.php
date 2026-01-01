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
    <section id="home" class="hero-section min-h-screen flex items-center justify-center relative mt-14">
        <!-- Floating Code Elements -->
        <div class="floating-code top-20 left-10" style="animation-delay: -1s;">const skills = ['JavaScript', 'Python', 'React'];</div>
        <div class="floating-code top-40 right-20" style="animation-delay: -3s;">function buildFuture() { return 'innovation'; }</div>
        <div class="floating-code bottom-32 left-20" style="animation-delay: -2s;">&lt;div className="developer-mindset"&gt;</div>
        <div class="floating-code bottom-20 right-10" style="animation-delay: -4s;">git commit -m "Level up complete"</div>
        
        <div class="text-center z-10 max-w-4xl mx-auto px-6">
            <div class="mb-6">
                <span class="code-font text-red-400 text-lg">&lt;English&gt;</span>
            </div>
            <h1 class="text-6xl md:text-8xl font-bold mb-6 flex ">
                <div> 
                    <span class="gradient-text">Language</span><br>
                    <span class="neon-glow">Translvania  </span>
                </div>
           
                <div>
                     <img src="{{asset('img/char1.png')}}" alt="Profile" class="w-[200px] h-[300px] mx-auto " />
               </div>
            </h1>
            <div class="mb-6">
                <span class="code-font text-red-400 text-lg">&lt;Franch&gt;</span>
            </div>
            
            <div class="code-font text-xl md:text-2xl mb-8 text-gray-300">
                <span id="typingText" class="typing-animation">Building the future, one Langauge other waiting</span>
            </div>
            
            <p class="text-lg text-gray-400 mb-12 max-w-2xl mx-auto">
                Passionate about creating innovative solutions through languages. Currently mastering.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-10">
                 @if(empty(Session::get('email')))
                <a href="/signup" class="bg-gradient-to-r from-yellow-500 to-red-500 px-8 py-4 rounded-full font-semibold hover:scale-105 transform transition-all duration-300 shadow-lg hover:shadow-red-500/25">
                   sign up
                </a>
                @else
                <a href="/Logout" class="bg-gradient-to-r  from-yellow-500 to-red-500 px-8 py-4 rounded-full font-semibold hover:scale-105 transform transition-all duration-300 shadow-lg hover:shadow-red-500/25">
                   Log out
                </a>
                @endif
                <a href="#contact" class="border-2 border-yellow-400 px-8 py-4 rounded-full font-semibold hover:bg-red-400/10 transition-all duration-300">
                    Get In Touch
                </a>
            </div>
        </div>
    </section>
   @if(empty(Session::get('email')))
    <!-- About Section -->
    <section id="about" class="py-20 bg-gray-900/50">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">
                <span class="code-font text-red-400">&lt;</span>
                <span class="gradient-text">About Us</span>
                <span class="code-font text-red-400">/&gt;</span>
            </h2>
            
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    {{-- <div class="w-64 h-64 mx-auto bg-gradient-to-br from-red-400 to-blue-500 rounded-full flex items-center justify-center text-8xl">
                        👨‍💻
                    </div> --}}
                     <img src="{{asset('img/char4.png')}}" alt="Profile" class="w-96 h-106 mx-auto  " />
                </div>
                
                <div class="space-y-6">
                    <h3 class="text-3xl font-bold text-red-400">Hello, I'm a Learner!</h3>
                    <p class="text-lg text-gray-300 leading-relaxed">
                        I'm Darcola passionate about Language development and constantly learning new technologies. 
                        My journey in laerning lanaguages started with curiosity and has evolved into a deep 
                        commitment to creating meaningful conversation.
                    </p>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gray-800/50 p-4 rounded-lg">
                            <h4 class="font-semibold text-red-400 mb-2">Focus Areas</h4>
                            <ul class="text-sm text-gray-300 space-y-1">
                                <li>• English</li>
                                <li>• Franch</li>
                                <li>• Russian</li>
                                <li>• Germany</li>
                            </ul>
                        </div>
                        
                        <div class="bg-gray-800/50 p-4 rounded-lg">
                            <h4 class="font-semibold text-red-400 mb-2">Interests</h4>
                            <ul class="text-sm text-gray-300 space-y-1">
                                <li>• Turkey</li>
                                <li>• Arabic</li>
                                <li>• Italian</li>
                                <li>• Japan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   @endif
  
    <div class="section-divider"></div>

    @if(empty(Session::get('email')))
    <!-- Courses Section -->
        <section id="courses" class="py-20">
            <div class="container mx-auto px-6">
                <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">
                    <span class="code-font text-red-400">&lt;</span>
                    <span class="gradient-text">Our Courses</span>
                    <span class="code-nfont text-red-400">/&gt;</span>
                </h2>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                  
                   
                    <!-- Course 1 -->
                    <div class="course-card rounded-xl p-6 relative">
                        <div class="text-4xl mb-4">📚</div>
                        <h3 class="text-2xl font-bold mb-3 text-red-400">English Learning</h3>
                      
                        <p class="text-gray-300 mb-4">Exploring English Grammer, Conversation, and writing application games.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-orange-500/20 text-orange-300 px-3 py-1 rounded-full text-sm">TensorFlow</span>
                            <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-sm">PyTorch</span>
                            <span class="bg-green-500/20 text-green-300 px-3 py-1 rounded-full text-sm">Scikit-learn</span>
                        </div>
                        <div class="text-sm text-gray-400">
                            <i class="fas fa-calendar mr-2"></i>Duration: 6 months
                        </div>
                    </div>

                    
                    <!-- Course 1 -->
                    <div class="course-card rounded-xl p-6 relative">
                        <div class="text-4xl mb-4">💬</div>
                        <h3 class="text-2xl font-bold mb-3 text-red-400">Turkey Learning</h3>
                      
                        <p class="text-gray-300 mb-4">Exploring Turkey Grammer, Conversation, and writing application games.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-orange-500/20 text-orange-300 px-3 py-1 rounded-full text-sm">TensorFlow</span>
                            <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-sm">PyTorch</span>
                            <span class="bg-green-500/20 text-green-300 px-3 py-1 rounded-full text-sm">Scikit-learn</span>
                        </div>
                        <div class="text-sm text-gray-400">
                            <i class="fas fa-calendar mr-2"></i>Duration: 6 months
                        </div>
                    </div>


                    
                    <!-- Course 1 -->
                    <div class="course-card rounded-xl p-6 relative">
                        <div class="text-4xl mb-4">🌐</div>
                        <h3 class="text-2xl font-bold mb-3 text-red-400">Arabic Learning</h3>
                      
                        <p class="text-gray-300 mb-4">Exploring Arabic Grammer, Conversation, and writing application games.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-orange-500/20 text-orange-300 px-3 py-1 rounded-full text-sm">TensorFlow</span>
                            <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-sm">PyTorch</span>
                            <span class="bg-green-500/20 text-green-300 px-3 py-1 rounded-full text-sm">Scikit-learn</span>
                        </div>
                        <div class="text-sm text-gray-400">
                            <i class="fas fa-calendar mr-2"></i>Duration: 6 months
                        </div>
                    </div>

                    {{-- @foreach ($courses as $course)
                         <div class="course-card rounded-xl p-6 relative">
                            <div class="text-4xl mb-4">🤖</div>
                            <h3 class="text-2xl font-bold mb-3 text-green-400">{{$course->name}}</h3>
                        
                            <p class="text-gray-300 mb-4">{{$course->dis}}.</p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="bg-orange-500/20 text-orange-300 px-3 py-1 rounded-full text-sm">TensorFlow</span>
                                <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-sm">PyTorch</span>
                                <span class="bg-green-500/20 text-green-300 px-3 py-1 rounded-full text-sm">Scikit-learn</span>
                            </div>
                            <div class="text-sm text-gray-400">
                                <i class="fas fa-calendar mr-2"></i>Duration:{{$course->duration}} months
                            </div>
                        </div>
                    @endforeach --}}
                </div>
            </div>
        </section>
        
    @else

          <!-- Courses Section -->
        <section id="courses" class="py-20">
            <div class="container mx-auto px-6">
                <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">
                    <span class="code-font text-red-400">&lt;</span>
                    <span class="gradient-text">Our Courses</span>
                    <span class="code-font text-red-400">/&gt;</span>
                </h2>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                  

                    <!-- Course 1 -->
                    <div class="course-card rounded-xl p-6 relative">
                        <div class="text-4xl mb-4">📚</div>
                        <h3 class="text-2xl font-bold mb-3 text-red-400"><a href="/english">English Learning</a></h3>
                      
                        <p class="text-gray-300 mb-4">Exploring English Grammer, Conversation, and writing application games.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-orange-500/20 text-orange-300 px-3 py-1 rounded-full text-sm">TensorFlow</span>
                            <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-sm">PyTorch</span>
                            <span class="bg-green-500/20 text-green-300 px-3 py-1 rounded-full text-sm">Scikit-learn</span>
                        </div>
                        <div class="text-sm text-gray-400">
                            <i class="fas fa-calendar mr-2"></i>Duration: 6 months
                        </div>
                    </div>

                    
                    <!-- Course 1 -->
                    <div class="course-card rounded-xl p-6 relative">
                        <div class="text-4xl mb-4">💬</div>
                        <h3 class="text-2xl font-bold mb-3 text-red-400"><a href="/Turkey">Turkey Learning</a></h3>
                      
                        <p class="text-gray-300 mb-4">Exploring Turkey Grammer, Conversation, and writing application games.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-orange-500/20 text-orange-300 px-3 py-1 rounded-full text-sm">TensorFlow</span>
                            <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-sm">PyTorch</span>
                            <span class="bg-green-500/20 text-green-300 px-3 py-1 rounded-full text-sm">Scikit-learn</span>
                        </div>
                        <div class="text-sm text-gray-400">
                            <i class="fas fa-calendar mr-2"></i>Duration: 6 months
                        </div>
                    </div>


                    
                    <!-- Course 1 -->
                    <div class="course-card rounded-xl p-6 relative">
                        <div class="text-4xl mb-4">🌐</div>
                        <h3 class="text-2xl font-bold mb-3 text-red-400">Arabic Learning</h3>
                      
                        <p class="text-gray-300 mb-4">Exploring Arabic Grammer, Conversation, and writing application games.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-orange-500/20 text-orange-300 px-3 py-1 rounded-full text-sm">TensorFlow</span>
                            <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-sm">PyTorch</span>
                            <span class="bg-green-500/20 text-green-300 px-3 py-1 rounded-full text-sm">Scikit-learn</span>
                        </div>
                        <div class="text-sm text-gray-400">
                            <i class="fas fa-calendar mr-2"></i>Duration: 6 months
                        </div>
                    </div>

                    {{-- @foreach ($courses as $course)
                         <div class="course-card rounded-xl p-6 relative">
                            <div class="text-4xl mb-4">🤖</div>
                            <h3 class="text-2xl font-bold mb-3 text-green-400">{{$course->name}}</h3>
                        
                            <p class="text-gray-300 mb-4">{{$course->dis}}.</p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="bg-orange-500/20 text-orange-300 px-3 py-1 rounded-full text-sm">TensorFlow</span>
                                <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-sm">PyTorch</span>
                                <span class="bg-green-500/20 text-green-300 px-3 py-1 rounded-full text-sm">Scikit-learn</span>
                            </div>
                            <div class="text-sm text-gray-400">
                                <i class="fas fa-calendar mr-2"></i>Duration:{{$course->duration}} months
                            </div>
                        </div>
                    @endforeach --}}
                </div>
            </div>
        </section>
    
    @endif

    <div class="section-divider"></div>

    @if(empty(Session::get('email')))
    @else
    <!-- Projects Section -->
    <section id="projects" class="py-20 bg-gray-900/30">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">
                <span class="code-font text-green-400">&lt;</span>
                <span class="gradient-text">My Projects</span>
                <span class="code-font text-green-400">/&gt;</span>
            </h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Project 1 -->
                <div class="project-card rounded-xl p-6">
                    <div class="bg-gradient-to-br from-blue-500 to-purple-600 h-48 rounded-lg mb-4 flex items-center justify-center text-6xl">
                        🌐
                    </div>
                    <h3 class="text-2xl font-bold mb-3">E-Commerce Platform</h3>
                    <p class="text-gray-300 mb-4">Full-stack e-commerce solution with React frontend, Node.js backend, and MongoDB database.</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="bg-blue-500/20 text-blue-300 px-2 py-1 rounded text-sm">React</span>
                        <span class="bg-green-500/20 text-green-300 px-2 py-1 rounded text-sm">Node.js</span>
                        <span class="bg-purple-500/20 text-purple-300 px-2 py-1 rounded text-sm">MongoDB</span>
                    </div>
                    <div class="flex space-x-4">
                        <button class="flex-1 bg-blue-600 hover:bg-blue-700 py-2 rounded transition-colors">
                            <i class="fab fa-github mr-2"></i>Code
                        </button>
                        <button class="flex-1 border border-blue-600 hover:bg-blue-600/10 py-2 rounded transition-colors">
                            <i class="fas fa-external-link-alt mr-2"></i>Demo
                        </button>
                    </div>
                </div>
            </div>

    </section>
    @endif
</body>
</html>