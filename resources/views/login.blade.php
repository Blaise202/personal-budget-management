<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <title>Signup/Login Form</title>
 <link href="{{ asset('styles.css') }}" rel="stylesheet">
 <meta content="width=device-width, initial-scale=1.0" name="viewport">
 <style>
  body {
   font-family: Arial, sans-serif;
   background: #000;
   /* black background */
   display: flex;
   justify-content: center;
   align-items: center;
   height: 100vh;
   margin: 0;
  }
 </style>
</head>

<body>
 <div class="container">
  <!-- Login Form -->
  <form action="{{ route('login.post') }}" id="loginForm" method="post">
   @csrf
   <h2>Login</h2>
   <div class="form-group">
    <label>Email</label>
    <input name="email" placeholder="Enter your email" required type="email">
   </div>
   <div class="form-group">
    <label>Password</label>
    <input name="password" placeholder="Enter your password" required type="password">
   </div>
   <button class="btn-login" type="submit">Login</button>
   @if ($users == 0)
    <div class="toggle-link">
     <span>Don’t have an account? <a onclick="toggleForm()">Signup</a></span>
    </div>
   @endif
  </form>

  <!-- Signup Form -->
  @if ($users == 0)
   <form action="{{ route('signup.post') }}" class="hidden" id="signupForm" method="post">
    @csrf
    <h2>Signup</h2>
    <div class="form-group">
     <label>Full Name</label>
     <input name="name" placeholder="Enter your name" required type="text">
    </div>
    <div class="form-group">
     <label>Email</label>
     <input name="email" placeholder="Enter your email" required type="email">
    </div>
    <div class="form-group">
     <label>Password</label>
     <input name="password" placeholder="Enter your password" required type="password">
    </div>
    <button class="btn-signup" type="submit">Signup</button>
    <div class="toggle-link">
     <span>Already have an account? <a onclick="toggleForm()">Login</a></span>
    </div>
   </form>
  @endif
 </div>

 <script>
  const signupForm = document.getElementById("signupForm");
  const loginForm = document.getElementById("loginForm");

  function toggleForm() {
   signupForm.classList.toggle("hidden");
   loginForm.classList.toggle("hidden");
  }
 </script>
</body>

</html>
