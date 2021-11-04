<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use App\Http\Requests\InputRecuest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
//use Kyslik\ColumnSortable\Sortable;


class Staff extends Model
{
    // public function __construct(Memo $memo)
    // {
    //     $this->memo = $memo;

    // }

    protected $table = 'staff';
    use HasFactory;
    protected $fillable = [
        '区分内容',
        '統計番号',
        '教職員番号',
        '担当者コード',
        '共済番号',
        '職名1',
        '職名2',
        '常勤非常勤',
        '地域',
        'キャンパス名',
        '職員氏名',
        'ふりがな',
        'ﾌﾘｶﾞﾅ',
        '性別',
        '高校教科免許1',
        '高校教科免許2',
        '高校教科免許3',
        '高校教科免許4',
        '高校教科免許5',
        '中学教科免許1',
        '中学教科免許2',
        '中学教科免許3',
        '中学教科免許4',
        'その他免許1',
        'その他免許2',
        'その他免許3',
        'その他免許4',
        '更新確認',
        '教免更新グループ',
        '修了確認期限',
        '生年月日',
        '雇用年月日',
        '履歴',
        '郵便番号',
        '住所１',
        '住所２',
        '電話番号',
        '携帯番号',
        '在籍状況',
        '退職・休職年月日',
        '退職理由',
        '退職願',
        'メールアドレス',
        'メールアドレス学内',
        '備考1',
        '備考2',
        '備考3',
        '備考4',
        '経路区分',
        '距離',
        '通勤手当',
        '適用交通費',
        '自転車使用',
        '給与号俸',
        '給与金額',
        '調整手当',
        // 'image'
    ]; //保存したいカラム名が複数の場合

    /**
     * アカウント権限チェック
     *
     * @return void
     */
    public function roleJudge()
    {

        $role = Auth::user()->role;

        if ($role == '2') {
            $staff = Staff::where('常勤非常勤', '=', '非常勤');
        } elseif ($role == '1') {
            $staff = Staff::where('常勤非常勤', 'like', '%常勤%');
        }

        return $staff;
    }
    /**
     * データ新規作成
     *
     *
     */
    public function staffCreate()
    {
        $inputs = \Request::all();
        \DB::beginTransaction();
        try {
            Staff::create($inputs);
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg', '登録を完了しました');
    }

    /**
     * データアップデート
     *
     *
     */
    public function staffUpdate()
    {
        $inputs = \Request::all();
        $staff = $this->roleJudge();


        \DB::beginTransaction();

        try {
            $staff = Staff::find($inputs['id']);
            $staff->fill([
                'id' => $inputs['id'],
                '区分内容' => $inputs['区分内容'],
                '在籍状況' => $inputs['在籍状況'],
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
                '退職・休職年月日' => $inputs['退職・休職年月日'],
                '退職理由' => $inputs['退職理由'],
                '退職願' => $inputs['退職願'],
                'メールアドレス' => $inputs['メールアドレス'],
                'メールアドレス学内' => $inputs['メールアドレス学内'],
                '備考1' => $inputs['備考1'],
                '備考2' => $inputs['備考2'],
                '備考3' => $inputs['備考3'],
                '備考4' => $inputs['備考4'],
                // '高校教科免許1' => $inputs['高校教科免許1'],
                // '高校教科免許2' => $inputs['高校教科免許2'],
                // '高校教科免許3' => $inputs['高校教科免許3'],
                // '高校教科免許4' => $inputs['高校教科免許4'],
                // '高校教科免許5' => $inputs['高校教科免許5'],
                // '中学教科免許1' => $inputs['中学教科免許1'],
                // '中学教科免許2' => $inputs['中学教科免許2'],
                // '中学教科免許3' => $inputs['中学教科免許3'],
                // '中学教科免許4' => $inputs['中学教科免許4'],
                // 'その他免許1' => $inputs['その他免許1'],
                // 'その他免許2' => $inputs['その他免許2'],
                // 'その他免許3' => $inputs['その他免許3'],
                // 'その他免許4' => $inputs['その他免許4'],
                // 'image' => $path[1],
            ]);
            $staff->save();

            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            abort(500);
        }



        return $staff;

    }

    public function licenceUpdate()
    {
        $inputs = \Request::all();
        $staff = $this->roleJudge();


        \DB::beginTransaction();

        try {
            $staff = Staff::find($inputs['id']);
            $staff->fill([
                'id' => $inputs['id'],
                '更新確認' => $inputs['更新確認'],
                '教免更新グループ' => $inputs['教免更新グループ'],
                '修了確認期限' => $inputs['修了確認期限'],
                '高校教科免許1' => $inputs['高校教科免許1'],
                '高校教科免許2' => $inputs['高校教科免許2'],
                '高校教科免許3' => $inputs['高校教科免許3'],
                '高校教科免許4' => $inputs['高校教科免許4'],
                '高校教科免許5' => $inputs['高校教科免許5'],
                '中学教科免許1' => $inputs['中学教科免許1'],
                '中学教科免許2' => $inputs['中学教科免許2'],
                '中学教科免許3' => $inputs['中学教科免許3'],
                '中学教科免許4' => $inputs['中学教科免許4'],
                'その他免許1' => $inputs['その他免許1'],
                'その他免許2' => $inputs['その他免許2'],
                'その他免許3' => $inputs['その他免許3'],
                'その他免許4' => $inputs['その他免許4'],
                // 'image' => $path[1],
            ]);
            $staff->save();

            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            abort(500);
        }



        return $staff;

    }
}
