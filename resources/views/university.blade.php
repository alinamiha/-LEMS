@extends('layout')
@section('content')
{{--<form action="">--}}
{{--    <input type="text" name="product-name" class="product-name">--}}
{{--    <input type="text" name="price" class="price">--}}
{{--    <input type="text" name="discount" class="discount">--}}
{{--    <button type="submit">Send</button>--}}
{{--    <p id="log"></p>--}}
{{--</form>--}}

{{--<input placeholder="Enter some text" name="name"/>--}}



{{--    <ul class="list">--}}
{{--        <li id="item" class="item"></li>--}}
{{--    </ul>--}}
<div class="wrap-form">
    <input type="text" name="name" class="product" id="name">
    <input type="number" name="price" class="product" id="price">
    <button type="submit" id="sendForm">Send</button>
</div>
<div class="wrap-discount">
    <input type="number" name="discount" class="product" id="discount">
    <button type="submit" id="applyDiscount">Apply descount</button>
</div>
<div class="wrap-delivery">
    <input type="number" name="delivery" class="product" id="delivery">
    <button type="submit" id="applyDelivery">Apply delivery</button>
</div>
@endsection
