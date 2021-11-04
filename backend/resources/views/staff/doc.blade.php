@extends('layouts.app')

@section('content')

    @include('listparts.staffheader')

    <br>
    <span class="border border-info"></span>
    </div>

    </form>
    <br>
    <div class="card" style="width:800px">
        <div class="card-header">関係書類一覧</div>
        <div class="card-body">

            <div class="form-group">
                <form action="{{ route('doccheck', $staff['id']) }}" method="POST" onSubmit="return checkSubmit()"
                    enctype="multipart/form-data">
                    <label for="image">関係書類登録</label>

                    <input type="text" style="height:50px" name="内容" class="form-control bg-light text-dark"
                        placeholder="登録する書類のメモがあれば入力してください">
                    <div><br><br></div>
                    <input type="file" class="form-control-file" name="doc" id="doc">
                    <input type="hidden" name="id" value="{{ $staff['id'] }}">
                    @csrf
                    <div><br></div>
                    <a class="btn btn-secondary" onclick="location.href='/doccreate/{{ $staff['id'] }}'">
                        キャンセル
                    </a>
                    <button type="submit" class="btn btn-primary" name="check" value="create">登録</button>
                    @if (session('err_msg'))
                        <p class="text-danger">
                            {{ session('err_msg') }}
                        </p>
                    @endif



                </form>
            </div>
        </div>


    </div>

    <table class="table table-bordered table-hover table-sm border-primary" style="width:80%">
        <thead>
            <tr class="table table-primary table-bordered border-primary">
                <th scope="col" width="15%">登録日時</th>
                <th scope="col" width="20%">ファイル名</th>
                <th scope="col" width="45%">内容</th>
                <th scope="col" width="10%">登録担当者</th>
                <th scope="col" width="5%">編集</th>
                <th scope="col" width="5%">削除</th>

            </tr>
        </thead>
        @foreach ($docs as $doc)


            <tbody>
                <tr>
                    <td>{{ $doc['created_at'] }}</td>
                    <td><a href="{{ '/storage/yashima/' . $doc['DOCpass'] }}">{{ $doc['書類名'] }}</a>
                    </td>
                    <td>{{ $doc['内容'] }}</td>
                    <td>{{ $doc->user->name }}</td>
                    <td>

                        <a class="btn btn-primary"
                            onclick="location.href='/staff/editdoc/{{ $staff['id'] }}/{{ $doc['id'] }}'">
                            編集
                        </a>
                    </td>
                    <td>
                        <form name="ddoc" action="{{ route('doccheck', $staff['id']) }}" method="POST"
                            onSubmit="return checkSub()">
                            @csrf

                            <input type="hidden" name="docid" value="{{ $doc['id'] }}">
                            <input type="hidden" name="DOCpass" value="{{ $doc['DOCpass'] }}">
                            <button type="submit" class="btn btn-danger" name="check" value="delete">削除</button>
                        </form>

                    </td>
                </tr>
            </tbody>
        @endforeach

    </table>
    </div>
    </div>

    <script>
        function checkSubmit() {
            if (window.confirm('ファイルをアップロードしますか？')) {
                return true;
            } else {
                return false;
            }
        }

        function checkSub() {
            if (window.confirm('ファイルを削除してよろしいですか？')) {
                return true;
            } else {
                return false;
            }
        }
    </script>　　　


@endsection
