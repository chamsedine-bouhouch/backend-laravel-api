<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Preference",
 *     description="Preference model",
 *     @OA\Xml(
 *         name="Preference"
 *     )
 * )
 */
class Preference
{
    /**
     * @OA\Property(
     *      title="Value",
     *      description="Value of the new Preference",
     *      example="sources"
     * )
     *
     * @var string
     */
    public $value;

    /**
     * @OA\Property(
     *      title="user_id",
     *      description="User's id of the new preference",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $user_id;
    /**
     * @OA\Property(
     *      title="preference_categories_id",
     *      description="Preference Categorie's id of the new preference",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $preference_categories_id;
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
