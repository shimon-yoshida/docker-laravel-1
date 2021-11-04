<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Http\Requests\InputRecuest;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function superTest(Request $request)

    {
        $inputs = $request->all();
        dd($inputs);
        return view('home');
    }
    public function top(Request $request)

    {
      
        $keyword = $request->input('keywoad');
        $query = Staff::query();

        if (!empty($keyword)) {
            $query->where('ふりがな', 'LIKE', "%{$keyword}%");
        }
        $staffs = $query->paginate(30);
        //$staffs = Staff::all();


        return view('top', compact('staffs', 'keyword'));
        //return view('top', ['staffs' => $staffs]);
    }


    public function showDetail($id)
    {
        $staff = Staff::find($id);
        return view('detail', ['staff' => $staff]);
    }

    public function showCreate()
    {

        return view('input-form');
    }

    public function exeStore(InputRecuest $request)
    {

        $inputs = $request->all();

        \DB::beginTransaction();

        try {
            Staff::create($inputs);
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', '登録を完了しました');
        return redirect(route('input-form'));
    }

    public function showEdit($id)
    {
        $staff = Staff::find($id);
        return view('edit', ['staff' => $staff]);
    }

    public function exeUpdate(InputRecuest $request)
    {

        $inputs = $request->all();
        //dd($inputs);

        \DB::beginTransaction();

        try {
            $staff = Staff::find($inputs['id']);
            $staff->fill([
                'id' => $inputs['id'],
                '区分内容' => $inputs['区分内容'],
                '統計番号' => $inputs['統計番号'],
                '教職員番号' => $inputs['教職員番号'],
                '担当者コード' => $inputs['担当者コード'],
                '共済番号' => $inputs['共済番号'],
                '職名1' => $inputs['職名1'],
                '職名2' => $inputs['職名2'],
                '常勤非常勤' => $inputs['常勤非常勤'],
                '地域' => $inputs['地域'],
                'キャンパス名' => $inputs['キャンパス名'],
                '職員氏名' => $inputs['職員氏名'],
                'ふりがな' => $inputs['ふりがな'],
                '性別' => $inputs['性別'],
                '更新確認' => $inputs['更新確認'],
                '教免更新グループ' => $inputs['教免更新グループ'],
                '修了確認期限' => $inputs['修了確認期限'],
                '生年月日' => $inputs['生年月日'],
                '雇用年月日' => $inputs['雇用年月日'],
                '郵便番号' => $inputs['郵便番号'],
                '住所１' => $inputs['住所１'],
                '住所２' => $inputs['住所２'],
                '電話番号' => $inputs['電話番号'],
                '携帯番号' => $inputs['携帯番号'],
                '在籍状況' => $inputs['在籍状況'],
                '退職・休職年月日' => $inputs['退職・休職年月日'],
                '退職理由' => $inputs['退職理由'],
                '退職願' => $inputs['退職願'],
                'メールアドレス' => $inputs['メールアドレス'],
                'メールアドレス学内' => $inputs['メールアドレス学内'],
                '備考1' => $inputs['備考1'],
                '備考2' => $inputs['備考2'],
                '備考3' => $inputs['備考3'],
                '備考4' => $inputs['備考4'],
            ]);
            $staff->save();

            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', '登録を完了しました');
        return redirect(route('home'));
    }

    public function testTest()
    {

        return view('home');
    }
}
