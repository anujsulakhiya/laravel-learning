
{{ @$success }}

@if(@$success == TRUE)
<div class="alert alert-success">Password Changed Successfully</div>
@endif

<form action="/dashboard/change_password" onsubmit="return post_request(this)">
    @csrf
    <input type="text"  name="password1" value="12341">
    <input type="text" name="password2" value="123456">
    <button type="submit"> Change Pass</button>

    @error('password1')

    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>

    @enderror

    @error('password2')

    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>

    @enderror
</form>


