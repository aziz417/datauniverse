<nav class="navbar navbar-expand-lg navbar-dark fixed-top" role="navigation"> <!--- bg-transparent--->
    <div class="container no-override">
        <a class="navbar-brand" href="/">
            <img style="width: 169px !important;" src="{{ asset("frontend/assets/image/home/logo.png") }}" alt="Data &amp; Lead Solution" class="d-none d-lg-inline mr-2">
            <span class="d-md-block d-xs-block d-sm-block d-lg-none">
               Data Lead Solutuin
            </span>
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <form action="/data-market">
                        <div class="input-group search-container">
                            <input class="form-control" name="q" value="" placeholder="Search for...">
                            <span class="input-group-btn">
                              <button class="btn btn-secondary">Go!</button>
                            </span>
                        </div>
                    </form>
                </li>
                <li class="nav-item active dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        Lead Category
                        <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="welcome/buy_data">Email Marketing</a>
                        <a class="dropdown-item" href="welcome/b2b">B2B</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('blog.index') }}" class="nav-link">
                        Leads & Data List
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link--rounded" href="welcome/sign_in">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
