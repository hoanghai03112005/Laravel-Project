@extends('public.main')


@section('main')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('assets/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Login / Register
    </h2>
</section>	


<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form method="POST">
                    @csrf
                    <input type="hidden" name="form_type" value="login">
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Login
                    </h4>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Your Email Address">
                        
                    </div>
                    <div style="color: red" >
                        <small>@error('email') {{ $message }} @enderror</small>
                    </div>

                    <div class="bor8 m-b-30">
                        <input type="password" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="password" placeholder="Password"></input>
                    </div>
                    <div style="color: red" >
                        <small>@error('password') {{ $message }} @enderror</small>
                    </div>
                    <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Login
                    </button>
                </form>
            </div>

            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form method="POST" action="{{ route('public.register') }}">
                    @csrf
                    <input type="hidden" name="form_type" value="register">
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Register
                    </h4>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="name" placeholder="Your Name">
                        
                    </div>
                    <div style="color: red" >
                        <small>@error('name') {{ $message }} @enderror</small>
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Your Email Address">
                        
                    </div>
                    <div style="color: red" >
                        <small>@error('email') {{ $message }} @enderror</small>
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="phone" placeholder="Your Phone">
                    </div>
                    <div style="color: red" >
                        <small>@error('phone') {{ $message }} @enderror</small>
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="address" placeholder="Your Address">
                        
                    </div>
                    <div style="color: red" >
                        <small>@error('address') {{ $message }} @enderror</small>
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Password">
                        
                    </div>
                    <div style="color: red" >
                        <small>@error('password') {{ $message }} @enderror</small>
                    </div>

                    <div class="bor8 m-b-30">
                        <input type="password" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="confirm_password" placeholder="Confirm Password"></input>
                    </div>
                    <div style="color: red" >
                        <small>@error('confirm_password') {{ $message }} @enderror</small>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Register
                    </button>
                </form>
            </div>


        </div>
    </div>
</section>	
@endsection