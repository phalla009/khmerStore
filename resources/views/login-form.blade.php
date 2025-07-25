<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Form</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      height: 100vh;
      font-family: Arial, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #f5f5f5;
      animation: fadeInBody 0.8s ease;
    }

    @keyframes fadeInBody {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .wrapper {
      display: flex;
      max-width: 900px;
      width: 100%;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      background: #fff;
      animation: slideInWrapper 1s ease;
    }

    @keyframes slideInWrapper {
      from { opacity: 0; transform: scale(0.95); }
      to { opacity: 1; transform: scale(1); }
    }

    .image-side {
      width: 50%;
      background: url('https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=600&q=80') center/cover no-repeat;
      animation: zoomInImage 2s ease-in-out infinite alternate;
    }

    @keyframes zoomInImage {
      from { transform: scale(1); }
      to { transform: scale(1.05); }
    }

    .login-container {
      width: 50%;
      padding: 2rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .login-container h2 {
      color: #ff6200;
      text-align: center;
      margin-bottom: 1.5rem;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    .form-group label {
      display: block;
      margin-bottom: 0.5rem;
      color: #333;
    }

    .form-group input {
      width: 100%;
      padding: 0.75rem;
      border: 1px solid #ccc;
      font-size: 1rem;
    }

    .form-group input:focus {
      outline: none;
      border-color: #ff6200;
      box-shadow: 0 0 5px rgba(255, 98, 0, 0.3);
    }

    .checkbox-group {
      display: flex;
      align-items: center;
      margin-bottom: 1.5rem;
      font-size: 0.95rem;
    }

    .checkbox-group input {
      margin-right: 0.5rem;
    }

    .login-btn {
      width: 100%;
      padding: 0.75rem;
      background-color: #ff6200;
      border: none;
      color: #fff;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .login-btn:hover {
      background-color: #e55a00;
    }

    @media (max-width: 768px) {
      .wrapper {
        flex-direction: column;
      }

      .image-side {
        display: none;
      }

      .login-container {
        width: 100%;
      }
    }
    .error {
      color: red;
      background-color: #ffe6e6;
      padding: 10px;
      border-left: 4px solid red;
      border-radius: 4px;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
  }

  </style>
</head>
<body>

<div class="wrapper">
  <div class="image-side"></div>

  <form class="login-container" method="POST" action="{{ route('login') }}">
    @csrf
    <h2>Login Form</h2>
    @if (!empty(session('error')))
      <div class="error">{{session('error')}}</div>
    @endif
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" placeholder="Enter your username" >
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" >
    </div>

    <div class="checkbox-group">
      <input type="checkbox" id="remember" name="remember">
      <label for="remember">Remember me</label>
    </div>

    <button class="login-btn" type="submit">Login</button>
  </form>
</div>

</body>
</html>
