<?php

namespace App\Http\Controllers;

use Throwable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;

class BookController extends Controller
{
    public $title = 'Book';

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->ajaxHandler($request);
        }

        return view('pages.book.index', [
            'title' => $this->title,
        ]);
    }

    public function ajaxHandler($request)
    {
        $query = Book::whereNull('deleted_at');

        $this->queryHandler($query, $request);

        $query->orderBy($request->orderBy ?? 'id', $request->orderType ?? 'DESC');

        return $query->paginate($request->perPage);
    }

    public function queryHandler($query, $request)
    {
        $query->when($request->title != 'null', function ($query) use ($request) {
            return $query->where('title', 'like', '%' . $request->title . '%');
        });

        $query->when($request->author != 'null', function ($query) use ($request) {
            return $query->where('author', 'like', '%' . $request->author . '%');
        });

        $query->when($request->description != 'null', function ($query) use ($request) {
            return $query->where('description', 'like', '%' . $request->description . '%');
        });
    }

    public function create()
    {
        return view('pages.book.form', [
            'title' => $this->title,
            'method' => 'Create',
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'author' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'title' => 'Whoops!',
                'message' => 'Please complete the form.',
                'errors' => $validator->errors(),
                'old' => $request->all(),
            ]);
        }

        DB::beginTransaction();

        try {

            $model = Book::create($request->all());

            DB::commit();

            return response()->json([
                'status' => 'success',
                'title' => 'Success!',
                'message' => 'Item successfully created.'
            ]);
        } catch (Throwable $e) {

            //return $e;
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'title' => 'Something went wrong!',
                'message' => 'Please try again.'
            ]);
        }
    }

    public function show($id)
    {
        $model = Book::findOrFail($id);

        return view('pages.book.show', [
            'title' => $this->title,
            'model' => $model,
        ]);
    }

    public function edit($id)
    {
        $model = Book::findOrFail($id);

        return view('pages.book.form', [
            'title' => $this->title,
            'method' => 'Update',
            'model' => $model,
        ]);
    }

    public function update(Request $request, $id)
    {
        $model = Book::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'author' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'title' => 'Whoops!',
                'message' => 'Please complete the form.',
                'errors' => $validator->errors(),
                'old' => $request->all(),
            ]);
        }

        DB::beginTransaction();

        try {

            $model->update($request->all());

            DB::commit();

            return response()->json([
                'status' => 'success',
                'title' => 'Success!',
                'message' => 'Item successfully created.'
            ]);
        } catch (Throwable $e) {

            // return $e;
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'title' => 'Something went wrong!',
                'message' => 'Please try again.'
            ]);
        }
    }

    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();

        try {

            Book::destroy($request->id_array);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Item deleted successfully.'
            ]);
        } catch (Throwable $e) {

            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => 'Whoops! Something went wrong. Please try again.'
            ]);
        }
    }
}
