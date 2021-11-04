<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Staff;



class ToplistComposer
{
    public function __construct(Request $request, Staff $staff)
    {
        $this->request = $request;
        $this->staff = $staff;
    }


    public function compose(View $view)
    {
        $listno = '1';
        $view->with('listno', $listno);
    }
}
