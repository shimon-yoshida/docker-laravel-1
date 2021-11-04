<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/yashima.css') }}" rel="stylesheet">
    <style type="text/css">
        body {
            zoom: 0.63;
            -moz-transform: scale(0.63);
        }

    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand text-left" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="row">
                <div class="sidebar col-md-2 bg-primary">
                    <div class="card">
                        <div class="card-header">検索フォーム</div>
                        <div class="card-body my-card-body">
                            <a href="/top" class="card-text d-block elipsis mb-2">すべて表示</a>


                            <form class="mb-2 mt-4 text-center" method="GET" action="{{ route('search') }}">

                                {{-- <input type="hidden" name="listno" value="@if (isset($listno)) {{ $listno }} @endif"> --}}
                                <input class="form-control my-2 mr-5" type="search" placeholder="ふりがなを入力" name="search"
                                    value="@if (isset($search)) {{ $search }} @endif">

                                <br>
                                <select class="form-control" name="campus" method="GET">

                                    <option value="" @if (empty($campus)) selected @endif>所属キャンパス選択(全選択）</option>
                                    <option value="事務Ｃ" @if ($campus == '事務Ｃ') selected @endif>事務センター</option>
                                    <option value="堺本校" @if ($campus == '堺本校') selected @endif>堺本校</option>
                                    <option value="大阪中央校" @if ($campus == '大阪中央校') selected @endif>大阪中央校</option>
                                    <option value="梅田" @if ($campus == '梅田') selected @endif>梅田</option>
                                    <option value="三宮" @if ($campus == '三宮') selected @endif>三宮</option>
                                    <option value="横浜分校" @if ($campus == '横浜分校') selected @endif>横浜分校</option>
                                    <option value="新宿" @if ($campus == '新宿') selected @endif>新宿</option>
                                    <option value="池袋" @if ($campus == '池袋') selected @endif>池袋</option>
                                    <option value="町田" @if ($campus == '町田') selected @endif>町田</option>
                                </select>
                                <br>
                                <p class="text-left">常勤非常勤区分</p>
                                <div class="pull-left">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="position" id="inlineRadio1"
                                            value="" @if ($position == '') checked="checked"@endif>
                                        <label class="form-check-label" for="inlineRadio1">全て</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="position" id="inlineRadio2"
                                            value="常勤" @if ($position == '常勤') checked="checked" @endif>
                                        <label class="form-check-label" for="inlineRadio2">常勤</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="position" id="inlineRadio3"
                                            value="非常勤" @if ($position == '非常勤') checked="checked" @endif>
                                        <label class="form-check-label" for="inlineRadio3">非常勤</label>
                                    </div>
                                </div>
                                <br><br>


                                <select class="form-control" name="enrollment" method="GET">
                                    <option value="" selected>
                                        在籍区分選択（すべて）
                                    </option>
                                    <option value="在職" @if ($enrollment == '在職') selected @endif>在職</Canvas></option>
                                    <option value="委嘱" @if ($enrollment == '委嘱') selected @endif>委嘱</option>
                                    <option value="休職" @if ($enrollment == '休職') selected @endif>休職</option>
                                    <option value="退職" @if ($enrollment == '退職') selected @endif>退職</option>
                                    <option value="委嘱終了" @if ($enrollment == '委嘱終了') selected @endif>委嘱終了</option>
                                    <option value="契約終了" @if ($enrollment == '契約終了') selected @endif>契約終了</option>

                                </select>



                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-primary my-2" type="submit">検索</button>
                                    <button class="btn btn-secondary my-2 ml-5">
                                        <a href="{{ route('listturn') }}" class="text-white">
                                            クリア
                                        </a>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- モーダルを開くボタン・リンク -->

                    <div class="card">
                        <div class="card-header">データダウンロード</div>
                        <div class="card-body my-card-body">
                            <div>
                                <button type="button" class="btn btn-primary mb-12" data-toggle="modal"
                                    data-target="#testModal">EXCELファイルでダウンロード</button>
                            </div>
                        </div>
                    </div>


                    <!-- ボタン・リンククリック後に表示される画面の内容 -->
                    <div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="basicModal"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>ダウンロード確認画面</h4>
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <label>ダウンロードする項目を選択してください</label>
                                </div>

                                <div class="p-3">
                                    <h3 class="mb-4">選択したカラムのデータだけExcelでダウンロード</h3>
                                    <form id="form" method="post" action="/excel/download">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">

                                                        @foreach ($columns as $column)
                                                            <label>
                                                                <input class="columns" name="columns[]"
                                                                    type="checkbox" value="{{ $column }}">
                                                                {{ $column }}
                                                            </label>
                                                            <br>
                                                        @endforeach
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit"
                                                            class="btn btn-primary float-right">ダウンロードする</button>
                                                        <label>
                                                            <input id="all_check" type="checkbox"> 全て選択／解除
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                                    <button type="button" class="btn btn-danger">削除</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Optional JavaScript -->
                    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                                        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                                        crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
                                        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
                                        crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
                                        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
                                        crossorigin="anonymous"></script>

                    <script>
                        document.querySelector('#form')
                            .addEventListener('submit', e => {

                                const columns = document.querySelectorAll('.columns:checked');

                                if (columns.length === 0) {

                                    e.preventDefault();
                                    alert('最低でもひとつはカラムを選択してください。');

                                }

                            });
                        document.querySelector('#all_check')
                            .addEventListener('click', e => {

                                const allChecked = e.target.checked;
                                const columns = document.querySelectorAll('.columns');

                                for (let column of columns) {

                                    column.checked = allChecked;

                                }

                            });
                    </script>

                </div>
                <div class="col-md-10">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>

</html>
