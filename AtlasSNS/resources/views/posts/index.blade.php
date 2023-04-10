@extends('layouts.login')
<!--2022年10月26日 layoutsファイルの中のlogin.blade.phpを読み込んでいる -->

@section('content')
<h2></h2>

<div class="main_content">
    {!! Form::open(['url' => '/post/create']) !!}
        <div class="post_group">
            <p>ユーザーアイコン</p>
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form_post', 'placeholder' => '投稿内容を入力してください']) !!}
            {!! Form::image('images/post.png', 'img', ['class' => 'post_img']) !!}
        </div>
    {!! Form::close() !!}
</div>

<!-- foreachの後は($複数形 as $単数形) が一番綺麗  -->
<!-- ($posts as $post)の$postと'posts'=>$post,のpostsが連動している 単語は何でも大丈夫 -->
@foreach ($posts as $post)
<!-- 2023.04.07 ログインユーザーとフォローしているユーザーのつぶやきのみを表示 -->
    @if (auth()->user()->isFollowing($post->user_id)or(Auth::id()==$post->user_id))
            <tr>
                <div class="post_content follow_lists">
                    <div class="follow_list">
                        <th><a href="/user/{{$post->user->id}}"><img src="{{ \Storage::url($post->user->image) }}"></a></th>
                            <div class="username_post">
                                <th>{{ $post->user->username }}</th>
                                <td>{{ $post->post }}</td>
                            </div>
                    </div>
                        <td>{{ $post->created_at }}</td>

                        @if (Auth::id()==$post->user_id)
                        <div class="">
                        <!-- 投稿の編集ボタン js-modal-openでscript.jsの$('.js-modal-open')にデータを送ってる-->
                        <td><a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="images/edit.png" alt="編集" width="50" height="50"></a></td>

                        <td><a class="btn-danger" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
                                <img src="images/trash-h.png" alt="削除" class="image" width="60" height="60">
                                <!-- <img src="images/trash.png" alt="削除"> -->
                            </a></td>
                        </div>
                        @endif
                </div>
            </tr>


    <!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <!-- 43行目とweb.phpの59行目が連動してる -->
            <form action="/post/update" method="POST">
                <!-- 46行目のnameのupPostとPostsController.phpの50行目のupPostがリンクしている -->
                <!-- 46行目のmodal_postはscript.jsの26行目のmodal_postから受け取ったもの -->
                <textarea name="updatePost" rows="10" cols="100" class="modal_post"></textarea>
                <!-- 49行目のnameのidとPostsController.phpの49行目とリンクしている -->
                <!-- 49行目のmodal_idはscript.jsの28行目のmodal_idから受け取ったもの -->
                <input type="hidden" name="id" class="modal_id">
                <input type="image" src="images/edit.png">
                {{ csrf_field() }}
            </form>
            <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>

    @endif


@endforeach



@endsection