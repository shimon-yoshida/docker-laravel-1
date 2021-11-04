<?php

namespace App\Exports;

use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StaffExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $datas = ['id', '職員氏名', 'ふりがな', '常勤非常勤'];
        return Staff::select($datas)->get();
    }

    public function headings(): array
    {
        $datas = ['id', '職員氏名', 'ふりがな', '常勤非常勤'];
        return [$datas];


        // return[
        //         'id',
        //         '区分内容',
        //         '統計番号',
        //         '教職員番号',
        //         '担当者コード',
        //         '共済番号',
        //         '職名1',
        //         '職名2',
        //         '常勤非常勤',
        //         '地域',
        //         'キャンパス名',
        //         '職員氏名',
        //         'ふりがな',
        //         'ﾌﾘｶﾞﾅ',
        //         '性別',
        //         '高校教科免許1',
        //         '高校教科免許2',
        //         '高校教科免許3',
        //         '高校教科免許4',
        //         '高校教科免許5',
        //         '中学教科免許1',
        //         '中学教科免許2',
        //         '中学教科免許3',
        //         '中学教科免許4',
        //         'その他免許1',
        //         'その他免許2',
        //         'その他免許3',
        //         'その他免許4',
        //         '更新確認',
        //         '教免更新グループ',
        //         '修了確認期限',
        //         '生年月日',
        //         '雇用年月日',
        //         '履歴',
        //         '郵便番号',
        //         '住所１',
        //         '住所２',
        //         '電話番号',
        //         '携帯番号',
        //         '在籍状況',
        //         '退職・休職年月日',
        //         '退職理由',
        //         '退職願',
        //         'メールアドレス',
        //         'メールアドレス学内',
        //         '備考1',
        //         '備考2',
        //         '備考3',
        //         '備考4',
        //         '経路区分',
        //         '距離',
        //         '通勤手当',
        //         '適用交通費',
        //         '自転車使用',
        //         '給与号俸',
        //         '給与金額',
        //         '調整手当',
        //         'image'
        // ];

    }
}
