@extends('layouts.app')

@section('content')

    @include('listparts.staffheader')

    </div>

    </form>
    <br>
    <div class="card">
        <div class="card-header">個人対応メモ</div>
        <div class="card-body">
            <form action="{{ route('updatememo', $staff['id']) }}" method="POST" onSubmit="return checkSubmit()">
                @csrf
                <input type="hidden" name="id" value="{{ $staff['id'] }}">
                <input type="hidden" name="memoid" value="{{ $editmemo[0]['id']}}">
                <div class="mb-3">
                    <label for="name1" class="form-label">メモ編集画面</label>
                    <textarea class="form-control bg-warning" id="name1" name="memo" rows="3" value="{{ $editmemo[0]['id'] }}">{{ $editmemo[0]['メモ内容'] }}</textarea>
                </div>

                <div class="col-12">
                    <a class="btn btn-secondary" onclick="location.href='/staff/memo/{{ $staff['id'] }}'">
                        キャンセル
                    </a>

                    <button type="submit" class="btn btn-primary">更新</button>

                </div>
            </form>
        </div>
        @if (session('err_msg'))
            <p class="text-danger">
                {{ session('err_msg') }}
            </p>
        @endif
        <table class="table table-bordered table-sm border-primary">
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
                    <tr class="edittable">
                        <td>{{ $memo['created_at'] }}</td>
                        <td>{{ $memo['メモ内容'] }}</td>
                        <td>{{ $memo->user->name }}</td>
                        <td>
                            <a class="btn btn-primary">
                                編集
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger">
                                削除
                            </a>
                        </td>
                    </tr>
                </tbody>
            @endforeach

        </table>
    </div>
    </div>
    </div>
    </div>
    </div>


@endsection
