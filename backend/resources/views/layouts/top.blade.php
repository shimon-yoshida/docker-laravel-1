@extends('layouts.app')

@section('content')
    @if ($staffs->count())
        <div class="card">
            <div class="card-header">職員一覧</div>

            <div class="card-body my-card-body">
                <div class="d-flex flex-column f-container">
                    <div class="d-flex flex-row">
                        <div class="p-2">
                            <a class="btn btn-primary" href="{{ route('input-form') }}">
                                新規登録
                            </a>
                        </div>
                        <div class="p-2" style="width:100px;">
                        </div>


                        <div class="p-2">
                            <form action="{{ route('list') }}" method="POST">
                                @csrf
                                <input type="hidden" name="listno" value="1">
                                <button type="submit" class="btn btn-secondary">基本情報表示</button>
                            </form>
                            {{-- <a class="btn btn-secondary" href="{{ route('list') }}/1">
                            基本情報表示
                        </a> --}}
                        </div>
                        <div class="p-2">
                            <form action="{{ route('list') }}" method="POST">
                                <input type="hidden" name="listno" value="2">
                                <button type="submit" class="btn btn-secondary">住所・電話番号一覧表示</button>
                                @csrf
                            </form>
                            {{-- <a class="btn btn-secondary" href="{{ route('list') }}/2">
                                住所・電話番号一覧表示
                            </a> --}}
                        </div>
                        <div class="p-2">
                            <form action="{{ route('list') }}" method="POST">
                                <input type="hidden" name="listno" value="3">
                                <button type="submit" class="btn btn-secondary">所持免許一覧表示</button>
                                @csrf
                            </form>
                            {{-- <a class="btn btn-secondary" href="{{ route('list') }}/3">
                            所持免許一覧表示
                        </a> --}}

                        </div>
                        </form>
                        <div class="p-2" style="width:500px;">
                        </div>
                        <div class="p-2">
                            <p>{{ $staffs->links() }}</p>
                        </div>
                    </div>
                </div>
                @yield('list')
            </div>
        </div>

    @else
        <p>見つかりませんでした。</p>
    @endif




@endsection
