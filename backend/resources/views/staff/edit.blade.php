@extends('layouts.app')

@section('content')


    <div class="card">
        <div class="card-header">職員編集画面</div>
        <form class="card-body my-card-body" action="{{ route('update', $staff['id']) }}" method="POST"
            enctype="multipart/form-data" onSubmit="return checkSubmit()">

            @csrf
            <input type="hidden" name="id" value="{{ $staff['id'] }}">

            <div class="d-flex flex-column f-container">

                <div class="d-flex flex-row">
                    <div class="p-2">
                        <label for="name1" class="form-label">教職員番号</label>
                        <input type="text" name="教職員番号" class="form-control bg-light text-dark" id="name1"
                            value="{{ $staff['教職員番号'] }}">
                    </div>

                    <div class="p-2">
                        <label for="name2" class="form-label">担当者コード</label>
                        <input type="text" name="担当者コード" class="form-control bg-light text-dark" id="name2"
                            value="{{ $staff['担当者コード'] }}">

                    </div>
                    <div class="p-2">
                        <label for="name3" class="form-label">共済番号</label>
                        <input type="text" name="共済番号" class="form-control bg-light text-dark" id="name3"
                            value="{{ $staff['共済番号'] }}">

                    </div>

                    <div class="p-2">
                        <label for="name33" class="form-label">統計番号</label>
                        <input type="text" name="統計番号" class="form-control bg-light text-dark" id="name33"
                            value="{{ $staff['統計番号'] }}">

                    </div>
                    <div class="p-2">
                        <label for="name4" class="form-label">在籍状況</label>

                        <select class="form-control bg-light text-dark" name="在籍状況" method="POST" id="name4">
                            <option value="在職" @if ($staff['在籍状況'] == '在職') selected @endif>在職</option>
                            <option value="委嘱" @if ($staff['在籍状況'] == '委嘱') selected @endif>委嘱</option>
                            <option value="退職" @if ($staff['在籍状況'] == '退職') selected @endif>退職</option>
                            <option value="休職" @if ($staff['在籍状況'] == '休職') selected @endif>休職</option>
                            <option value="契約終了" @if ($staff['在籍状況'] == '契約終了') selected @endif>契約終了</option>
                            <option value="在職" @if ($staff['在籍状況'] == '委嘱終了') selected @endif>委嘱終了</option>

                        </select>

                    </div>
                    <div class="p-2">
                        <label for="name5" class="form-label">区分内容</label>
                        <select class="form-control bg-light text-dark" name="区分内容" method="POST" id="name5">
                            <option value="新規雇用" @if ($staff['区分内容'] == '新規雇用') selected @endif>新規雇用</option>
                            <option value="継続雇用" @if ($staff['区分内容'] == '継続雇用') selected @endif>継続雇用</option>
                            <option value="派遣講師" @if ($staff['区分内容'] == '派遣講師') selected @endif>派遣講師</option>
                            <option value="退職" @if ($staff['区分内容'] == '退職') selected @endif>退職</option>
                        </select>
                    </div>
                </div>
                <br>
                <span class="border border-info"></span>
                <div class="d-flex flex-row">
                    <div class="p-2 ">
                        <label for="name6" class="form-label">職員氏名</label>
                        <input type="text" name="職員氏名" class="form-control bg-light text-dark" id="name6"
                            value="{{ $staff['職員氏名'] }}">
                    </div>
                    <div class="p-2">
                        <label for="name7" class="form-label">ふりがな</label>
                        <input type="text" name="ふりがな" class="form-control bg-light text-dark" id="name7"
                            value="{{ $staff['ふりがな'] }}">
                    </div>
                    <div class="p-2" style="width:100px;">
                        <label for="name8" class="form-label">性別</label>
                        <select class="form-control bg-light text-dark" name="性別" method="POST" id="name8">
                            <option value="男" @if ($staff['性別'] == '男') selected @endif>男</option>
                            <option value="女" @if ($staff['性別'] == '女') selected @endif>女</option>
                        </select>
                    </div>
                    <div class="p-2">
                        <label for="name9" class="form-label">生年月日</label>
                        <input type="date" name="生年月日" class="form-control bg-light text-dark" id="name9"
                            value="{{ $staff['生年月日'] }}">
                    </div>
                    <div class="p-2">
                        <label for="name15" class="form-label">メールアドレス</label>
                        <input type="email" name="メールアドレス" class="form-control bg-light text-dark" id="name15"
                            value="{{ $staff['メールアドレス'] }}">
                    </div>
                    <div class="p-2">
                        <label for="name16" class="form-label">メールアドレス学内</label>
                        <input type="email" name="メールアドレス学内" class="form-control bg-light text-dark" id="name16"
                            value="{{ $staff['メールアドレス学内'] }}">
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="p-2" style="width:130px;">
                        <label for="name10" class="form-label">郵便番号</label>
                        <input type="text" name="郵便番号" class="form-control bg-light text-dark" id="name10"
                            value="{{ $staff['郵便番号'] }}">
                    </div>
                    <div class="p-2" style="width:400px;">
                        <label for="name11" class="form-label">住所１</label>
                        <input type="text" name="住所１" class="form-control bg-light text-dark" id="name11"
                            value="{{ $staff['住所１'] }}">
                    </div>
                    <div class="p-2" style="width:400px;">
                        <label for="name12" class="form-label">住所２</label>
                        <input type="text" name="住所２" class="form-control bg-light text-dark" id="name12"
                            value="{{ $staff['住所２'] }}">
                    </div>
                    <div class="p-2">
                        <label for="name13" class="form-label">電話番号</label>
                        <input type="text" name="電話番号" class="form-control bg-light text-dark" id="name13"
                            value="{{ $staff['電話番号'] }}">
                    </div>
                    <div class="p-2">
                        <label for="name14" class="form-label">携帯電話</label>
                        <input type="text" name="携帯番号" class="form-control bg-light text-dark" id="name14"
                            value="{{ $staff['携帯番号'] }}">
                    </div>
                </div>
                <br>
                <span class="border border-info"></span>
                <div class="d-flex flex-row">
                    <div class="p-2">
                        <label for="name17" class="form-label">地域</label>
                        <select class="form-control bg-light text-dark" name="地域" method="POST" id="name17">
                            <option value="関西" @if ($staff['地域'] == '関西') selected @endif>関西</option>
                            <option value="関東" @if ($staff['地域'] == '関東') selected @endif>関東</option>
                            <option value="技能連携校" @if ($staff['地域'] == '技能連携校') selected @endif>技能連携校</option>
                        </select>
                    </div>
                    <div class="p-2">
                        <label for="name18" class="form-label">所属キャンパス</label>
                        <select class="form-control bg-light text-dark" name="キャンパス名" method="POST" id="name18">
                            <option value="事務Ｃ" @if ($staff['キャンパス名'] == '事務Ｃ') selected @endif>事務センター</option>
                            <option value="堺本校" @if ($staff['キャンパス名'] == '堺本校') selected @endif>堺本校</option>
                            <option value="大阪中央校" @if ($staff['キャンパス名'] == '大阪中央校') selected @endif>大阪中央校</option>
                            <option value="梅田" @if ($staff['キャンパス名'] == '梅田') selected @endif>梅田</option>
                            <option value="三宮" @if ($staff['キャンパス名'] == '三宮') selected @endif>三宮</option>
                            <option value="横浜分校" @if ($staff['キャンパス名'] == '横浜分校') selected @endif>横浜分校</option>
                            <option value="新宿" @if ($staff['キャンパス名'] == '新宿') selected @endif>新宿</option>
                            <option value="池袋" @if ($staff['キャンパス名'] == '池袋') selected @endif>池袋</option>
                            <option value="町田" @if ($staff['キャンパス名'] == '町田') selected @endif>町田</option>
                            <option value="八洲学園高等専修学校" @if ($staff['キャンパス名'] == '八洲学園高等専修学校') selected @endif>八洲学園高等専修学校</option>
                            <option value="美芸学園高等専修学校" @if ($staff['キャンパス名'] == '美芸学園高等専修学校') selected @endif>美芸学園高等専修学校</option>
                            <option value="大阪美容専門学校" @if ($staff['キャンパス名'] == '大阪美容専門学校') selected @endif>大阪美容専門学校</option>
                            <option value="エコーペット" @if ($staff['キャンパス名'] == 'エコーペット') selected @endif>エコーペット</option>
                            <option value="神戸女子洋裁専門学校" @if ($staff['キャンパス名'] == '神戸女子洋裁専門学校') selected @endif>神戸女子洋裁専門学校</option>
                            <option value="日本高等美容専門学校" @if ($staff['キャンパス名'] == '日本高等美容専門学校') selected @endif>日本高等美容専門学校</option>
                            <option value="町田みのり高等部" @if ($staff['キャンパス名'] == '町田みのり高等部') selected @endif>町田みのり高等部</option>
                            <option value="三宮みのり高等部" @if ($staff['キャンパス名'] == '三宮みのり高等部') selected @endif>三宮みのり高等部</option>
                            <option value="静岡高等学園" @if ($staff['キャンパス名'] == '静岡高等学園') selected @endif>静岡高等学園</option>
                            <option value="関西非常勤" @if ($staff['キャンパス名'] == '関西非常勤') selected @endif>関西非常勤</option>
                            <option value="関東非常勤" @if ($staff['キャンパス名'] == '関東非常勤') selected @endif>関東非常勤</option>
                        </select>
                    </div>
                    <div class="p-2">
                        <label for="name19" class="form-label">常勤非常勤</label>
                        <select class="form-control bg-light text-dark" name="常勤非常勤" method="POST" id="name19">
                            <option value="常勤" @if ($staff['常勤非常勤'] == '常勤') selected @endif>常勤</option>
                            <option value="非常勤" @if ($staff['常勤非常勤'] == '非常勤') selected @endif>非常勤</option>
                        </select>
                    </div>
                    <div class="p-2">
                        <label for="name20" class="form-label">職名</label>
                        <select class="form-control bg-light text-dark" name="職名1" method="POST" id="name20">
                            <option value="校長" @if ($staff['職名1'] == '校長') selected @endif>校長</option>
                            <option value="副校長" @if ($staff['職名1'] == '副校長') selected @endif>副校長</option>
                            <option value="教頭" @if ($staff['職名1'] == '教頭') selected @endif>教頭</option>
                            <option value="教諭" @if ($staff['職名1'] == '教諭') selected @endif>教諭</option>
                            <option value="助教諭" @if ($staff['職名1'] == '助教諭') selected @endif>助教諭</option>
                            <option value="養護教諭" @if ($staff['職名1'] == '養護教諭') selected @endif>養護教諭</option>
                            <option value="養護助教諭" @if ($staff['職名1'] == '養護助教諭') selected @endif>養護助教諭</option>
                            <option value="常勤講師" @if ($staff['職名1'] == '常勤講師') selected @endif>常勤講師</option>
                            <option value="非常勤講師" @if ($staff['職名1'] == '非常勤講師') selected @endif>非常勤講師</option>
                            <option value="事務長" @if ($staff['職名1'] == '事務長') selected @endif>事務長</option>
                            <option value="事務次長" @if ($staff['職名1'] == '事務次長') selected @endif>事務次長</option>
                            <option value="事務職員" @if ($staff['職名1'] == '事務職員') selected @endif>事務職員</option>
                            <option value="実習助手" @if ($staff['職名1'] == '実習助手') selected @endif>実習助手</option>
                            <option value="学校図書館司書" @if ($staff['職名1'] == '学校図書館司書') selected @endif>学校図書館司書</option>
                            <option value="用務員その他" @if ($staff['職名1'] == '用務員その他') selected @endif>用務員その他</option>
                            <option value="養護職員" @if ($staff['職名1'] == '養護職員') selected @endif>養護職員</option>
                        </select>
                    </div>
                    <div class="p-2">
                        <label for="name21" class="form-label">内部職名</label>
                        <select class="form-control bg-light text-dark" name="職名2" method="POST" id="name21">
                            <option value="校長" @if ($staff['職名2'] == '校長') selected @endif>校長</option>
                            <option value="副校長" @if ($staff['職名2'] == '副校長') selected @endif>副校長</option>
                            <option value="教頭" @if ($staff['職名2'] == '教頭') selected @endif>教頭</option>
                            <option value="主幹" @if ($staff['職名2'] == '主幹') selected @endif>主幹</option>
                            <option value="専任教員" @if ($staff['職名2'] == '専任教員') selected @endif>専任教員</option>
                            <option value="常勤講師" @if ($staff['職名2'] == '常勤講師') selected @endif>常勤講師</option>
                            <option value="サポートスタッフ" @if ($staff['職名2'] == 'サポートスタッフ') selected @endif>サポートスタッフ</option>
                            <option value="サポートスタッフ（週3）" @if ($staff['職名2'] == 'サポートスタッフ（週3）') selected @endif>サポートスタッフ（週3）</option>
                            <option value="非常勤講師" @if ($staff['職名2'] == '非常勤講師') selected @endif>非常勤講師</option>
                            <option value="事務長" @if ($staff['職名2'] == '事務長') selected @endif>事務長</option>
                            <option value="専任事務" @if ($staff['職名2'] == '専任事務') selected @endif>専任事務</option>
                            <option value="常勤事務" @if ($staff['職名2'] == '常勤事務') selected @endif>常勤事務</option>
                            <option value="事務パート" @if ($staff['職名2'] == '事務パート') selected @endif>事務パート</option>
                            <option value="派遣講師" @if ($staff['職名2'] == '派遣講師') selected @endif>派遣講師</option>
                            <option value="ＯＰ講師" @if ($staff['職名2'] == 'ＯＰ講師') selected @endif>ＯＰ講師</option>
                            <option value="カウンセラー" @if ($staff['職名2'] == 'カウンセラー') selected @endif>カウンセラー</option>
                            <option value="ＯＰ講師（派遣）" @if ($staff['職名2'] == 'ＯＰ講師（派遣）') selected @endif>ＯＰ講師（派遣）</option>
                            <option value="カウンセラー（派遣）" @if ($staff['職名2'] == 'カウンセラー（派遣）') selected @endif>カウンセラー（派遣）</option>
                            <option value="シルバー（派遣）" @if ($staff['職名2'] == 'シルバー（派遣）') selected @endif>シルバー（派遣）</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="p-2">
                        <label for="name22" class="form-label">教免更新グループ</label>
                        <input type="text" name="教免更新グループ" class="form-control bg-light text-dark" id="name22"
                            value="{{ $staff['教免更新グループ'] }}">
                    </div>
                    <div class="p-2">
                        <label for="name23" class="form-label">更新確認</label>
                        <input type="text" name="更新確認" class="form-control bg-light text-dark" id="name23"
                            value="{{ $staff['更新確認'] }}">
                    </div>
                    <div class="p-2">
                        <label for="name24" class="form-label">修了確認期限</label>
                        <input type="date" name="修了確認期限" class="form-control bg-light text-dark" id="inputname24"
                            value="{{ $staff['修了確認期限'] }}">
                    </div>
                    <div class="p-2">
                        <label for="name25" class="form-label">雇用年月日</label>
                        <input type="date" name="雇用年月日" class="form-control bg-light text-dark" id="name25"
                            value="{{ $staff['雇用年月日'] }}">
                    </div>
                    <div class="p-2">
                        <label for="name26" class="form-label">退職・休職年月日</label>
                        <input type="date" name="退職・休職年月日" class="form-control bg-light text-dark" id="name26"
                            value="{{ $staff['退職・休職年月日'] }}">
                    </div>
                    <div class="p-2">
                        <label for="name27" class="form-label">退職理由</label>
                        <input type="text" name="退職理由" class="form-control bg-light text-dark" id="name27"
                            value="{{ $staff['退職理由'] }}">
                    </div>
                    <div class="p-2">
                        <label for="name28" class="form-label">退職願</label>
                        <input type="text" name="退職願" class="form-control bg-light text-dark" id="name28"
                            value="{{ $staff['退職願'] }}">
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="p-2" style="width:600px;">
                        <label for="name29" class="form-label">備考1
                        </label>
                        <input type="textarea" name="備考1" class="form-control bg-light text-dark" id="name29"
                            value="{{ $staff['備考1'] }}">
                    </div>
                    <div class="p-2" style="width:600px;">
                        <label for="name30" class="form-label">備考2
                        </label>
                        <input type="textarea" name="備考2" class="form-control bg-light text-dark" id="name30"
                            value="{{ $staff['備考2'] }}">
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="p-2" style="width:600px;">
                        <label for="name31" class="form-label">備考3
                        </label>
                        <input type="textarea" name="備考3" class="form-control bg-light text-dark" id="name31"
                            value="{{ $staff['備考3'] }}">
                    </div>
                    <div class="p-2" style="width:600px;">
                        <label for="name32" class="form-label">備考4
                        </label>
                        <input type="textarea" name="備考4" class="form-control bg-light text-dark" id="name32"
                            value="{{ $staff['備考4'] }}">
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label for="image">画像登録</label>
                    <input type="file" class="form-control-file" name="image" id="image">
                    {{-- <a href="{{ '/storage/' . $staff['image']}}">ファイルを表示</a> --}}
                    {{-- <img src="{{ '/storage/' . $staff['image']}}" class='w-100 mb-3'/> --}}
                {{-- </div> --}}

                <div class="col-12">

                    <a class="btn btn-secondary" href="{{ route('list') }}/1">
                        キャンセル
                    </a>

                    <button type="submit" class="btn btn-primary">更新</button>
                </div>
                <br>

        </form>
    </div>

    <script>
        function checkSubmit() {
            if (window.confirm('更新してよろしいですか？')) {
                return true;
            } else {
                return false;
            }
        }
    </script>

@endsection
