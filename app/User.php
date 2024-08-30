<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    public const VERIFIED = 2;
    public const PENDING_APPROVAL = 1;
    public const NOT_VERIFIED = 0;
    const AUTO_TRADER = 1;
    const DEACTIVATE_AUTO_TRADER = 0;
    const MINI_TRADE_BAL = 5000;
    const USER_ACTIVE = 0;
    const USER_BLOCKED = -1;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'email', 'password','address','phone', 'username',
        'zipcode', 'country_id', 'state', 'dob', 'city', 'referrer', 'verify_stage',
        'wallet_backup', 'status', 'timezone', 'address_2','member_id',
        'trade_profit', 'referral_bonus', 'total_referrals', 'trade_balance'
    ];
    public const WALLET_BACKUP_COMPLETE = 1;


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "active_bot_trade" => 'int',
        'status' => 'int',
        'verify_stage' => 'int',
        'email_verified_at' => 'datetime',
        'is_deleted' => 'datetime',
        'total_referrals' => 'int',
        'trade_balance' => "float",
        'trade_profit' => "float"
    ];


    public function passwordSecurity()
    {
        return $this->hasOne('App\PasswordSecurity');
    }
    public function country(){
        return $this->hasOne(Countries::class, 'country_code','country_id');
    }

    public function referrer()
    {
        return $this->hasOne(User::class, 'referrer', 'id');
    }

    public function verification()
    {
        return $this->hasMany(Verification::class, 'user_id', 'id');
    }


}
