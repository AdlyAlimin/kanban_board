<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\User\RoleInterface;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleInterface;

    public function __construct(
        RoleInterface $roleInterface
    ) {
        $this->roleInterface = $roleInterface;
    }

    public function getIndex()
    {
        $data = $this->roleInterface->index();

        return view('role.index', compact('data'));
    }

    public function getShow($id)
    {
        $data = $this->roleInterface->show($id);

        return view('role.show', compact('data'));
    }

    public function postUpdate(Request $request, $id)
    {
        $data = $this->roleInterface->update($request, $id);

        if($data == false) {
            return redirect()->back()->withErrors('Please Try Again');
        }

        return redirect()->route('role.getIndex');
    }
}
