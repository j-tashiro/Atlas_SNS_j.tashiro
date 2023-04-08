@extends('layouts.login')
<!--2022年10月26日 layoutsファイルの中のlogin.blade.phpを読み込んでいる -->

@section('content')
<h2></h2>

    {!! Form::open(['url' => '/post/create']) !!}
        <div class="post_group">
            <p>ユーザーアイコン</p>
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form_post', 'placeholder' => '投稿内容を入力してください']) !!}
            {!! Form::image('images/post.png', 'img', ['class' => 'post_img']) !!}
        </div>
    {!! Form::close() !!}


<!-- 21行目の$postとPostsController.phpの22行目のpostが連動してる 単語は何でも大丈夫 連動さえしてれば-->
<!-- 21行目の$listsと24行目と25行目の$listsが連動してる -->
<!-- 24行目のpostはテーブルの中のpostカラム-->
<!-- 25行目のcreated_atはテーブルの中のcreated_atカラム -->
<!-- foreachの後は($複数形 as $単数形) が一番綺麗  -->
@foreach ($post as $lists)
<!-- 2023.04.07 ログインユーザーとフォローしているユーザーのつぶやきのみを表示 -->
@if (auth()->user()->isFollowing($lists->user_id)or(Auth::id()==$lists->user_id))
            <tr>
                <div class="content">
                    <td>{{ $lists->post }}</td>
                    <td>{{ $lists->created_at }}</td>


                    <!-- 投稿の編集ボタン js-modal-openでscript.jsの$('.js-modal-open')にデータを送ってる-->
                    <td><a class="js-modal-open" href="" post="{{ $lists->post }}" post_id="{{ $lists->id }}"><img src="images/edit.png" alt="編集" width="50" height="50"></a></td>



                    <td><a class="btn-danger" href="/post/{{$lists->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash-h.png" alt="削除" width="60" height="60"></a></td>
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