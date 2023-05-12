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
 * App\Models\Clothes
 *
 * @property int $category_id
 * @property int $offer_id
 * @property string $size
 * @property string $color
 * @property string $material
 * @property string $brand
 * @method static \Illuminate\Database\Eloquent\Builder|Clothes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clothes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clothes query()
 * @method static \Illuminate\Database\Eloquent\Builder|Clothes whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clothes whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clothes whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clothes whereMaterial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clothes whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clothes whereSize($value)
 */
	class Clothes extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Computers
 *
 * @property int $category_id
 * @property int $offer_id
 * @property string $processor
 * @property string $hard_drive
 * @property string $RAM_type
 * @property string $graphics_card
 * @method static \Illuminate\Database\Eloquent\Builder|Computers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Computers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Computers query()
 * @method static \Illuminate\Database\Eloquent\Builder|Computers whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Computers whereGraphicsCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Computers whereHardDrive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Computers whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Computers whereProcessor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Computers whereRAMType($value)
 */
	class Computers extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Electronics
 *
 * @property int $category_id
 * @property int $offer_id
 * @property string $brand
 * @property string $screen_size
 * @property string $power_source
 * @property string $weight
 * @method static \Illuminate\Database\Eloquent\Builder|Electronics newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Electronics newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Electronics query()
 * @method static \Illuminate\Database\Eloquent\Builder|Electronics whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Electronics whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Electronics whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Electronics wherePowerSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Electronics whereScreenSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Electronics whereWeight($value)
 */
	class Electronics extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Furniture
 *
 * @property int $category_id
 * @property int $offer_id
 * @property string $material
 * @property string $color
 * @property string $dimensions
 * @property string $style
 * @method static \Illuminate\Database\Eloquent\Builder|Furniture newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Furniture newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Furniture query()
 * @method static \Illuminate\Database\Eloquent\Builder|Furniture whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Furniture whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Furniture whereDimensions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Furniture whereMaterial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Furniture whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Furniture whereStyle($value)
 */
	class Furniture extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Image
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
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
 * @property string $image_path
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
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereImagePath($value)
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

