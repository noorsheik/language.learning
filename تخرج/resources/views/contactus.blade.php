<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Contact Us | Elegant Connect</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }
        body {
            background: radial-gradient(circle at 10% 20%, rgba(17, 24, 39, 1) 0%, rgba(0, 0, 0, 0.95) 100%);
        }
        
        .input-glow:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3), 0 0 0 1px rgba(59, 130, 246, 0.6);
        }
   
        .glass-card {
            transition: transform 0.25s ease, box-shadow 0.3s ease;
        }
        .glass-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(59, 130, 246, 0.2);
        }
       */
        textarea::-webkit-scrollbar {
            width: 6px;
        }
        textarea::-webkit-scrollbar-track {
            background: #1f2937;
            border-radius: 10px;
        }
        textarea::-webkit-scrollbar-thumb {
            background: #3b82f6;
            border-radius: 10px;
        }
      
        .btn-primary {
            position: relative;
            overflow: hidden;
        }
        .btn-primary::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.4s ease, height 0.4s ease;
        }
        .btn-primary:active::after {
            width: 200px;
            height: 200px;
            opacity: 0;
        }
    </style>
</head>
<body class="antialiased">


    <div class="min-h-screen flex items-center justify-center px-4 py-10 md:py-12 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-96 h-96 bg-red-600/10 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>
        <div class="absolute bottom-0 right-0 w-[30rem] h-[30rem] bg-purple-600/10 rounded-full blur-3xl translate-x-1/3 translate-y-1/3 pointer-events-none"></div>
        <div class="absolute top-1/2 left-1/2 w-full h-full max-w-4xl max-h-4xl bg-indigo-500/5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>

        <div class="w-full max-w-4xl glass-card backdrop-blur-xl bg-gray-900/40 bg-opacity-30 rounded-3xl shadow-2xl border border-gray-700/60 p-6 md:p-10 transition-all duration-300 relative z-10">
     
            <div class="text-center mb-8 md:mb-10 relative">
                <div class="inline-block">
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-red-400 via-indigo-400 to-purple-400 pb-2 tracking-tight drop-shadow-sm animate-pulse">
                        Get In Touch
                    </h1>
                </div>
                <div class="w-24 h-1 bg-gradient-to-r from-red-500 to-purple-500 rounded-full mx-auto mt-3"></div>
                <p class="text-gray-300 text-center mt-4 text-sm md:text-base font-light max-w-md mx-auto opacity-80">
                    We’d love to hear from you. Send a message and we’ll respond as soon as possible.
                </p>
            </div>

  
            <form class="flex flex-col w-full" action="/contact" method="POST">
                @csrf
           
                <div class="flex flex-col md:flex-row gap-5 md:gap-6">
                 
                    <div class="relative flex-1 group">
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-red-400 transition-colors duration-200">
                            <i class="fas fa-user text-sm md:text-base"></i>
                        </div>
                        <input id="name" type="text" name="name"
                            class="w-full py-3.5 pl-12 pr-5 rounded-2xl bg-gray-800/70 border border-gray-700/70 text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500/70 focus:border-transparent transition-all duration-200 text-base shadow-sm backdrop-blur-sm"
                            placeholder="Full name">
                    </div>
         
                    <div class="relative flex-1 group">
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-red-400 transition-colors duration-200">
                            <i class="fas fa-envelope text-sm md:text-base"></i>
                        </div>
                        <input id="email" type="email" name="email"
                            class="w-full py-3.5 pl-12 pr-5 rounded-2xl bg-gray-800/70 border border-gray-700/70 text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500/70 focus:border-transparent transition-all duration-200 text-base shadow-sm backdrop-blur-sm"
                            placeholder="Email address">
                    </div>
                </div>

   
                <div class="relative mt-5 group">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-red-400 transition-colors duration-200">
                        <i class="fas fa-tag text-sm md:text-base"></i>
                    </div>
                    <input id="subject" type="text" name="subject" placeholder="Subject"
                        class="w-full py-3.5 pl-12 pr-5 rounded-2xl bg-gray-800/70 border border-gray-700/70 text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500/70 focus:border-transparent transition-all duration-200 text-base shadow-sm backdrop-blur-sm">
                </div>

          
                <div class="relative mt-5 group">
                    <div class="absolute left-4 top-5 text-gray-400 group-focus-within:text-red-400 transition-colors duration-200">
                        <i class="fas fa-comment-dots text-base"></i>
                    </div>
                    <textarea id="message" rows="5" placeholder="Write your message here ..." name="message"
                        class="w-full py-3.5 pl-12 pr-5 rounded-2xl bg-gray-800/70 border border-gray-700/70 text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500/70 focus:border-transparent transition-all duration-200 resize-y text-base shadow-sm backdrop-blur-sm"></textarea>
                </div>

         
                <div class="flex flex-col sm:flex-row items-center justify-center gap-5 mt-10">
                  
                    <button type="submit"
                        class="btn-primary w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 py-3.5 rounded-xl bg-gradient-to-r from-red-600 to-indigo-600 hover:from-red-700 hover:to-indigo-700 text-white font-semibold shadow-lg hover:shadow-red-500/30 transition-all duration-300 transform hover:-translate-y-1 focus:outline-none focus:ring-4 focus:ring-red-500/50 text-base tracking-wide">
                        <i class="fas fa-paper-plane text-sm transition-transform group-hover:translate-x-1"></i>
                        Send Message
                    </button>

              
                    <a href="/contact/check"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 py-3.5 rounded-xl bg-gray-800/50 border border-gray-600/80 hover:bg-gray-700/80 hover:border-gray-500 text-gray-200 font-medium transition-all duration-200 hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-gray-500/50 backdrop-blur-sm">
                        <i class="fas fa-eye text-sm"></i>
                        Check Response
                    </a>
                </div>

        
                <p class="text-center text-gray-500 text-xs mt-8 flex items-center justify-center gap-1">
                    <i class="fas fa-lock text-[10px]"></i> Your information is secure
                </p>
            </form>
        </div>
    </div>

    <style>
        input:-webkit-autofill,
        input:-webkit-autofill:focus,
        textarea:-webkit-autofill,
        textarea:-webkit-autofill:focus {
            transition: background-color 0s 600000s, color 0s 600000s;
        }
        input, textarea, button {
            font-family: 'Inter', sans-serif;
        }
        .focus\:ring-2:focus {
            outline: none;
            ring-offset: 2px;
        }
    </style>
</body>
</html>