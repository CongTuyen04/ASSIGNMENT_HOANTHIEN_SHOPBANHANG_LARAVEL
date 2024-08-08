<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\Request;
use App\Utilities\Common;


class UserController extends Controller
{
    private $userService;
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $users = $this->userService->searchAndPaginate('name', $request->get('search'));
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->get('password') != $request->get('password_confirmation')) {
            return back()
                ->with('notification','ERROR: Confirm passwword does not match');
        }
        $data = $request->all();
        $data['password'] = bcrypt($request->get('password'));
        
        // Xử lý file image
        if ($request->hasFile('image')) {
            $data['data'] = Common::upLoadFile($request->file('image'), 'front/img/user');    
        }

        $user = $this->userService->create($data);
        return redirect('admin/user/'. $user->id);
    }
 
    /**
     * Display the specified resource.
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();

        // pass
        if ($request->get('password') != null) {
            if ($request->get('password') != $request->get('password_confirmation')) {
                return back()
                ->with('notification','ERROR: Confirm password does not match');
            }
            $data['password'] = bcrypt($request->get('password'));
        }else{
            unset($data['password']);
        }
        
        // image
        if ($request->hasFile('image')) {   
            // file mới
            $data['avatar'] = Common::upLoadFile($request->file('image'), 'front/img/user');

            // delete file cũ
            $file_name_old = $request->get('image_old');
            if ($file_name_old != '') {
                unlink('front/img/user/'. $file_name_old);
            }
        }

        // Update dữ liệu
        $this->userService->update($user->id, $data);
        return redirect('admin/user/'. $user->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->userService->delete($user->id);

        // DElete image
        // delete file cũ
        $file_name = $user->avatar;
        if ($file_name != '') {
            unlink('front/img/user/'. $file_name);
        }
        return redirect('admin/user');
    }
}
