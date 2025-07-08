<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\NotificationService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::orderBy('created_at', 'desc');
            return DataTables::eloquent($categories)
                ->addIndexColumn()
                ->editColumn('icon', function ($category) {
                    return '<div class="ez_icons"><i class="' . e($category->icon) . '"></i></div>';
                })
                ->editColumn('created_at', function ($category) {
                    return Carbon::parse($category->created_at)->format('Y-m-d');
                })
                ->addColumn('action', function ($category) {
                    $editUrl = route('admin.category.all.edit', ['all' => $category->id]);
                    $deleteUrl = route('admin.category.all.destroy', ['all' => $category->id]);
                    return '
                        <div class="btn-list flex-nowrap">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle align-text-top"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-arrows-random">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M20 21h-4v-4" />
                                        <path d="M16 21l5 -5" />
                                        <path d="M6.5 9.504l-3.5 -2l2 -3.504" />
                                        <path d="M3 7.504l6.83 -1.87" />
                                        <path d="M4 16l4 -1l1 4" />
                                        <path d="M8 15l-3.5 6" />
                                        <path d="M21 5l-.5 4l-4 -.5" />
                                        <path d="M20.5 9l-4.5 -5.5" />
                                    </svg>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="' . $editUrl . '">Edit</a>
                                    <a href="#" class="dropdown-item show-alert-delete-box" data-form-id="delete-form-' . $category->id . '">Delete</a>
                                    <form id="delete-form-' . $category->id . '" method="POST" action="' . $deleteUrl . '" class="d-none">
                                        ' . csrf_field() . method_field('DELETE') . '
                                    </form>
                                </div>
                            </div>
                        </div>';
                })
                ->rawColumns(['name', 'action', 'icon'])
                ->make(true);
        }
        $data['title'] = "Category All";
        return view('admin.categoryManagement.allCategory.index', $data);
    }

    public function create()
    {
        $data['title'] = "Category Create";
        return view('admin.categoryManagement.allCategory.create', $data);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data = array_merge($data, [
            'slug' => Str::slug($data['name'])
        ]);
        Category::create($data);
        NotificationService::CREATED("Category Created!");
        return redirect()->route('admin.category.all.index');
    }


    public function edit(string $id)
    {
        $data['title'] = "Category Edit";
        $data['category'] = Category::findOrFail($id);
        return view('admin.categoryManagement.allCategory.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $data = $this->validateData($request);
        $category = Category::findOrFail($id);
        $category->update($data);
        NotificationService::UPDATED('Category Updated!');
        return back();
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        NotificationService::DELETED('Category Deleted Successfully!');
        return back();
    }

    public function validateData($request)
    {
        return $request->validate([
            'name' => 'required',
            'icon' => 'required',
            'file_types' => 'required',
        ]);
    }
}
