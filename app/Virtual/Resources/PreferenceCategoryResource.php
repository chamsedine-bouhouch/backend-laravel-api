<?php
namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="PreferenceCategoryResource",
 *     description="Preference Category resource",
 *     @OA\Xml(
 *         name="PreferenceCategoryResource"
 *     )
 * )
 */
class PreferenceCategoryResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\PreferenceCategory[]
     */
    private $data;
}
