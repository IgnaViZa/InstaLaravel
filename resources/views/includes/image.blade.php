<div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-bottom:10px">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="card">
                <div class="card-header">
                    <label class="col-md-4 col-form-label" style="margin-top:10px;font-weight:bold">{{'@'.$image->user->nick}}</label>
                    @if(isset($image->user->image))
                    <div style="float:left;border-radius:400px;overflow:hidden;width:50px;height:50px;margin:7px 5px 0px 0px;;background-color:gainsboro">
                        <img style="width:100%;margin-top:8px;margin-right:5px;" src="{{ route('user.avatar',['filename' => $image->user->image]) }}" class="avatar" />
                    </div>
                    @endif
                    <div style="float:right;padding-top:19px;color:#969896">
                        {{ \FormatTime::LongTimeFilter($image->created_at) }}
                    </div>
                </div>
                <div class="card-body" style="padding:0px">
                    <a href="{{ route('detail', ['id' => $image->id])}}">
                        <div style="width:100%;max-height:500px;overflow:hidden">
                            <img style="width:100%" src="{{route('postImage', ['filename'=>$image->image_path])}}">
                        </div>
                    </a>
                    <hr>
                </div>
                <div class="likes" style="margin-left:10px;width:35px;padding-bottom:0px;" >
                    <?php $like_existe = false; ?>
                    @foreach($image->likes as $like)
                    @if($like->user->id == Auth::user()->id)
                    <?php $like_existe = true; ?>
                    @endif
                    @endforeach
                    @if($like_existe)
                    <!--Javascript file did not work, so i made buttom-form action, not ideal but work -->
                    <form action="{{route('like.delete', [ 'image_id' => $image->id,'from' => 'dashboard'])}}">
                        <button type="submit">
                            <img src="{{route('getIcon', ['iconname'=>'heart-red.png'])}}">
                        </button>
                    </form>
                    @else
                    <form action="{{route('like.save', [ 'image_id' => $image->id,'from' => 'dashboard'])}}">
                        <button type="submit">
                            <img src="{{route('getIcon', ['iconname'=>'heart-black.png'])}}">
                        </button>
                    </form>
                    @endif
                    <span style="font-size:14px;float:right;margin-top:-34px;margin-right:9px">
                        ({{count($image->likes)}})
                    </span>
                </div>
                <div class="descripcion" style="padding:10px;padding-top:0px">
                    <p>{{ $image->description }}<p>
                </div>
                <div class="btn btn-warning" onkeypress="{{route('detail', ['id' => $image->id])}}">
                    Comentarios: ({{count($image->comments)}})
                </div>
            </div>
        </div>
    </div>
</div>
