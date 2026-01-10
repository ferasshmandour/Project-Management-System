<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\View\View;
use App\Services\UserService;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(): View
    {
        $users = $this->userService->getUsers();
        return view("users.index", compact("users"));
    }

    public function create(): View
    {
        return view("users.create");
    }

    public function store(StoreUserRequest $request)
    {
        try {
            $this->userService->createUser($request);
            return redirect()->route("users.index")->with("success", "User created successfully");
        } catch (\Exception $e) {
            return back()->withInput()->with("error", "Error when create user");
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->userService->deleteUser($id);
            return redirect()->back()->with("success", "User deleted successfully");
        } catch (\Exception $e) {
            return back()->withInput()->with("error", "Error when delete user");
        }
    }
}
