@extends('layouts.login')
<!--2022年10月26日 layoutsファイルの中のlogin.blade.phpを読み込んでいる -->

@section('content')
<h2></h2>


<!-- 2022.11.12 投稿フォームの設置-->
        {!! Form::open(['url' => 'posts/create']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) !!}
            <input type="image" src="images/post.png">
        </div>
        {!! Form::close() !!}

<!-- 2022.12.16 ログインユーザーのフォローのつぶやきを表示-->
<!-- 21行目の$postとPostsController.phpの22行目のpostが連動してる 単語は何でも大丈夫 連動さえしてれば-->
<!-- 21行目の$listsと23行目と24行目の$listsが連動してる -->
<!-- 23行目のpostはテーブルの中のpostカラム-->
<!-- 24行目のcreated_atはテーブルの中のcreated_atカラム -->
@foreach ($post as $lists)
            <tr>
                <td>{{ $lists->post }}</td>
                <td>{{ $lists->created_at }}</td>

                <!-- 2023.01.16 ログインユーザーのつぶやきを編集 最初-->

                <div class="content">
                <!-- 投稿の編集ボタン 31行目のjs-modal-openでscript.jsの13行目にデータを送ってる-->
                <td><a class="btn btn-primary js-modal-open" href="" post="{{ $lists->post }}" post_id="{{ $lists->id }}">更新</a></td>
                </div>

                <!-- 2023.01.16 ログインユーザーのつぶやきを編集 最後-->

                <td><a class="btn btn-danger" href="/post/{{$lists->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
            </tr>


<!-- モーダルの中身 -->
<div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <!-- 44行目とweb.phpの55行目が連動してる -->
            <form action="/post/update" method="POST">
            <!-- 47行目のnameのupPostとPostsController.phpの45行目のupPostがリンクしている -->
            <!-- 47行目のmodal_postはscript.jsの22行目から受け取ったもの -->
                <textarea name="upPost" rows="10" cols="100" class="modal_post"></textarea>
            <!-- 50行目のnameの部分とPostsController.phpの44行目とリンクしている -->
            <!-- 50行目のmodal_idはscript.jsの24行目から受け取ったもの -->
                <input type="hidden" name="id" class="modal_id" value="">
                <input type="image" src="images/edit.png">
                {{ csrf_field() }}
            </form>
            <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>
@endforeach



@endsection