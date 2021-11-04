<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Staff;
use GuzzleHttp\Psr7\Request;

class Memo extends Model
{
    use HasFactory;
    protected $fillable = [
        'staff_id',
        'メモ内容',
        'user_id'
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct(Staff $staff)
    // {

    //     $this->staff = $staff;

    // }

    // public function superTest($u)
    // {
    //     $media = $u;
    //     return $media;
    // }
    /**
     * 新規メモ作成
     *
     * @return void
     */
    public function memoCreate()
    {
        $inputs = \Request::all();
        \DB::transaction(function () use ($inputs) {
            $memos = new Memo();
            $memos->fill([
                'staff_id' => $inputs['id'],
                'メモ内容' => $inputs['memo'],
                'user_id' => Auth::id(),
            ]);
            $memos->save();
        });
        $memos = Memo::where('staff_id', '=', $inputs['id'],)
            ->get();




        \Session::flash('err_msg', '登録を完了しました');

        return $memos;
    }

    /**
     * メモアップデート
     *
     */

    public function memoUpdate()
    {
        $inputs = \Request::all();
        \DB::beginTransaction();
        try {
            $updatememo = Memo::find($inputs['memoid']);
            $updatememo->fill([
                'メモ内容' => $inputs['memo'],
            ]);
            $updatememo->save();

            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        $memos = Memo::where('staff_id', '=', $inputs['id'])
            ->orderBy('created_at')
            ->get();

        return $memos;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
