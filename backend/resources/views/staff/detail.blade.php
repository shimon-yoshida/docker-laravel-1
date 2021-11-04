@extends('layouts.app')

@section('content')

    @include('listparts.staffheader')

    <div class="d-flex flex-row">
        <div class="p-2" style="width:130px;">
            <label for="name10" class="form-label">郵便番号</label>
            <input type="text" name="郵便番号" readonly class="form-control-plaintext bg-light text-dark" id="name10"
                value="{{ $staff['郵便番号'] }}">
        </div>
        <div class="p-2" style="width:400px;">
            <label for="name11" class="form-label">住所１</label>
            <input type="text" name="住所１" readonly class="form-control-plaintext bg-light text-dark" id="name11"
                value="{{ $staff['住所１'] }}">
        </div>
        <div class="p-2" style="width:400px;">
            <label for="name12" class="form-label">住所２</label>
            <input type="text" name="住所２" readonly class="form-control-plaintext bg-light text-dark" id="name12"
                value="{{ $staff['住所２'] }}">
        </div>
        <div class="p-2">
            <label for="name13" class="form-label">電話番号</label>
            <input type="text" name="電話番号" readonly class="form-control-plaintext bg-light text-dark" id="name13"
                value="{{ $staff['電話番号'] }}">
        </div>
        <div class="p-2">
            <label for="name14" class="form-label">携帯電話</label>
            <input type="text" name="携帯番号" readonly class="form-control-plaintext bg-light text-dark" id="name14"
                value="{{ $staff['携帯番号'] }}">
        </div>

    </div>
    <br>
    <span class="border border-info"></span>
    <div class="d-flex flex-row">
        <div class="p-2">
            <label for="name17" class="form-label">地域</label>
            <input type="text" name="地域" readonly class="form-control-plaintext bg-light text-dark" id="name17"
                value="{{ $staff['地域'] }}">
        </div>
        <div class="p-2">
            <label for="name18" class="form-label">所属キャンパス</label>
            <input type="text" name="キャンパス名" readonly class="form-control-plaintext bg-light text-dark" id="name18"
                value="{{ $staff['キャンパス名'] }}">
        </div>
        <div class="p-2">
            <label for="name19" class="form-label">常勤非常勤</label>
            <input type="text" name="常勤非常勤" readonly class="form-control-plaintext bg-light text-dark" id="name19"
                value="{{ $staff['常勤非常勤'] }}">
        </div>
        <div class="p-2">
            <label for="name20" class="form-label">職名</label>
            <input type="text" name="職名1" readonly class="form-control-plaintext bg-light text-dark" id="name20"
                value="{{ $staff['職名1'] }}">
        </div>
        <div class="p-2">
            <label for="name21" class="form-label">内部職名</label>
            <input type="text" name="職名2" readonly class="form-control-plaintext bg-light text-dark" id="name21"
                value="{{ $staff['職名2'] }}">
        </div>
    </div>
    <div class="d-flex flex-row">
        <div class="p-2">
            <label for="name22" class="form-label">教免更新グループ</label>
            <input type="text" name="教免更新グループ" readonly class="form-control-plaintext bg-light text-dark" id="name22"
                value="{{ $staff['教免更新グループ'] }}">
        </div>
        <div class="p-2">
            <label for="name23" class="form-label">更新確認</label>
            <input type="text" name="更新確認" readonly class="form-control-plaintext bg-light text-dark" id="name23"
                value="{{ $staff['更新確認'] }}">
        </div>
        <div class="p-2">
            <label for="name24" class="form-label">修了確認期限</label>
            <input type="date" name="修了確認期限" readonly class="form-control-plaintext bg-light text-dark" id="inputname24"
                value="{{ $staff['修了確認期限'] }}">
        </div>
        <div class="p-2">
            <label for="name25" class="form-label">雇用年月日</label>
            <input type="date" name="雇用年月日" readonly class="form-control-plaintext bg-light text-dark" id="name25"
                value="{{ $staff['雇用年月日'] }}">
        </div>
        <div class="p-2">
            <label for="name26" class="form-label">退職・休職年月日</label>
            <input type="text" name="退職・休職年月日" readonly class="form-control-plaintext bg-light text-dark" id="name26"
                value="{{ $staff['退職・休職年月日'] }}">
        </div>
        <div class="p-2">
            <label for="name27" class="form-label">退職理由</label>
            <input type="text" name="退職理由" readonly class="form-control-plaintext bg-light text-dark" id="name27"
                value="{{ $staff['退職理由'] }}">
        </div>
        <div class="p-2">
            <label for="name28" class="form-label">退職願</label>
            <input type="text" name="退職願" readonly class="form-control-plaintext bg-light text-dark" id="name28"
                value="{{ $staff['退職願'] }}">
        </div>
    </div>
    <div class="d-flex flex-row">
        <div class="p-2" style="width:800px;">
            <label for="name29" class="form-label">備考1
            </label>
            <input type="textarea" name="備考1" readonly class="form-control-plaintext bg-light text-dark" id="name29"
                value="{{ $staff['備考1'] }}">
        </div>
        <div class="p-2" style="width:800px;">
            <label for="name30" class="form-label">備考2
            </label>
            <input type="textarea" name="備考2" readonly class="form-control-plaintext bg-light text-dark" id="name30"
                value="{{ $staff['備考2'] }}">
        </div>
    </div>
    <div class="d-flex flex-row">
        <div class="p-2" style="width:800px;">
            <label for="name31" class="form-label">備考3
            </label>
            <input type="textarea" name="備考3" readonly class="form-control-plaintext bg-light text-dark" id="name31"
                value="{{ $staff['備考3'] }}">
        </div>
        <div class="p-2" style="width:800px;">
            <label for="name32" class="form-label">備考4
            </label>
            <input type="textarea" name="備考4" readonly class="form-control-plaintext bg-light text-dark" id="name32"
                value="{{ $staff['備考4'] }}">
        </div>
    </div>
    </div>

    <div class="col-12">
        <a class="btn btn-secondary" href='/list'>
            戻る
        </a>

        <button type="submit" class="btn btn-primary" href='/staff/edit/{{ $staff['id'] }}'>編集</button>


    </div>
    </form>
    <br>



    </div>

@endsection
