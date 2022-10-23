<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class=" justify-between h-16">
            <div class="">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">

                </div>

                <!-- Navigation Links -->
                <nav class="navbar navbar-expand-lg navbar-light ">
                    <div class="container-fluid" style="background-color:#fff">
                        <a class="navbar-brand" href="/">
                            <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                                <li class="nav-item">
                                    <a class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}" href="/dashboard">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ (request()->is('mydonation')) ? 'active' : '' }}" href="/mydonation">Donation</a>
                                </li>


                            </ul>
                            <div class="d-flex">
                                <ul>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="/Images/icons/accc1.png" alt="" width=""  style="display:inline;"> {{ Auth::user()->name }}
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item disabled" href="#">{{ Auth::user()->email }}</a></li>
                                           
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf

                                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                                        {{ __('Log Out') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

        </div>
    </div>

</nav>