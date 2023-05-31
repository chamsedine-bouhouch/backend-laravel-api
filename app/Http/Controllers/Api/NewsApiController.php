<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\PreferenceService;
use App\Models\PreferenceCategory as ModelsPreferenceCategory;
use App\Virtual\Models\PreferenceCategory;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use jcobhams\NewsApi\NewsApi;


class NewsApiController extends Controller
{
    private $newsapi;

    public function __construct(private PreferenceService $preferenceService)
    {
        $this->newsapi = new NewsApi(api_key: env('NEWS_API_KEY'));
    }

    public function load_user_feed(Request $request): JsonResponse
    {
        $preferences = $this->preferenceService->getUserPreferences();

        if ($request->get('category')) {
            $category = $request->get('category');
            $source = null;
        } else {
            $category = null;
            $source = $preferences["sources"] !== "" ?: null;
        }

        if (empty($request->keyword) || is_null($request->keyword)) {
            // throw new Exception("Keyword is empty.");
            $keyword = null;
        } else {
            $keyword = $request->keyword;
        }

        if (is_null($category) && is_null($source) && is_null($keyword)) {
            throw new Exception("Missing required parameters.");
        }
//         $all_articles = $newsapi->getEverything($q, $sources, $domains, $exclude_domains, $from, $to, $language, $sort_by,  $page_size, $page);
        // $all_articles = $this->newsapi->getEverything(q: $keyword, sources: $source, language: "en", sort_by: 'relevancy');

        // $top_headlines = $newsapi->getTopHeadlines($q, $sources, $country, $category, $page_size, $page);
        $top_headlines = $this->newsapi->getTopHeadlines(
            q: $keyword,
            sources: $source,
            category: $category
        );
        return response()->json($top_headlines);
//        return response()->json([
//            'top_headlines' => $top_headlines,
//            'all_articles' => $all_articles,
//        ]);

    }


    /**
     * @return string[]|null
     */
    public function getCategories()
    {
        return $this->newsapi->getCategories();
    }

    public function getSources()
    {
        //$newsapi->getSources($category, $language, $country)
        $sources = $this->newsapi->getSources(language: 'en');

        return array_slice($sources->sources,0,5);
//        return $this->newsapi->getSortBy();

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
        // $top_headlines = $newsapi->getTopHeadlines($q, $sources, $country, $category, $page_size, $page);
        $top_headlines = $newsapi->getTopHeadlines(q: $request->keyword, sources: $preferences["sources"], category: $preferences["sources"]);


        return response()->json($top_headlines);
    }
}
