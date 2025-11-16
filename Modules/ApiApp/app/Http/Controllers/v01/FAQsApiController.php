<?php

namespace Modules\ApiApp\app\Http\Controllers\v01;

use App\Http\Controllers\Controller;
use App\Models\FAQs\FAQsCategories;
use App\Models\FAQs\FAQsModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\ApiApp\app\Resources\CategoriesResource;
use Modules\ApiApp\app\Resources\FAQsQuestionsResource;

class FAQsApiController extends Controller
{
    public function categoriesDashboard()  {
        $categories = FAQsCategories::orderBy('order', 'ASC')->get();
        $questions = FAQsModels::limit(5)->orderBy('num_views', 'DESC')->get();

        $response = [
            'success' => true,
            'status' => 200,
            'categories' => CategoriesResource::collection($categories),
            'questions' => FAQsQuestionsResource::collection($questions)
        ];

        return response()->json($response, 200);
    }

    public function categoriesListQuestion(Request $request) {

        $category = FAQsCategories::where("id", $request->cate_id)->first();
        $questions = FAQsModels::where("cate_id", $request->cate_id)
                        ->orderBy('order', 'ASC')->get();

        $response = [
            'success' => true,
            'status' => 200,
            'category' => new CategoriesResource($category),
            'questions' => FAQsQuestionsResource::collection($questions)
        ];

        return response()->json($response, 200);

    }

    public function questionsDetail(Request $request) {
        $category = FAQsCategories::where("id", $request->cate_id)->first();
        $question = FAQsModels::where("id", $request->id)->first();

        $response = [
            'success' => true,
            'status' => 200,
            'category' => new CategoriesResource($category),
            'question' => new FAQsQuestionsResource($question)
        ];

        //FAQsModels::increment('num_views')->where("id", $request->id);
        DB::table("f_a_qs_models")->where("id", $request->id)->increment('num_views');

        return response()->json($response, 200);
    }

    public function listResult(Request $request) {
        $search = $request->search;
        $questions = FAQsModels::whereFullText("name", $request->search)
                        ->orWhereFullText("description", $request->search)
                        ->orderBy('order', 'ASC')->get();

        $response = [
            'success' => true,
            'status' => 200,
            'search' => $search,
            'questions' => FAQsQuestionsResource::collection($questions)
        ];

        return response()->json($response, 200);
    }
}
