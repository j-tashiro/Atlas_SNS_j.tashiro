@extends('layouts.login')
<!--2022年10月26日 layoutsファイルの中のlogin.blade.phpを読み込んでいる -->

@section('content')
<h2>機能を実装していきましょう。</h2>

<!-- 2022.11.12 投稿フォームの設置-->
        {!! Form::open(['url' => 'posts/create']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) !!}
        </div>
        <button type="submit"><img src="images/post.png"></button>
        {!! Form::close() !!}

<!-- 2022.12.16 ログインユーザーのフォローのつぶやきを表示-->
<!-- 21行目の$postとPostscontrollerの22行目のpostが連動してる 単語は何でも大丈夫 連動さえしてれば-->
<!-- 21行目の$listsと23行目と24行目の$listsが連動してる -->
<!-- 23行目のpostはテーブルの中のpostカラム-->
<!-- 24行目のcreated_atはテーブルの中のcreated_atカラム -->

@foreach ($post as $lists)
            <tr>
                <td>{{ $lists->post }}</td>
                <td>{{ $lists->created_at }}</td>
                <td><a class="btn btn-primary" href="/post/{{$lists->id}}/update-form">更新</a></td>
                <td><a class="btn btn-danger" href="/post/{{$lists->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
            </tr>
@endforeach

<!-- 2023.01.16 ログインユーザーのつぶやきを編集 最初-->
        <div class="">
            <img src="images/edit.png">



@foreach($post as $value)

    <div class="content">
        <!-- 投稿の編集ボタン -->
        <a class="js-modal-open" href="" post="{{ $value->post }}" post_id="{{ $value->id }}">編集</a>
    </div>

@endforeach
   <!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="" method="">
                <textarea name="" class="modal_post"></textarea>
                <input type="hidden" name="" class="modal_id" value="">
                <input type="submit" value="更新">
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>




        </div>
<!-- 2023.01.16 ログインユーザーのつぶやきを編集 最後-->




@endsection