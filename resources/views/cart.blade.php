@section('css')
    <link rel="stylesheet" href="assets/css/cart.css">
@endsection

@extends('layouts.main')

@section('title', 'Cart')

@section('content')
    <div class="cartPage d-flex">
        <div class="leftCart">
            <div class="cartTitle">
                Your Cart
            </div>
            <div class="cartLine"></div>
            <div class="selectAll d-flex align-items-center">
                <div class="checkHelp">
                    <label class="checkDiv">
                        <input type="checkbox" name="selectAll" id="selectAll">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="selectAllText">
                    {{-- $tes = 0 --}}
                    {{-- @dd($count) --}}
                    @php($total = 0)
                    @php($count = 0)
                    @foreach ($cartHeaders as $cartHeader)
                        @foreach ($cartDetails as $cartDetail)
                            @if ($cartDetail->cartHeader->user->id == 1 && $cartDetail->cartHeader->id == ($loop->parent->index+1))
                                @php($count++)
                            @endif
                        @endforeach
                    @endforeach
                    {{-- @dd($count) --}}
                    Select All ({{ $count }} Items)
                </div>
            </div>

            @foreach ($cartHeaders as $cartHeader)
                <div class="cartCard">
                    <div class="selectEvent d-flex align-items-center">
                        <div class="checkHelp">
                            <label class="checkDiv">
                                <input type="checkbox" name="eventCheck" id="" class="eventCheck">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="eventCart">
                            Charity Action of RTB
                        </div>
                    </div>
                    <div class="lineCart"></div>
                    <div class="productCart d-flex ">
                        <p class="productCartText">Product Details</p>
                        <p class="productPriceText">Price</p>
                        <p class="productTotalText">Total</p>
                    </div>
                    <div class="productCartLine"></div>
                    <div class="productGroup">
                        @foreach ($cartDetails as $cartDetail)
                            @if ($cartDetail->cartHeader->user->id == 1 && $cartDetail->cartHeader->id == ($loop->parent->index+1))
                                <div class="eachProduct d-flex align-items-center">
                                    <div class="checkHelp">
                                        <label class="checkDiv">
                                            <input type="checkbox" name="itemCheck" id="" class="itemCheck">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="eachProductImage" style="background-image: url({{ asset("assets/img/gelang.png") }})"></div>
                                    <div class="eachProductDesc">
                                        <div class="productDescName">{{ $cartDetail->product->name }}</div>
                                        <div class="productDescQtyText">Quantity:</div>
                                        <div class="productDescQty d-flex justify-content-start align-items-center">
                                            <div class="qtyDiv d-flex justify-content-center align-items-center">
                                                <div class="minus d-flex justify-content-center align-items-center" id="minus">
                                                    -
                                                </div>
                                                <div class="productQty d-flex justify-content-center align-items-center">
                                                    <form action="" method="get">
                                                        <input type="text" name="productQty" id="productQty" value="{{ $cartDetail->qty }}" class="prodQty">
                                                    </form>
                                                </div>
                                                <div class="plus d-flex justify-content-center align-items-center" id="plus">
                                                    +
                                                </div>
                                            </div>
                                            <div class="trash d-flex align-items-center">
                                                <div class="slash"></div>
                                                <i class="bi bi-trash3"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="eachProductPrice">
                                        <p class="eachProductPrice2">Rp{{ $cartDetail->product->price }}</p>
                                    </div>
                                    <div class="eachProductTotal">
                                        <p class="eachProductTotal2">Rp{{ ($cartDetail->product->price)*($cartDetail->qty) }}</p>
                                        {{-- <p class="eachProductTotal2">Rp{{ ($cartDetail->product->price)*($cartDetail->qty) }}</p> --}}
                                        {{-- @php($total += (($cartDetail->product->price)*($cartDetail->qty))) --}}
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        {{-- @for ($i = 0; $i < 2; $i++)
                            <div class="eachProduct d-flex align-items-center">
                                <div class="checkHelp">
                                    <label class="checkDiv">
                                        <input type="checkbox" name="itemCheck" id="" class="itemCheck">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="eachProductImage" style="background-image: url({{ asset("assets/img/gelang.png") }})"></div>
                                <div class="eachProductDesc">
                                    <div class="productDescName">Makaroni Pedas</div>
                                    <div class="productDescQtyText">Quantity:</div>
                                    <div class="productDescQty d-flex justify-content-start align-items-center">
                                        <div class="qtyDiv d-flex justify-content-center align-items-center">
                                            <div class="minus d-flex justify-content-center align-items-center" id="minus">
                                                -
                                            </div>
                                            <div class="productQty d-flex justify-content-center align-items-center">
                                                <form action="" method="get">
                                                    <input type="text" name="productQty" id="productQty" value="1" class="prodQty">
                                                </form>
                                            </div>
                                            <div class="plus d-flex justify-content-center align-items-center" id="plus">
                                                +
                                            </div>
                                        </div>
                                        <div class="trash d-flex align-items-center">
                                            <div class="slash"></div>
                                            <i class="bi bi-trash3"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="eachProductPrice">
                                    <p class="eachProductPrice2">Rp100000</p>
                                </div>
                                <div class="eachProductTotal">
                                    <p class="eachProductTotal2">Rp200000</p>
                                </div>
                            </div>
                        @endfor --}}
                    </div>
                </div>
            @endforeach

            {{-- @for ($j = 0; $j < 2; $j++)
                <div class="cartCard">
                    <div class="selectEvent d-flex align-items-center">
                        <div class="checkHelp">
                            <label class="checkDiv">
                                <input type="checkbox" name="eventCheck" id="" class="eventCheck">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="eventCart">
                            Charity Action of RTB
                        </div>
                    </div>
                    <div class="lineCart"></div>
                    <div class="productCart d-flex ">
                        <p class="productCartText">Product Details</p>
                        <p class="productPriceText">Price</p>
                        <p class="productTotalText">Total</p>
                    </div>
                    <div class="productCartLine"></div>
                    <div class="productGroup">
                        @for ($i = 0; $i < 2; $i++)
                            <div class="eachProduct d-flex align-items-center">
                                <div class="checkHelp">
                                    <label class="checkDiv">
                                        <input type="checkbox" name="itemCheck" id="" class="itemCheck">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="eachProductImage" style="background-image: url({{ asset("assets/img/gelang.png") }})"></div>
                                <div class="eachProductDesc">
                                    <div class="productDescName">Makaroni Pedas</div>
                                    <div class="productDescQtyText">Quantity:</div>
                                    <div class="productDescQty d-flex justify-content-start align-items-center">
                                        <div class="qtyDiv d-flex justify-content-center align-items-center">
                                            <div class="minus d-flex justify-content-center align-items-center" id="minus">
                                                -
                                            </div>
                                            <div class="productQty d-flex justify-content-center align-items-center">
                                                <form action="" method="get">
                                                    <input type="text" name="productQty" id="productQty" value="1" class="prodQty">
                                                </form>
                                            </div>
                                            <div class="plus d-flex justify-content-center align-items-center" id="plus">
                                                +
                                            </div>
                                        </div>
                                        <div class="trash d-flex align-items-center">
                                            <div class="slash"></div>
                                            <i class="bi bi-trash3"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="eachProductPrice">
                                    <p class="eachProductPrice2">Rp100000</p>
                                </div>
                                <div class="eachProductTotal">
                                    <p class="eachProductTotal2">Rp200000</p>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            @endfor --}}
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
@endsection

@section('js')
    <script type="text/javascript" src="{{URL::asset('assets/js/cart.js')}}"></script>
@endsection

