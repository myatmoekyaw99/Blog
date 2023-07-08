<!-- navbar -->
<nav class="navbar" style="background-color: #2C3A47;">
      <div class="container">
        <a class="navbar-brand " href="/">Creative Coder</a>
        <div class="d-flex">
          <a href="/" class="nav-link text-white">Home</a>
          <a href="/#blogs" class="nav-link text-white">Blogs</a>
          <a href="#subscribe" class="nav-link text-white">Subscribe</a>
          @auth
            <form action="/logout" method="POST">
              @csrf
              <img src="{{auth()->user()->avatar}}" width="40" height="40" alt="profile" class="rounded-circle">
              <button type="submit" class="btn btn-danger">Logout</button>
            </form>
          @else
            <a href="/register" class="nav-link">Register</a>
            <a href="/login" class="nav-link">Login</a>
          @endauth
        </div>
      </div>
</nav>