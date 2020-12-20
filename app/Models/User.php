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
        $badges[] = [
            "badge" => $resolved_count >= 3 ? "trusted" : "greyed_trusted",
            "label" => "Resolved {$resolved_count} questions."
        ];

        //Get helpful badge (answered atleast 3 questions)
        $answer_count = $this->getAnswerCount();
        $badges[] = [
            "badge" => $answer_count >= 3 ? "helpful" : "greyed_helpful",
            "label" => "Answered {$answer_count} questions."
        ];

        //Get curious badge (posted atleast 3 questions)
        $question_count = $this->getQuestionCount();
        $badges[] = [
            "badge" => $question_count >= 3 ? "curious" : "greyed_curious",
            "label" => "Posted {$question_count} questions."
        ];

        //Get popular badge (has ressolved, answered, and posted a question)
        $popular_badge = "greyed_popular";
        $popular_label = "Go interact, you're almost there!";
        if($resolved_count && $question_count && $answer_count) {
            $popular_badge = "popular";
            $popular_label = "Hurrah! You're famous!!!";
        }

        $badges[] = [
            "badge" => $popular_badge,
            "label" => $popular_label
        ];

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
        $gratitude = DB::table('gratitudes')
            ->where('user_id', $this->id)
            ->first();

        return $gratitude ? $gratitude->count : 0;
    }

    public function gratitude()
    {
        return $this->hasOne(Gratitude::class);
    }

    public function gratitudeLogs()
    {
        return $this->belongsToMany(User::class, 'user_gratitudes', 'user_id', 'recipient_id')
            ->withTimestamps();
    }
}
