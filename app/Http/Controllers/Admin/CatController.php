<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Cat\CatRequest;
use App\Models\Cat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Cat $objmCat){
        $this->objmCat = $objmCat;
    }

    public function index()
    {
        $objItemCats = $this->objmCat->where('parent_id', '=' ,null)->orderBy('cat_id', 'DESC')->get(); //get category parent
        $arrChildCats = array();
        foreach ($objItemCats as $objItemCat){
            $objItemChilds = $this->objmCat->where('parent_id', '=', $objItemCat->cat_id)->get();

            foreach ($objItemChilds as $objItemChild){
                $arrChildCats[$objItemCat->cat_id][$objItemChild->cat_id] = $objItemChild->cname;
            }
        }

        return view('admin.cat.index', compact('objItemCats', 'arrChildCats'));
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
    public function store(CatRequest $request)
    {
        try{
            $cname = $request->cname;
            $mCat = new Cat();
            $mCat->cname = $cname;

            if (!empty($request->cat)){
                $idChild = $request->cat;
                $mCat->parent_id = $idChild;
            }
            $result = $mCat->save();

            if($result){

                return redirect()->route('cat.index')->with('msg', trans('lable.Successful_add'));
            } else {

                return redirect()->route('cat.index')->with('msg', trans('lable.Error'));
            }
        } catch (Exception $exception) {

            return redirect()->route('cat.index')->with('msg', trans('lable.Error'));
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
        foreach ($objItemCats as $objItemCat){
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
            $cname = $request->cname;
            $mCat = Cat::findOrfail($id);
            $mCat->cname = $cname;

            if (!empty($request->cat)){
                $idChild = $request->cat;
                $mCat->parent_id = $idChild;
            }
            $result = $mCat->save();

            if($result){

                return redirect()->route('cat.index')->with('msg', trans('lable.Successful_add'));
            } else {

                return redirect()->route('cat.index')->with('msg', trans('lable.Error'));
            }
        } catch (Exception $exception) {

            return redirect()->route('cat.index')->with('msg', trans('lable.Error'));
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
            if($deleteCat){
                $objItemChilds = $this->objmCat->where('parent_id', $id)->get(); // find category child
                foreach ($objItemChilds as $objItemChild)
                {
                    $deleteChild = $this->objmCat->where('cat_id', $objItemChild->cat_id)->delete();  // delete category child
                }

                return redirect()->route('cat.index')->with('msg', trans('lable.Successful_delete'));
            } else {

                return redirect()->route('cat.index')->with('msg', trans('lable.Error'));
            }
        } catch (Exception $exception) {

            return redirect()->route('cat.index')->with('msg', trans('lable.Error'));
        }
    }
}
