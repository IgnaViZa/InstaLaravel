@if (Auth::user()->image)
<a href="{{route('profile', ['id' => Auth::user()->id])}} ">
    <img style="display:block;width:100%;margin-top:8px;margin-right:5px;" src="{{ route('user.avatar',['filename' => Auth::user()->image]) }}" class="avatar" />
</a>
@endif