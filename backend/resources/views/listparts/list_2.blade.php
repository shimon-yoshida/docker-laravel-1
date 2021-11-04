            <table class="table table-bordered table-hover table-sm border-primary">
                <thead>
                    <tr class="table table-primary table-bordered border-primary">
                        <th scope="col" width="50">NO</th>
                        <th scope="col" width="130">職員氏名</th>
                        <th scope="col" width="170">ふりがな</th>
                        <th scope="col" width="100">郵便番号</th>
                        <th scope="col" width="240">住所１</th>
                        <th scope="col" width="240">住所２</th>
                        <th scope="col" width="180">電話番号</th>
                        <th scope="col" width="180">携帯電話番号</th>
                        <th scope="col" width="150">メール</th>
                        <th scope="col" width="150">メール学内</th>
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
                                <td>{{ $staff['郵便番号'] }}</td>
                                <td>{{ $staff['住所１'] }}</td>
                                <td>{{ $staff['住所２'] }}</td>
                                <td>{{ $staff['電話番号'] }}</td>
                                <td>{{ $staff['携帯電話番号'] }}</td>
                                <td>{{ $staff['メール'] }}</td>
                                <td>{{ $staff['メール学内'] }}</td>
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

