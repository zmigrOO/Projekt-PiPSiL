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
 * App\Models\cathegory
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent_cathegory_id
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereParentCathegoryId($value)
 */
	class cathegory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\image
 *
 * @property int $offer_id
 * @property int $order
 * @property mixed $Image
 * @method static \Illuminate\Database\Eloquent\Builder|image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|image query()
 * @method static \Illuminate\Database\Eloquent\Builder|image whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|image whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|image whereOrder($value)
 */
	class image extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\offer
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property int $quantity
 * @property string $condition
 * @property float $price
 * @property string $description
 * @property int $seller_id
 * @property string $offer_creation_date
 * @property string $offer_expiration_date
 * @method static \Database\Factories\offerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|offer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|offer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|offer query()
 * @method static \Illuminate\Database\Eloquent\Builder|offer whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|offer whereCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|offer whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|offer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|offer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|offer whereOfferCreationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|offer whereOfferExpirationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|offer wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|offer whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|offer whereSellerId($value)
 */
	class offer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\opinion
 *
 * @property int $offer_id
 * @property int $user_id
 * @property string $content
 * @property int $rating
 * @property string $opinion_creation_date
 * @method static \Illuminate\Database\Eloquent\Builder|opinion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|opinion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|opinion query()
 * @method static \Illuminate\Database\Eloquent\Builder|opinion whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|opinion whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|opinion whereOpinionCreationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|opinion whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|opinion whereUserId($value)
 */
	class opinion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\watchedOffer
 *
 * @property int $offer_id
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|watchedOffer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|watchedOffer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|watchedOffer query()
 * @method static \Illuminate\Database\Eloquent\Builder|watchedOffer whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|watchedOffer whereUserId($value)
 */
	class watchedOffer extends \Eloquent {}
}

