<footer class="section-sm pb-0 border-top border-default">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-3 mb-4">
                <a class="mb-4 d-block" href="{{ route('home') }}">
                    <img class="img-fluid" width="240px" src="{{asset('/')}}website/images/Error_Hero.png" alt="ErrorHero">
                </a>
                <p>Unlock the power of problem-solving. Elevate your coding journey with our platform – where challenges meet solutions seamlessly. Dive in, code, conquer!</p>
            </div>

            <div class="col-lg-2 col-md-3 col-6 mb-4">
                <h6 class="mb-4">Quick Links</h6>
                <ul class="list-unstyled footer-list">
                    @if(Auth::check())
                        <li>
                            <a href="{{route('dashboard') }}">Dashboard</a>
                        </li>
                        <br />
                        <li>
                            <a href="" onclick="event.preventDefault(); document.getElementById('logoutForm').submit(); ">Logout</a>
                            <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="{{route('login')}}">Login/Signup</a>
                        </li>
                    @endif
                    <br/>
                    <li>
                        <a href="{{ route('about') }}">About</a>
                    </li>
                    <br/>
                    <li>
                        <a href="{{ route('contact') }}">Contact</a>
                    </li>
                    <br/>
                    <li>
                        <a href="{{ route('policy.privacy') }}">Privacy Policy</a>
                    </li>
                    <br/>
                    <li><a href="{{ route('policy.terms') }}">Terms Conditions</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 col-6 mb-4">
                <h6 class="mb-4">Social Links</h6>
                <ul class="list-unstyled footer-list">
                    <li><a href="https://facebook.com/errorhero/" target="_blank">facebook</a></li>
                    <br/>
                    <li><a href="https://twitter.com/SMAlifAhmmed/" target="_blank">twitter</a></li>
                    <br/>
                    <li><a href="https://www.linkedin.com/in/s-m-alif-ahmmed-a6a237224/" target="_blank">linkedin</a></li>
                    <br/>
                    <li><a href="https://github.com/s-m-alif-ahmmed" target="_blank">github</a></li>
                </ul>
            </div>

            <div class="col-md-3 mb-4">
                <h6 class="mb-4">Subscribe Newsletter</h6>
                <form class="subscription" action="{{ route('subscribe.store') }}" method="post">
                    @csrf
                    @method('POST')

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? '' }}">

                    <div class="position-relative">
                        <i class="ti-email email-icon"></i>
                        <input type="email" name="email" class="form-control" placeholder="Your Email Address">
                    </div>
                    <button class="btn btn-primary btn-block rounded-pill" type="submit">Subscribe now</button>
                </form>
            </div>
        </div>
        <div class="scroll-top">
            <a href="javascript:void(0);" id="scrollTop"><i class="ti-angle-up"></i></a>
        </div>
        <div class="text-center pb-3">
            <p class="content">&copy; 2023 - Design &amp; Develop By <a class="text-decoration-none" href="https://smalifahmmed.com/" target="_blank">S M Alif Ahmmed.</a></p>
        </div>
    </div>
</footer>
