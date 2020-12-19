<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getBadges()
    {
        $badges = [];

        //Get trust badge (resolved atleast 3 questions)
        $resolved_count = $this->getResolveCount();
        if($resolved_count >= 3) {
            $badges[] = [
                "badge" => "trusted",
                "label" => "Resolved {$resolved_count} questions."
            ];
        }

        //Get helpful badge (answered atleast 3 questions)
        $answer_count = $this->getAnswerCount();
        if($answer_count >= 3) {
            $badges[] = [
                "badge" => "helpful",
                "label" => "Answered {$answer_count} questions."
            ];
        }

        //Get curious badge (posted atleast 3 questions)
        $question_count = $this->getQuestionCount();
        if($question_count >= 3) {
            $badges[] = [
                "badge" => "curious",
                "label" => "Posted {$question_count} questions."
            ];
        }

        //Get popular badge (has ressolved, answered, and posted a question)
        if($resolved_count && $question_count && $answer_count) {
            $badges[] = [
                "badge" => "popular",
                "label" => "Congratulations!"
            ];
        }

        return $badges;
    }

    public function getResolveCount()
    {
         return DB::table('comments')
            ->where('user_id', $this->id)
            ->where('is_correct', true)
            ->count();
    }

    public function getAnswerCount()
    {
        return DB::table('comments')
            ->where('user_id', $this->id)
            ->count();
    }

    public function getQuestionCount()
    {
        return DB::table('questions')
            ->where('user_id', $this->id)
            ->count();
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getGratitudeCount()
    {
        return DB::table('gratitudes')
            ->where('user_id', $this->id)
            ->pluck('count');
    }
}
