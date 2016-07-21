<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    /**
     * @var string
     */
    protected $table = 'teams';


    /**
     * @var array
     */
    protected  $fillable = ['name', 'size', 'team_id'];


    /**
     * @param $user
     * @throws \Exception
     */
    public function add($user)
    {

        $this->guardAgainsTooManyMembers();

        $method = $user instanceof User ? 'save' : 'saveMany';

        $this->members()->$method($user);
    }

    /**
     * relation with Users
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members()
    {
        return $this->hasMany(User::class);
    }

    /**
     * count relation members
     * @return mixed
     */
    public function membersCount()
    {
        return $this->members()->count();
    }


    /**
     * remove one user from team
     * @param User $user
     */
    public function remove(User $user)
    {
        $user->leaveTeam();
    }

    /**
     * Restart to 0 team users
     */
    public function restart()
    {
        return $this->members()->update(['team_id' => null]);
    }


    /**
     * @throws \Exception
     */
    protected function guardAgainsTooManyMembers()
    {
        if ($this->count() >= $this->size)
        {
            throw new \Exception;
        }
    }
}
