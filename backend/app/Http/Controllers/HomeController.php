<?php

namespace App\Http\Controllers;

use App\Http\Composers\SidebarComposer;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Memo;
use App\Models\Document;
use App\Http\Requests\InputRecuest;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Exports\StaffExport;
use Maatwebsite\Excel\Facades\Excel;

// use League\CommonMark\Node\Block\Document;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Staff $staff, Memo $memo)
    {
        $this->middleware('auth');
        $this->staff = $staff;
        $this->memo = $memo;
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // public function getListid($listno)
    // {
    //     if (empty($listno)) {
    //         $listno = "";
    //     } else {
    //         $listno = $listno;
    //     }
    //     return $listno;
    // }

    public function testTest()
    {
       return Excel::download(new StaffExport,'職員名簿.xlsx');

    }

    public function csvExport(Request $request)
    {
        $post = $request->all(); // 本来ならここで、CSV出力のパラメータを受け取り、クエリで絞り込む
        $response = new StreamedResponse(function () use ($request, $post) {
            $stream = fopen('php://output', 'w');
            // 文字化け回避
            stream_filter_prepend($stream, 'convert.iconv.utf-8/cp932//TRANSLIT');

            // ここでは仮に「products」というテーブルの全データを取得
            $datas = ['id', '職員氏名', 'ふりがな', '常勤非常勤'];
            $results = Staff::get($datas);
            // $results = array($results);
            // $staff = DB::table('staff');
            // $results = $staff->select($datas)->get();

            if (empty($results[0])) {
                fputcsv($stream, [
                    'データが存在しませんでした。',
                ]);
            } else {

                foreach ($results as $row) {

                        fputcsv($stream, $this->_csvRow($row));
            }
                // $this->_csvRow($row)

            }

            fclose($stream);
        });
        $response->headers->set('Content-Type', 'application/octet-stream');
        $response->headers->set('content-disposition', 'attachment; filename=職員一覧.csv');

        return $response;
    }


    /*
* CSVの１行分のデータ　※本来はコントローラに書かない方が良い
*/
    private function _csvRow($row)
    {

        $datas = ['id', '職員氏名', 'ふりがな', '常勤非常勤'];
        // $row[] = array($datas);
        // return $row;



  return [
            $row->$datas[0],
            $row->$datas[1],
            $row->$datas[2],
            $row->$datas[3],
            // $row->$datas[4],
            // $row->$datas[5],
            // $row->$datas[6],
        ];

        // $staff = '';
        // foreach ($datas as $data) {
        //     $staff = $row[$data];
        // }
        // return $staff;

        // return [


        //     $row->id,
        //     $row->職員氏名,
        //     $row->ふりがな,
        //     $row->cost,
        //     $row->price,
        //     $row->常勤非常勤,
        //     $row->memo,
        // ];
    }

    public function index()
    {
        // $listno = $this->listno->getListno('');
        $listno = '1';
        return view(
            'list',
            compact('listno')
        );
    }

    public function search()
    {
        return view('list');
    }

    public function showDetail(Request $request, $id)
    {
        $query = $this->staff->roleJudge();
        $staff = $query->where('id', '=', "{$id}")->get();
        $staff = $staff[0];

        return view('staff.detail', compact('staff'));
    }

    public function showMemo(Request $request, $id)
    {
        $memos = Memo::where('staff_id', '=', $id)
            ->orderBy('created_at')
            ->get();

        $query = $this->staff->roleJudge();
        $staff = $query->where('id', '=', "{$id}")->get();
        $staff = $staff[0];

        return view('staff.memo', compact('staff', 'memos'));
    }

    public function showCreate()
    {
        return view('input-form');
    }

    public function exeStore()
    {
        $this->staff->staffCreate();

        return redirect(route('input-form'));
    }


    public function exeMemo(Request $request)
    {
        $memos = $this->memo->memoCreate();
        $query = $this->staff->roleJudge();
        $staff = $query->where('id', '=', "{$request['id']}")->get();
        $staff = $staff[0];
        $id = $request['id'];
        return redirect(route('showmemo', compact('staff', 'memos', 'id')));
    }

    public function showEdit(Request $request, $id)
    {
        $query = $this->staff->roleJudge();
        $staff = $query->where('id', '=', "{$id}")->get();
        $staff = $staff[0];

        return view('staff.edit', compact('staff'));
    }

    public function exeUpdate(InputRecuest $request, $id)
    {
        $inputs = $request->all();
        $staff = $this->staff->staffUpdate();

        \Session::flash('err_msg', '登録を完了しました');

        $staff['id'] = $id;

        return view('staff.detail', compact('staff'));
    }

    public function updateMemo(Request $request, $id)
    {
        $memos = $this->memo->memoUpdate();
        $query = $this->staff->roleJudge();
        $staff = $query->where('id', '=', "{$id}")->get();
        $staff = $staff[0];

        \Session::flash('err_msg', '更新を完了しました');
        return view('staff.memo', compact('staff', 'memos'));
    }
    public function editMemo($id, $memoid)
    {
        $memos = Memo::where('staff_id', '=', $id)
            ->orderBy('created_at')
            ->get();

        $editmemo = Memo::where('id', '=', $memoid,)
            ->get();

        $query = $this->staff->roleJudge();
        $staff = $query->where('id', '=', "{$id}")->get();
        $staff = $staff[0];

        return view('staff.editmemo', compact('staff', 'memos', 'editmemo'));
    }

    public function deleteMemo(Request $request, $id)
    {
        $inputs = $request->all();
        \DB::beginTransaction();
        try {
            Memo::find($inputs['memoid'])->delete();
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        $memos = Memo::where('staff_id', '=', $id)
            ->orderBy('created_at')
            ->get();

        $query = $this->staff->roleJudge();
        $staff = $query->where('id', '=', "{$id}")->get();
        $staff = $staff[0];

        \Session::flash('err_msg', 'メモを１件削除しました');
        return redirect(route('showmemo', compact('staff', 'memos', 'id')));
    }

    public function memoCheck(Request $request, $id)
    {
        if ($request['check'] === 'create') {
            $return_view = $this->exeMemo($request);
            return $return_view;
        } elseif ($request['check'] === 'delete') {
            $return_view = $this->deleteMemo($request, $id);
            return $return_view;
        };
    }

    public function docCreate(Request $request)
    {
        $docs = Document::where('staff_id', '=', $request['id'])
            ->orderBy('created_at')
            ->get();

        $listno = '1';
        $query = $this->staff->roleJudge();
        $staff = $query->where('id', '=', "{$request['id']}")->get();
        $staff = $staff[0];

        return view('staff.doc', compact('staff', 'listno', 'docs'));
    }

    public function exeDoc(Request $request, $id)
    {
        $inputs = $request->all();

        $file_name = $request->file('doc')->getClientOriginalName();
        $path = $request->file('doc')->store('/public/yashima');
        $path = explode('/', $path);

        \DB::beginTransaction();
        try {
            $doc = new Document();
            $doc->fill([
                'staff_id' => $inputs['id'],
                '書類名' => $file_name,
                '内容' => $inputs['内容'],
                'DOCpass' => $path[2],
                'user_id' => Auth::id(),
            ]);
            $doc->save();
            $docs = Document::where('staff_id', '=', $id)
                ->orderBy('created_at')
                ->get();

            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        $listno = '1';
        $query = $this->staff->roleJudge();
        $staff = $query->where('id', '=', "{$id}")->get();
        $staff = $staff[0];

        \Session::flash('err_msg', 'ファイルをアップロードしました');

        return redirect(route('doccreate', compact('staff', 'id', 'docs')));
    }

    public function editDoc($id, $docid)
    {
        $docs = Document::where('staff_id', '=', $id)
            ->orderBy('created_at')
            ->get();

        $editdoc = Document::where('id', '=', $docid,)
            ->get();

        $listno = '1';
        $query = $this->staff->roleJudge();
        $staff = $query->where('id', '=', "{$id}")->get();
        $staff = $staff[0];

        return view('staff.editdoc', compact('staff', 'listno', 'docs', 'editdoc'));
    }

    public function updateDoc(Request $request, $id)
    {
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            $updatedoc = Document::find($inputs['docid']);
            $updatedoc->fill([
                '内容' => $inputs['内容'],
            ]);
            $updatedoc->save();

            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        $docs = Document::where('staff_id', '=', $id)
            ->orderBy('created_at')
            ->get();

        $listno = '1';
        $query = $this->staff->roleJudge();
        $staff = $query->where('id', '=', "{$id}")->get();
        $staff = $staff[0];

        \Session::flash('err_msg', '更新を完了しました');
        return view('staff.doc', compact('staff', 'listno', 'docs', 'updatedoc'));
    }
    public function docCheck(Request $request, $id)
    {

        if ($request['check'] === 'create') {
            $return_view = $this->exeDoc($request, $id);
            return $return_view;
        } elseif ($request['check'] === 'delete') {
            $return_view = $this->deleteDoc($request, $id);
            return $return_view;
        };
    }

    public function deleteDoc(Request $request, $id)
    {
        $inputs = $request->all();

        Storage::delete($inputs['DOCpass']);

        \DB::beginTransaction();
        try {
            Document::find($inputs['docid'])->delete();
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        $docs = Document::where('staff_id', '=', $id)
            ->orderBy('created_at')
            ->get();

        $listno = '1';
        $query = $this->staff->roleJudge();
        $staff = $query->where('id', '=', "{$id}")->get();
        $staff = $staff[0];

        \Session::flash('err_msg', 'ファイルを１件削除しました');
        return redirect(route('doccreate', compact('staff', 'listno', 'docs', 'id')));
    }

    public function showLicence($id){
        $query = $this->staff->roleJudge();
        $staff = $query->where('id', '=', "{$id}")->get();
        $staff = $staff[0];

        return view('staff.licence', compact('id','staff'));

    }

    public function editLicence($id){
        $query = $this->staff->roleJudge();
        $staff = $query->where('id', '=', "{$id}")->get();
        $staff = $staff[0];

        return view('staff.editlicence', compact('id','staff'));

    }

    public function updateLicence(Request $request,$id){
        $inputs = $request->all();
        $staff = $this->staff->licenceUpdate();

        \Session::flash('err_msg', '更新を完了しました');

        $staff['id'] = $id;

        return view('staff.licence', compact('id','staff'));

    }
}
