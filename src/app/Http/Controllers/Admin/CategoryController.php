<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Http\Controllers\Controller;

use App\Models\Category;

use Carbon\Carbon;
use StdClass;
use DB;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$categories = Category::orderBy('name')->paginate(10);
		return view('admin.category.list')
			->with('categories', $categories);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request)
	{
		return view('admin.category.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreRequest $request)
	{
		$category = new Category();
		$category->fill([
			'name' => $request->name,
			'type' => $request->type,
			'description' => $request->description
		]);

		if(!$category->save()){
			return redirect()->route('admin.category.create')
				->with('NOTIFY', 'danger')
				->withInput($request->input());
		}

		return redirect()->route('admin.category.create')->with('NOTIFY', 'success');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, $id)
	{
		$category = Category::findOrFail($id);
		return view('admin.category.edit')
			->with('category', $category);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateRequest $request, $id)
	{
		$category = Category::findOrFail($id);
		$category->fill([
			'name' => $request->name,
			'type' => $request->type,
			'description' => $request->description
		]);

		if(!$category->save()){
			return redirect()->route('admin.category.edit', $id)
				->with('NOTIFY', 'danger')
				->withInput($request->input());
		}

		return redirect()->route('admin.category.edit', $id)->with('NOTIFY', 'success');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, $id)
	{
		$category = Category::findOrFail($id);
		if(!$category->delete()){
			return redirect()->route('admin.category.list')
				->with('NOTIFY', 'danger');
		}

		return redirect()->route('admin.category.list')->with('NOTIFY', 'success');
	}

	public function optionData(Request $request)
	{
		$categories = [];
		$transaction_type = $request->transaction_type;
		$available_type = ['receive', 'spend'];

		if(!in_array($transaction_type, $available_type))
			return response()->json($categories);

		$categories = Category::orderBy('name');		
		$categories = $categories->where('type', $transaction_type);
		$categories = $categories->get();

		return response()->json($categories);
	}
}
