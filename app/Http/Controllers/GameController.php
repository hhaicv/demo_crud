<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    const PATH_VIEW = 'games.';
    const PATH_UPLOAD = 'games';

    // list danh sách
    public function index()
    {
        $data = Game::query()->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    // chuyển form thêm mới
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    // thêm mới
    public function store(StoreGameRequest $request)
    {
        $data = $request->except('cover_art');
        if ($request->hasFile('cover_art')) {
            $data['cover_art'] = Storage::put(self::PATH_UPLOAD, $request->file('cover_art'));
        }
        $model = Game::query()->create($data);
        if ($model) {
            return redirect()->back()->with('success', 'Bạn thêm thành công');
        } else {
            return redirect()->back()->with('danger', 'Bạn không thêm thành công');
        }
    }

    // chuyển form sửa, lấy sản phẩm muốn sửa
    public function edit(string $id)
    {
        $data = Game::query()->findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    // cập nhật thông tin sản phẩm muốn sửa
    public function update(UpdateGameRequest $request, string $id)
    {
        $model = Game::query()->findOrFail($id);
        $data = $request->except('cover_art');
        if ($request->hasFile('cover_art')) {
            $data['cover_art'] = Storage::put(self::PATH_UPLOAD, $request->file('cover_art'));
        }
        $cover = $model->cover_art;
        $res = $model->update($data);
        if ($request->hasFile('cover_art') && $cover && Storage::exists($cover)) {
            Storage::delete($cover);
        }
        if ($res) {
            return redirect()->back()->with('success', 'Bạn sửa thành công');
        } else {
            return redirect()->back()->with('danger', 'Bạn không sửa thành công');
        }
    }

    // xóa mềm
    public function destroy(string $id)
    {
        $data = Game::query()->findOrFail($id);
        $data->delete();
        return back();
    }
}
