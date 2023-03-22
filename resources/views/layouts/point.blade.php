<p class="text-usernamer">{{ Auth::user()->username }}</p>
<p class="text-point">
    @if (Auth::user()->point != null)
        จำนวนเงิน {{ number_format(Auth::user()->point) }} บาท
    @else
        จำนวนเงิน 0 บาท
    @endif
</p>
@if (session('message'))
    <p class="mess"> {{ session('message') }}</p>
@endif
