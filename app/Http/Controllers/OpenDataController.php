<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\DB;
use App\Models\OpenDataDataset;
use App\Models\OpenDataArticle;
use Carbon\Carbon;

class OpenDataController extends Controller
{
    //dataset

    public function indexDatasets(Request $request) {
        //validate input
        $request->validate([
            'q' => 'nullable|string'
        ]);

        $q = $request->q ?? '';
        $sort = $request->sort ?? 'desc';

        $result = OpenDataDataset::where('title', 'ilike', '%'.$q.'%')
            ->orWhere('description', 'ilike', '%'.$q.'%')
            ->orderByRaw("
                CASE 
                    WHEN title LIKE ? THEN 1
                    WHEN description LIKE ? THEN 2
                    ELSE 3
                END
            ", ["%$q%", "%$q%"])
            ->orderBy('published_at', $sort)
            ->paginate(10);

        // throw null
        if($result->isEmpty()) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }

        return response()->json([
            'status'=>'success',
            'message'=>'success retrieved data',
            'data'=>$result->items(),
            'pagination' => [
                'current_page' => $result->currentPage(),
                'last_page' => $result->lastPage(),
                'per_page' => $result->perPage(),
                'total' => $result->total(),
            ]
        ],200);
    }

    public function showDataset($id) {
        $result = OpenDataDataset::find($id);
        if(!$result) {
            return response()->json([
                'status'=>'error',
                'message'=>'Data tidak ditemukan'
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Detail kategori',
            'data' => $result
        ]);
    }
    public function storeDataset(Request $request) {
        $validated = $request->validate([
            'title' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (str_word_count($value) > 30) {
                        $fail("$attribute Maksimal 30 kata");
                    }
                }
            ],
            'description' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (str_word_count($value) > 255) {
                        $fail("$attribute Maksimal 255 kata");
                    }
                }
            ],
            'category' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (str_word_count($value) > 10) {
                        $fail("$attribute Maksimal 10 kata");
                    }
                }
            ],
            'source_agency'=> 'required|string|max:255',
            'dataset_url'=>'required|string|max:255',
            'published_at' => ['required', 'date_format:d-m-Y'],
        ]);

        //convert timestamp
        $validated['published_at'] = Carbon::createFromFormat(
            'd-m-Y',
            $validated['published_at']
        );

        $dataset = OpenDataDataset::create($validated);
        return response()->json([
            'status'=>'success',
            'message'=>'dataset created',
            'data'=>$dataset
        ],200);
    }
    public function updateDataset(Request $request, $id) {
        $dataset = OpenDataDataset::find($id);
        //throw null
        if(!$dataset) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'title' => [
                'sometimes',
                function ($attribute, $value, $fail) {
                    if (str_word_count($value) > 30) {
                        $fail("$attribute Maksimal 30 kata");
                    }
                }
            ],
            'description' => [
                'sometimes',
                function ($attribute, $value, $fail) {
                    if (str_word_count($value) > 255) {
                        $fail("$attribute Maksimal 255 kata");
                    }
                }
            ],
            'category' => [
                'sometimes',
                function ($attribute, $value, $fail) {
                    if (str_word_count($value) > 10) {
                        $fail("$attribute Maksimal 10 kata");
                    }
                }
            ],
            'source_agency'=> 'sometimes|string|max:255',
            'dataset_url'=>'sometimes|string|max:255',
            'published_at' => ['sometimes', 'date_format:d-m-Y'],
        ]);

        //convert timestamp
        if (isset($validated['published_at'])) {
            $validated['published_at'] = Carbon::createFromFormat(
                'd-m-Y',
                $validated['published_at']
            )->format('d-m-Y H:i:s');
        }

        $dataset->update($validated);

        return response()->json([
            'status'=>'success',
            'message'=>'success update data',
            'data'=>$dataset
        ],200);
    }

    public function destroyDataset($id) {
        $dataset = OpenDataDataset::find($id);

        if(!$dataset) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $dataset->delete();

        return response()->json([
            'status'=>'success',
            'message'=>'dataset deleted'
        ],200);
    }

    //article
    public function indexArticles(Request $request) {
        //validate input
        $request->validate([
            'q' => 'nullable|string'
        ]);

        $q = $request->q ?? '';
        $sort = $request->sort ?? 'desc';

        $result = OpenDataArticle::where('title', 'ilike', '%'.$q.'%')
            ->orWhere('description', 'ilike', '%'.$q.'%')
            ->orderByRaw("
                CASE 
                    WHEN title LIKE ? THEN 1
                    WHEN description LIKE ? THEN 2
                    ELSE 3
                END
            ", ["%$q%", "%$q%"])
            ->orderBy('published_at', $sort)
            ->paginate(10);

        // throw null
        if($result->isEmpty()) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }

        return response()->json([
            'status'=>'success',
            'message'=>'success retrieved data',
            'data'=>$result->items(),
            'pagination' => [
                'current_page' => $result->currentPage(),
                'last_page' => $result->lastPage(),
                'per_page' => $result->perPage(),
                'total' => $result->total(),
            ]
        ],200);
    }

    public function showArticle($id) {
        $result = OpenDataArticle::find($id);
        if(!$result) {
            return response()->json([
                'status'=>'error',
                'message'=>'Data tidak ditemukan'
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Detail kategori',
            'data' => $result
        ]);
    }

    public function storeArticle(Request $request) {
        $validated = $request->validate([
            'title' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (str_word_count($value) > 30) {
                        $fail("$attribute Maksimal 30 kata");
                    }
                }
            ],
            'content' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (str_word_count($value) > 255) {
                        $fail("$attribute Maksimal 255 kata");
                    }
                }
            ],
            'author'=> 'required|string|max:255',
            'article_url'=>'required|string|max:255',
            'published_at' => ['required', 'date_format:d-m-Y'],
        ]);

        //convert timestamp
        $validated['published_at'] = Carbon::createFromFormat(
            'd-m-Y',
            $validated['published_at']
        );

        $article = OpenDataArticle::create($validated);

        return response()->json([
            'status'=>'success',
            'message'=>'article created',
            'data'=>$article
        ],200);
    }

    public function updateArticle(Request $request, $id) {
        $article = OpenDataArticle::find($id);
        //throw null
        if(!$article) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'title' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (str_word_count($value) > 30) {
                        $fail("$attribute Maksimal 30 kata");
                    }
                }
            ],
            'content' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (str_word_count($value) > 255) {
                        $fail("$attribute Maksimal 255 kata");
                    }
                }
            ],
            'author'=> 'required|string|max:255',
            'article_url'=>'required|string|max:255',
            'published_at' => ['required', 'date_format:d-m-Y'],
        ]);

        //convert timestamp
        $validated['published_at'] = Carbon::createFromFormat(
            'd-m-Y',
            $validated['published_at']
        );

        $article->update($validated);

        return response()->json([
            'status'=>'success',
            'message'=>'success update data',
            'data'=>$article
        ],200);
    }
    public function destroyArticle($id) {
        $article = OpenDataArticle::find($id);

        if(!$article) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $article->delete();

        return response()->json([
            'status'=>'success',
            'message'=>'article deleted'
        ],200);
    }
}
