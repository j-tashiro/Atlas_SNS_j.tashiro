@extends('layouts.login')
<!--2022年10月26日 layoutsファイルの中のlogin.blade.phpを読み込んでいる -->

@section('content')
<h2></h2>


<!--投稿フォームの設置-->
    {!! Form::open(['url' => '/posts/create']) !!}
        <div class="form-group">
            <p>ユーザーアイコン</p>
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) !!}
            {!! Form::image('images/post.png', 'img', ['class' => 'form-img']) !!}
        </div>
    {!! Form::close() !!}

<!-- 2022.12.16 ログインユーザーのフォローのつぶやきを表示-->
<!-- 21行目の$postとPostsController.phpの22行目のpostが連動してる 単語は何でも大丈夫 連動さえしてれば-->
<!-- 21行目の$listsと23行目と24行目の$listsが連動してる -->
<!-- 23行目のpostはテーブルの中のpostカラム-->
<!-- 24行目のcreated_atはテーブルの中のcreated_atカラム -->
@foreach ($post as $lists)
            <tr>
                <div class="content">
                    <td>{{ $lists->post }}</td>
                    <td>{{ $lists->created_at }}</td>


                    <!-- 投稿の編集ボタン 30行目のjs-modal-openでscript.jsの17行目にデータを送ってる-->
                    <td><a class="js-modal-open" href="" post="{{ $lists->post }}" post_id="{{ $lists->id }}"><img src="images/edit.png" alt="編集"></a></td>



                    <td><a class="btn-danger" href="/post/{{$lists->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash-h.png" alt="削除"></a></td>
                </div>
            </tr>


<!-- モーダルの中身 -->
<div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <!-- 44行目とweb.phpの55行目が連動してる -->
            <form action="/post/update" method="POST">
            <!-- 47行目のnameのupPostとPostsController.phpの48行目のupPostがリンクしている -->
            <!-- 47行目のmodal_postはscript.jsの26行目のmodal_postから受け取ったもの -->
                <textarea name="upPost" rows="10" cols="100" class="modal_post"></textarea>
            <!-- 50行目のnameのidとPostsController.phpの45行目とリンクしている -->
            <!-- 50行目のmodal_idはscript.jsの28行目のmodal_idから受け取ったもの -->
                <input type="hidden" name="id" class="modal_id">
                <input type="image" src="images/edit.png">
                {{ csrf_field() }}
            </form>
            <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>
@endforeach



@endsection