<html>@if(Session::has('cart'))
@foreach($products as $product)
{{$product['Qty']}}
{{$product['item']['title']}}
{{$product['item']['price']}}
Total: {{$totalPrice}}

@endforeach
@else
@endif
</html>