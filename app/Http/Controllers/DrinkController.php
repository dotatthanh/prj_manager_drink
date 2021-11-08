<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDrinkRequest;
use DB;
use App\Models\Type;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $drinks = Drink::paginate(10);

        if ($request->search) {
            $drinks = Drink::where('name', 'like', '%'.$request->search.'%')->paginate(10);
            $drinks->appends(['search' => $request->search]);
        }

        $data = [
            'drinks' => $drinks
        ];

        return view('drink.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();

        $data = [
            'types' => $types,
        ];

        return view('drink.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDrinkRequest $request)
    {
        try {
            DB::beginTransaction();

            $name = time().'_'.$request->avatar->getClientOriginalName();
            $filePath = $request->file('avatar')->storeAs('/avatar/drink', $name, 'public');
            $file_path = 'storage/avatar/drink/'.$name;
            
            $create = Drink::create([
                'code' => '',
                'name' => $request->name,
                'type_id' => $request->type_id,
                'description' => $request->description,
                'avatar' => $file_path,
            ]);

            $create->update([
                'code' => 'DU'.str_pad($create->id, 6, '0', STR_PAD_LEFT)
            ]);
            
            DB::commit();
            return redirect()->route('drinks.index')->with('alert-success','Thêm đồ uống thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Thêm đồ uống thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function show(Drink $drink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function edit(Drink $drink)
    {
        $types = Type::all();

        $data = [
            'data_edit' => $drink,
            'types' => $types
        ];

        return view('drink.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDrinkRequest $request, Drink $drink)
    {
        try {
            DB::beginTransaction();
            
            if ($request->file('avatar')) {
                $name = time().'_'.$request->avatar->getClientOriginalName();
                $filePath = $request->file('avatar')->storeAs('/avatar/drink', $name, 'public');
                $file_path = 'storage/avatar/drink/'.$name;
                
                $drink->update([
                    'name' => $request->name,
                    'type_id' => $request->type_id,
                    'description' => $request->description,
                    'avatar' => $file_path,
                ]);
            }
            else {
                $drink->update([
                    'name' => $request->name,
                    'type_id' => $request->type_id,
                    'description' => $request->description,
                ]);
            }
            
            DB::commit();
            return redirect()->route('drinks.index')->with('alert-success','Sửa đồ uống thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Sửa đồ uống thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drink $drink)
    {
        try {
            DB::beginTransaction();

            Drink::destroy($drink->id);
            
            DB::commit();
            return redirect()->route('drinks.index')->with('alert-success','Xóa đồ uống thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Xóa đồ uống thất bại!');
        }
    }
}
