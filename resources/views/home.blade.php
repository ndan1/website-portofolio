@extends('navbar')
@section('container')
<main class="py-3 jumbotron-height">
    <div class="container px-5 pb-5">
        <div class="row gx-5 align-items-center jumbotron-flex">
            <div class="col-xxl-5 mt-3">
                <!-- Header text content-->
                <div class="text-center text-xxl-start">
                    <div class="fs-3 fw-light text-muted text-white">Welcome to My Website, My Name is</div>
                    <h1 class="display-3 fw-bolder mb-3"><span class="text-gradient d-inline">Lin Dan Christiano</span></h1>
                    <h2 class="display-7 fw-light mb-3 text-white"><span class="d-inline">Wanna See My Projects?</span></h2>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                        <a style="text-decoration: none;" href="{{url('project')}}">
                            <div class="button btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder">
                                <div class="text">Projects</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-7">
                <!-- Header profile picture-->
                <div class="d-flex justify-content-center mt-5 mt-xxl-0 profile-img-position">
                    <div class="profile">
                        <img class="profile-img" src="profile.jpg"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- About section --}}
    <section class="bg-light py-5">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-xxl-8">
                    <div class="text-center my-5">
                        <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">About Me</span></h2>
                        <p class="lead fw-light mb-4">My name is Lin Dan Christiano, and I'm interested in learning new things.</p>
                        <p class="text-muted">I am an undergraduate student majoring in computer science; I have some experience in the fields of Websites, Applications, Game Development, Immersive Technology, and Artificial Intelligence, and I also have experience working as a programming language teacher.</p>
                        <div class="d-flex justify-content-center fs-2 gap-4">
                            <a class="text-gradient" href="#!"><i class="bi bi-twitter"></i></a>
                            <a class="text-gradient" href="#!"><i class="bi bi-linkedin"></i></a>
                            <a class="text-gradient" href="#!"><i class="bi bi-github"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Visitor Section --}}
    <section class="bg-light py-3">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-xxl-8">
                    <div class="text-center my-5">
                        <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">Comments</span></h2>
                        <p class="lead fw-light mb-4">Write your thoughts about this website.</p>
                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" name="forum_id" value="0">
                            <input type="hidden" name="parent" value="0">
                            <textarea name="konten" id="komentar-utama" class="form-control" rows="4"></textarea>
                            <input type="submit" class="btn btn-primary mt-3" value="Send">
                        </form>
                        <ul class="list-unstyled activity-list">
                            @foreach ($komentars as $komentar)
                            <li class="mt-4 comment-box">
                                <h6>{{$komentar->user->name}}</h6>
                                <hr>
                                <p>{{$komentar->konten}}</p>
                                <span>{{$komentar->created_at->diffForHumans()}}</span>
                                @if (Auth::check())
                                @if (auth()->user()->id == $komentar->user_id)
                                    <form action="comments/{{ $komentar->id }}" method="POST" class="mb-0 mt-3">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm py-1 px-2 border border-gray-400 shadow-sm rounded-md hover:shadow-md">Delete</button>
                                    </form>
                                @endif
                                @endif
                            </li>
                            @endforeach
                            </ul>
                            {{ $komentars->links() }}
                        <div class="d-flex justify-content-center fs-2 gap-4">
                            <a class="text-gradient" href="#!"><i class="bi bi-twitter"></i></a>
                            <a class="text-gradient" href="#!"><i class="bi bi-linkedin"></i></a>
                            <a class="text-gradient" href="#!"><i class="bi bi-github"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@stop
