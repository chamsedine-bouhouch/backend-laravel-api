<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\PreferenceService;
use App\Models\PreferenceCategory as ModelsPreferenceCategory;
use App\Virtual\Models\PreferenceCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use jcobhams\NewsApi\NewsApi;



class NewsApiController extends Controller
{

    public function __construct(private PreferenceService $preferenceService)
    {
    }
    public function load_user_feed(Request $request): JsonResponse
    {
        $preferences = $this->preferenceService->getUserPreferences();

        if ($request->get('category')) {
            $category = $request->get('category');
            $source = null;
        } else {
            $category = null;
            $source = $preferences["sources"];
        }

        $newsapi = new NewsApi(api_key: env('NEWS_API_KEY'));
        # /v2/everything
        // $all_articles = $newsapi->getEverything($q, $sources, $domains, $exclude_domains, $from, $to, $language, $sort_by,  $page_size, $page);
        // $all_articles = $newsapi->getEverything(q: $request->keyword, sources: $preferences["sources"]);
        # /v2/top-headlines
        // $top_headlines = $newsapi->getTopHeadlines($q, $sources, $country, $category, $page_size, $page);
        $top_headlines = $newsapi->getTopHeadlines(
            q: $request->keyword,
            sources: $source,
            category: $category
        );

        # /v2/top-headlines/sources
        // $sources = $newsapi->getSources($category, $language, $country);
        return response()->json($top_headlines);
    }

    public function index(Request $request): JsonResponse
    {
        $preferences = $this->preferenceService->getUserPreferences();

        // if ($preferences["sources"]==='') {
        //     $preferences["sources"]===null;

        // }


        $newsapi = new NewsApi(api_key: env('NEWS_API_KEY'));
        # /v2/everything
        // $all_articles = $newsapi->getEverything($q, $sources, $domains, $exclude_domains, $from, $to, $language, $sort_by,  $page_size, $page);
        // $all_articles = $newsapi->getEverything(q: $request->keyword, sources: $preferences["sources"]);
        # /v2/top-headlines
        // $top_headlines = $newsapi->getTopHeadlines($q, $sources, $country, $category, $page_size, $page,);
        $top_headlines = $newsapi->getTopHeadlines(q: $request->keyword, sources: $preferences["sources"], category: $preferences["sources"]);

        # /v2/top-headlines/sources
        // $sources = $newsapi->getSources($category, $language, $country);
        return response()->json($top_headlines);
    }
}
