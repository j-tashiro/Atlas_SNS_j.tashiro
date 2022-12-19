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
<!-- 20行目の$postとPostscontrollerの22行目のpostが連動してる -->
<!-- 20行目の$listsと22行目と23行目の$listsが連動してる -->
<!-- 22行目のpostはテーブルの中のpostカラム-->
<!-- 23行目のcreated_atはテーブルの中のcreated_atカラム -->
@foreach ($post as $lists)
            <tr>
                <td>{{ $lists->post }}</td>
                <td>{{ $lists->created_at }}</td>
            </tr>
@endforeach

<!-- 2022.11.16 ログインユーザーのつぶやきを編集 -->
        <div class="">
            <img src="images/edit.png">
        </div>




@endsection