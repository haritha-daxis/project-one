<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;


    class CategoryController extends Controller
    {
        public function index(Request $request)
        {

        //   $categoris = Category::where('parent_id',0)->get();

        //   return view('category',["categoris" => $categoris]);
        if(request()->ajax()) {
            return datatables()->of(Category::select('*'))
            ->addColumn('action', 'category.category-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('category.category');
        }

        public function store(Request $request)
        {
            // $parent_id = $request->cat_id;

            // $subcategories = Category::where('id',$parent_id)
            //                       ->with('subcategories')
            //                       ->get();
            // return response()->json([
            //     'subcategories' => $subcategories
            // ]);

                $categoryId = $request->id;
                 $category=Category::get();

              $category =  Category::updateOrCreate(['id'=>$categoryId],

               [
                'category_id' => $request->category_id,
                 'category_desc' => $request->desc
                 ]);


                return Response()->json($category);

            }


            /**
             * Show the form for editing the specified resource.
             *
             * @param  \App\company  $company
             * @return \Illuminate\Http\Response
             */
            public function edit(Request $request)
            {
               // $category= Category::get();
                $where = array('id' => $request->id);
                $category  = Category::where($where)->first();

                //  $category= Category::get();
                //  $category_name=$category->category_name;
                // $category_id=$product->category_id;
                // $category=category::array_where(array($category_id => $category_name));
                //$category= Category::all();

                return Response()->json($category);
            }


            /**
             * Remove the specified resource from storage.
             *
             * @param  \App\company  $company
             * @return \Illuminate\Http\Response
             */
            public function destroy(Request $request)
            {
                $category = Category::where('id',$request->id)->delete();

                return Response()->json($category);
            }
        }


