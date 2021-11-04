@extends('layouts.app')

@section('content')


    <div class="card">
        <div class="card-header">職員登録画面</div>
        <form class="card-body my-card-body" action="{{ route('store') }}" method="POST" enctype="multipart/form-data"
            onSubmit="return checkSubmit()">


            @csrf
            @if (session('err_msg'))
                <p class="text-danger">
                    {{ session('err_msg') }}
                </p>
            @endif


                {{-- <input type="hidden" name="id" value="{{ $staff['id'] }}"> --}}

                <div class="d-flex flex-column f-container">
                    <input type="hidden" name="id" value="">

                    <div class="d-flex flex-row">
                        <div class="p-2">
                            <label for="name1" class="form-label">教職員番号</label>
                            <input type="text" name="教職員番号" class="form-control bg-light text-dark" id="name1" value="">
                        </div>

                        <div class="p-2">
                            <label for="name2" class="form-label">担当者コード</label>
                            <input type="text" name="担当者コード" class="form-control bg-light text-dark" id="name2">

                        </div>
                        <div class="p-2">
                            <label for="name3" class="form-label">共済番号</label>
                            <input type="text" name="共済番号" class="form-control bg-light text-dark" id="name3">

                        </div>

                        <div class="p-2">
                            <label for="name33" class="form-label">統計番号</label>
                            <input type="text" name="統計番号" class="form-control bg-light text-dark" id="name33">

                        </div>
                        <div class="p-2">
                            <label for="name4" class="form-label">在籍状況</label>
                            <select class="form-control bg-light text-dark" name="在籍状況" method="POST" id="name4">
                                <option value="" selected>選択してください</option>
                                <option value="在職">在職</option>
                                <option value="委嘱">委嘱</option>
                                <option value="退職">退職</option>
                                <option value="休職">休職</option>
                                <option value="契約終了">契約終了</option>
                                <option value="在職">委嘱終了</option>
                            </select>
                        </div>
                        <div class="p-2">
                            <label for="name5" class="form-label">区分内容</label>
                            <select class="form-control bg-light text-dark" name="区分内容" method="POST" id="name5">
                                <option value="" selected>選択してください</option>
                                <option value="新規雇用">新規雇用</option>
                                <option value="継続雇用">継続雇用</option>
                                <option value="派遣講師">派遣講師</option>
                                <option value="退職">退職</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <span class="border border-info"></span>
                    <div class="d-flex flex-row">
                        <div class="p-2 ">
                            <label for="name6" class="form-label">職員氏名</label>
                            <input type="text" name="職員氏名" class="form-control bg-light text-dark" id="name6">
                                @if ($errors->has('職員氏名'))
                                <div class="text-danger">
                                    {{ $errors->first('職員氏名') }}
                                </div>
                            @endif
                        </div>
                        <div class="p-2">
                            <label for="name7" class="form-label">ふりがな</label>
                            <input type="text" name="ふりがな" class="form-control bg-light text-dark" id="name7">
                        </div>
                        <div class="p-2" style="width:100px;">
                            <label for="name8" class="form-label">性別</label>
                            <select class="form-control bg-light text-dark" name="性別" method="POST" id="name8">
                                <option value="" selected>選択</option>
                                <option value="男">男</option>
                                <option value="女">女</option>
                            </select>
                        </div>
                        <div class="p-2">
                            <label for="name9" class="form-label">生年月日</label>
                            <input type="date" name="生年月日" class="form-control bg-light text-dark" id="name9">
                        </div>
                        <div class="p-2">
                            <label for="name15" class="form-label">メールアドレス</label>
                            <input type="email" name="メールアドレス" class="form-control bg-light text-dark" id="name15">
                        </div>
                        <div class="p-2">
                            <label for="name16" class="form-label">メールアドレス学内</label>
                            <input type="email" name="メールアドレス学内" class="form-control bg-light text-dark" id="name16">
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="p-2" style="width:130px;">
                            <label for="name10" class="form-label">郵便番号</label>
                            <input type="text" name="郵便番号" class="form-control bg-light text-dark" id="name10">
                        </div>
                        <div class="p-2" style="width:400px;">
                            <label for="name11" class="form-label">住所１</label>
                            <input type="text" name="住所１" class="form-control bg-light text-dark" id="name11">
                        </div>
                        <div class="p-2" style="width:400px;">
                            <label for="name12" class="form-label">住所２</label>
                            <input type="text" name="住所２" class="form-control bg-light text-dark" id="name12">
                        </div>
                        <div class="p-2">
                            <label for="name13" class="form-label">電話番号</label>
                            <input type="text" name="電話番号" class="form-control bg-light text-dark" id="name13">
                        </div>
                        <div class="p-2">
                            <label for="name14" class="form-label">携帯電話</label>
                            <input type="text" name="携帯番号" class="form-control bg-light text-dark" id="name14">
                        </div>
                    </div>
                    <br>
                    <span class="border border-info"></span>
                    <div class="d-flex flex-row">
                        <div class="p-2">
                            <label for="name17" class="form-label">地域</label>
                            <select class="form-control bg-light text-dark" name="地域" method="POST" id="name17">
                                <option value="" selected>選択してください</option>
                                <option value="関西">関西</option>
                                <option value="関東">関東</option>
                                <option value="技能連携校">技能連携校</option>
                            </select>
                        </div>
                        <div class="p-2">
                            <label for="name18" class="form-label">所属キャンパス</label>
                            <select class="form-control bg-light text-dark" name="キャンパス名" method="POST" id="name18">
                                <option value="" selected>選択してください</option>
                                <option value="事務Ｃ">事務センター</option>
                                <option value="堺本校">堺本校</option>
                                <option value="大阪中央校">大阪中央校</option>
                                <option value="梅田">梅田</option>
                                <option value="三宮">三宮</option>
                                <option value="横浜分校">横浜分校</option>
                                <option value="新宿">新宿</option>
                                <option value="池袋">池袋</option>
                                <option value="町田">町田</option>
                                <option value="八洲学園高等専修学校">八洲学園高等専修学校</option>
                                <option value="美芸学園高等専修学校">美芸学園高等専修学校</option>
                                <option value="大阪美容専門学校">大阪美容専門学校</option>
                                <option value="エコーペット">エコーペット</option>
                                <option value="神戸女子洋裁専門学校">神戸女子洋裁専門学校</option>
                                <option value="日本高等美容専門学校">日本高等美容専門学校</option>
                                <option value="町田みのり高等部">町田みのり高等部</option>
                                <option value="三宮みのり高等部">三宮みのり高等部</option>
                                <option value="静岡高等学園">静岡高等学園</option>
                                <option value="関西非常勤">関西非常勤</option>
                                <option value="関東非常勤">関東非常勤</option>
                            </select>
                        </div>
                        <div class="p-2">
                            <label for="name19" class="form-label">常勤非常勤</label>
                            <select class="form-control bg-light text-dark" name="常勤非常勤" method="POST" id="name19">
                                <option value="" selected>選択してください</option>
                                <option value="常勤">常勤</option>
                                <option value="非常勤">非常勤</option>
                            </select>
                        </div>
                        <div class="p-2">
                            <label for="name20" class="form-label">職名</label>
                            <select class="form-control bg-light text-dark" name="職名1" method="POST" id="name20">
                                <option value="" selected>選択してください</option>
                                <option value="校長">校長</option>
                                <option value="副校長">副校長</option>
                                <option value="教頭">教頭</option>
                                <option value="教諭">教諭</option>
                                <option value="助教諭">助教諭</option>
                                <option value="養護教諭">養護教諭</option>
                                <option value="養護助教諭">養護助教諭</option>
                                <option value="常勤講師">常勤講師</option>
                                <option value="非常勤講師">非常勤講師</option>
                                <option value="事務長">事務長</option>
                                <option value="事務次長">事務次長</option>
                                <option value="事務職員">事務職員</option>
                                <option value="実習助手">実習助手</option>
                                <option value="学校図書館司書">学校図書館司書</option>
                                <option value="用務員その他">用務員その他</option>
                                <option value="養護職員">養護職員</option>
                            </select>
                        </div>
                        <div class="p-2">
                            <label for="name21" class="form-label">内部職名</label>
                            <select class="form-control bg-light text-dark" name="職名2" method="POST" id="name21">
                                <option value="" selected>選択してください</option>
                                <option value="校長">校長</option>
                                <option value="副校長">副校長</option>
                                <option value="教頭">教頭</option>
                                <option value="主幹">主幹</option>
                                <option value="専任教員">専任教員</option>
                                <option value="常勤講師">常勤講師</option>
                                <option value="サポートスタッフ">サポートスタッフ</option>
                                <option value="サポートスタッフ（週3）">サポートスタッフ（週3）</option>
                                <option value="非常勤講師">非常勤講師</option>
                                <option value="事務長">事務長</option>
                                <option value="専任事務">専任事務</option>
                                <option value="常勤事務">常勤事務</option>
                                <option value="事務パート">事務パート</option>
                                <option value="派遣講師">派遣講師</option>
                                <option value="ＯＰ講師">ＯＰ講師</option>
                                <option value="カウンセラー">カウンセラー</option>
                                <option value="ＯＰ講師（派遣）">ＯＰ講師（派遣）</option>
                                <option value="カウンセラー（派遣）">カウンセラー（派遣）</option>
                                <option value="シルバー（派遣）">シルバー（派遣）</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="p-2">
                            <label for="name22" class="form-label">教免更新グループ</label>
                            <input type="text" name="教免更新グループ" class="form-control bg-light text-dark" id="name22">
                        </div>
                        <div class="p-2">
                            <label for="name23" class="form-label">更新確認</label>
                            <input type="text" name="更新確認" class="form-control bg-light text-dark" id="name23">
                        </div>
                        <div class="p-2">
                            <label for="name24" class="form-label">修了確認期限</label>
                            <input type="date" name="修了確認期限" class="form-control bg-light text-dark" id="inputname24">
                        </div>
                        <div class="p-2">
                            <label for="name25" class="form-label">雇用年月日</label>
                            <input type="date" name="雇用年月日" class="form-control bg-light text-dark" id="name25">
                        </div>
                        <div class="p-2">
                            <label for="name26" class="form-label">退職・休職年月日</label>
                            <input type="date" name="退職・休職年月日" class="form-control bg-light text-dark" id="name26">
                        </div>
                        <div class="p-2">
                            <label for="name27" class="form-label">退職理由</label>
                            <input type="text" name="退職理由" class="form-control bg-light text-dark" id="name27">
                        </div>
                        <div class="p-2">
                            <label for="name28" class="form-label">退職願</label>
                            <input type="text" name="退職願" class="form-control bg-light text-dark" id="name28">
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="p-2" style="width:600px;">
                            <label for="name29" class="form-label">備考1
                            </label>
                            <input type="textarea" name="備考1" class="form-control bg-light text-dark" id="name29">
                        </div>
                        <div class="p-2" style="width:600px;">
                            <label for="name30" class="form-label">備考2
                            </label>
                            <input type="textarea" name="備考2" class="form-control bg-light text-dark" id="name30">
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="p-2" style="width:600px;">
                            <label for="name31" class="form-label">備考3
                            </label>
                            <input type="textarea" name="備考3" class="form-control bg-light text-dark" id="name31">
                        </div>
                        <div class="p-2" style="width:600px;">
                            <label for="name32" class="form-label">備考4
                            </label>
                            <input type="textarea" name="備考4" class="form-control bg-light text-dark" id="name32">
                        </div>
                        <input type="text" class="form-control" name="image" value="">
                    </div>
                    {{-- <div class="form-group">
                    <label for="image">画像登録</label>
                    <input type="file" class="form-control-file" name="image" id="image">
                    {{-- <a href="{{ '/storage/' . $staff['image']}}">ファイルを表示</a> --}}
                    {{-- <img src="{{ '/storage/' . $staff['image']}}" class='w-100 mb-3'/>
                    {{-- </div> --}}


                    <div class="col-12">

                        <a class="btn btn-secondary" href="{{ route('list') }}">
                            キャンセル
                        </a>

                        <button type="submit" class="btn btn-primary">新規登録</button>
                    </div>
                    <br>

        </form>
    </div>


    <script>
        function checkSubmit() {
            if (window.confirm('登録してよろしいですか？')) {
                return true;
            } else {
                return false;
            }
        }
    </script>　　　
@endsection
