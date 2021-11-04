<table class="table table-bordered table-hover table-sm border-primary">
    <thead>
        <tr class="table table-primary table-bordered border-primary">
            <th scope="col" width="50">NO</th>
                        <th scope="col" width="130">職員氏名</th>
                        <th scope="col" width="180">ふりがな</th>
                        <th scope="col" width="90">高校免許1</th>
                        <th scope="col" width="90">高校免許2</th>
                        <th scope="col" width="90">高校免許3</th>
                        <th scope="col" width="90">高校免許4</th>
                        <th scope="col" width="90">高校免許5</th>
                        <th scope="col" width="90">中学免許1</th>
                        <th scope="col" width="90">中学免許2</th>
                        <th scope="col" width="90">中学免許3</th>
                        <th scope="col" width="90">中学免許4</th>
                        <th scope="col" width="100">その他免許1</th>
                        <th scope="col" width="100">その他免許2</th>
                        <th scope="col" width="100">その他免許3</th>
                        <th scope="col" width="100">その他免許4</th>
                        <th scope="col" width="100">更新確認</th>
                        <th scope="col" width="100">更新Ｇ</th>
                        <th scope="col" width="110">修了確認期限</th>
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
                                <td><a href="/staff/detail/{{ $staff['id'] }}">{{ $staff['職員氏名'] }}</a>
                                </td>
                                <td>{{ $staff['ふりがな'] }}</td>
                                <td>{{ $staff['高校教科免許1'] }}</td>
                                <td>{{ $staff['高校教科免許2'] }}</td>
                                <td>{{ $staff['高校教科免許3'] }}</td>
                                <td>{{ $staff['高校教科免許4'] }}</td>
                                <td>{{ $staff['高校教科免許5'] }}</td>
                                <td>{{ $staff['中学教科免許1'] }}</td>
                                <td>{{ $staff['中学教科免許2'] }}</td>
                                <td>{{ $staff['中学教科免許3'] }}</td>
                                <td>{{ $staff['中学教科免許4'] }}</td>
                                <td>{{ $staff['その他免許1'] }}</td>
                                <td>{{ $staff['その他免許2'] }}</td>
                                <td>{{ $staff['その他免許3'] }}</td>
                                <td>{{ $staff['その他免許4'] }}</td>
                                <td>{{ $staff['更新確認'] }}</td>
                                <td>{{ $staff['更新グループ'] }}</td>
                                <td>{{ $staff['修了確認期限'] }}</td>
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

