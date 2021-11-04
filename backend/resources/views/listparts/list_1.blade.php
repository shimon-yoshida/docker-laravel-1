<table class="table table-bordered table-hover table-sm border-primary">
    <thead>
        <tr class="table table-primary table-bordered border-primary">
            <th scope="col" width="50">NO</th>
                        <th scope="col" width="130">職員氏名</th>
                        <th scope="col" width="170">ふりがな</th>
                        <th scope="col" width="100">区分内容</th>
                        <th scope="col" width="80">在籍状況</th>
                        <th scope="col" width="80">統計番号</th>
                        <th scope="col" width="90">教職員番号</th>
                        <th scope="col" width="100">担当者コード</th>
                        <th scope="col" width="80">共済番号</th>
                        <th scope="col" width="100">常勤非常勤</th>
                        <th scope="col" width="100">職名</th>
                        <th scope="col" width="100">地域</th>
                        <th scope="col" width="100">所属</th>
                        <th scope="col" width="50">性別</th>
                        <th scope="col" width="100">生年月日</th>
                        <th scope="col" width="100">雇用年月日</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($staffs as $staff)
                    <form class="shadow" action="{{ route('edit', $staff['id']) }}" method="POST">
                        @csrf
                        <input type="hidden" name="id">

                        <tbody>
                            <tr>
                                <td>{{ $staff['id'] }}</td>
                                <td class="table-light"><a href="staff/detail/{{ $staff['id'] }}">{{ $staff['職員氏名'] }}</a>
                                </td>
                                <td>{{ $staff['ふりがな'] }}</td>
                                <td>{{ $staff['区分内容'] }}</td>
                                <td>{{ $staff['在籍状況'] }}</td>
                                <td>{{ $staff['統計番号'] }}</td>
                                <td>{{ $staff['教職員番号'] }}</td>
                                <td>{{ $staff['担当者コード'] }}</td>
                                <td>{{ $staff['共済番号'] }}</td>
                                <td>{{ $staff['常勤非常勤'] }}</td>
                                <td>{{ $staff['職名2'] }}</td>
                                <td>{{ $staff['地域'] }}</td>
                                <td>{{ $staff['キャンパス名'] }}</td>
                                <td>{{ $staff['性別'] }}</td>
                                <td>{{ $staff['生年月日'] }}</td>
                                <td>{{ $staff['雇用年月日'] }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('edit', $staff['id']) }}">
                                        編集
                                    </a>
                                </td>
                            </tr>

                    </form>
                    </tbody>
                @endforeach

            </table>

