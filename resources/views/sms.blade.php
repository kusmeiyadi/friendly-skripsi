@if(Session::has('success'))
success
@endif

<div class="">
<form class="" action="{{ route('pengaduan.sms') }}" method="post">
{{ csrf_field() }}
<div class="">
    <label for="mobile">Mobile Number</label>
    <input type="text" name="mobile" id="mobile" placeholder="Mobile Number">
</div>
<button type="submit" name="button">Send</button>
</form>
</div>
