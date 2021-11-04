@extends('layouts.app')

@section('content')

    @include('listparts.staffheader')

    <br>
    <span class="border border-info"></span>
    </div>
    </form>
    <br>

    <div class="card">
        <div class="card-header">個人対応メモ</div>
        <div class="card-body">
            <form name="newmemo" action="{{ route('memocheck', $staff['id']) }}" method="POST"
                onSubmit="return checkSubmit()">
                @csrf
                <input type="hidden" name="id" value="{{ $staff['id'] }}">
                <div class="mb-3">
                    <label for="name1" class="form-label">新規メモ入力画面</label>
                    <textarea class="form-control" id="name1" name="memo" rows="3" placeholder="新規メモを入力してください"></textarea>
                </div>

                <div class="col-12">
                    <a class="btn btn-secondary" onclick="location.href='/staff/memo/{{ $staff['id'] }}'">
                        キャンセル
                    </a>
                    <button type="submit" class="btn btn-primary" name="check" value="create">登録</button>
                </div>
            </form>
        </div>
        @if (session('err_msg'))
            <p class="text-danger">
                {{ session('err_msg') }}
            </p>
        @endif
        <table class="table table-bordered table-hover table-sm border-primary">
            <thead>
                <tr class="table table-primary table-bordered border-primary">
                    <th scope="col" width="220">作成日時</th>
                    <th scope="col" width="1500">メモ内容</th>
                    <th scope="col" width="130">入力担当者</th>
                    <th>編集</th>
                    <th>削除</th>

                </tr>
            </thead>
            @foreach ($memos as $memo)
                <tbody>
                    <tr>
                        <td>{{ $memo['created_at'] }}</td>
                        <td>{{ $memo['メモ内容'] }}</td>
                        <td>{{ $memo->user->name }}</td>
                        <td>

                            <a class="btn btn-primary"
                                onclick="location.href='/staff/editmemo/{{ $staff['id'] }}/{{ $memo['id'] }}'">
                                編集
                            </a>
                        </td>
                        <td>
                            <form name="dmemo" action="{{ route('memocheck', $staff['id']) }}" method="POST"
                                onSubmit="return checkSub()">
                                @csrf

                                <input type="hidden" name="memoid" value="{{ $memo['id'] }}">
                                <button type="submit" class="btn btn-danger" name="check" value="delete">削除</button>
                            </form>



                        </td>
                    </tr>
                </tbody>
            @endforeach

        </table>

    </div>
    </div>
    </div>

    <script>
        function checkSubmit() {
            if (window.confirm('メモを登録してよろしいですか？')) {
                return true;
            } else {
                return false;
            }
        }

        function checkSub() {
            if (window.confirm('メモを削除してよろしいですか？')) {
                return true;
            } else {
                return false;
            }
        }
    </script>　　　


@endsection
