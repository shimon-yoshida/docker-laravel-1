<div class="card">
    <div class="card-header">職員個別画面</div>
    <div class="card-body my-card-body">
        <form action=" {{ route('edit', $staff['id']) }}" method="POST" onSubmit="return checkSubmit()">
            @csrf
            <input type="hidden" name="id" value="{{ $staff['id'] }}">

            <div class="d-flex flex-column f-container">

                <div class="d-flex flex-row">
                    <div class="p-2">
                        <label for="name1" class="form-label">教職員番号</label>
                        <input type="text" name="教職員番号" readonly class="form-control-plaintext bg-light text-dark"
                            id="name1" value="{{ $staff['教職員番号'] }}">
                    </div>

                    <div class="p-2">
                        <label for="name2" class="form-label">担当者コード</label>
                        <input type="text" name="担当者コード" readonly class="form-control-plaintext bg-light text-dark"
                            id="name2" value="{{ $staff['担当者コード'] }}">

                    </div>
                    <div class="p-2">
                        <label for="name3" class="form-label">共済番号</label>
                        <input type="text" name="共済番号" readonly class="form-control-plaintext bg-light text-dark"
                            id="name3" value="{{ $staff['共済番号'] }}">

                    </div>

                    <div class="p-2">
                        <label for="name33" class="form-label">統計番号</label>
                        <input type="text" name="統計番号" readonly class="form-control-plaintext bg-light text-dark"
                            id="name33" value="{{ $staff['統計番号'] }}">

                    </div>
                    <div class="p-2">
                        <label for="name4" class="form-label">在籍状況</label>
                        <input type="text" name="在籍状況" readonly class="form-control-plaintext bg-light text-dark"
                            id="name4" value="{{ $staff['在籍状況'] }}">

                    </div>
                    <div class="p-2">
                        <label for="name5" class="form-label">区分内容</label>
                        <input type="text" name="区分内容" readonly class="form-control-plaintext bg-light text-dark"
                            id="name5" value="{{ $staff['区分内容'] }}">
                    </div>

                    <div class="p=2">
                        <a class="btn btn-secondary" href='/list'>
                            一覧へ戻る
                        </a>

                        <a class="btn btn-secondary" href="/staff/detail/{{ $staff['id'] }}">
                            基本情報一覧表示
                        </a>
                        <a class="btn btn-secondary" href="{{ route('showlicence', $staff['id']) }}">
                            所持免許一覧表示
                        </a>

                        <a class="btn btn-secondary" href="{{ route('showmemo', $staff['id']) }}">
                            対応メモ一覧表示
                        </a>

                        <a class="btn btn-secondary" href="/staff/doccreate/{{ $staff['id'] }}">
                            職員関係書類表示
                        </a>
                    </div>
                </div>
                <br>
                <span class="border border-info"></span>
                <div class="d-flex flex-row">
                    <div class="p-2 ">
                        <label for="name6" class="form-label">職員氏名</label>
                        <input type="text" name="職員氏名" readonly class="form-control-plaintext bg-light text-dark"
                            id="name6" value="{{ $staff['職員氏名'] }}">
                    </div>
                    <div class="p-2">
                        <label for="name7" class="form-label">ふりがな</label>
                        <input type="text" name="ふりがな" readonly class="form-control-plaintext bg-light text-dark"
                            id="name7" value="{{ $staff['ふりがな'] }}">
                    </div>
                    <div class="p-2" style="width:60px;">
                        <label for="name8" class="form-label">性別</label>
                        <input type="text" name="性別" readonly class="form-control-plaintext bg-light text-dark"
                            id="name8" value="{{ $staff['性別'] }}">
                    </div>
                    <div class="p-2">
                        <label for="name9" class="form-label">生年月日</label>
                        <input type="date" name="生年月日" readonly class="form-control-plaintext bg-light text-dark"
                            id="name9" value="{{ $staff['生年月日'] }}">
                    </div>
                    <div class="p-2">
                        <label for="name15" class="form-label">メールアドレス</label>
                        <input type="email" name="メールアドレス" readonly class="form-control-plaintext bg-light text-dark"
                            id="name15" value="{{ $staff['メールアドレス'] }}">
                    </div>
                    <div class="p-2">
                        <label for="name16" class="form-label">メールアドレス学内</label>
                        <input type="email" name="メールアドレス学内" readonly class="form-control-plaintext bg-light text-dark"
                            id="name16" value="{{ $staff['メールアドレス学内'] }}">
                    </div>

                </div>
