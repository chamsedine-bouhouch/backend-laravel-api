<?php
namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="PreferenceResource",
 *     description="Preference resource",
 *     @OA\Xml(
 *         name="PreferenceResource"
 *     )
 * )
 */
class PreferenceResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Preference[]
     */
    private $data;
}
