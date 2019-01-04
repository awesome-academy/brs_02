<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Cat\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Categorys extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Category $objmCat)
    {
        $this->objmCat = $objmCat;
    }

    public function index()
    {
        $objItemCats = $this->objmCat->where('parent_id', '=' , null)->orderBy('cat_id', 'DESC')->get(); //get category parent

        return view('admin.cat.index', compact('objItemCats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $objItemCats = $this->objmCat->where('parent_id', '=', null)->orderBy('cat_id', 'DESC')->get();
        $listItem = array();
        foreach ($objItemCats as $objItemCat){
            $listItem[$objItemCat->cat_id]= $objItemCat->cname;
        }

        return view('admin.cat.add', compact('listItem'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try{
            $cname = $request->name;
            $mCat = new Categorys();
            $mCat->cname = $cname;

            if (!empty($request->cat)) {
                $idChild = $request->cat;
                $mCat->parent_id = $idChild;
            }
            $result = $mCat->save();

            if($result) {

                return redirect()->route('cat.index')->with('msg', trans('lable.successful_add'));
            } else {

                return redirect()->route('cat.index')->with('msg', trans('lable.error'));
            }
        } catch (Exception $exception) {

            return redirect()->route('cat.index')->with('msg', trans('lable.error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objItemCats = $this->objmCat->where('parent_id', '=', null)->orderBy('cat_id', 'DESC')->get();
        $findCat = $this->objmCat->where('cat_id', $id)->first();
        $listItem = array();
        foreach ($objItemCats as $objItemCat) {
            $listItem[$objItemCat->cat_id]= $objItemCat->cname;
        }

        return view('admin.cat.edit', compact('listItem', 'findCat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        try{
            $cname = $request->name;
            $mCat = Categorys::findOrfail($id);
            $mCat->cname = $cname;

            if (!empty($request->cat)) {
                $idChild = $request->cat;
                $mCat->parent_id = $idChild;
            }
            $result = $mCat->save();

            if($result) {

                return redirect()->route('cat.index')->with('msg', trans('lable.successful_add'));
            } else {

                return redirect()->route('cat.index')->with('msg', trans('lable.error'));
            }
        } catch (Exception $exception) {

            return redirect()->route('cat.index')->with('msg', trans('lable.error'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $deleteCat = $this->objmCat->where('cat_id', $id)->delete();  //delete category parent
            if($deleteCat) {
                $objItemChilds = $this->objmCat->where('parent_id', $id)->get(); // find category child
                foreach ($objItemChilds as $objItemChild) {
                    $deleteChild = $this->objmCat->where('cat_id', $objItemChild->cat_id)->delete();  // delete category child
                }

                return redirect()->route('cat.index')->with('msg', trans('lable.successful_delete'));
            } else {

                return redirect()->route('cat.index')->with('msg', trans('lable.error'));
            }
        } catch (Exception $exception) {

            return redirect()->route('cat.index')->with('msg', trans('lable.error'));
        }
    }
}
