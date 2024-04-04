<nav class="navbar navbar-expand-md bg-black navbar-dark py-4 fixed-top ">
    <div class="container">
        <a class="navbar-brand me-5" href="{{ route('home') }}">AUTO TRANSINDO </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end " id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0 justify-content-end ">
                @if (request()->path() === '/')
                    <li class="nav-item">
                        <a class="nav-link me-5" aria-current="page" href="#about">About Us</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link" href="#service">Services</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link" href="#unit">Unit</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link" href="#contact">Contacts</a>
                    </li>
            </ul>
            <ul class="navbar-nav d-flex">

                <li class="nav-item me-5">
                    <a class="nav-link" href="{{ route('payment') }}">Payments</a>
                </li>
            </ul>
        @else
            <ul class="navbar-nav me-auto mb-2 mb-md-0 justify-content-end">

                <li class="nav-item me-5">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
            </ul>
            @endif
        </div>
    </div>
</nav>
