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
     * @param null $users
     * @return mixed
     */
    public function remove($users = null)
    {
        if($users instanceof User){
         return  $users->leaveTeam();
        }

        return $this->removeMany($users);
    }

    /**
     * @param $users
     */
    public function removeMany($users)
    {
        return $this->members()
            ->whereIn('id', $users->pluck('id'))
            ->update(['team_id' => null]);
    }


    /**
     * Restart to 0 team users
     */
    public function restart()
    {
        return $this->members()
            ->update(['team_id' => null]);
    }


    /**
     * @throws \Exception
     */
    protected function guardAgainsTooManyMembers()
    {
        if ($this->membersCount() >= $this->size)
        {
            throw new \Exception;
        }
    }
}
