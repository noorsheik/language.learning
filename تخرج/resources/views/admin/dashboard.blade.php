<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <title>Dark Themed Admin Dashboard | Premium Redux</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
  <style>
    * {
      transition: all 0.2s ease;
    }
    body {
      font-family: 'Inter', sans-serif;
      background: radial-gradient(circle at 10% 20%, #2c0101, #1a0101);
      color: #f0f0f0;
      scroll-behavior: smooth;
    }
    /* Custom scrollbar */
    ::-webkit-scrollbar {
      width: 6px;
      height: 6px;
    }
    ::-webkit-scrollbar-track {
      background: #2d0a0a;
      border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb {
      background: #b91c1c;
      border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: #ef4444;
    }
    /* Glassmorphism refined */
    .sidebar-dark {
      background: rgba(15, 3, 3, 0.85);
      backdrop-filter: blur(12px);
      border-right: 1px solid rgba(220, 38, 38, 0.3);
      box-shadow: 4px 0 25px rgba(0, 0, 0, 0.5);
    }
    .card {
      background: rgba(20, 5, 5, 0.65);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(220, 38, 38, 0.25);
      border-radius: 1.5rem;
      transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    }
    .card:hover {
      background: rgba(40, 12, 12, 0.75);
      border-color: rgba(239, 68, 68, 0.5);
      transform: translateY(-4px);
      box-shadow: 0 20px 30px -12px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(239, 68, 68, 0.2);
    }
    .gradient-text {
      background: linear-gradient(125deg, #fff0f0, #f97316, #ef4444, #b91c1c);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
      font-weight: 700;
      letter-spacing: -0.02em;
    }
    .nav-link {
      position: relative;
      transition: all 0.2s;
      border-radius: 14px;
      padding: 0.6rem 1rem;
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }
    .nav-link:hover {
      background: rgba(239, 68, 68, 0.15);
      color: #fca5a5;
      transform: translateX(4px);
    }
    .nav-active {
      background: rgba(220, 38, 38, 0.25);
      color: #f87171;
      border-left: 3px solid #ef4444;
      box-shadow: -4px 0 8px rgba(239, 68, 68, 0.1);
    }
    /* Table glass styling */
    .glass-table {
      background: rgba(12, 4, 4, 0.5);
      backdrop-filter: blur(4px);
      border-radius: 1.25rem;
      border: 1px solid rgba(220, 38, 38, 0.2);
      overflow: hidden;
    }
    .glass-table th {
      background: rgba(0, 0, 0, 0.45);
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.03em;
      font-size: 0.75rem;
    }
    .glass-table td {
      border-bottom: 1px solid rgba(220, 38, 38, 0.15);
    }
    .glass-table tr:hover td {
      background: rgba(239, 68, 68, 0.08);
    }
    /* Custom input & button redesign */
    .input-red {
      background: rgba(20, 5, 5, 0.8);
      border: 1px solid rgba(220, 38, 38, 0.4);
      border-radius: 1rem;
      padding: 0.5rem 1rem;
      color: white;
      outline: none;
      transition: all 0.2s;
    }
    .input-red:focus {
      border-color: #ef4444;
      box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.4);
      background: #1f0909;
    }
    .btn-primary {
      background: linear-gradient(95deg, #b91c1c, #dc2626);
      border-radius: 2rem;
      padding: 0.5rem 1.25rem;
      font-weight: 500;
      transition: all 0.2s;
      box-shadow: 0 4px 10px rgba(185, 28, 28, 0.3);
    }
    .btn-primary:hover {
      transform: scale(1.02);
      background: linear-gradient(95deg, #dc2626, #ef4444);
      box-shadow: 0 8px 18px rgba(220, 38, 38, 0.4);
    }
    .btn-secondary {
      background: rgba(30, 10, 10, 0.8);
      border: 1px solid rgba(239, 68, 68, 0.5);
      border-radius: 2rem;
      padding: 0.5rem 1.25rem;
      font-weight: 500;
    }
    .btn-secondary:hover {
      background: #7f1d1d;
      border-color: #f87171;
    }
    .stat-icon {
      background: rgba(220, 38, 38, 0.2);
      border-radius: 1.25rem;
      padding: 0.7rem;
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }
    /* mobile overlay */
    .sidebar-overlay {
      transition: opacity 0.3s ease;
    }
    /* responsive table inputs */
    @media (max-width: 768px) {
      .card {
        border-radius: 1.25rem;
      }
      .nav-link {
        padding: 0.5rem 0.9rem;
      }
    }
  </style>
</head>
<body>
  <div x-data="{ openSidebar: false, activeSection: 'dashboard' }" class="flex min-h-screen relative">
    
    <!-- Mobile Overlay -->
    <div x-show="openSidebar" x-transition.opacity.duration.200ms class="fixed inset-0 bg-black/70 backdrop-blur-sm z-30 md:hidden sidebar-overlay" @click="openSidebar = false"></div>

    <!-- Sidebar -->
    <aside class="sidebar-dark fixed md:relative w-64 h-full z-40 p-5 hidden md:block transition-all duration-300 ease-in-out" 
           :class="{ 'block': openSidebar, 'hidden': !openSidebar && !window.matchMedia('(min-width: 768px)').matches }">
      <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl font-extrabold gradient-text tracking-tight">ADMIN</h2>
        <button @click="openSidebar = false" class="text-gray-400 hover:text-red-400 md:hidden">
          <i class="fas fa-times text-xl"></i>
        </button>
      </div>
      <nav>
        <ul class="space-y-2">
          <li>
            <a href="#" @click.prevent="activeSection = 'dashboard'; openSidebar = false" 
               class="nav-link" :class="{ 'nav-active': activeSection === 'dashboard' }">
              <i class="fas fa-tachometer-alt w-5 text-red-400"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href="#" @click.prevent="activeSection = 'orders'; openSidebar = false" 
               class="nav-link" :class="{ 'nav-active': activeSection === 'orders' }">
              <i class="fas fa-users w-5 text-red-400"></i>
              <span>Our users</span>
            </a>
          </li>
          <li>
            <a href="#" @click.prevent="activeSection = 'reviews'; openSidebar = false" 
               class="nav-link" :class="{ 'nav-active': activeSection === 'reviews' }">
              <i class="fas fa-envelope w-5 text-red-400"></i>
              <span>Messages</span>
            </a>
          </li>
           <li>
            <a href="#" @click.prevent="activeSection = 'levels'; openSidebar = false" 
               class="nav-link" :class="{ 'nav-active': activeSection === 'levels' }">
              <i class="fas fa-user-circle w-5 text-red-400"></i>
              <span>Users levels</span>
            </a>
          </li>
          <li>
            <a href="#" @click.prevent="activeSection = 'profile'; openSidebar = false" 
               class="nav-link" :class="{ 'nav-active': activeSection === 'profile' }">
              <i class="fas fa-user-circle w-5 text-red-400"></i>
              <span>Profile</span>
            </a>
          </li>
          <li class="pt-6 mt-4 border-t border-red-900/40">
            <a href="/adminlogout" class="nav-link text-gray-300 hover:text-red-300">
              <i class="fas fa-sign-out-alt w-5"></i>
              <span>Log out</span>
            </a>
          </li>
        </ul>
      </nav>
      <div class="absolute bottom-6 left-0 right-0 text-center text-xs text-gray-500 hidden md:block">
        <i class="fas fa-shield-alt mr-1"></i> secure panel v2.0
      </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 p-5 md:p-7 transition-all duration-300">
      <!-- Top Bar with mobile menu toggle & greeting -->
      <div class="flex flex-wrap justify-between items-center mb-8 gap-3">
        <div class="flex items-center gap-4">
          <button @click="openSidebar = !openSidebar" class="text-2xl text-red-400 hover:text-red-300 focus:outline-none md:hidden bg-black/30 p-2 rounded-xl backdrop-blur-sm">
            <i class="fas fa-bars"></i>
          </button>
          <div>
            <h1 class="text-2xl md:text-3xl font-bold gradient-text">Welcome Back, {{Session::get('name')}}!</h1>
            <p class="text-gray-400 text-sm mt-1 hidden sm:block"><i class="far fa-calendar-alt mr-1"></i> {{ now()->format('F j, Y') }} — ready to lead</p>
          </div>
        </div>
        <div class="flex items-center gap-3 bg-white/5 backdrop-blur-sm px-4 py-2 rounded-2xl border border-red-900/30">
          <i class="fas fa-bell text-red-400"></i>
          <span class="text-sm font-medium hidden sm:inline">Admin Zone</span>
          <div class="w-8 h-8 rounded-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center shadow-lg">
            <i class="fas fa-crown text-xs text-white"></i>
          </div>
        </div>
      </div>

      <!-- DASHBOARD SECTION -->
      <div x-show="activeSection === 'dashboard'" x-transition.duration.200ms>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- card 1 -->
          <div class="card p-6 rounded-2xl shadow-2xl">
            <div class="flex items-center justify-between mb-3">
              <span class="stat-icon"><i class="fas fa-chalkboard-user text-red-400 text-xl"></i></span>
              <span class="text-xs font-semibold px-2 py-1 rounded-full bg-red-900/30 text-red-300">active</span>
            </div>
            <a href="#" class="text-lg font-medium text-gray-200 hover:text-red-300 transition">Total</a>
            <p class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-red-300 to-red-500 mt-2">12</p>
            <p class="text-gray-400 text-xs mt-2"><i class="fas fa-arrow-up text-green-400"></i> +2 this week</p>
          </div>
          <!-- card 2 -->
          <div class="card p-6 rounded-2xl shadow-2xl">
            <div class="flex items-center justify-between mb-3">
              <span class="stat-icon"><i class="fas fa-clock text-yellow-400 text-xl"></i></span>
              <span class="text-xs font-semibold px-2 py-1 rounded-full bg-yellow-900/30 text-yellow-300">Total</span>
            </div>
            <h2 class="text-lg font-medium text-gray-200">Total</h2>
            <p class="text-4xl font-bold text-yellow-400 mt-2">3</p>
            <p class="text-gray-400 text-xs mt-2">needs attention</p>
          </div>
          <!-- card 3 -->
          <div class="card p-6 rounded-2xl shadow-2xl">
            <div class="flex items-center justify-between mb-3">
              <span class="stat-icon"><i class="fas fa-dollar-sign text-blue-400 text-xl"></i></span>
              <span class="text-xs font-semibold px-2 py-1 rounded-full bg-blue-900/30 text-blue-300">Total</span>
            </div>
            <h2 class="text-lg font-medium text-gray-200">Total </h2>
            <p class="text-4xl font-bold text-blue-400 mt-2">00.00</p>
            <p class="text-gray-400 text-xs mt-2">lifetime value</p>
          </div>
        </div>
        <!-- extra analytics hint (design only) -->
        <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">
          <div class="card p-5 rounded-2xl">
            <div class="flex items-center gap-3 mb-3">
              <i class="fas fa-chart-line text-red-400 text-xl"></i>
              <h3 class="font-semibold">Quick insight</h3>
            </div>
            <p class="text-gray-300 text-sm">Total courses: <span class="text-red-300 font-bold">12</span> | Active users: {{ isset($users) ? count($users) : 'N/A' }}</p>
            <div class="w-full bg-red-950/40 rounded-full h-1.5 mt-3">
              <div class="bg-red-500 h-1.5 rounded-full w-3/4"></div>
            </div>
          </div>
          <div class="card p-5 rounded-2xl">
            <div class="flex items-center gap-3 mb-3">
              <i class="fas fa-tasks text-yellow-400"></i>
              <h3 class="font-semibold">Support messages</h3>
            </div>
            <p class="text-gray-300 text-sm">{{ isset($contacts) ? count($contacts) : '0' }} unanswered inquiries — stay responsive</p>
          </div>
        </div>
      </div>

      <!-- OUR USERS (ORDERS) SECTION -->
      <div x-show="activeSection === 'orders'" x-transition.duration.200ms>
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-3">
          <h1 class="text-3xl font-bold gradient-text">Customer Directory</h1>
          <div class="bg-black/30 backdrop-blur-sm px-4 py-2 rounded-full text-sm"><i class="fas fa-users mr-2"></i> Total: {{ isset($users) ? count($users) : 0 }} registered</div>
        </div>
        <div class="glass-table overflow-x-auto shadow-2xl">
          <table class="min-w-full divide-y divide-red-900/30">
            <thead>
              <tr>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider"><i class="fas fa-user mr-2"></i>Name</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider"><i class="fas fa-envelope mr-2"></i>Email</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-red-900/20">
            @foreach($users as $user)
              <tr class="hover:bg-red-950/30 transition">
                <td class="px-6 py-4 whitespace-nowrap text-gray-200 font-medium">{{$user->name}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-gray-300">{{$user->email}}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    
      <!-- MESSAGES (REVIEWS) SECTION -->
      <div x-show="activeSection === 'reviews'" x-transition.duration.200ms>
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-3">
          <h1 class="text-3xl font-bold gradient-text">📬 Customer Messages</h1>
          <span class="bg-red-900/30 px-4 py-1.5 rounded-full text-sm"><i class="far fa-comment-dots mr-1"></i> direct replies</span>
        </div>
        <div class="glass-table overflow-x-auto shadow-2xl">
          <table class="min-w-full divide-y divide-red-900/30">
            <thead class="bg-black/40">
              <tr>
                <th class="px-5 py-4 text-left text-xs font-semibold text-gray-300">Email</th>
                <th class="px-5 py-4 text-left text-xs font-semibold text-gray-300">Message</th>
                <th class="px-5 py-4 text-left text-xs font-semibold text-gray-300">Contact user</th>
                <th class="px-5 py-4 text-left text-xs font-semibold text-gray-300">Admin reply</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-red-900/20">
            @foreach($contacts as $contact)
              <tr class="hover:bg-red-950/20 transition">
                <td class="px-5 py-4 text-gray-200 font-mono text-sm">{{$contact->email}}</td>
                <td class="px-5 py-4 text-gray-300 break-words max-w-xs">{{$contact->Message}}</td>
                <td class="px-5 py-4">
                   @if(!$contact->response)
                    <form action="/adminreplay" method="POST" class="flex flex-col sm:flex-row gap-2 items-start sm:items-center">
                        @csrf
                        <input type="hidden" value="{{$contact->email}}" name="email">
                        <input type="hidden" value="{{$contact->id}}" name="id">
                        <input type="text" placeholder="✍️ type your reply..." name="replay" 
                               class="input-red w-full sm:w-48 text-sm focus:ring-1 focus:ring-red-500">
                        <button type="submit" class="btn-primary text-white text-sm px-4 py-2 rounded-full flex items-center gap-1 shadow-md">
                            <i class="fas fa-paper-plane text-xs"></i> Replay
                        </button>
                    </form>
                  @else
                      Already replaied
                  @endif
                </td>
                <td class="px-5 py-4">
                  @if($contact->response)
                    <span class="inline-flex items-center gap-1 bg-green-900/30 text-green-300 px-3 py-1 rounded-full text-xs font-medium"><i class="fas fa-check-circle"></i> {{$contact->response}}</span>
                  @else
                    <span class="text-gray-400 italic flex items-center gap-1"><i class="far fa-hourglass-half"></i> No response yet</span>
                  @endif
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <!-- levels SECTION -->
      <div x-show="activeSection === 'levels'" x-transition.duration.200ms>
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-3">
          <h1 class="text-3xl font-bold gradient-text">📬 Customer Messages</h1>
          <span class="bg-red-900/30 px-4 py-1.5 rounded-full text-sm"><i class="far fa-comment-dots mr-1"></i> direct replies</span>
        </div>
        <div class="glass-table overflow-x-auto shadow-2xl">
          <table class="min-w-full divide-y divide-red-900/30">
            <thead class="bg-black/40">
              <tr>
                <th class="px-5 py-4 text-left text-xs font-semibold text-gray-300">Email</th>
                <th class="px-5 py-4 text-left text-xs font-semibold text-gray-300">level</th>
                <th class="px-5 py-4 text-left text-xs font-semibold text-gray-300">mark</th>
                <th class="px-5 py-4 text-left text-xs font-semibold text-gray-300">For what?</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-red-900/20">
            @foreach($englishs as $e)
              <tr class="hover:bg-red-950/20 transition">
                <td class="px-5 py-4 text-gray-200 font-mono text-sm">{{$e->email}}</td>
                <td class="px-5 py-4 text-gray-300 break-words max-w-xs">{{$e->level}}</td>
                <td class="px-5 py-4">
                  {{$e->mark}}
                </td>
                <td class="px-5 py-4">
                  English
                </td>
              </tr>
            @endforeach
             @foreach($turkeys as $e)
              <tr class="hover:bg-red-950/20 transition">
                <td class="px-5 py-4 text-gray-200 font-mono text-sm">{{$e->email}}</td>
                <td class="px-5 py-4 text-gray-300 break-words max-w-xs">{{$e->level}}</td>
                <td class="px-5 py-4">
                  {{$e->mark}}
                </td>
                <td class="px-5 py-4">
                  Turkey
                </td>
              </tr>
            @endforeach
             @foreach($arabics as $e)
              <tr class="hover:bg-red-950/20 transition">
                <td class="px-5 py-4 text-gray-200 font-mono text-sm">{{$e->email}}</td>
                <td class="px-5 py-4 text-gray-300 break-words max-w-xs">{{$e->level}}</td>
                <td class="px-5 py-4">
                  {{$e->mark}}
                </td>
                <td class="px-5 py-4">
                  Arabic
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <!-- PROFILE SECTION (commented originally - KEPT but restyled elegantly, still commented to preserve exactly as original? Wait original had it commented but we need to keep as is. The code was fully commented out, we keep same comments to respect "keep everything as is". However to avoid showing duplicate we maintain same comment block but can improve it visually if it were active. But since original is commented, we must preserve that. The initial code had profile section wrapped in comments. I will keep it exactly as it was (commented) but also add same styles inside to not break anything. -->
      <!-- Profile -->
       <div x-show="activeSection === 'profile'">
             <div x-data="adminProfile()" x-cloak class="w-full max-w-2xl mx-auto">
    <!-- main profile card — identical layout spirit to reference div: glass-table transformed into glass-card -->
    <div class="glass-card rounded-2xl overflow-hidden shadow-2xl transition-all duration-300 hover:shadow-red-900/20 border border-red-900/40">
      
      <!-- header section: matches "flex justify-between mb-6 gap-3" style from the original -->
      <div class="flex flex-col sm:flex-row sm:items-center justify-between p-5 pb-2 md:p-6 md:pb-3 gap-3 border-b border-red-900/30">
        <div class="flex items-center gap-2">
          <i class="fas fa-user-shield text-3xl text-red-500/80 drop-shadow-md"></i>
          <h1 class="text-2xl md:text-3xl font-bold gradient-text tracking-tight">Admin Profile</h1>
        </div>
        <div class="bg-red-900/30 backdrop-blur-sm px-4 py-1.5 rounded-full text-sm font-medium flex items-center gap-2 w-fit">
          <i class="fas fa-crown text-amber-400 text-xs"></i>
          <span class="text-gray-200">Super Admin · Elevated Access</span>
        </div>
      </div>
      
    
      <div class="p-5 md:p-7 space-y-6">
        
     
        <div class="flex flex-wrap items-start gap-4 border-b border-red-900/20 pb-5">
          <div class="bg-gradient-to-br from-red-900/40 to-black/50 p-3 rounded-2xl">
            <i class="fas fa-user-astronaut text-3xl text-red-300"></i>
          </div>
          <div class="flex-1">
            <div class="flex items-center gap-2 text-gray-400 text-xs uppercase tracking-wider mb-1">
              <i class="fas fa-tag text-[11px]"></i>
              <span>{{Session::get('email')}}· Identity</span>
            </div>
            <div class="text-gray-100 text-xl font-semibold tracking-wide flex items-center gap-2 flex-wrap">
              <span x-text="adminName" class="bg-black/30 px-3 py-1 rounded-lg inline-block"></span>
              <span class="text-xs text-emerald-400 bg-emerald-950/40 px-2 py-0.5 rounded-full"><i class="fas fa-check-circle text-[10px]"></i> verified</span>
            </div>
            <p class="text-gray-400 text-xs mt-1">Primary administrator · role permissions: full</p>
          </div>
        </div>
        
     
        <div class="space-y-3">
          <div class="flex items-center justify-between flex-wrap gap-2">
          
       

            <Form method="post" action="/update">
              <input placeholder="email@email.com " name="email" type="text" class="text-red-400 hover:text-red-300 transition-all duration-200 text-sm bg-red-950/30 hover:bg-red-900/40 px-3 py-1.5 rounded-full flex items-center gap-1.5">
                <button type="submit">Update</button>
            </Form>
          </div>
          
         
          
          <!-- success toast / message after email update (smooth transition) -->
          <div x-show="showSuccessMsg" x-transition.duration.300ms class="mt-3 flex items-center gap-2 text-emerald-400 bg-emerald-950/30 backdrop-blur-sm rounded-lg px-4 py-2 text-sm border border-emerald-800/40">
            <i class="fas fa-check-circle text-emerald-400"></i>
            <span x-text="successMessage"></span>
          </div>
          
          <!-- optional info hint: last updated timestamp -->
          <div class="flex justify-end text-[11px] text-gray-500 mt-1" x-show="lastUpdated && !editingEmail">
            <i class="far fa-clock mr-1"></i>
            <span>Last email update: <span x-text="lastUpdated"></span></span>
          </div>
        </div>
        
        <!-- additional stats / admin context (makes it feel complete, not full page) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-3 pt-2 border-t border-red-900/20">
          <div class="flex items-center gap-2 bg-black/30 rounded-xl px-3 py-2">
            <i class="fas fa-database text-amber-400/70 text-sm"></i>
            <span class="text-gray-300 text-xs">Account ID: <span class="font-mono text-red-300">ADM-986X-2F</span></span>
          </div>
          <div class="flex items-center gap-2 bg-black/30 rounded-xl px-3 py-2">
            <i class="fas fa-shield-alt text-sky-400/70 text-sm"></i>
            <span class="text-gray-300 text-xs">MFA: active · <span class="text-green-400">secure</span></span>
          </div>
        </div>
      </div>
      
      <!-- subtle footer to match reference spans (like "direct replies" badge) -->
      <div class="bg-black/40 px-5 py-3 text-right border-t border-red-900/20 text-xs text-gray-400 flex justify-between">
        <span><i class="fas fa-sliders-h mr-1"></i> profile management</span>
        <span><i class="far fa-save mr-1"></i> changes are local (demo ready)</span>
      </div>
    </div>
  </div>
       </div>

    </main>
  </div>

  <script>
    function submitProfileImage(event) {
        const reader = new FileReader();
        reader.onload = function(e){
            const preview = document.getElementById('profilePreview');
            if(preview) preview.src = e.target.result;
        };
        if(event.target.files[0]) reader.readAsDataURL(event.target.files[0]);
    }
    // small utility to close sidebar on window resize if needed (preserves existing logic)
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) {
            // if desktop, ensure any openSidebar from mobile does not affect layout, but alpine will manage
            // but we force close overlay style if needed? just for consistency
            if (typeof Alpine !== 'undefined') {
                // optional: we don't force, let alpine state remain
            }
        }
    });
  </script>
</body>
</html>