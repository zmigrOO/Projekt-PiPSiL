<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent_category_id
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereParentCategoryId($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Image
 *
 * @property int $offer_id
 * @property int $order
 * @property string $path
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image wherePath($value)
 */
	class Image extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Offer
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property int $quantity
 * @property string $condition
 * @property float $price
 * @property string $description
 * @property string $phone_number
 * @property string $city
 * @property int $seller_id
 * @property int $active
 * @property string $offer_creation_date
 * @property string $offer_expiration_date
 * @method static \Database\Factories\OfferFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Offer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereOfferCreationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereOfferExpirationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereSellerId($value)
 */
	class Offer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Opinion
 *
 * @property int $offer_id
 * @property int $user_id
 * @property string $content
 * @property int $rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Opinion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Opinion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Opinion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Opinion whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opinion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opinion whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opinion whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opinion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opinion whereUserId($value)
 */
	class Opinion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WatchedOffer
 *
 * @property int $offer_id
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|WatchedOffer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WatchedOffer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WatchedOffer query()
 * @method static \Illuminate\Database\Eloquent\Builder|WatchedOffer whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WatchedOffer whereUserId($value)
 */
	class WatchedOffer extends \Eloquent {}
}

