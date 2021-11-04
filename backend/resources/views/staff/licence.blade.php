@extends('layouts.app')

@section('content')

    @include('listparts.staffheader')

    <br>
    <span class="border border-info"></span>
    </div>
    </form>
    <br>

    <div class="card">
        <form name="licence" action="{{ route('editlicence', $staff['id']) }}" method="GET"
        onSubmit="return checkSubmit()">
        @csrf
        <div class="card-header">所持免許一覧</div>
        <div class="card-body">
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
                    <input type="date" name="修了確認期限" readonly class="form-control-plaintext bg-light text-dark"
                        id="inputname24" value="{{ $staff['修了確認期限'] }}">
                </div>
            </div>
            <br>
            <br>

                <div class="d-flex flex-row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">高校免許</div>
                            <div class="card-body">

                                {{-- <form> --}}
                                <div class="form-group row">
                                    <label for="text3a" class="col-sm-2 col-form-label">1</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="text3a" readonly class="form-control"
                                            value="{{ $staff['高校教科免許1'] }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="text3b" class="col-sm-2 col-form-label">2</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="text3b" readonly class="form-control"
                                            value="{{ $staff['高校教科免許2'] }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="text3a" class="col-sm-2 col-form-label">3</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="text3a" readonly class="form-control"
                                            value="{{ $staff['高校教科免許3'] }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="text3a" class="col-sm-2 col-form-label">4</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="text3a" readonly class="form-control"
                                            value="{{ $staff['高校教科免許4'] }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="text3a" class="col-sm-2 col-form-label">5</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="text3a" readonly class="form-control"
                                            value="{{ $staff['高校教科免許5'] }}">
                                    </div>
                                </div>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">中学免許</div>
                            <div class="card-body">
                                {{-- <form> --}}
                                <div class="form-group row">
                                    <label for="text3a" class="col-sm-2 col-form-label">1</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="text3a" readonly class="form-control"
                                            value="{{ $staff['中学教科免許1'] }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="text3b" class="col-sm-2 col-form-label">2</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="text3b" readonly class="form-control"
                                            value="{{ $staff['中学教科免許2'] }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="text3a" class="col-sm-2 col-form-label">3</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="text3a" readonly class="form-control"
                                            value="{{ $staff['中学教科免許3'] }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="text3a" class="col-sm-2 col-form-label">4</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="text3a" readonly class="form-control"
                                            value="{{ $staff['中学教科免許4'] }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="text3a" class="col-sm-2 col-form-label">5</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="text3a" readonly class="form-control"
                                            value="{{ $staff['中学教科免許5'] }}">
                                    </div>
                                </div>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">その他</div>
                            <div class="card-body">
                                {{-- <form> --}}
                                <div class="form-group row">
                                    <label for="text3a" class="col-sm-2 col-form-label">1</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="text3a" readonly class="form-control"
                                            value="{{ $staff['その他免許1'] }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="text3b" class="col-sm-2 col-form-label">2</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="text3b" readonly class="form-control"
                                            value="{{ $staff['その他免許2'] }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="text3a" class="col-sm-2 col-form-label">3</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="text3a" readonly class="form-control"
                                            value="{{ $staff['その他免許3'] }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="text3a" class="col-sm-2 col-form-label">4</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="text3a" readonly class="form-control"
                                            value="{{ $staff['その他免許4'] }}">
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
                <br>
                <br>
                @if (session('err_msg'))
                <p class="text-danger">
                    {{ session('err_msg') }}
                </p>
            @endif
                <div class="col-md-3">
                    <a class="btn btn-secondary" href='/list'>
                        戻る
                    </a>
                    <button class="btn btn-secondarbtn btn-primary" href='/staff/editlicence/{{ $staff['id'] }}'>
                        編集
                    </button>


                </div>
            </form>
        </div>
    </div>
    </div>

    </div>
    </div>
    </div>




@endsection
