@if (Auth::user()->image)
    <img style="display:block;width:100%;margin-top:8px;margin-right:5px;" src="{{ route('user.avatar',['filename' => Auth::user()->image]) }}" class="avatar" />
@endif