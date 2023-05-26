<?php

namespace App\Virtual;
/**
 * @OA\Schema(
 *      title="Store Preference request",
 *      description="Store Preference request body data",
 *      type="object",
 *      required={"value"}
 * )
 */
class StorePreferenceRequest
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
}
