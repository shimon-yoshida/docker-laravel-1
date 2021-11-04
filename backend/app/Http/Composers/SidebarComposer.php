<?php

namespace App\Http\Composers;

use App\Http\Controllers\HomeController;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Staff;
use DB;


class SidebarComposer
{
    public function __construct(Request $request, Staff $staff)
    {
        $this->request = $request;
        $this->staff = $staff;
    }


    public function compose(View $view)
    {


        /* 設定ファイルやDBの値を取得して、渡したいデータを生成する処理 */
        // dd($this->request);
        $query = $this->staff->roleJudge();
        $listno = $this->request->input('listno');
        $search = $this->request->input('search');
        $campus = $this->request->input('campus');
        $enrollment = $this->request->input('enrollment');
        $position = $this->request->input('position');

        if (!empty($search)) {
            $query->where('ふりがな', 'LIKE', "%{$search}%");
        }
        if (!empty($campus)) {
            $query->where('キャンパス名', 'LIKE', "%{$campus}%");
        }

        if (!empty($enrollment)) {
            $query->where('在籍状況', 'LIKE', "%{$enrollment}%");
        }
        if (!empty($position)) {
            $query->where('常勤非常勤', 'LIKE', "{$position}");
        }
        $staffs = $query->paginate(30);
        // $staff = $query->where('id', '=', $this->request->input('id'));
        // dd($staffs);

        $task = new Staff;
        $table = $task->getTable();
        $columns = $task->getConnection()->getSchemaBuilder()->getColumnListing($table);





        // dd($campus);
        // $listsearch = [$search,$campus,$enrollment,$position,$listno]
        $view->with('staffs', $staffs)
            ->with('search', $search)
            ->with('campus', $campus)
            ->with('enrollment', $enrollment)
            ->with('position', $position)
            // ->with('staff',$staff);
            ->with('listno', $listno)
            ->with('columns', $columns);

        // $view->with('listsearch',$listsearch);
    }

}
