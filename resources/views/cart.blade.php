@section('css')
    {{-- <link rel="stylesheet" href="assets/css/cart.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
@endsection

@extends('layouts.main')

@section('title', 'Cart')

@section('content')
{{-- @dd(auth()->user()->id) --}}
    @if ($count == 0)
        <div class="emptyCart d-flex justify-content-center ">
            <div class="picture" style="background-image: url({{ asset('/assets/img/emptyCart.svg') }}"></div>
        </div>
        <div class="emptyText2 w-100 d-flex justify-content-center">
            <div class="emptyText">
                <p class="text-danger text1">Oops! Your cart is empty!</p>
                <p class="text2">Looks like you haven't added anything to your cart yet</p>
            </div>
        </div>
        {{-- <div class="btnDiv w-100 h-100 d-flex justify-content-center" data-aos="fade-right">
            <a class="btn btn-1" href="/products" role="button">
                <div class="seeMore">
                    <p>Shop now</p>
                    <i class="bi bi-arrow-right-short"></i>
                </div>
            </a>
        </div> --}}
        <div class="btnDiv w-100">
            <a class="btn" href="/products">
                <p>Shop Now!</p>
            </a>
        </div>
    @else
        <div class="cartPage d-flex" data-aos="fade-up">
            <div class="leftCart">
                <div class="cartTitle">
                    Your Cart
                </div>
                <div class="cartLine"></div>
                <div class="selectAll d-flex align-items-center">
                    <div class="checkHelp">
                        <label class="checkDiv">
                            <input type="checkbox" name="selectAll" id="selectAll" class="selectAll2">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="selectAllText">
                        {{-- $tes = 0 --}}
                        {{-- @dd($count) --}}
                        @php($total = 0)
                        @php($count = 0)
                        @foreach ($cartHeaders as $cartHeader)
                            @if ($cartHeader->user_id == auth()->user()->id)
                                @foreach ($cartDetails as $cartDetail)
                                    {{-- @if ($cartDetail->cartHeader->user->id == auth()->user()->id && $cartDetail->cartHeader->event_id == ($loop->parent->index+1)) --}}

                                    @if ($cartHeader->id == $cartDetail->cart_header_id)
                                        @php($count++)
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                        {{-- @dd($count) --}}
                        Select All ({{ $count }} Products)
                    </div>
                </div>

                @foreach ($cartHeaders as $cartHeader)
                    @if ($cartHeader->user_id == auth()->user()->id)
                        {{-- <p>{{ $loop->index }}</p> --}}
                        <div class="cartCard">
                            <div class="selectEvent d-flex align-items-center">
                                <div class="checkHelp">
                                    <label class="checkDiv">
                                        <input type="checkbox" name="eventCheck" id="{{ $cartHeader->id }}" class="eventCheck">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="eventCart">
                                    {{ $cartHeader->event->name }}
                                </div>
                            </div>
                            <div class="lineCart"></div>
                            <div class="productCart d-flex ">
                                <p class="productCartText">Product Details</p>
                                <p class="productPriceText">Price</p>
                                <p class="productTotalText">Total</p>
                            </div>
                            <div class="productCartLine"></div>
                            <div class="productGroup" id="productGroup">
                                <div class="d-none" id="result"></div>
                                @include('cartResult')
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
            <div class="rightCart" id="rightCart">
                <div class="summaryTitle">
                    Order Summary
                </div>
                <div class="summaryLine"></div>
                <div class="summaryTotalItem">
                    <p class="totalItemText">Total Items</p>
                    <p class="totalItem">0 Items</p>
                </div>
                <div class="summaryTotalPayment">
                    <p class="totalPaymentText">Total Payment</p>
                    <p class="totalPayment">Rp0</p>
                </div>
                <div class="btnClass d-flex justify-content-center">
                    <a href="checkout" class="btn">
                        Checkout Now!
                    </a>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('js')
    <script type="text/javascript" src="{{URL::asset('assets/js/cart.js')}}"></script>
@endsection

