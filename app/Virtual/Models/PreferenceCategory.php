<?php
namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="PreferenceCategory",
 *     description="Preference Category model",
 *     @OA\Xml(
 *         name="PreferenceCategory"
 *     )
 * )
 */
class PreferenceCategory
{
    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name of the new Preference Category",
     *      example="sources"
     * )
     *
     * @var string
     */
    public $name;
    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;
}
