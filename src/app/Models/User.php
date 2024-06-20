<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active',
        'car_number'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool
    {
        if($this->role_id == Role::where('slug', 'admin')->pluck('id')->first()){
            return true;
        }

        return false;
    }

    public function scopeWithFilter($query, Request $request)
    {
        return $query->when(
            $request->query('date'),
            function(Builder $query, string $date){
                $formattedDate = Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d');
                return $query->whereDate('created_at', $formattedDate);
            })
        ->when(
            $request->query('car_number'),
            function (Builder $query, string $number){
                return $query->where('car_number', 'LIKE', '%'.$number.'%');
            }
        )
        ->when(
            $request->query('search'),
            function (Builder $query, string $search){
                return $query->where('name', 'LIKE', '%'.$search.'%')
                    ->orWhere('email', 'LIKE', '%'.$search.'%');
            }
        );
    }
}
