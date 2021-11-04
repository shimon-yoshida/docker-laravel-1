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
                <form action="{{ route('updatedoc', $staff['id']) }}" method="POST" onSubmit="return checkSubmit()"
                    enctype="multipart/form-data">
                    <label for="image">関係書類登録</label>
                    <input type="hidden" name="docid" value="{{ $editdoc[0]['id']}}">
                    <input type="text" style="height:50px" name="内容" class="form-control bg-warning"
                        placeholder="登録する書類のメモがあれば入力してください" value="{{ $editdoc[0]['内容'] }}">
                    <div><br><br></div>
                    <input type="file" class="form-control-file" name="doc" id="doc">
                    <input type="hidden" name="id" value="{{ $staff['id'] }}">
                    @csrf
                    <div><br></div>
                    <a class="btn btn-secondary" onclick="location.href='/staff/doccreate/{{ $staff['id'] }}'">
                        キャンセル
                    </a>
                    <button type="submit" class="btn btn-primary">更新</button>


                    {{-- <a href="{{ '/storage/' . $staff['image']}}">ファイルを表示</a>
                    <img src="{{ '/storage/' . $staff['image']}}" class='w-100 mb-3'/> --}}
                    @if (session('err_msg'))
                        <p class="text-danger">
                            {{ session('err_msg') }}
                        </p>
                    @endif



                </form>
            </div>
        </div>


    </div>

    <table class="table table-bordered table-hover table-sm border-primary" style="width:80%" >
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
                <tr tr class="edittable">
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
                            <button class="btn btn-danger">削除</button>

                    </td>


                        {{-- <form name="dmemo" action="{{ route('memocheck', $staff['id']) }}" method="POST"
                            onSubmit="return checkSub()">
                            @csrf

                            <input type="hidden" name="memoid" value="{{ $memo['id'] }}">
                            <button type="submit" class="btn btn-danger" name="check" value="delete">削除</button>
                        </form>

 --}}


                </tr>
            </tbody>
        @endforeach

    </table>
    </div>
    </div>

    <script>
        function checkSubmit() {
            if (window.confirm('メモを更新してよろしいですか？')) {
                return true;
            } else {
                return false;
            }
        }
    </script>　　　


@endsection
